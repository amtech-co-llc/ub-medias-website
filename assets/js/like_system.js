document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById("items-container");

  // Generate or get unique browser ID
  let browserId = localStorage.getItem("browser_id");
  if (!browserId) {
    browserId = "browser_" + Math.random().toString(36).substr(2, 9);
    localStorage.setItem("browser_id", browserId);
  }

  // Load voted posts from localStorage
  let votedPosts = JSON.parse(localStorage.getItem("voted_posts") || "[]");

  // Function to restore votes on given context (document or newly added nodes)
  function restoreVotes(context = document) {
    votedPosts.forEach((vote) => {
      const btns = context.querySelectorAll(
        `.${vote.type}-btn[data-post-id="${vote.postId}"]`
      );
      btns.forEach((btn) => {
        const icon = btn.querySelector("i");
        btn.style.color = "#029bd8";
        if (icon) icon.style.color = "#029bd8";

        // Disable the opposite button
        const oppositeType = vote.type === "like" ? "dislike" : "like";
        const oppositeBtn = context.querySelector(
          `.${oppositeType}-btn[data-post-id="${vote.postId}"]`
        );
        if (oppositeBtn) oppositeBtn.disabled = true;
      });
    });
  }

  // Initial restore
  setTimeout(() => restoreVotes(), 100);

  // Handle like/dislike clicks
  document.addEventListener("click", function (e) {
    const btn = e.target.closest(".like-btn, .dislike-btn");
    if (!btn) return;

    const postId = btn.dataset.postId;
    const type = btn.classList.contains("like-btn") ? "like" : "dislike";

    // Check if user already voted for this post
    if (votedPosts.some((vote) => vote.postId === postId)) {
      alert("You have already voted for this post!");
      return;
    }

    const icon = btn.querySelector("i");
    const currentCount =
      parseInt(btn.textContent.trim().split(/\s+/).pop()) || 0;

    // Update UI
    btn.innerHTML = `${icon.outerHTML} ${currentCount + 1}`;
    btn.style.color = "#029bd8";
    if (icon) icon.style.color = "#029bd8";

    // Disable opposite button
    const oppositeType = type === "like" ? "dislike" : "like";
    const oppositeBtn = document.querySelector(
      `.${oppositeType}-btn[data-post-id="${postId}"]`
    );
    if (oppositeBtn) oppositeBtn.disabled = true;

    // Save vote locally
    votedPosts.push({ postId, type, browserId });
    localStorage.setItem("voted_posts", JSON.stringify(votedPosts));

    // Send vote to server
    fetch(`php/update-${type}.php`, {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `post_id=${encodeURIComponent(
        postId
      )}&browser_id=${encodeURIComponent(browserId)}`,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success && data.newCount !== undefined) {
          btn.innerHTML = `${icon.outerHTML} ${data.newCount}`;
        }
      })
      .catch((err) => {
        console.error(err);
        btn.innerHTML = `${icon.outerHTML} ${currentCount}`;
        btn.style.color = "";
        if (icon) icon.style.color = "";
        votedPosts = votedPosts.filter((vote) => vote.postId !== postId);
        localStorage.setItem("voted_posts", JSON.stringify(votedPosts));

        // Re-enable opposite button if vote failed
        if (oppositeBtn) oppositeBtn.disabled = false;
      });
  });

  // Observe dynamically added items
  const observer = new MutationObserver((mutationsList) => {
    for (const mutation of mutationsList) {
      if (mutation.addedNodes.length > 0) {
        mutation.addedNodes.forEach((node) => {
          if (node.nodeType === Node.ELEMENT_NODE) {
            restoreVotes(node); // Apply votes to new elements
          }
        });
      }
    }
  });

  observer.observe(container, { childList: true, subtree: true });
});
