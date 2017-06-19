/**
 * Created by saria on 6/18/17.
 */
$(document).ready(function () {
    $('.tabLink').on('click', function () {
        $('.advancedSearchPanel').attr('hidden', true);
        let panel = this.id + 'Panel';
        $('#' + panel).attr('hidden', false);
    });

    $('.panel-body .parentCategory').livequery('change', function (event) {
        specificationValues(event.target.value);
    });
});

let specificationValues = (categoryId) => {
    $.get('/api/specificationValues/' + categoryId, function (data) {
        if (data) {
            data.forEach(function (specification) {
                if (specification.dropdown_id) {
                    console.log(specification.name)
                } else {

                }
            });
        }
    });

};

let appendSpecification = (specName) => {
    let tabLink = '<a href="#" class="list-group-item tabLink"id="' + specName + '">' + specName + '</a>';
    let tabArea = ' <div class="panel panel-default advancedSearchPanel" id="' + specName + 'Panel"> ' +
        '<div class="panel-heading"> <h3 class="panel-title">' + specName + '</h3> </div> ' +
        '<div class="panel-body">' +
        '</div> ' +
        '</div>'
};