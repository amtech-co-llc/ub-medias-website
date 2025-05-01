function initializeDislikeButtons() {
    const dislikeBtns = document.querySelectorAll(".dislike-btn");

    dislikeBtns.forEach(dislikeBtn => {
        const postId = dislikeBtn.getAttribute('data-post-id');

        // Prevent multiple event bindings
        if (dislikeBtn.dataset.initialized === "true") return;
        dislikeBtn.dataset.initialized = "true";

        // Restore state from localStorage
        if (localStorage.getItem('disliked_' + postId)) {
            dislikeBtn.classList.add('disliked');
            dislikeBtn.disabled = true;
            const dislikeCount = localStorage.getItem('dislike-count_' + postId);
            if (dislikeCount) {
                const dislikeCountElement = document.getElementById('dislike-count-' + postId);
                if (dislikeCountElement) {
                    dislikeCountElement.textContent = dislikeCount;
                }
            }
        }

        // Handle click
        dislikeBtn.addEventListener('click', function () {
            console.log("Clicked on dislike for post ID:", postId);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'php/dislike.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        const serverResponse = xhr.responseText;
                        console.log("Dislike Server Response:", serverResponse);

                        localStorage.setItem('disliked_' + postId, true);
                        localStorage.setItem('dislike-count_' + postId, serverResponse);

                        dislikeBtn.classList.add('disliked');
                        dislikeBtn.disabled = true;

                        const dislikeCountElement = document.getElementById('dislike-count-' + postId);
                        if (dislikeCountElement) {
                            dislikeCountElement.textContent = serverResponse;
                        }
                    } else {
                        alert('Request failed. Status: ' + xhr.status);
                    }
                }
            };

            xhr.send('post_id=' + encodeURIComponent(postId));
        });
    });
}


// Initialize like buttons when the page loads or after pagination
initializeDislikeButtons();

// Assuming you have a pagination system in place, you should call the `initializeLikeButtons()` function whenever a new page is loaded or when the user navigates between pages.
