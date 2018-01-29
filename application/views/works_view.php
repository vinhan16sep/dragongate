<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/works.css') ?>">
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    var is_search = false;
    var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
    (function($) {
        $(document).ready(function() {
            var ids = [];
            lazyLoad(ids);
            $(window).scroll(function() {
                if($("#loading").css('display') == 'none') {
                    if($(window).scrollTop() + $(window).height() > $(document).height() - 300) {
                        ids = [];
                        $(".item").each(function(){
                            ids.push(this.id);
                        });
                        lazyLoad(ids);
                    }
                }
            });
            
            $('#Search').change(function(){
                var name = $('#Search').val();
                if(name != ''){
                    is_search = true;
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url('works/get_lazy_load_data_for_search/') ?>',
                        dataType: 'json',
                        data: {
                            name: name
                        },
                        success: function(res){
                            $(".item").remove();
                            $(".item-search").remove();
                            $.each(res, function(index, item){
                                var html = generate_html(item, true);
                                $(".listing").append(html);
                            })
                        },
                        error: function(){
                            console.log('error');
                        }
                    });
                }else{
                    is_search = false;
                    lazyLoad(ids);
                }
            });
        });

        function lazyLoad(ids){
            if(is_search == false){
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url('works/get_lazy_load_data/') ?>',
                    dataType: 'json',
                    data: {
                        ids: ids
                    },
                    beforeSend: function() {
                        $("#loading").show();
                    },
                    success: function(res){
                        $(".item-search").remove();
                        $.each(res, function(index, item){
                            var html = generate_html(item, false);
                            $(".listing").append(html);
                        })
                        $("#loading").hide();
                    }
                });
            }

        }

        function generate_html(data, search){
            var base_url_image = '<?php echo base_url('assets/upload/image/'); ?>';
            var base_url_video = '<?php echo base_url('assets/video/image/'); ?>';

            var search_detect = '';
            if(search == true){
                search_detect = 'item-search';
            }
            var type = "";
            if(data.type == 0){
                type = "photography";
            }else{
                type = "video";
            }
            var html_item = '<div class="col-md-4 col-sm-6 col-xs-12 item '+ type +'" id="' + data.id + '">'
                                + '<h4>'+data.title+'</h4>'
                                + '<div class="single-item">';
                                    if(data.image != ''){
                                        html_item += '<img src="'+base_url+'/dragongate/assets/upload/works/'+data.image+'" alt="works">'
                                    }else{
                                        html_item += '<img src="'+base_url+'/dragongate/assets/public/img/blog/1.jpg" alt="works">'
                                    }
                                    
                                html_item += '<div class="opacity tran3s">'
                                        + '<a href="'+data.url+'" class="view-more tran3s" target="_blank">'
                                            + '<i class="flaticon-plus"></i>'
                                        + '</a>'
                                    + '</div>'
                                +'</div>'
                            + '</div>';

            return html_item;
        }
    })(jQuery);

</script>

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
            <div class="search col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <input type="text" class="form-control" placeholder="Tìm kiếm ..." id="Search">
            </div>
            <ul>
                <li class="filter active tran3s" data-filter="all">All</li>
                <li class="filter tran3s" data-filter=".video">Video</li>
                <li class="filter tran3s" data-filter=".photography">Photography</li>

            </ul>
        </div> <!-- End of .mixitUp-menu -->
        
        <div class="row listing">
            <span id="loading">Loading Please wait...</span>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.gullu-portfolio -->

<!-- mixitup -->
<script type="text/javascript" src="<?php echo site_url('assets/public/vendor/jquery.mixitup.min.js') ?>"></script>