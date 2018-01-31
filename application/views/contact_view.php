<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/contact.css') ?>">

<!--
=============================================
    Theme Inner Banner
==============================================
-->
<div class="inner-page-banner">
    <div class="opacity">
        <h1>Contact US</h1>
        <ul>
            <li><a href="<?php echo base_url('homepage') ?>">Home</a></li>
            <li>/</li>
            <li>Contact</li>
        </ul>
    </div> <!-- /.opacity -->
</div> <!-- /inner-page-banner -->



<!--
=============================================
    Contact Us
==============================================
-->
<div class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-xs-12">
                <div class="contact-us-form">
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));

                        echo form_label('Email Address*', 'email');
                        echo form_error('email');
                        echo form_input('email', set_value('email'), 'class="form-control email"');

                        echo form_label('Subject*', 'sub');
                        echo form_error('sub');
                        echo form_input('sub', set_value('sub'), 'class="form-control sub"');

                        echo form_label('Your Message*', 'message');
                        echo form_error('message');
                        echo form_textarea('message', set_value('message'), 'class="form-control message"');

                        echo form_button('button', 'SEND MESSAGE', 'class="p-bg-color hvr-trim-two" id="btn-contact"');
                    echo form_close();
                    ?>
                </div> <!-- /.contact-us-form -->
            </div> <!-- /.col- -->
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="contact-address">
                    <h2>Don’t Hesitate to contact with us for any kind of information</h2>
                    <p>Call us for imiditate support this number</p>
                    <a href="#" class="tran3s">(+84) 926.895.555</a>
                    <ul>
                        <li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                        <li><a href="" class="tran3s"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div> <!-- /.contact-address -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.conatiner -->

    <!--Contact Form Validation Markup -->
    <!-- Contact alert -->
    <div class="alert-wrapper" id="alert-success">
        <div id="success">
            <button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="wrapper">
                <p>Your message was sent successfully.</p>
            </div>
        </div>
    </div> <!-- End of .alert_wrapper -->
    <div class="alert-wrapper" id="alert-error">
        <div id="error">
            <button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="wrapper">
                <p>Sorry!Something Went Wrong.</p>
            </div>
        </div>
    </div> <!-- End of .alert_wrapper -->
</div> <!-- /.contact-us -->


<div id="encypted_ppbtn" style="display: none;">
    <div class="modal fade" role="dialog" style="display: block; opacity: .5; background-color: rgba(0,0,0,.65);">
        <div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">
            <i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>
        </div>
    </div>
</div>

<!-- Google Map _______________________ -->
<div id="google-map-area">
    <div class="google-map" id="contact-google-map" data-map-lat="21.0166156" data-map-lng="105.8483495" data-map-title="Find Map" data-map-zoom="16"></div>
</div>

<!-- Google map js -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ8VrXgGZ3QSC-0XubNhuB2uKKCwqVaD0&callback=googleMap" type="text/javascript"></script> <!-- Gmap Helper -->
<script src="<?php echo site_url('assets/public/vendor/gmaps.min.js') ?>"></script>

<script type="text/javascript" src="<?php echo site_url('assets/public/js/map-script.js') ?>"></script>
<script type="text/javascript">
    var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
    var html = '<div class="modal fade" id="myModal" role="dialog">'
                    + '<div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">'
                    + '<i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></li>'
                    + '</div>'
                    + '</div>';
    $('#btn-contact').click(function(){
        var email = $('.email').val();
        var sub = $('.sub').val();
        var message = $('.message').val();
        jQuery.ajax({
            method: "get",
            url: base_url + "/dragongate/contact/create",
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {email : email, sub : sub, message : message},
            beforeSend: function() {
                $("#encypted_ppbtn").show();
            },
            success: function(result){
                $("#encypted_ppbtn").css('display','none');
                var check = JSON.parse(result).message;
                if(check == 'Success'){
                    alert('Gửi email thành công');
                }else{
                    alert('Gửi email thất bại');
                }
                
            }
        });
    })
</script>