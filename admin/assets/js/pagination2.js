const itemsContainer = document.getElementById('publication-cards');
const paginationContainer = document.getElementById('pagination-container');
const topForItemContainer = document.getElementById('visualize-publication');

let allItems = [];
let itemsPerPage = 4;
let currentPage = 1;
let pageCount = 0;

function fetchDataAndDisplayCards() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', './php/fetch-article.php', true); // Adjust the URL to your PHP endpoint
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Insert the new data into the DOM
            const newContent = xhr.responseText;
            itemsContainer.innerHTML = newContent; // Update the cards content

            // Recalculate all items based on the new data
            allItems = Array.from(itemsContainer.children); // Get all new items from the fetched content
            pageCount = Math.ceil(allItems.length / itemsPerPage); // Update the page count
            currentPage = 1; // Reset to page 1 after new data

            displayItems(currentPage); // Display the first page of items
            setupPagination(); // Re-setup the pagination
            initializeDropdowns(); // Re-initialize dropdowns after inserting new data
        }
    };
    xhr.send();
}

// Function to display items for the current page
function displayItems(page) {
    itemsContainer.innerHTML = ''; // Clear current items
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const itemsToShow = allItems.slice(start, end);

    // Append the items to the container
    itemsToShow.forEach(item => itemsContainer.appendChild(item));

    // Re-initialize dropdowns after new content
    if (typeof initializeDropdowns === 'function') {
        initializeDropdowns();
    }
}

// Function to setup pagination buttons
function setupPagination() {
    paginationContainer.innerHTML = ''; // Clear the pagination

    // Helper function to add a page button
    function addPageButton(i) {
        const btn = document.createElement('button');
        btn.className = 'page-btn';
        btn.textContent = i;
        if (i === currentPage) btn.classList.add('active');
        btn.addEventListener('click', () => {
            currentPage = i;
            displayItems(currentPage);
            setupPagination();
            topForItemContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
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
            topForItemContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
    paginationContainer.appendChild(prevBtn);

    // Add page buttons
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
            topForItemContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
    paginationContainer.appendChild(nextBtn);
}

// Use this method to update the pagination based on the fetched data
function updatePagination(newItems) {
    allItems = Array.from(newItems);
    currentPage = 1;
    displayItems(currentPage);
    setupPagination();
}

// Set an interval to fetch new data every 5 seconds
/* setInterval(() => {
    fetchDataAndDisplayCards();
}, 5000); */

// Initial call to load data when the page is first loaded
fetchDataAndDisplayCards();
