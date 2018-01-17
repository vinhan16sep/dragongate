/**
 *
 * not active banner
 *
 */
var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
$('.btn-not-active').click(function(){
    var btn_check = $(this);
    var id = $(this).attr('data-id');
    if(confirm('Kích hoạt banner?')){
        jQuery.ajax({
            method: "get",
            url: base_url + '/dragongate/admin/banner/active',
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {id : id},
            success: function(result){
                if(JSON.parse(result).isExists == false){
                    alert('false');
                }else{
                    window.location.reload();
                }
            }
        });
    };
})
/* end not active banner */

/**
 *
 * active banner
 *
 */
$('.btn-is-active').click(function(){
    var btn_check = $(this);
    var id = $(this).attr('data-id');
    if(confirm('Kích hoạt banner?')){
        jQuery.ajax({
            method: "get",
            url: base_url + '/dragongate/admin/banner/deactive',
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {id : id},
            success: function(result){
                if(JSON.parse(result).isExists == false){
                    alert('false');
                }else{
                    window.location.reload();
                }
            }
        });
    };
    
})
/* end active banner */