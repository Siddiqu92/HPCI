




jQuery(document).ready(function($) {
    // Ajax call for non-logged-in users
    $.ajax({
        url: ajaxurl,
        type: 'GET',
        dataType: 'json',
        data: {
            action: 'get_architecture_projects'
        },
        success: function(response) {
            if (response.success) {
                var projects = response.data;
                // Process and display the projects
                console.log(projects);
            }
        }
    });
});













jQuery(document).ready(function($) {
    $.ajax({
        url: kanye_api.api_url,
        type: 'GET',
        dataType: 'json',
        data: {
            count: 5
        },
        success: function(response) {
            if (Array.isArray(response)) {
                response.forEach(function(quote) {
                    $('body').append('<p>' + quote.quote + '</p>');
                });
            } else {
                console.log('Error: Invalid response from API.');
            }
        },
        error: function(xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
});




  // Function to fetch quotes from the API and display them
  function displayKanyeQuotes() {
    var url = "https://api.kanye.rest/?count=5"; // API endpoint URL
    fetch(url)
      .then(response => response.json())
      .then(data => {
        var quotesContainer = document.getElementById("kanye-quotes");
        quotesContainer.innerHTML = ""; // Clear the container

        // Loop through the quotes and append them to the container
        data.forEach(quote => {
          var quoteElement = document.createElement("p");
          quoteElement.textContent = quote.quote;
          quotesContainer.appendChild(quoteElement);
        });
      })
      .catch(error => {
        console.log(error);
      });
  }



  // Call the function to fetch and display the quotes
  displayKanyeQuotes();


