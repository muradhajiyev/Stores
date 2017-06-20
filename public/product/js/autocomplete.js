var url = "{{ url('autocomplete-ajax') }}";

$('#search_text').typeahead({

    source:  function (query, process) {

        return $.get(url, { query: query }, function (data) {

            return process(data);

        });

    }

});