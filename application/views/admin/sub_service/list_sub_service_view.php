<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div >
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>

            <div class="row">
                <form action="<?php echo base_url('admin/subservice/index/') ?>" class="form-horizontal col-md-12 col-sm-12 col-xs-12" method="get" style="margin-bottom: 30px;">

                    <input type="text" name="search" value="" placeholder="Tìm Kiếm Dịch Vụ ..." class="form-control" style=" width: 40%; float: left;margin-right: 5px;">

                    <select name="search_service" class="form-control" style="width: 15%; float: left; margin-right: 5px;" id="search_place">
                        <option value="" selected="selected">Chọn Danh Mục</option>
                        <?php foreach ($services as $key => $value): ?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: left">
                </form>
            </div>

            <div >
                <a type="button" href="<?php echo site_url('admin/subservice/create'); ?>" class="btn btn-primary">THÊM MỚI HẠNG MỤC</a>
            </div>
            <div >
                <div style="margin-top: 10px;">
                    <?php if ($sub_services): ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                <td><b><a href="#">Hình ảnh</a></b></td>
                                <td><b><a href="#">Tiêu đề</a></b></td>
                                <td><b><a href="#">Giới thiệu</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>
                            <?php foreach ($sub_services as $key => $value): ?>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/upload/sub_service/'.$value['image']) ?>"></td>
                                    <td><?php echo $value['title'] ?></td>
                                    <td><?php echo $value['description'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/subservice/edit/'.$value['id']) ?>" title="Sửa" class="btn-edit" data-id="<?php echo $value['id'] ?>" >
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        &nbsp&nbsp&nbsp&nbsp
                                        <a href="<?php echo base_url('admin/subservice/remove') ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    <?php else: ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                Không có dịch vụ tồn tại
                            </tr>
                        </table>
                    <?php endif ?>
                    <div class="col-md-6 col-md-offset-5 page">
                        <?php echo $page_links ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
