<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div >
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div >
                <a type="button" href="<?php echo site_url('admin/banner/create'); ?>" class="btn btn-primary">THÊM MỚI BANNER</a>
            </div>
            <div >
                <div style="margin-top: 10px;">
                    <?php if (isset($banners)): ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                <td><b><a href="#">Image</a></b></td>
                                <td><b><a href="#">Đường dẫn</a></b></td>
                                <td><b><a href="#">Trạng thái</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>
                            <?php foreach ($banners as $key => $value): ?>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/upload/banner/'.$value['image']) ?>"></td>
                                    <td><?php echo $value['url'] ?></td>
                                    <?php if ($value['is_actived'] == 1): ?>
                                        <td><button class="btn btn-success btn-is-active" data-id="<?php echo $value['id'] ?>"  title="Tắt banner"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                                    <?php else: ?>
                                        <td><button class="btn btn-danger btn-not-active" data-id="<?php echo $value['id'] ?>"  title="Bật banner"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                    <?php endif ?>
                                    <td>
                                        <a href="<?php echo base_url('admin/banner/remove/'.$value['id']) ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    <?php else: ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                Không có banner tồn tại
                            </tr>
                        </table>
                    <?php endif ?>
                    <div class="col-md-6 col-md-offset-5">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo site_url('assets/admin/'); ?>js/admin/banner.js"></script>
