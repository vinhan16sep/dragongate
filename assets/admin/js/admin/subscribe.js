$(document).ready(function(){
    var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
    var html = '<div class="modal fade" id="myModal" role="dialog">'
                    + '<div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">'
                    + '<i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></li>'
                    + '</div>'
                    + '</div>';
    $("#check-all").change(function() {
        if (this.checked) {
            $(".checkbox").each(function() {
                this.checked=true;
            });
        } else {
            $(".checkbox").each(function() {
                this.checked=false;
            });
        }
    });
    $('.btn-send-mail').click(function(e){
        
        e.preventDefault();
        
        var email = $(this).data('email');
        jQuery.ajax({
            method: "get",
            url: base_url + '/dragongate/admin/subscribe/send_mail',
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {email : email},
            beforeSend: function() {
                $("#encypted_ppbtn").html(html);
            },
            success: function(res){
                $(".fade").css('display','none');
                var check = JSON.parse(res).isExitsts;
                if(check == true){
                    alert('Gửi mail thành công');
                }else{
                    alert('Gửi mail thất bại');
                }
                
            }
        });
    });

    $('#sendAll').click(function(e){
        e.preventDefault();
        var ids = [];
        $('.checkbox').each(function() {
            if($(this).prop("checked") == true){
                ids.push(this.id);
            }
            
        });
        if(ids != ''){
            jQuery.ajax({
                method: "get",
                url: base_url + '/dragongate/admin/subscribe/send_mail_all',
                // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
                data: {ids : ids},
                beforeSend: function() {
                    $("#encypted_ppbtn_all").css('display','block');
                },
                success: function(res){
                    $("#encypted_ppbtn_all").css('display','none');
                    var check = JSON.parse(res);
                    if(check == null){
                        alert('Gửi thành công đến tất cả email được đánh dấu');
                    }else{
                        alert('Các email không gửi thành công: '+check);
                    }                  
                }
            });
        }else{
            alert('Chưa có email được chọn');
        }
        
        return false;
    });
    
})