$(document).ready(function () {

    $('body').on('change', '.category', function (event) {
        getSubCategories(event.target.value, event.target.id);

    });
});
var selectId = 0;

var getSubCategories = function (id, elementId) {
    if (id) {
        $.get('/subCategory/' + id, function (data) {
            var categoryArray = JSON.parse(data);
            if (categoryArray) {
                var childElementId = parseInt(elementId) + 1;
                var childElement = $('#' + childElementId);
                var appendElement;
                if (categoryArray.length !== 0) {
                    if (childElement.length > 0) {
                        appendElement = childElement;
                    } else {

                        selectId = selectId + 1;
                        $('.subCategories').append('<div class="form-group"><select class="form-control category" required id="' + selectId + '" ></div>');
                        appendElement = $('#' + selectId);
                    }
                    if (appendElement) {
                        appendElement.empty();
                        for (x in categoryArray) {
                            appendElement.append('<option value="' + categoryArray[x].id + '">' + categoryArray[x].name + '</option>');
                        }
                    }
                } else {
                    console.log(deleteElement(childElement, childElementId));
                }

            }
        });

    }
};
var deleteElement = function (element, elementId) {
    if (element.length > 0) {
        element.remove();
        elementId = parseInt(elementId) + 1;
        element = $('#' + elementId);
        deleteElement(element);
    } else {
        return 0;
    }


};