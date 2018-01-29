<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/services.css') ?>">

<!--
=============================================
    Theme Inner Banner
==============================================
-->
<div class="inner-page-banner">
    <div class="opacity">
        <h1>Our Services</h1>
        <ul>
            <li><a href="<?php echo base_url('homepage') ?>">Home</a></li>
            <li>/</li>
            <li>Services</li>
        </ul>
    </div> <!-- /.opacity -->
</div> <!-- /inner-page-banner -->


<!--
=============================================
    Our Service V1
==============================================
-->
<div class="service-version-one">
    <div class="container">
        <h2>We provide wide range of <br>business services.</h2>
        <div class="row">
            <?php if ($services): ?>
                <?php foreach ($services as $key => $value): ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-service">
                            <!-- <i class="fa fa-film tran3s"></i> -->
                            <?php if ($value['image']): ?>
                                <img src="<?php echo base_url('assets/upload/service/'.$value['image']) ?>">
                            <?php else: ?>
                                <img src="<?php echo base_url('assets/public/img/blog/1.jpg') ?>">
                            <?php endif ?>
                            <p><?php echo $value['title'] ?></p>
                            <h6><a href="#" class="tran3s"><?php echo $value['description'] ?></a></h6>
                        </div> <!-- /.single-service -->
                    </div> <!-- /.col- -->
                <?php endforeach ?>
            <?php endif ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.service-version-one -->