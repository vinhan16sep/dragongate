<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div >
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>

            <div class="row">
                <form action="<?php echo base_url('admin/about/getTeam/') ?>" class="form-horizontal col-md-12 col-sm-12 col-xs-12" method="get" style="margin-bottom: 30px;">

                    <input type="text" name="search" value="" placeholder="Tìm Kiếm Danh Mục..." class="form-control" style=" width: 40%; float: left;margin-right: 5px;">
                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: left">
                </form>
            </div>

            <div >
                <a type="button" href="<?php echo site_url('admin/about/createTeam'); ?>" class="btn btn-primary">THÊM MỚI THÀNH VIÊN</a>
            </div>
            <div >
                <div style="margin-top: 10px;">
                    <?php if ($result): ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                <td><b><a href="#">Hình ảnh</a></b></td>
                                <td><b><a href="#">Họ Tên</a></b></td>
                                <td><b><a href="#">Chức vụ</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>
                            <?php foreach ($result as $key => $value): ?>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/upload/about/'.$value['image']) ?>"></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td><?php echo $value['position'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/about/editTeam/'.$value['id']) ?>" title="Sửa" class="btn-edit" data-id="<?php echo $value['id'] ?>" >
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        &nbsp&nbsp&nbsp&nbsp
                                        <a href="<?php echo base_url('admin/about/removeTeam') ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
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
