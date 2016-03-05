/**
 * Created by user on 3/5/16.
 */
$(document).ready(function() {
    $('#notify').submit(function(event) { //Trigger on form submit
        $('.error').empty(); //Clear the messages first
        $('.success').empty();
        console.log(window.location.href );
        //Validate fields if required using jQuery

        var postForm = { //Fetch form data
            'action'    : 'add_subscriber',
            'email'     : $('input[name=email]').val() //Store name fields value
        };

        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : window.location.href + 'wp-admin/admin-ajax.php', // form processing file URL
            data      : postForm, //Forms name
            dataType  : 'json',
            success: function (resdata) {
                alert(resdata);
            },
            error: function (result, status, err) {
                alert(result.responseText);
                alert(status.responseText);
                alert(err.Message);
            }
        });
        event.preventDefault(); //Prevent the default submit
    });
});