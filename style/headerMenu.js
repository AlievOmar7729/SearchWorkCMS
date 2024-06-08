function toggleMenu() {
    let menu = document.querySelector('.navigationMenuUl');
    menu.classList.toggle('show');
}

document.addEventListener("DOMContentLoaded", function() {
    displayHistory();
});

function saveSearch() {
    const input = document.getElementById("searchInput");
    const searchTerm = input.value;

    if (searchTerm) {
        let searches = JSON.parse(localStorage.getItem("searchHistory")) || [];
        searches.push(searchTerm);

        // Save only the last 10 searches
        if (searches.length > 10) {
            searches.shift();
        }

        localStorage.setItem("searchHistory", JSON.stringify(searches));
        displayHistory();
    }

    input.value = ""; // Clear input after saving
}

function displayHistory() {
    const historyDiv = document.getElementById("history");
    historyDiv.innerHTML = ""; // Clear previous history

    const searches = JSON.parse(localStorage.getItem("searchHistory")) || [];
    searches.forEach((search, index) => {
        const searchElement = document.createElement("div");
        searchElement.textContent = search;
        historyDiv.appendChild(searchElement);
    });
}
