


$(".form").submit(function(event) {

    /* stop form from submitting normally */
    event.preventDefault();

    /* get the action attribute from the <form action=""> element */
    var $form = $( this ),
        url = $form.attr( 'action' );
    /* find which button clicked */
    var btn = $(this).find("input[type=submit]:focus").val();
    /* get all  data of form */
    var formData = $(this).serializeArray();

    /* inserts  clicked button value to formdata */
    formData.push({ name: "button", value: btn });
    if(btn=='Delete'){
        if (window.confirm("Are you sure?")) {
            var posting = $.post(url, formData);
        }

    }
    if(btn=='Edit') var posting = $.post(url, formData);
    /* reload  page */
    posting.done(function( data ) {
        location.href = "{{route('storelist')}}"
    });
});
$("#addform").submit(function(event) {

    /* stop form from submitting normally */
    event.preventDefault();

    /* get the action attribute from the <form action=""> element */
    var $addform = $( this ),
        url = $addform.attr( 'action' );

    var posting = $.post( url, $(this).serialize());

    /* Reload page */
    posting.done(function( data ) {

        location.href = "{{route('storelist')}}"

    });

});
function addStore(){
    $('#div').show();
}
