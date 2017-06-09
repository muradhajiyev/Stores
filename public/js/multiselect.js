/**
 * Created by Gadir on 6/8/2017.
 */
$(document).ready(function(){
    $('#multiSelect').multiselect({
        nonSelectedText: 'Select Framework',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'400px'
    });

    // $('#categoryForm').on('submit', function () {
    //     var form_data = $('#multiSelect').serialize();
    //     console.log(form_data);
    //     $.ajax({
    //         type: 'post',           // POST Request
    //         url: '/categories/addCategory',            // Url of the Route (in this case user/save not only save)
    //         data: form_data,         // Serialized Data
    //         dataType: 'json',       // Data Type of the Transmit
    //         success: function (data) {
    //
    //             // Check if the logic was successful or not
    //             if (data.status == 'success') {
    //                 console.log('alles ok');
    //             } else {
    //                 console.log(data.msg);
    //             }
    //         },
    //         error: function (data) {
    //             // Error while calling the controller (HTTP Response Code different as 200 OK
    //             console.log('Error:', data);
    //         }
    //     });
    // });
});