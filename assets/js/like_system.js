function initializeLikeButtons() {
    const like_btns = document.querySelectorAll(".like-btn");

    like_btns.forEach(likeBtn => {
        const postId = likeBtn.getAttribute('data-post-id');

        // Avoid reinitializing the same button
        if (likeBtn.dataset.initialized === "true") return;
        likeBtn.dataset.initialized = "true";

        // Restore state
        if (localStorage.getItem('liked_' + postId)) {
            likeBtn.classList.add('liked');
            likeBtn.disabled = true;
            const likeCount = localStorage.getItem('like-count_' + postId);
            if (likeCount) {
                const likeCountElement = document.getElementById('like-count-' + postId);
                if (likeCountElement) {
                    likeCountElement.textContent = likeCount;
                }
            }
        }

        likeBtn.addEventListener('click', function () {
            console.log("Clicked on post with ID:", postId);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'php/likes.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const serverResponse = xhr.responseText;

                    localStorage.setItem('liked_' + postId, true);
                    localStorage.setItem('like-count_' + postId, serverResponse);

                    likeBtn.classList.add('liked');
                    likeBtn.disabled = true;

                    const likeCountElement = document.getElementById('like-count-' + postId);
                    if (likeCountElement) {
                        likeCountElement.textContent = serverResponse;
                    }
                }
            };

            xhr.send('post_id=' + encodeURIComponent(postId));
        });
    });
}


// Initialize like buttons when the page loads or after pagination
initializeLikeButtons();

// Assuming you have a pagination system in place, you should call the `initializeLikeButtons()` function whenever a new page is loaded or when the user navigates between pages.
