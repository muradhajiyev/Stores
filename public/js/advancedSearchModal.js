/**
 * Created by saria on 6/18/17.
 */
$(document).ready(function () {
    $('.tabLinks').on('click', function () {
        $('.advancedSearchTabs').removeClass('active');
        let tab = this.id + 'Tab';
        $('#' + tab).addClass('active');
    });


});