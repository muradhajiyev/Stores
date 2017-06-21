var url1 = '/autocomplete-ajax/store';
var url2 = '/autocomplete-ajax/product';
$('#search_text_store').typeahead({

    source:  function (query, process) {

        return $.get(url1, { query: query }, function (data) {

            return process(data);

        });

    }

});
$('#search_text_product').typeahead({

    source:  function (query, process) {

        return $.get(url2, { query: query }, function (data) {

            return process(data);

        });

    }

});