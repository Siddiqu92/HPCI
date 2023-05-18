jQuery(document).ready(function($) {
    $.ajax({
        url: ajax_params.ajax_url,
        type: 'POST',
        dataType: 'json',
        data: {
            action: 'get_architecture_projects',
        },
        success: function(response) {
            if (response.success) {
                var projects = response.data;
                // Process the retrieved projects data as needed
                console.log(projects);
            }
        },
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
