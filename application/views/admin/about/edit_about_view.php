<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0" style="margin-left: 15px;">
                    <h1>CẬP NHẬP DỊCH VỤ</h1>
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>

                    <div class="form-group">
                        <?php
                        echo form_label('Họ Tên', 'name');
                        echo form_error('name');
                        echo form_input('name', set_value('name', $about['name']), 'class="form-control" id="name"');
                        ?>
                    </div>
                    <div class="form-group picture">
                        <label for="image">Hình ảnh đang sử dụng</label>
                        <br>
                        <img src="<?php echo base_url('assets/upload/about/'.$about['image']) ?>">
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
                        echo form_label('Chức vụ', 'position');
                        echo form_error('position');
                        echo form_input('position', set_value('position', $about['position']), 'class="form-control" rows="5" ')
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                        echo form_label('Facebook', 'facebook');
                        echo form_error('facebook');
                        echo form_input('facebook', set_value('facebook', $about['facebook']), 'class="form-control" rows="5" ')
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                        echo form_label('Instagram', 'instagram');
                        echo form_error('instagram');
                        echo form_input('instagram', set_value('instagram', $about['instagram']), 'class="form-control" rows="5" ')
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
</script>