/**
 * Created by saria on 6/18/17.
 */
$(document).ready(function () {
    $('.tabLink').livequery('click', function () {
        $('.advancedSearchPanel').attr('hidden', true);
        let panel = this.id + 'Panel';
        $('#' + panel).attr('hidden', false);
    });

    $('.panel-body .parentCategory').livequery('change', function (event) {
        cleanDynamicSpecArea();
        specificationValues(event.target.value);
    });
});

let specificationValues = (categoryId) => {
    $.get('/api/specificationValues/' + categoryId, function (data) {
        if (data) {
            // console.log(data);

            data.forEach(function (specification) {
                if (specification.dropdown_id) {
                    // console.log(specification)
                    appendDropdownSpecification(specification);
                } else {

                }
            });
        }
    });

};

let appendDropdownSpecification = (specification) => {
    let specNameId = specification.name.replace(/ +/g, "");
    let tabLink = '<a href="#" class="list-group-item tabLink"id="' + specNameId + '">' + specification.name + '</a>';
    let tabArea = ' <div class="panel panel-default advancedSearchPanel" id="' + specNameId + 'Panel" hidden> ' +
        '<div class="panel-heading"> <h3 class="panel-title">' + specification.name + '</h3> </div> ' +
        '<div class="panel-body">';
    if (specification.spec_dropdown&&specification.spec_dropdown.dropdown_value) {
        let dropdownValue=specification.spec_dropdown.dropdown_value;
        dropdownValue.forEach(function (data) {
        let inputElement=' <input name="brand" type="checkbox" value="'+data.dropdown_id+'"> +<label for="brand">'+data.dropdown_value+'</label>'
        tabArea+=inputElement;
        });
    }
    tabArea+='</div></div>';
    $('#dynamicTabLink').append(tabLink);
    $('#dynamicSpecificationPanel').append(tabArea);

};
let cleanDynamicSpecArea = () => {
    $('#dynamicTabLink').empty();
    $('#dynamicSpecificationPanel').empty();
};