<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/works.css') ?>">
<script>
    var is_search = false;
    var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
    // (function($) {
    //     $(document).ready(function() {
    //         // var ids = [];
    //         // lazyLoad(ids);
    //         // $(window).scroll(function() {
    //         //     if($("#loading").css('display') == 'none') {
    //         //         if($(window).scrollTop() + $(window).height() > $(document).height() - 300) {
    //         //             ids = [];
    //         //             $(".item").each(function(){
    //         //                 ids.push(this.id);
    //         //             });
    //         //             lazyLoad(ids);
    //         //         }
    //         //     }
    //         // });
            
    //         $('#Search').change(function(){
    //             var name = $('#Search').val();
    //             if(name != ''){
    //                 is_search = true;
    //                 $.ajax({
    //                     type: 'GET',
    //                     url: '<?php echo base_url('works/get_lazy_load_data_for_search/') ?>',
    //                     dataType: 'json',
    //                     data: {
    //                         name: name
    //                     },
    //                     success: function(res){
    //                         console.log(res);
    //                         $(".item").remove();
    //                         // $("#mixitUp-item").hide();
    //                         $.each(res, function(index, item){
    //                             var html = generate_html(item, true);
    //                             $(".listing").append(html);
    //                         })
    //                     },
    //                     error: function(){
    //                         console.log('error');
    //                     }
    //                 });
    //             }else{
    //                 $("#mixitUp-item").show();
    //                 is_search = false;
    //                 // lazyLoad(ids);
    //             }
    //         });
    //     });

    //     // function lazyLoad(ids){
    //     //     if(is_search == false){
    //     //         $.ajax({
    //     //             type: 'GET',
    //     //             url: '<?php echo base_url('works/get_lazy_load_data/') ?>',
    //     //             dataType: 'json',
    //     //             data: {
    //     //                 ids: ids
    //     //             },
    //     //             beforeSend: function() {
    //     //                 $("#loading").show();
    //     //             },
    //     //             success: function(res){
    //     //                 $(".item-search").remove();
    //     //                 $.each(res, function(index, item){
    //     //                     var html = generate_html(item, false);
    //     //                     $(".listing").append(html);
    //     //                 })
    //     //                 $("#loading").hide();
    //     //             }
    //     //         });
    //     //     }

    //     // }

    //     function generate_html(data, search){
    //         var base_url_image = '<?php echo base_url('assets/upload/image/'); ?>';
    //         var base_url_video = '<?php echo base_url('assets/video/image/'); ?>';

    //         var search_detect = '';
    //         if(search == true){
    //             search_detect = 'item-search';
    //         }
    //         var html_item = '<div class="col-md-4 col-sm-6 col-xs-12 item mix '+ data.sub_service_id +'" id="' + data.id + '" data-subId="'+data.sub_service_id+'" >'
    //                             + '<h4>'+data.title+'</h4>'
    //                             + '<div class="single-item">';
    //                                 if(data.image != ''){
    //                                     html_item += '<img src="'+base_url+'/dragongate/assets/upload/works/'+data.image+'" alt="works">'
    //                                 }else{
    //                                     html_item += '<img src="'+base_url+'/dragongate/assets/public/img/blog/1.jpg" alt="works">'
    //                                 }
                                    
    //                             html_item += '<div class="opacity tran3s">'
    //                                     + '<a href="'+data.url+'" class="view-more tran3s" target="_blank">'
    //                                         + '<i class="flaticon-plus"></i>'
    //                                     + '</a>'
    //                                 + '</div>'
    //                             +'</div>'
    //                         + '</div>';

    //         return html_item;
    //     }
    // })(jQuery);

</script>

<!--
=============================================
    Theme Inner Banner
==============================================
-->
<div class="inner-page-banner">
    <div class="opacity">
        <h1>Works</h1>
        <ul>
            <li><a href="<?php echo base_url('homepage') ?>">Home</a></li>
            <li>/</li>
            <li>Works</li>
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
                <li class="filter active tran3s" data-filter="all">ALL</li>
                <?php foreach ($sub_service as $key => $value): ?>
                    <li class="filter tran3s btn-service" data-filter=".<?php echo $value['id'] ?>"><?php echo $value['title'] ?></li>
                <?php endforeach ?>
                <!-- <div class="search col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <input type="text" class="form-control" placeholder="Tìm kiếm ..." id="Search">
                </div> -->
            </ul>

        </div> <!-- End of .mixitUp-menu -->
        
        <div class="row listing">
            
        </div> <!-- /.row -->

        <div class="row" id="mixitUp-item">

            <?php foreach ($works as $key => $value): ?>
                <div class="item col-md-4 col-sm-6 col-xs-12 mix <?php echo $value['sub_service_id'] ?>">
                    <h4><?php echo $value['title'] ?></h4>
                    <div class="single-item">
                        <img src="<?php echo site_url('assets/upload/works/' . $value['image']) ?>" alt="works">
                        <div class="opacity tran3s">

                            <?php if($value['type'] == 0 ): ?>

                            <a href="<?php echo $value['url'] ?>" class="view-more tran3s" target="_blank">
                                <i class="flaticon-plus"></i>
                            </a>

                            <?php else: ?>

                            <a href="<?php echo base_url('works/detail/' . $value['id']) ?>" class="view-more tran3s">
                                <i class="flaticon-plus"></i>
                            </a>

                            <?php endif; ?>
                        </div>
                    </div> <!-- /.single-item -->
                </div> <!-- /.col-md-6 -->
            <?php endforeach ?>
        </div> <!-- /.row -->


    </div> <!-- /.container -->
</div> <!-- /.gullu-portfolio -->

<!-- mixitup -->
<script type="text/javascript" src="<?php echo site_url('assets/public/vendor/jquery.mixitup.min.js') ?>"></script>