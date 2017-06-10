var InputTypes = {
    number: "number",
    text: "text",
    dropdown: "dropdown",
    radio: "radio"

};

$(document).ready(function () {
    $('.parentCategory').livequery('change', function (event) {
        $(this).nextAll('.parentCategory').remove();
        $(this).nextAll('label').remove();
        $('#specValue').attr('hidden', true);
        $('#specValue input').remove();
        $('#specUnit').attr('hidden', true);
        $('#specUnit input').remove();
        $('#specifications').attr('hidden', true);
        getSubCategories(event.target.value);
        getSpecifications(event.target.value);
    });
    $('#productSpec').on('change', function (event) {
        appendSpecValues(event.target.value);
    });
});

var getSubCategories = function (id) {
    if (id) {
        $.get('/api/subCategory/' + id, function (data) {
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
var getSpecifications = function (id) {
    $('#productSpec').empty();
    if (id) {
        $.get('/api/specifications/' + id, function (data) {

            if (data.length > 0) {
                $('#specifications').attr('hidden', false);
                if(data.length>1){
                    console.log('>1');
                    $('#newSpec').attr('hidden', false);
                }else{
                    $('#newSpec').attr('hidden', true);
                }
                $('#productSpec').append('<option selected disabled>Select Specifications</option>');
                data.forEach(function (spec) {
                    $('#productSpec').append('<option value="' + spec.id + '">' + spec.name + '</option>');
                });
            }



        })
    }
};
var appendSpecValues = function (id) {
    $.get('/api/specification/' + id + '/type', function (data) {
        $('#specValue').attr('hidden', true);
        $('#specValue input').remove();
        $('#specUnit').attr('hidden', true);
        $('#specUnit input').remove();
        if (data) {
            $('#specValue').attr('hidden', false);
            var element;
            if (data[0] === InputTypes.number) {
                element = '<input type="number" name="specValue" required id="specValueId" class="form-control"/>'
            } else if (data[0] === InputTypes.text) {
                element = '<input type="text" name="specValue" required id="specValueId" class="form-control"/>'

            } else if (data[0] === InputTypes.dropdown) {

                    $.get('/api/dropdownValues/'+id, function (data) {
                        console.log(data);
                        if(data) {
                            element = '<select name="specValue" required id="specValueId" class="form-control">';
                            data.forEach(function (value) {
                                element += '<option value="' + value.id + '"> ' + value.dropdown_value + '</option>';
                            });
                            element+='</select>';
                        }
                    });


            } else if (data[0] === InputTypes.radio) {
                element = '<input type="checkbox" name="specValue" id="specValueId" class="form-control"/>'
            }
            if (element) {
                $('#specValue').append(element);
                $('#specUnit').attr('hidden', false);
                $('#specUnit').append('<input type="text" class="form-control" readonly value="' + data[1] + '"/>');
            }
        }


    });
};
var getSpecificationType = function (id) {
    $.get('/api/specification/' + id + '/type', function (data) {
        console.log(data);
    });
};