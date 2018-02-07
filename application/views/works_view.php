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

     //    function generate_html(data, search){
     //        var base_url_image = '<?php //echo base_url('assets/upload/image/'); ?>//';
     //        var base_url_video = '<?php //echo base_url('assets/video/image/'); ?>//';
     //
     //        var search_detect = '';
     //        if(search == true){
     //            search_detect = 'item-search';
     //        }
     //        var html_item = '<div class="col-md-4 col-sm-6 col-xs-12 item mix '+ data.sub_service_id +'" id="' + data.id + '" data-subId="'+data.sub_service_id+'" >'
     //                            + '<h4>'+data.title+'</h4>'
     //                            + '<div class="single-item">';
     //                                if(data.image != ''){
     //                                    html_item += '<img src="'+base_url+'/dragongate/assets/upload/works/'+data.image+'" alt="works">'
     //                                }else{
     //                                    html_item += '<img src="'+base_url+'/dragongate/assets/public/img/blog/1.jpg" alt="works">'
     //                                }
     //
     //                            html_item += '<div class="opacity tran3s">'
     //                                    + '<a href="'+data.url+'" class="view-more tran3s" target="_blank">'
     //                                        + '<i class="flaticon-plus"></i>'
     //                                    + '</a>'
     //                                + '</div>'
     //                            +'</div>'
     //                        + '</div>';
     //
     //        return html_item;
     //    }
     //})(jQuery);

    //function generate_html() {
    //    var base_url_image = '<?php ////echo base_url('assets/upload/image/'); ?>////';
    //    var base_url_video = '<?php //echo base_url('assets/video/image/'); ?>//';
    //
    //    var html_item = '<div class="col-md-4 col-sm-6 col-xs-12 item mix '+ data.sub_service_id +'" id="' + data.id + '" data-subId="'+data.sub_service_id+'" >'
    //                    + '</div>';
    //
    //    $('.listing').append(html_item);
    //};


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

                    <div class="single-item">
                        <img src="<?php echo site_url('assets/upload/works/' . $value['image']) ?>" alt="works">
                        <div class="opacity tran3s">

<!--                            --><?php //if($value['type'] == 0 ): ?>
<!---->
<!--                                <div class="works_title">-->
<!--                                    <h4>--><?php //echo $value['title'] ?><!--</h4>-->
<!--                                </div>-->
<!--                                <a href="--><?php //echo $value['url'] ?><!--" class="view-more tran3s" target="_blank">-->
<!--                                    <i class="flaticon-plus"></i>-->
<!--                                </a>-->
<!---->
<!--                            --><?php //else: ?>
<!---->
<!--                                <div class="works_title">-->
<!--                                    <h4>--><?php //echo $value['title'] ?><!--</h4>-->
<!--                                </div>-->
<!--                                <a href="--><?php //echo base_url('works/detail/' . $value['id']) ?><!--" class="view-more tran3s">-->
<!--                                    <i class="flaticon-plus"></i>-->
<!--                                </a>-->
<!---->
<!--                            --><?php //endif; ?>

                            <?php if($value['type'] == 0 ): ?>

                                <div class="works_title">
                                    <h4><?php echo $value['title'] ?></h4>
                                </div>
                                <a href="javascript:void(0);" class="view-more tran3s" data-id="<?php echo $value['id'] ?>">
                                    <i class="flaticon-plus"></i>
                                </a>

                            <?php else: ?>

                                <div class="works_title">
                                    <h4><?php echo $value['title'] ?></h4>
                                </div>
                                <a href="javascript:void(0);" class="view-more tran3s" data-id="<?php echo $value['id'] ?>">
                                    <i class="flaticon-plus"></i>
                                </a>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <!--Bootstrap Modal Temp-->

<!--        <div class="modal hide fade">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<!--                <h3 id = "modal-header-content"></h3>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!---->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <a href="#" class="btn" data-dismiss="modal">Close</a>-->
<!--            </div>-->
<!--        </div>-->

        <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal_title_content">Modal title input here</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- /.container -->
</div> <!-- /.gullu-portfolio -->



<!-- mixitup -->
<script type="text/javascript" src="<?php echo site_url('assets/public/vendor/jquery.mixitup.min.js') ?>"></script>

<!-- -->
<script>
    $(document).ready(function(){
        var $modal = $('.modal').modal({
            show: false
        });

        $('a.view-more').on('click', function() {
            var idSelected = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('works/call_work_id/') ?>',
                dataType: 'json',
                data: {
                    id: idSelected
                },
                success: function(response){

                    var base_img_url = '<?php echo site_url('assets/upload/works/') ?>';
                    var base_vid_url = 'https://www.youtube.com/embed/';

                    var modal_header = response.title;

                    var modal_content =
                        '<div class="work_cover">'
                        + '<img src="' + base_img_url + response.image + '" alt="cover">'
                        + '</div>'
                        + '<div class="work_content">'
                        + '<div class="row">'
                        + '<div class="left col-md-4 col-sm-4 col-xs-12">'
                        + '<ul>'
                        + '<li>'
                        + '<h6>Date:</h6>'
                        + '<p>' + response.year + '</p>'
                        + '</li>'
                        + '<li>'
                        + '<h6>Client:</h6>'
                        + '<p>' + response.customer + '</p>'
                        + '</li>'
                        + '<li>'
                        + '<h6>Project Type:</h6>'
                        + '<p>' + response.sub_title +'</p>'
                        + '</li>'
                        + '</ul>'
                        + '</div>'
                        + '<div class="right col-md-8 col-sm-8 col-xs-12">'
                        + '<div class="text">'
                        + '<h6>' + response.description + '</h6>'
                        // + '<p>' + response.content + '</p>'
                        + '</div>'
                        + '</div>'
                        + '<div class="content col-md-12 col-sm-12 col-xs-12">';

                        if(response.type == 1){
                            modal_content += '<div class="video"><iframe src="' + base_vid_url + response.url +'" frameborder="0" allowfullscreen></iframe></div>';
                        }

                        modal_content += '<p>' + response.content + '</p>'
                        + '</div>'
                        + '</div>'
                        + '</div>';



                    $('#modal_title_content').html(modal_header);
                    $('.modal-body').html(modal_content);
                    $modal.modal('show');
                }
            });


        });

    });

</script>