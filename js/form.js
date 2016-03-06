/**
 * Created by user on 3/5/16.
 */
function formSend(){
    $('#notify').submit(function(event) { //Trigger on form submit


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
}

function validateEmail(email) {
    // http://stackoverflow.com/a/46181/11236

    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

/**
 * When document is ready, do
 */
$(document).ready(function() {
    formSend();
});