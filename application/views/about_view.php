<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/about.css') ?>">

<!--
=============================================
    Theme Inner Banner
==============================================
-->
<div class="inner-page-banner">
    <div class="opacity">
        <h1>Company Story</h1>
        <ul>
            <li><a href="<?php echo base_url('homepage') ?>">Home</a></li>
            <li>/</li>
            <li>About us</li>
        </ul>
    </div> <!-- /.opacity -->
</div> <!-- /inner-page-banner -->



<!--
=============================================
    About Text
==============================================
-->
<div class="about-text">
    <div class="container">
        <div class="title">
            <h6>WELCOME TO DRAGON GATE</h6>
            <h2>We’r a dynamic team of creatives people <br>innovation &amp; Marketing Expert.</h2>
        </div>
        <img src="<?php echo site_url('assets/public/img/cover/about.png')?>" alt="">
        <div class="about-tab-wrapper clearfix">
            <ul class="nav nav-tabs float-left">
                <?php foreach ($introduce as $key => $value): ?>
                    <li class="<?php echo ($value['id'] == $active['id'])? 'active' : '' ?>"><a data-toggle="tab" href="#<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a></li>
                <?php endforeach ?>
                <!--<li><a data-toggle="tab" href="#news">News</a></li>-->
            </ul>
            <div class="tab-content float-left">
                <?php foreach ($introduce as $key => $value): ?>
                    <div id="<?php echo $value['id'] ?>" class="tab-pane fade <?php echo ($value['id'] == $active['id'])? 'in active' : '' ?>">
                        <p><?php echo $value['content'] ?></p>
                        
                    </div>
                <?php endforeach ?>
            </div>
        </div> <!-- /.about-tab-wrapper -->
    </div> <!-- /.container -->
</div> <!-- /.about-text -->



<!--
=============================================
    Theme Counter
==============================================
-->
<div class="theme-counter no-border fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <div class="single-box">
                    <h2 class="number"><span class="timer" data-from="0" data-to="200" data-speed="1000" data-refresh-interval="5">0</span>+</h2>
                    <p>Completed Projects</p>
                </div> <!-- /.single-box -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <div class="single-box">
                    <h2 class="number"><span class="timer" data-from="0" data-to="3" data-speed="1000" data-refresh-interval="5">0</span></h2>
                    <p>Availble Country</p>
                </div> <!-- /.single-box -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <div class="single-box">
                    <h2 class="number"><span class="timer" data-from="0" data-to="125" data-speed="1000" data-refresh-interval="5">0</span>+</h2>
                    <p>Customers</p>
                </div> <!-- /.single-box -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <div class="single-box border-fix">
                    <h2 class="number"><span class="timer" data-from="0" data-to="12" data-speed="1000" data-refresh-interval="5">0</span></h2>
                    <p>Award Winner</p>
                </div> <!-- /.single-box -->
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.theme-counter -->



<!--
=============================================
    Testimonial
==============================================
-->

<!--<div class="testimonial-section bg-image">
    <div class="testimonial-wrapper"></div>
    <div class="container">
        <div class="main-container col-md-6 col-md-offset-6">
            <div class="theme-title">
                <h6>Testimonials</h6>
                <h2>Check what’s our client <br>Say about us</h2>
            </div>
            <div class="testimonial-slider">
                <div class="item">
                    <div class="wrapper">
                        <p>Their testimonial videos aren't production quality, but they get the message across, cover useful &amp; relevant information which goes to show you don't need to invest thousands in production get some testimonial videos up with quality. </p>
                        <div class="name clearfix">
                            <img src="<?php echo site_url('assets/public/img/home/3.jpg')?>" alt="">
                            <h5>Rashed Kabir</h5>
                            <span>Gazipur</span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="wrapper">
                        <p>Their testimonial videos aren't production quality, but they get the message across, cover useful &amp; relevant information which goes to show you don't need to invest thousands in production get some testimonial videos up with quality. </p>
                        <div class="name clearfix">
                            <img src="<?php echo site_url('assets/public/img/home/4.jpg')?>" alt="">
                            <h5>Zubayer Hasan</h5>
                            <span>Uttara</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->



<!--
=============================================
    Our Team Style One
==============================================
-->
<div class="our-team-styleOne">
    <div class="container">
        <div class="title">
            <h2>Our team member will ready <br>for your service</h2>
            <!--<a href="team-v1.html" class="tran3s">See all</a>-->
        </div> <!-- /.title -->
        <div class="row">

            <!--<?php for($i = 0; $i < 3; $i++){ ?>
            <div class="col-md-4 col-xs-6">
                <div class="single-team-member">
                    <div class="image">
                        <img src="<?php echo site_url('assets/public/img/team/member_about.jpg')?>" alt="team">
                        <div class="opacity tran3s">
                            <ul class="tran3s">
                                <li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="" class="tran3s"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <h6>Rashed Kabir</h6>
                    <p>CO-Founder &amp; Designer</p>
                </div>
            </div>
            <?php } ?>-->
            
            <?php foreach ($teams as $key => $value): ?>
                <div class="col-md-4 col-xs-6">
                    <div class="single-team-member">
                        <div class="image">
                            <img src="<?php echo site_url('assets/upload/about/'.$value['image']) ?>" alt="team">
                            <div class="opacity tran3s">
                                <ul class="tran3s">
                                    <li><a href="<?php echo $value['facebook'] ?>" class="tran3s" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $value['instagram'] ?>" class="tran3s" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h6><?php echo $value['name'] ?></h6>
                        <p><?php echo $value['position'] ?></p>
                    </div>
                </div>
            <?php endforeach ?>

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.our-team-styleOne -->


<!--
=============================================
    Trusted Client
==============================================
-->
<div class="trusted-client">
    <div class="container">
        <div class="title">
            <h2>Our trusted client</h2>
            <p>We have show that some of our best partners ho all beside us</p>
        </div>
        <div class="row">

            <!--<?php for($i = 0; $i < 8; $i++){ ?>
            <div class="col-md-3 col-xs-6">
                <div class="client-img"><img src="<?php echo site_url('assets/public/img/logo/p-5.png')?>" alt=""></div>
            </div>
            <?php } ?>-->
            
            <?php foreach ($partner as $key => $value): ?>
                <div class="col-md-3 col-xs-6">
                    <div class="client-img"><img src="<?php echo site_url('assets/public/upload/partners/'.$value['image'])?>" alt=""></div>
                </div>
            <?php endforeach ?>
            

        </div>
    </div> <!-- /.container -->
</div> <!-- /.trusted-client -->