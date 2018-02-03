<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div >
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>

            <div >
                <a type="button" href="<?php echo site_url('admin/about/createPartner'); ?>" class="btn btn-primary">THÊM MỚI ĐỐi TÁC</a>
            </div>
            <div >
                <div style="margin-top: 10px;">
                    <?php if ($result): ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                <td style="width: 50%"><b><a href="#">Logo</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>
                            <?php foreach ($result as $key => $value): ?>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/upload/about/'.$value['image']) ?>"></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/about/removePartner') ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
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
