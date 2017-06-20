/**
 * Created by saria on 6/18/17.
 */
$(document).ready(function () {
    $('.tabLink').on('click', function () {
        $('.advancedSearchPanel').attr('hidden', true);
        let panel = this.id + 'Panel';
        $('#' + panel).attr('hidden', false);
    });


});