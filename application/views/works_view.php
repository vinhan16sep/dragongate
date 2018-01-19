<!--
=============================================
    Theme Inner Banner
==============================================
-->
<div class="inner-page-banner">
    <div class="opacity">
        <h1>Portfolio</h1>
        <ul>
            <li><a href="index.html">Home</a></li>
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
                <li class="filter tran3s" data-filter=".business">Business</li>
                <li class="filter tran3s" data-filter=".finance">Finance</li>
                <li class="filter tran3s" data-filter=".technical">Technical</li>
                <li class="filter tran3s" data-filter=".marketing">Marketing</li>
                <li class="filter tran3s" data-filter=".investment">Inesment</li>
            </ul>
        </div> <!-- End of .mixitUp-menu -->

        <div class="row" id="mixitUp-item">

            <?php for($i = 0; $i < 6; $i++){ ?>

            <div class="col-md-4 col-sm-6 col-xs-12 mix finance marketing">
                <div class="single-item">
                    <img src="<?php echo site_url('assets/public/img/portfolio/11.jpg') ?>" alt="works">
                    <div class="opacity tran3s">
                        <a href="<?php echo base_url('works/detail') ?>" class="view-more tran3s"><i class="flaticon-plus"></i></a>
                    </div>
                </div> <!-- /.single-item -->
            </div> <!-- /.col-md-6 -->

            <?php } ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.gullu-portfolio -->

<!-- mixitup -->
<script type="text/javascript" src="<?php echo site_url('assets/public/vendor/jquery.mixitup.min.js') ?>"></script>