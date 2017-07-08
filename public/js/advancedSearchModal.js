/**
 * Created by saria on 6/18/17.
 */
let loading = "<div id='loading' style='display: table; margin: 0 auto'> <svg width='56px' height='56px' xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"xMidYMid\" class=\"uil-default\"><rect x=\"0\" y=\"0\" width=\"100\" height=\"100\" fill=\"none\" class=\"bk\"></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(0 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-1s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(30 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.9166666666666666s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(60 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.8333333333333334s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(90 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.75s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(120 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.6666666666666666s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(150 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.5833333333333334s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(180 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.5s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(210 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.4166666666666667s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(240 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.3333333333333333s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(270 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.25s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(300 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.16666666666666666s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#00b2ff' transform='rotate(330 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='-0.08333333333333333s' repeatCount='indefinite'/></rect></svg></div>";
$(document).ready(function () {
    cleanDynamicSpecArea();
    let categoryId = $("[name='productCategory']").val();
    specifications(categoryId);
    $('.tabLink').livequery('click', function () {

        $('.advancedSearchPanel').attr('hidden', true);
        let panel = this.id + 'Panel';
        $('#' + panel).attr('hidden', false);
        if ($(this).parent().get(0) === $('#dynamicTabLink').get(0)) {
            appendSpecValues(this.id);
        }
    });
    $('.panel-body .parentCategory').livequery('change', function (event) {

        cleanDynamicSpecArea();
        specifications(event.target.value);
    });
});

let specifications = (categoryId) => {
    let storeId = $('#storeId').val();
    if (categoryId && storeId) {
        $.ajax({
            url: '/api/specifications/',
            data: {
                categoryId: categoryId,
                storeId: storeId
            },
            cache: false,
            type: "GET",
            beforeSend: function () {

                $('#dynamicTabLink').append(loading);
            },
            success: function (data) {
                $('#loading').remove();
                if (data[0]) {

                    let specifications = data[0];

                    if (specifications.json_agg) {
                        let specArray = JSON.parse(specifications.json_agg);
                        specArray.forEach(function (spec) {
                            appendSpecifications(spec);
                        });
                        let chosenSpecifications = JSON.parse($('#chosenSpecs').html());
                        for (let property in chosenSpecifications) {
                            if (chosenSpecifications.hasOwnProperty(property)) {
                                if (chosenSpecifications[property] instanceof Array) {
                                    appendSpecValues(property);
                                }
                            }
                        }

                    }

                }
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });

    }

};
let appendSpecifications = (specification) => {
    let specNameId = specification.specification_name.replace(/ +/g, "");
    let tabLink = '<a href="#" class="list-group-item tabLink"id="' + specNameId + '">' + specification.specification_name + '</a>';
    let tabArea = ' <div class="panel panel-default advancedSearchPanel" id="' + specNameId + 'Panel" hidden> ' +
        '<div class="panel-heading"> <h3 class="panel-title">' + specification.specification_name + '</h3> </div> ' +
        '<div class="panel-body"></div></div>';

    $('#dynamicTabLink').append(tabLink);
    $('#dynamicSpecificationPanel').append(tabArea);
};
let appendSpecValues = (specificationName) => {
    let chosenSpecifications = JSON.parse($('#chosenSpecs').html());
    let storeId = $('#storeId').val();
    let categories = $("[name='productCategory']");
    let categoryId = getCategoryId(categories);

    let appendArea = $('#' + specificationName + 'Panel' + ' .panel-body');

    if (appendArea.is(':empty')) {
        if (specificationName && storeId && categoryId) {


            $.ajax({
                url: "/api/specificationValues",
                data: {
                    specName: specificationName,
                    storeId: storeId,
                    categoryId: categoryId
                },
                cache: false,
                type: "GET",
                beforeSend: function () {
                    appendArea.append(loading);
                },
                success: function (spec) {
                    $('#loading').remove();
                    if (spec[0]) {

                        if (spec[0].json_agg) {
                            let specValues = JSON.parse(spec[0].json_agg);
                            specValues.forEach(function (value) {
                                if (!value.specification_unit) value.specification_unit = '';
                                let inputElement;
                                if (value.specification_type === 'dropdown') {
                                    let specValuesArray = chosenSpecifications[specificationName];
                                    if (specValuesArray && specValuesArray.indexOf(value.specification_value) > -1) {

                                        inputElement = ' <input name="' + specificationName + '[]" type="checkbox" checked  value="' + value.specification_value + '"> <label for="spec">' + value.specification_value + ' ' + value.specification_unit + '</label> <br/>';
                                    } else {
                                        inputElement = ' <input name="' + specificationName + '[]" type="checkbox"  value="' + value.specification_value + '"> <label for="spec">' + value.specification_value + ' ' + value.specification_unit + '</label> <br/>';

                                    }
                                } else if (value.specification_type === 'number') {

                                }
                                if (inputElement) {
                                    appendArea.append(inputElement);
                                }
                            });
                        }
                    }
                },
                error: function (xhr) {
                    // console.log(xhr);
                }
            });

        }
    }
};
let getCategoryId = (categories) => {
    let categoryId;
    if (categories) {
        for (let i = categories.length - 1; i >= 0; i--) {
            if (categories[i].value) {
                categoryId = categories[i].value;
                return categoryId;
            }
        }

    }
};
let cleanDynamicSpecArea = () => {
    $('#dynamicTabLink').empty();
    $('#dynamicSpecificationPanel').empty();
};
