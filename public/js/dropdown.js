$(document).ready(function () {
    $('#addDropdownValue').on('click', function (event) {
        event.preventDefault();
        var inputDropdown = ' <div class="form-group"> <input name="dropdown_value[]" class="form-control" id="dropdown_value"> </div>';
        $('#dropdownValues').append(inputDropdown);

    });
    $('.editDropdownValue').on('click', function (event) {

        $('.modalEditDropdownValue').modal('show');
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('.modalEditDropdownValue #dropdownValueId').val(id);
        $('.modalEditDropdownValue #editedDropdownValue').val(name);
    });
});