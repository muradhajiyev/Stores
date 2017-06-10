const InputTypes = {
    number: "number",
    text: "text",
    dropdown: "dropdown",
    radio: "radio"

};
let specificationSelectElement;
$(document).ready(function () {
    $('.parentCategory').livequery('change', function (event) {
        clearNextElements(this, '.parentCategory');
        clearNextElements(this, 'label');
        getSubCategories(event.target.value);
        clearSpecificationsArea();
        getSpecificationsByCategoryId(event.target.value);
    });
    $('.specification').livequery('change', function (event) {
        clearNextElements(this);
        appendSpecValuesAndUnit(event.target.value, this.parentElement);
    });
    $('#addNewSpec').on('click', function (event) {
        event.preventDefault();
        duplicateSpecifications();
    });
    $('#deleteLastSpec').on('click', function (event) {
        event.preventDefault();
        $('#specificationsArea').children().last().remove();
    });
});

//get sub category given parent category id
let getSubCategories = function (id) {
    if (id) {
        $.get('/api/subCategory/' + id, function (data) {
            let categoryArray = JSON.parse(data);
            let selectElement = '<label style="padding:7px;float:left; font-size:12px;">No more sub category !</label>';
            let optionElement = '';
            if (categoryArray && (categoryArray.length !== 0)) {

                selectElement = '<div class="form-group parentCategory">' +
                    '<select class="form-control parentCategorySelect" name="productCategory" required> ' +
                    '<option value="" selected="selected" disabled>-- Sub Category --</option> ';
                for (x in categoryArray) {
                    optionElement += '<option value="' + categoryArray[x].id + '">' + categoryArray[x].name + '</option> '
                }
                selectElement = selectElement + optionElement + '</select> </div>';

            }
            $('#subCategories').append(selectElement);

        });
    }
};

//clear all next siblings of an element
let clearNextElements = (currentElement, element) => {
    if (element) {
        $(currentElement).nextAll(element).remove();
    } else {
        $(currentElement).nextAll().remove();
    }
};

let appendSpecifications = (specfications) => {
    $('#specificationsArea').append(specfications);
};

//get specifications of current category
let getSpecificationsByCategoryId = function (id) {
    let selectElement = '<div class="row productSpecifications"> <div class="col-md-3 form-group specification"> <select class="form-control productSpec" name="productSpec" required> ';
    if (id) {
        $.get('/api/specifications/' + id, function (data) {
            if (data.length > 0) {
                selectElement += '<option selected disabled>Select Specifications</option>';
                data.forEach(function (spec) {
                    selectElement += '<option value="' + spec.id + '">' + spec.name + '</option>';
                });
                selectElement += '</select> </div> </div>';
                appendSpecifications(selectElement);
                showAddNewSpecButton(data.length);
                specificationSelectElement = selectElement;
            }


        })
    }
};

//hide and remove specification fields
let clearSpecificationsArea = () => {
    $('#specificationsArea').empty();
    $('#newSpec').attr('hidden', true);
    $('#deleteSpec').attr('hidden', true);
};

//appends value of current specification and its unit if applicable
let appendSpecValuesAndUnit = function (id, appendArea) {
    $.get('/api/specification/' + id + '/type', function (data) {
        if (data) {
            let element;
            let unit = data[1];
            if (data[0] === InputTypes.number) {
                element = '<div class="col-md-3 form-group"> <input type="number" name="specValue" required placeholder="Specification value" class="form-control specValue"/> </div>';
                append(element, unit, appendArea);
            } else if (data[0] === InputTypes.text) {
                element = '<div class="col-md-3 form-group"> <input type="text" name="specValue" required placeholder="Specification value" class="form-control specValue"/> </div>';
                append(element, unit, appendArea);
            } else if (data[0] === InputTypes.dropdown) {

                $.get('/api/dropdownValues/' + id, function (data) {
                    let dropdownArray = JSON.parse(data);
                    if (dropdownArray) {

                        element = '<div class="col-md-3 form-group"> <select name="specValue" required  class="form-control specValue"> <option value="" selected disabled>Specification value</option>';
                        for (x in dropdownArray) {

                            element += '<option value="' + dropdownArray[x].id + '"> ' + dropdownArray[x].dropdown_value + '</option>';
                        }
                        element += '</select> </div>';


                        append(element, unit, appendArea);
                    }
                });


            } else if (data[0] === InputTypes.radio) {
                element = '<div class="col-md-3 form-group"> <input type="checkbox" name="specValue" class="form-control specValue"/> </div>';
                append(element, unit, appendArea);
            }
        }


    });
};

//duplicate the same specification select element when new button is pressed
let duplicateSpecifications = () => {
    if (specificationSelectElement) {
        appendSpecifications(specificationSelectElement);
    }
};

//append specification value and unit field near selected specifcation
let append = function (element, unit, appendArea) {
    if (element) {
        $(appendArea).append(element);
        if (unit) {
            $(appendArea).append('<div class="col-md-2 form-group"> <input type="text" class="form-control specUnit" readonly value="' + unit + '"/> </div>');
        }
    }
};

//show add new button
let showAddNewSpecButton = (specLength) => {
    $('#newSpec').attr('hidden', false);
    $('#deleteSpec').attr('hidden', false);
};