function searchData() {
    var searchTerm = document.getElementById('searchTerm').value;
    // Make an AJAX request to searchdata.php
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            console.log(xhr.responseText); 
            if (xhr.status === 200) {
                var resultContainer = document.getElementById('resultContainer');

                // Parse the JSON response
                var data = JSON.parse(xhr.responseText);
                console.log(data, "hehehe")
                // Process the data and update the result container
                displayResults(data, resultContainer);
            } else {
                console.error('Error:', xhr.status, xhr.statusText);
            }
        }
    };

    // Send a GET request with the search term
    xhr.open('GET', 'searchdata.php?searchTerm=' + encodeURIComponent(searchTerm), true);
    xhr.send();
}

function displayResults(data, container) {
    // Clear previous results
    container.innerHTML = '';

    if (data.length > 0) {
        // If there are results, create a list and append to the container
        var list = document.createElement('ul');
        data.forEach(function (item) {
            var listItem = document.createElement('li');
            listItem.textContent = item.usage_description;
            list.appendChild(listItem);
        });
        container.appendChild(list);
    } else {
        // If no results, display a message
        container.textContent = 'No results found.';
    }
}
