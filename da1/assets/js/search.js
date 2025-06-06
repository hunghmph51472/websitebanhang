document.getElementById('searchIcon').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default action of the link (if any)

    var searchContainer = document.getElementById('searchContainer');

    // Toggle visibility of the search container
    if (searchContainer.style.display === 'flex') {
        searchContainer.style.display = 'none'; // Hide if it's currently visible
    } else {
        searchContainer.style.display = 'flex'; // Show if it's currently hidden
        document.getElementById('searchInput').focus(); // Focus on the input field
    }
});