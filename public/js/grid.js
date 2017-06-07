$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#stores .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#stores .item').removeClass('list-group-item');
        $('#stores .item').addClass('grid-group-item');});
});