$(document).ready(function () {

    $('.category').on('change', function (event) {
        getSubCategories(event.target.value);
    });
});
var getSubCategories = function (id) {
    var selectId = 1;

    if (id) {
        $.get('/subCategory/' + id, function (data) {
            var categoryArray = JSON.parse(data);
            if(categoryArray) {
                if(categoryArray.length!==0) {
                    $('.subCategories').append('<div class="form-group"><select class="form-control category" required id="' + selectId + '" ></div>');

                    for (x in categoryArray) {

                    }
                }
            }
        });

    }
};