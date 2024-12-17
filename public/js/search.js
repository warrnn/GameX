$(document).ready(function() {
    $('#small-search').on('keyup', function() {
        var query = $(this).val();
        $.ajax({
            url: "{{ route('SearchContoller') }}",
            type: 'GET',
            dataype: 'json',
            data: { query: query },
            success: function(data) {
                $('#search-results').html(data);
                $('#search-results').show();
            }
            
        });
    });
});