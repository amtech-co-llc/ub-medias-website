document.addEventListener("DOMContentLoaded", function () {
  const posts = document.querySelectorAll(".rotate-post");
  if (posts.length === 0) return;

  let current = 0;

  function rotatePost() {
    posts[current].style.display = "none"; // hide current
    current = (current + 1) % posts.length; // next post
    posts[current].style.display = ""; // show next
  }

  setInterval(rotatePost, 6500); // rotate every 5 seconds
});
