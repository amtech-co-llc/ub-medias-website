document.addEventListener("DOMContentLoaded", () => {
    const comments = document.querySelectorAll(".comment-1");
    const paginationContainer = document.getElementById("pagination-container");
    const commentsPerPage = 3;
    let currentPage = 1;
    const pageCount = Math.ceil(comments.length / commentsPerPage);

    function showPage(page) {
        comments.forEach(comment => comment.style.display = "none");

        const start = (page - 1) * commentsPerPage;
        const end = start + commentsPerPage;
        for (let i = start; i < end && i < comments.length; i++) {
            comments[i].style.display = "block";
        }

        currentPage = page;
        updatePagination();
    }

    function updatePagination() {
        paginationContainer.innerHTML = '';

        // Previous button
        const prevBtn = document.createElement('button');
        prevBtn.innerHTML = '<i class="ri-arrow-left-s-line"></i>';
        prevBtn.className = 'nav-btn';
        prevBtn.disabled = currentPage === 1;
        prevBtn.addEventListener('click', () => showPage(currentPage - 1));
        paginationContainer.appendChild(prevBtn);

        // Page buttons
        if (pageCount <= 5) {
            for (let i = 1; i <= pageCount; i++) {
                createPageButton(i);
            }
        } else {
            createPageButton(1);
            if (currentPage > 3) {
                addDots();
            }

            let startPage = Math.max(2, currentPage - 1);
            let endPage = Math.min(pageCount - 1, currentPage + 1);

            for (let i = startPage; i <= endPage; i++) {
                createPageButton(i);
            }

            if (currentPage < pageCount - 2) {
                addDots();
            }

            createPageButton(pageCount);
        }

        // Next button
        const nextBtn = document.createElement('button');
        nextBtn.innerHTML = '<i class="ri-arrow-right-s-line"></i>';
        nextBtn.className = 'nav-btn';
        nextBtn.disabled = currentPage === pageCount;
        nextBtn.addEventListener('click', () => showPage(currentPage + 1));
        paginationContainer.appendChild(nextBtn);
    }

    function createPageButton(i) {
        const btn = document.createElement('button');
        btn.textContent = i;
        btn.className = 'page-btn';
        if (i === currentPage) btn.classList.add('active');
        btn.addEventListener('click', () => {
            showPage(i);
            scrollToTop();
        });
        paginationContainer.appendChild(btn);
    }

    function addDots() {
        const dots = document.createElement('span');
        dots.innerHTML = '<i class="ri-more-fill"></i>';
        dots.className = 'dots';
        paginationContainer.appendChild(dots);
    }

    function scrollToTop() {
        window.scrollTo({
            top: document.getElementById("comments-container").offsetTop,
            behavior: "smooth"
        });
    }

    showPage(currentPage);
});