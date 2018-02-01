
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/works.css') ?>">

<!--
=============================================
    Theme Inner Banner
==============================================
-->
<div class="inner-page-banner" style="background-image: url('<?php echo site_url('assets/upload/works/' . $work['image']) ?>'); margin-bottom: 30px;">
    <div class="opacity">
        <h1><?php echo  $work['title'] ?></h1>
        <ul>
            <li><a href="<?php echo base_url('homepage') ?>">Home</a></li>
            <li>/</li>
            <li><a href="<?php echo base_url('works') ?>">Works</a></li>
            <li>/</li>
            <li><?php echo  $work['title'] ?></li>
        </ul>
    </div> <!-- /.opacity -->
</div> <!-- /inner-page-banner -->



<!--
=============================================
    Portfolio Details
==============================================
-->
<div class="portfolio-details">
    <div class="container">
        <!--<div class="title">
            <h2><?php echo  $work['title'] ?></h2>
            <ul>
                <li>Share:</li>
                <li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
        </div>--> <!-- /.title -->

        <div class="project-details-wrapper">
            <div class="row">
                <div class="col-sm-4">
                    <div class="project-info-list">
                        <ul>
                            <li>
                                <h6>Date</h6>
                                <p><?php echo $work['year'] ?></p>
                            </li>
                            <li>
                                <h6>Client Name</h6>
                                <p><?php echo $work['customer'] ?></p>
                            </li>
                            <li>
                                <h6>PRoject Type</h6>
                                <p><?php echo $sub_service['title'] ?></p>
                            </li>
                        </ul>
                    </div> <!-- /.project-info-list -->
                </div>
                <div class="col-sm-8">
                    <div class="text">
                        <h6><?php echo $work['description'] ?></h6>
                        <p><?php echo $work['content'] ?></p>
                    </div>
                </div> <!-- /.col- -->

                <div class="col-sm-12">
                    <iframe src="https://www.youtube.com/embed/<?php echo $work['url'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.project-details-wrapper -->

    </div> <!-- /.container -->
</div> <!-- /.portfolio-details -->