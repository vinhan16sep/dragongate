<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0" style="margin-left: 15px;">
                    <h1>THÊM MỚI DỊCH VỤ</h1>
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>

                    <div class="form-group">
                        <?php
                        echo form_label('Tiêu đề', 'title');
                        echo form_error('title');
                        echo form_input('title', set_value('title', $work['title']), 'class="form-control" id="title"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Khách hàng', 'customer');
                        echo form_error('customer');
                        echo form_input('customer', set_value('customer', $work['customer']), 'class="form-control" id="customer"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Năm sản xuất ', 'year');
                        echo form_error('year');
                        echo form_input('year', set_value('year', $work['year']), 'class="form-control" id="year"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Đường dẫn', 'url');
                        echo form_error('url');
                        echo form_input('url', set_value('url', $work['url']), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Thể loại', 'type');
                        echo form_error('type');
                        echo form_dropdown('type', set_value('type', array(0 => 'Hình ảnh', 1 => 'Video'), $work['type']),'', 'class="form-control"');
                        ?>
                    </div>
                    <!-- <div class="form-group">
                        <?php
                        echo form_label('Dịch vụ', 'service');
                        echo form_error('service');
                        echo form_dropdown('service', set_value('service', $service_array),$work['service_id'], 'class="form-control" id="search_service"');
                        ?>
                    </div> -->
                    <div class="form-group">
                        <?php
                        echo form_label('Hạng mục', 'sub_service');
                        echo form_error('sub_service');
                        echo form_dropdown('sub_service', set_value('sub_service', $sub_services_array),$work['sub_service_id'], 'class="form-control" id="search_sub_service"');
                        ?>
                    </div>
                    <div class="form-group picture">
                        <label for="image">Hình ảnh đang sử dụng</label>
                        <br>
                        <img src="<?php echo base_url('assets/upload/works/'.$work['image']) ?>" width="150">
                    </div>

                    <div class="form-group picture">
                        <?php
                        echo form_label('Hình ảnh', 'image');
                        echo form_error('image');
                        echo form_upload('image','','multiple');
                        ?>
                    </div>
                    
                    <div class="form-group">
                        <?php
                        echo form_label('Giới thiệu', 'description');
                        echo form_error('description');
                        echo form_textarea('description', set_value('description', $work['description']), 'class="form-control" rows="5" ')
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                        echo form_label('Nội dung', 'content');
                        echo form_error('content');
                        echo form_textarea('content', set_value('content', $work['content'], false), 'class="form-control content"')
                        ?>
                    </div>
                    <div class="form-group col-sm-12 text-right">
                        <?php
                        echo form_submit('submit', 'OK', 'class="btn btn-primary"');
                        echo form_close();
                        ?>
                        <a class="btn btn-default cancel" href="javascript:window.history.go(-1);">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo site_url('tinymce/tinymce.min.js'); ?>"></script>
<script>
    tinymce.init({
        selector: ".content",
        theme: "modern",
        height: 200,
        relative_urls: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
        ],
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: "Bold text", inline: "b"},
            {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
            {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
            {title: "Example 1", inline: "span", classes: "example1"},
            {title: "Example 2", inline: "span", classes: "example2"},
            {title: "Table styles"},
            {title: "Table row 1", selector: "tr", classes: "tablerow1"}
        ],
        external_filemanager_path: "<?php echo site_url('filemanager/'); ?>",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {"filemanager": "<?php echo site_url('filemanager/plugin.min.js'); ?>"}
    });

    var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
    $('#search_service').each(function () {
        var service_id = $(this).val();
        jQuery.ajax({
            method: "get",
            url: base_url + "/dragongate/admin/work/get_sub_service",
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {service_id : service_id},
            success: function(result){
                $('#search_sub_service').html('');
                var sub_service = JSON.parse(result).sub_service;
                console.log(sub_service);
                $.each(sub_service, function(key, value){
                    $('#search_sub_service').append('<option value="'+value.id+'">'+value.title+'</option>');
                });
                
            }
        });
    });

    $('#search_service').change(function () {
        var service_id = $(this).val();
        jQuery.ajax({
            method: "get",
            url: base_url + "/dragongate/admin/work/get_sub_service",
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {service_id : service_id},
            success: function(result){
                $('#search_sub_service').html('');
                var sub_service = JSON.parse(result).sub_service;
                console.log(sub_service);
                $.each(sub_service, function(key, value){
                    $('#search_sub_service').append('<option value="'+value.id+'">'+value.title+'</option>');
                });
                
            }
        });
    });
</script>