$(document).ready(function () {

    $('.parentCategory').livequery('change', function (event) {

        $(this).nextAll('.parentCategory').remove();
        $(this).nextAll('label').remove();
        getSubCategories(event.target.value);
    });
});

var getSubCategories = function (id) {
    if (id) {
        $.get('/subCategory/' + id, function (data) {
            var categoryArray = JSON.parse(data);
            var selectElement = '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';
            var optionElement = '';
            if (categoryArray) {
                if (categoryArray.length !== 0) {
                    selectElement = '<div class="form-group parentCategory"><select class="form-control parentCategorySelect" name="subCategory" required> ' +
                        '<option value="" selected="selected" disabled>-- Sub Category --</option> ';

                    for (x in categoryArray) {
                        optionElement += '<option value="' + categoryArray[x].id + '">' + categoryArray[x].name + '</option> '
                    }
                    selectElement = selectElement + optionElement + '</select> </div>';
                }
            }
            $('#subCategories').append(selectElement);

        });
    }
};
