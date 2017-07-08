const InputTypes = {
    number: "number",
    text: "text",
    dropdown: "dropdown",
    radio: "radio"

};

$(document).ready(function () {
    initializeFileUploader();
    $('#submitProduct').attr('disabled', 'disabled');
    //console.log( $('#subCategories').children('.parentCategorySelect').last());
    $('.parentCategory').livequery('change', function (event) {
        clearNextElements(this, '.parentCategory');
        clearNextElements(this, 'label');
        getSubCategories(event.target.value);
        clearSpecificationsArea();
        getSpecificationsByCategoryId(event.target.value);
    });
    $('#addSpec').on('click', function (event) {
        event.preventDefault();
        let selectValue = $('#productSpec').val();
        if (selectValue) {
            appendSpecValuesAndUnit(selectValue, $('#productSpec option[value=' + selectValue + ']').text());
            disableOptionValues($('#productSpec option[value=' + selectValue + ']'));
        }
    });
    $('.deleteSpecValue').livequery('click', function (event) {
        event.preventDefault();
        this.parentElement.parentElement.remove();
        enableOptionValues($('#productSpec option[value=' + this.id + ']'));

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
                    '<select class="form-control parentCategorySelect" name="productCategory"> ' +
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

//gets specifications of current category
let getSpecificationsByCategoryId = function (id) {
    let selectElement = $('#productSpec');
    selectElement.empty();
    if (id) {
        $.get('/api/specifications/' + id, function (data) {
            if (data.length > 0) {
                $('#specSelect').attr('hidden', false);
                data.forEach(function (spec) {
                    selectElement.append('<option value="' + spec.id + '">' + spec.name + '</option>');
                });
            }


        })
    }
};

//hide and remove specification fields
let clearSpecificationsArea = () => {
    $('#specValues').empty();
    $('#specSelect').attr('hidden', true);

};

//appends value of current specification and its unit if applicable
let appendSpecValuesAndUnit = function (id, text) {
    $.get('/api/specification/' + id + '/type', function (data) {
        if (data) {

            let element;
            let productSpec = id;
            let header = '<div class="col-md-12"><h5>' + text + '</h5></div>';

            let unit = data[1];
            if (data[0] === InputTypes.number) {
                element = '<div class="col-md-2 form-group"> <input type="number" name="specValue[]" required placeholder="Specification value" class="form-control specValue"/> </div>';
                append(header, productSpec, element, unit);

            } else if (data[0] === InputTypes.text) {
                element = '<div class="col-md-2 form-group"> <input type="text" name="specValue[]" required placeholder="Specification value" class="form-control specValue"/> </div>';
                append(header, productSpec, element, unit);

            } else if (data[0] === InputTypes.dropdown) {

                $.get('/api/dropdownValues/' + id, function (data) {
                    let dropdownArray = JSON.parse(data);
                    if (dropdownArray) {
                        element = '<div class="col-md-2 form-group"> <select name="specValue[]" required  class="form-control specValue"> <option value="" selected disabled>Specification value</option>';
                        for (x in dropdownArray) {

                            element += '<option> ' + dropdownArray[x].dropdown_value + '</option>';
                        }
                        element += '</select> </div>';
                        append(header, productSpec, element, unit);

                    }
                });


            } else if (data[0] === InputTypes.radio) {
                element = '<div class="col-md-2 form-group"> <input type="hidden" name="specValue[]" value="0" /> <input type="checkbox" name="specValue[]" value="1" class="specValue"/> </div>';
                append(header, productSpec, element, unit);
            }
        }


    });
};


//appends specification value and unit field near selected specifcation
let append = function (header, productSpec, element, unit) {
    let appendArea = $('#specValues');
    if (element && productSpec) {

        let div = $('<div></div>').attr('class', 'row specificationValue');
        let deleteButton = '<div class="col-md-2"><button id="' + productSpec + '" class="btn btn-danger deleteSpecValue"><span class="glyphicon glyphicon-minus"></span></button></div>';
        let spec = '<input type="hidden" name="productSpec[]" value="' + productSpec + '"/>';
        div.append(header, spec, element);
        if (unit) {
            $(div).append('<div class="col-md-2 form-group"> <input type="text" class="form-control specUnit" readonly value="' + unit + '"/> </div>');
        }
        div.append(deleteButton);
        appendArea.append(div);

    }
};


//initializes dropzone
let initializeFileUploader = () => {
    token = $('input[name="_token"]').val();
    Dropzone.autoDiscover = false;
    if ($('#fileUpload').length > 0) {
        let myDropzone = new Dropzone("#fileUpload", {
            url: "/api/uploadFile",
            addRemoveLinks: true,
            success: function (file, response) {
                file.previewElement.id = response;
                addImageHiddenField(response);
            },
            error: function (error) {
                console.log(error);
            },
            init: function () {
                this.on('sending', function (file, xhr, formData) {
                    formData.append('_token', token);
                });
                this.on('removedfile', function (file) {
                    removeImageHiddenField(file.previewElement.id);
                    if (myDropzone.files.length === 0) {
                        disableSubmitButton();
                    }
                });
                this.on('addedfile', function (file) {
                    disableSubmitButton()
                });
                this.on('complete', function () {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        enableSubmitButton();
                    }
                })

            }
        });
    }
};

//adds hidden field to document for image id
let addImageHiddenField = (id) => {
    let inputElement = '<input type="hidden" name="imageIds[]" value="' + id + '"' + '/>';
    $('#imageIds').append(inputElement);

};
let removeImageHiddenField = (id) => {
    $('#imageIds').find("input[value='" + id + "']").remove();
};

let enableOptionValues = (option) => {
    option.attr('disabled', false);

};
let disableOptionValues = (option) => {
    option.attr('disabled', true);
};

let disableSubmitButton = () => {
    $('#submitProduct').attr('disabled', 'disabled');

};
let enableSubmitButton = () => {
    $('#submitProduct').removeAttr('disabled');

};