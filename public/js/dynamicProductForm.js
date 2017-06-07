$(document).ready(function () {

    $('.category').on('change', function (event) {
            getSubCategories(event.target.value);
    });
});
var getSubCategories=function(id){

    $('.subCategories').append('<div class="form-group"> <select class="form-control category"> </select> </div>');
    var appendArea=$('.subCategories select');
    if(id) {
        $.get('/store/subCategory/'+id, function (data) {
            var categoryArray=JSON.parse(data);
          for(x in categoryArray){
             appendArea.append(
                 '<option value="'+categoryArray[x].id+'"> ' + categoryArray[x].name+'</option> ')
          }
         });

    }
};