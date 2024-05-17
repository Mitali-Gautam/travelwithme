$('document').ready(function() {
    $('#country').on('change', function(){
        var countryId = $(this).val();
        $.ajax({
            url: '/cities/' + countryId,
            type:'GET',
            success: function(response) {
                $('#city').empty();
                if(response.length > 0){
                    $.each(response, function(key, value) {
                        $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }else{
                    $('#city').append('<option value="0">--Select--</option>');
                }
            }
        });
    });
});
