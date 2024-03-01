console.log('greetings, this is filters ajax')

jQuery(document).ready(function ($) {
    // Function to perform AJAX request
    function performAjaxRequest() {
        let selectedPostTypes = []; 
        $('input[name="post_types[]"]:checked').each(function () {
            selectedPostTypes.push($(this).val());
        });   
        // Perform AJAX request
        $.ajax({
            type: 'GET',
            url: ajax_object.ajax_url,
            data: {
                action: 'filter_posts',
                post_types: selectedPostTypes
            },
            success: function (response) {
                $('.discos').html(response);
            },
        });
    }

    // Bind the AJAX request to the change event of checkboxes
    $('input[name="post_types[]"]').change(function () {
        if ($(this).val() === 'all') {
            // If "All" checkbox is clicked, uncheck other checkboxes
            $('input[name="post_types[]"]').not(this).prop('checked', false);
        } else {
            // If any other checkbox is clicked, uncheck the "All" checkbox
            $('#post_type_all').prop('checked', false);
        }

        // Trigger AJAX request
        performAjaxRequest();
        if ($(this).val() === 'all') { 
            $(this).prop('checked', false);
        }
    });

    // Initial AJAX request when the page loads
    performAjaxRequest();
});