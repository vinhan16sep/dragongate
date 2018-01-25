var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
$('#service').each(function () {
    var service_id = $(this).val();
    var service = $(this);

    jQuery.ajax({
        method: "get",
        url: base_url + '/dragongate/admin/work/get_sub_service',
        // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
        data: {service_id : service_id},
        success: function(result){
            $('#sub_service').html('');
            var response = JSON.parse(result).subServices;
            $.each(response, function(key, value){
                $('#sub_service').append('<option value="' + key + '" >' + value + '</option>');
            });
        }
    });
});

$('#service').change(function () {
    var service_id = $(this).val();
    var service = $(this);

    jQuery.ajax({
        method: "get",
        url: base_url + '/dragongate/admin/work/get_sub_service',
        // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
        data: {service_id : service_id},
        success: function(result){
            $('#sub_service').html('');
            var response = JSON.parse(result).subServices;
            $.each(response, function(key, value){
                $('#sub_service').append('<option value="' + key + '" >' + value + '</option>');
            });
        }
    });
});