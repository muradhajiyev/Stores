const InputTypes = {
    number: "number",
    text: "text",
    dropdown: "dropdown",
    radio: "radio"

};
let specificationSelectElement;
$(document).ready(function () {
    initializeFileUploader();
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
    let selectElement = '<div class="row productSpecifications"> <div class="col-md-2 form-group specification"> <select class="form-control productSpec" name="productSpec" required> ';
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
                element = '<div class="col-md-2 form-group"> <input type="number" name="specValue" required placeholder="Specification value" class="form-control specValue"/> </div>';
                append(element, unit, appendArea);
            } else if (data[0] === InputTypes.text) {
                element = '<div class="col-md-2 form-group"> <input type="text" name="specValue" required placeholder="Specification value" class="form-control specValue"/> </div>';
                append(element, unit, appendArea);
            } else if (data[0] === InputTypes.dropdown) {

                $.get('/api/dropdownValues/' + id, function (data) {
                    let dropdownArray = JSON.parse(data);
                    if (dropdownArray) {

                        element = '<div class="col-md-2 form-group"> <select name="specValue" required  class="form-control specValue"> <option value="" selected disabled>Specification value</option>';
                        for (x in dropdownArray) {

                            element += '<option value="' + dropdownArray[x].id + '"> ' + dropdownArray[x].dropdown_value + '</option>';
                        }
                        element += '</select> </div>';


                        append(element, unit, appendArea);
                    }
                });


            } else if (data[0] === InputTypes.radio) {
                element = '<div class="col-md-2 form-group"> <input type="checkbox" name="specValue" class="form-control specValue"/> </div>';
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

let initializeFileUploader = () => {
    $(document).ready(function () {

        // enable fileuploader plugin
        $('input[name="files"]').fileuploader({
            // limit of files {null, Number}
            // also with the appended files
            // if null - has no limits
            // example: 3
            limit: 10,

            // file's maximal size in MB {null, Number}
            // also with the appended files
            // if null - has no limits
            // example: 2
            maxSize: 100,

            // each file's maximal size in MB {null, Number}
            // if null - has no limits
            // example: 2
            fileMaxSize: 10,

            // allowed extensions or file types {null, Array}
            // if null - has no limits
            // example: ['jpg', 'jpeg', 'png', 'audio/mp3', 'text/plain']
            extensions: ['jpg', 'jpeg', 'png'],

            // new input {Boolean, String, Function, jQuery Object}
            // example: true
            // example: ' ' - no input
            // example: '<div>Click me</div>'
            // example: function(options) { return '<div>Click me</div>'; }
            // example: $('.selector')
            changeInput: '<div class="fileuploader-input">' +
            '<div class="fileuploader-input-inner">' +
            '<img src="/images/fileuploader-dragdrop-icon.png">' +
            '<h3 class="fileuploader-input-caption"><span>Drag and drop files here</span></h3>' +
            '<p>or</p>' +
            '<div class="fileuploader-input-button"><span>Browse Files</span></div>' +
            '</div>' +
            '</div>',
            theme: 'dragdrop',
            upload: {
            //     url: 'php/ajax_upload_file.php',
            //     data: null,
            //     type: 'POST',
            //     enctype: 'multipart/form-data',
            //     start: true,
            //     synchron: true,
            //     beforeSend: null,
            //     onSuccess: function (result, item) {
            //         var data = JSON.parse(result);
            //
            //         // if success
            //         if (data.isSuccess && data.files[0]) {
            //             item.name = data.files[0].name;
            //         }
            //
            //         // if warnings
            //         if (data.hasWarnings) {
            //             for (var warning in data.warnings) {
            //                 alert(data.warnings);
            //             }
            //
            //             item.html.removeClass('upload-successful').addClass('upload-failed');
            //             // go out from success function by calling onError function
            //             // in this case we have a animation there
            //             // you can also response in PHP with 404
            //             return this.onError ? this.onError(item) : null;
            //         }
            //
            //         item.html.find('.column-actions').append('<a class="fileuploader-action fileuploader-action-remove fileuploader-action-success" title="Remove"><i></i></a>');
            //         setTimeout(function () {
            //             item.html.find('.progress-bar2').fadeOut(400);
            //         }, 400);
            //     },
            //     onError: function (item) {
            //         var progressBar = item.html.find('.progress-bar2');
            //
            //         if (progressBar.length > 0) {
            //             progressBar.find('span').html(0 + "%");
            //             progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
            //             item.html.find('.progress-bar2').fadeOut(400);
            //         }
            //
            //         item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
            //             '<a class="fileuploader-action fileuploader-action-retry" title="Retry"><i></i></a>'
            //         ) : null;
            //     },
            //     onProgress: function (data, item) {
            //         var progressBar = item.html.find('.progress-bar2');
            //
            //         if (progressBar.length > 0) {
            //             progressBar.show();
            //             progressBar.find('span').html(data.percentage + "%");
            //             progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
            //         }
            //     },
            //     onComplete: null,
             },
            onRemove: function (item) {

            },
            captions: {
                feedback: 'Drag and drop files here',
                feedback2: 'Drag and drop files here',
                drop: 'Drag and drop files here'
            },
        });

    });
};