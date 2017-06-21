$(document).ready(function () {
    currentCoverCount = 0;
    initializeDropzone1();

    $('.deleteCover').on('click', function (event) {
        console.log(event.target.value);
        currentCoverCount = currentCoverCount - 1;
        console.log(currentCoverCount);
        var id = event.target.value;
        disableSubmitButton();
        this.parentElement.parentElement.remove();
        $.get('/api/deleteCover/' + id, function (data) {
           // console.log(data);
            enableSubmitButton();
        });

    });
 
 });

    //initialize dropzone
let initializeDropzone1 = () => {
    token = $('input[name="_token"]').val();
    Dropzone.autoDiscover = false;
    //config variables
    var config = $('#settings').val();
    var res = config.split(",");
    var maxCoverCount = parseInt(res[0]);

    if(typeof(res[2]) != 'undefined' && res[2] != null){
        console.log("burdayam");
        currentCoverCount = parseInt(res[2]);
        console.log(currentCoverCount + "from res");
    }
    else{
        console.log("ooo");
    }
  
     if ($('#fileUpload1').length > 0) {
        let myDropzone1 = new Dropzone("#fileUpload1", {
            url: "/api/uploadFile",
            addRemoveLinks: true,
            dictDefaultMessage: "Fayllarinizi bura click ederek artirin",
            dictCancelUpload: "Yuklemeni dayandir",
            dictRemoveFile: "Fayli Sil",
            maxFilesize: res[1],
            maxFiles: res[0],
            dictFileTooBig: "Fayl Olcusu boyukdur. Max 4Mb",
            dictMaxFilesExceeded: "Siz " + res[0] +" den artiq fayl daxil ede bilmezsiniz",
            success: function (file, response) {
                file.previewElement.id = response;
                addImageHiddenField(response);
            },
            accept: function(file, done) {
                if(this.getAcceptedFiles().length + currentCoverCount >= maxCoverCount){
                        console.log("asdiq");
                        console.log(maxCoverCount);
                        console.log(currentCoverCount);
                        done("Maximum sekil sayini asirsiniz");
                }
                else {
                    done();
                }
            },
            init: function () {

                this.on('sending', function (file, xhr, formData) {
                    formData.append('_token', token);
                    formData.append('isCover', "1");
                });
                this.on('removedfile', function (file) {
                    removeImageHiddenField(file.previewElement.id);
                });
                this.on('addedfile', function (file) {
                    disableSubmitButton();
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

//add hidden field to document for image id
let addImageHiddenField = (id) => {
    let inputElement = '<input type="hidden" name="imageIds[]" value="' + id + '"' + '/>';
    $('#imageIds').append(inputElement);
    //$('#submitProduct').removeAttr('disabled');
};

let removeImageHiddenField = (id) => {
    $('#imageIds').find("input[value='" + id + "']").remove();
};

let disableSubmitButton = () => {
    $('#submitStore').attr('disabled', 'disabled');

};
let enableSubmitButton = () => {
    $('#submitStore').removeAttr('disabled');

};