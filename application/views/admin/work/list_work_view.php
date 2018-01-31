<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div >
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>

            <div class="row">
                <form action="<?php echo base_url('admin/work/index/') ?>" class="form-horizontal col-md-12 col-sm-12 col-xs-12" method="get" style="margin-bottom: 30px;">

                    <input type="text" name="search" value="" placeholder="Tìm Kiếm Danh Mục..." class="form-control" style=" width: 40%; float: left;margin-right: 5px;">
                    
                    <select name="search_service" class="form-control" style="width: 15%; float: left; margin-right: 5px;" id="search_service">
                        <option value="" selected="selected">Chọn Danh Mục</option>
                        <?php foreach ($services as $key => $value): ?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
                        <?php endforeach ?>
                    </select>

                    <select name="search_sub_service" class="form-control" style="width: 16%; float: left; margin-right: 5px;" id="search_sub_service">
                        <option value="" selected="selected">Chọn Danh Mục Con</option>
                    </select>
                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: left">
                </form>
            </div>

            <div >
                <a type="button" href="<?php echo site_url('admin/work/create'); ?>" class="btn btn-primary">THÊM MỚI DỊCH VỤ</a>
            </div>
            <div >
                <div style="margin-top: 10px;">
                    <?php if ($works): ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                <td><b><a href="#">Hình ảnh</a></b></td>
                                <td><b><a href="#">Tiêu đề</a></b></td>
                                <!-- <td><b><a href="#">Danh mục</a></b></td> -->
                                <td><b><a href="#">Hạng mục</a></b></td>
                                <td><b><a href="#">Thể loại</a></b></td>
                                <td><b><a href="#">Giới thiệu</a></b></td>
                                <td><b><a href="#">Đường dẫn</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>
                            <?php foreach ($works as $key => $value): ?>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/upload/works/'.$value['image']) ?>"></td>
                                    <td><?php echo $value['title'] ?></td>
                                    <!-- <td><?php echo $value['service_title'] ?></td> -->
                                    <td><?php echo $value['sub_service_title'] ?></td>
                                    <td>
                                        <?php
                                            switch ($value['type']) {
                                                case 0:
                                                    echo 'Hình ảnh';
                                                    break;
                                                case 1:
                                                    echo 'Video';
                                                    break;
                                                default:
                                                    echo "Thể loại khác";
                                                    break;
                                            }
                                        ?>
                                            
                                        </td>
                                    <td><?php echo $value['description'] ?></td>
                                    <td><?php echo $value['url'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/work/edit/'.$value['id']) ?>" title="Sửa" class="btn-edit" data-id="<?php echo $value['id'] ?>" >
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        &nbsp&nbsp&nbsp&nbsp
                                        <a href="<?php echo base_url('admin/work/remove') ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                Không có dịch vụ tồn tại
                            </tr>
                        </table>
                    <?php endif; ?>
                    <div class="col-md-6 col-md-offset-5 page">
                        <?php echo $page_links ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
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
