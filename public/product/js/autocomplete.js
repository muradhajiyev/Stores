/**
 * Created by Gadir on 6/12/2017.
 */
// $( document ).ready(function() {
//     $( "#tags" ).autocomplete({
//         serviceUrl: '/autocomplete',
//         minlength:1,
//         autoFocus:true,
//         select: function(event, ui) {
//             $('#tags').val(ui.item.value);
//             alert('test');
//             console.log('test');
//         }
//     });
// } );
$( function() {
    var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ];
    $( "#storeName" ).autocomplete({
        source: availableTags
    });
} );