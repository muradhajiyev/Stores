$(document).ready(function () {
    initializeDropzone1();
 });

    //initialize dropzone
let initializeDropzone1 = () => {
    token = $('input[name="_token"]').val();
    Dropzone.autoDiscover = false;
    //config variables
    var config = $('#settings').val();
    var res = config.split(",");
  
     if ($('#fileUpload1').length > 0) {
        let myDropzone1 = new Dropzone("#fileUpload1", {
            url: "/api/uploadFile",
            addRemoveLinks: true,
            maxFilesize: res[1],
            maxFiles: res[0],
            dictFileTooBig: "Fayl Olcusu boyukdur. Max 4Mb",
            dictMaxFilesExceeded: "Siz 3 den artiq fayl daxil ede bilmezsiniz",
            success: function (file, response) {
                addImageHiddenField(response);
            },
            init: function () {

                this.on('sending', function (file, xhr, formData) {
                    formData.append('_token', token);
                    formData.append('isCover', "1");
                });
                this.on('removedfile', function (file) {

                });
            }
        });
    }
};

//add hidden field to document for image id
let addImageHiddenField = (id) => {
    let inputElement = '<input type="hidden" name="imageIds[]" value="' + id + '"' + '/>';
    $('#imageIds').append(inputElement);
    //$('#submitProduct').removeAttr('disabled');
};