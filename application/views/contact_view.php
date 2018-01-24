<!--
			=============================================
				Theme Inner Banner
			==============================================
			-->
<div class="inner-page-banner">
    <div class="opacity">
        <h1>Contact US</h1>
        <ul>
            <li><a href="index.html">Home</a></li>
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
                    <form action="inc/sendemail.php" class="form-validation" autocomplete="off">
                        <input type="email" placeholder="Email Address*" name="email">
                        <input type="text" placeholder="Subject*" name="sub">
                        <textarea placeholder="Your Message*" name="message"></textarea>
                        <button class="p-bg-color hvr-trim-two">SEND MESSAGE</button>
                    </form>
                </div> <!-- /.contact-us-form -->
            </div> <!-- /.col- -->
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="contact-address">
                    <h2>Don’t Hesitate to contact with us for any kind of information</h2>
                    <p>Call us for imiditate support this number</p>
                    <a href="#" class="tran3s">880 876 65 455</a>
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


<!-- Google Map _______________________ -->
<div id="google-map-area">
    <div class="google-map" id="contact-google-map" data-map-lat="21.0166156" data-map-lng="105.8483495" data-map-title="Find Map" data-map-zoom="16"></div>
</div>

<!-- Google map js -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ8VrXgGZ3QSC-0XubNhuB2uKKCwqVaD0&callback=googleMap" type="text/javascript"></script> <!-- Gmap Helper -->
<script src="<?php echo site_url('assets/public/vendor/gmaps.min.js') ?>"></script>

<script type="text/javascript" src="<?php echo site_url('assets/public/js/map-script.js') ?>"></script>