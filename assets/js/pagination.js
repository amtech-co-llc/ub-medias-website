const topForItemContainer = document.getElementById('items-container-title');
const itemsContainer = document.getElementById('items-container');
const paginationContainer = document.getElementById('pagination-container');

const allItems = Array.from(itemsContainer.children);

const itemsPerPage = 6;
let currentPage = 1;
const pageCount = Math.ceil(allItems.length / itemsPerPage);

function displayItems(page) {
    itemsContainer.innerHTML = ''; // Clear the container
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const itemsToShow = allItems.slice(start, end);

    // Append items to the container
    itemsToShow.forEach(item => itemsContainer.appendChild(item));

    // Wait for the DOM to update, then initialize the like buttons
    requestAnimationFrame(() => {
        initializeLikeButtons(); // Initialize the like buttons after items are added to DOM
        initializeDislikeButtons();
    });
}

function setupPagination() {
    paginationContainer.innerHTML = '';

    // Helper: create a page button
    function addPageButton(i) {
        const btn = document.createElement('button');
        btn.className = 'page-btn';
        btn.textContent = i;
        if (i === currentPage) btn.classList.add('active');
        btn.addEventListener('click', () => {
            currentPage = i;
            displayItems(currentPage);  // This will re-render items and initialize like buttons
            setupPagination();  // Re-setup the pagination
            topForItemContainer.scrollIntoView({ behavior: 'smooth', block: 'start' }); // Scroll up
        });
        paginationContainer.appendChild(btn);
    }

    // Previous Button
    const prevBtn = document.createElement('button');
    prevBtn.innerHTML = '<i class="ri-arrow-left-s-line"></i>';
    prevBtn.className = 'nav-btn';
    prevBtn.disabled = currentPage === 1;
    prevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            displayItems(currentPage);
            setupPagination();
            topForItemContainer.scrollIntoView({ behavior: 'smooth', block: 'start' }); // Scroll up
        }
    });
    paginationContainer.appendChild(prevBtn);

    // Pagination logic with ellipsis
    if (pageCount <= 10) {
        for (let i = 1; i <= pageCount; i++) addPageButton(i);
    } else {
        addPageButton(1);

        if (currentPage > 4) {
            const dots = document.createElement('span');
            dots.innerHTML = '<i class="ri-more-fill"></i>';
            dots.className = 'dots';
            paginationContainer.appendChild(dots);
        }

        const startPage = Math.max(2, currentPage - 1);
        const endPage = Math.min(pageCount - 1, currentPage + 1);

        for (let i = startPage; i <= endPage; i++) {
            addPageButton(i);
        }

        if (currentPage < pageCount - 3) {
            const dots = document.createElement('span');
            dots.innerHTML = '<i class="ri-more-fill"></i>';
            dots.className = 'dots';
            paginationContainer.appendChild(dots);
        }

        addPageButton(pageCount);
    }

    // Next Button
    const nextBtn = document.createElement('button');
    nextBtn.innerHTML = '<i class="ri-arrow-right-s-line"></i>';
    nextBtn.className = 'nav-btn';
    nextBtn.disabled = currentPage === pageCount;
    nextBtn.addEventListener('click', () => {
        if (currentPage < pageCount) {
            currentPage++;
            displayItems(currentPage);
            setupPagination();
            topForItemContainer.scrollIntoView({ behavior: 'smooth', block: 'start' }); // Scroll up
        }
    });
    paginationContainer.appendChild(nextBtn);
}

// Initialize first page
displayItems(currentPage);
setupPagination();
