/**
 * Created by Gadir on 6/2/2017.
 */
$(document).ready(function () {
    $('#dropdownValue').hide();
    $('#specificationDropdown').prop('required',false);
    $('select[name="specificationType"]').on('change', function () {
        var type = $(this).val();
        if(type==3){
            $('#specificationDropdown').prop('required',true);
            $('#dropdownValue').show();
        }else{
            $('#dropdownValue').hide();
            $('#specificationDropdown').prop('required',false);
        }
    });
})  ;
