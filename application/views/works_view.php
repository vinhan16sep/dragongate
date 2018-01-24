<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/works.css') ?>">

<!--
=============================================
    Theme Inner Banner
==============================================
-->
<div class="inner-page-banner">
    <div class="opacity">
        <h1>Portfolio</h1>
        <ul>
            <li><a href="<?php echo base_url('homepage') ?>">Home</a></li>
            <li>/</li>
            <li>Portfolio</li>
        </ul>
    </div> <!-- /.opacity -->
</div> <!-- /inner-page-banner -->



<!--
=============================================
    Our Portfolio V1
==============================================
-->
<div class="gullu-portfolio portfolio-grid">
    <div class="container">
        <div class="mixitUp-menu">
            <h2>We’ve done lot’s of work, Let’s <br>Check some from here</h2>
            <ul>
                <li class="filter active tran3s" data-filter="all">All</li>
                <li class="filter tran3s" data-filter=".video">Video</li>
                <li class="filter tran3s" data-filter=".photography">Photography</li>

            </ul>
        </div> <!-- End of .mixitUp-menu -->

        <div class="row" id="mixitUp-item">

            <?php for($i = 0; $i < 3; $i++){ ?>

            <div class="col-md-4 col-sm-6 col-xs-12 mix video">
                <div class="single-item">
                    <img src="<?php echo site_url('assets/public/img/portfolio/works.jpg') ?>" alt="works">
                    <div class="opacity tran3s">
                        <a href="https://www.youtube.com" class="view-more tran3s" target="_blank">
                            <i class="flaticon-plus"></i>
                        </a>
                    </div>
                </div> <!-- /.single-item -->
            </div> <!-- /.col-md-6 -->

            <?php }?>

            <?php for($i = 0; $i < 3; $i++){ ?>

                <div class="col-md-4 col-sm-6 col-xs-12 mix finance photography">
                    <div class="single-item">
                        <img src="<?php echo site_url('assets/public/img/portfolio/works.jpg') ?>" alt="works">
                        <div class="opacity tran3s">
                            <a href="https://www.flickr.com/" class="view-more tran3s" target="_blank">
                                <i class="flaticon-plus"></i>
                            </a>
                        </div>
                    </div> <!-- /.single-item -->
                </div> <!-- /.col-md-6 -->

            <?php } ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.gullu-portfolio -->

<!-- mixitup -->
<script type="text/javascript" src="<?php echo site_url('assets/public/vendor/jquery.mixitup.min.js') ?>"></script>