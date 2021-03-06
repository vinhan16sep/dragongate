<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">

        <!-- <div class="a" style="width: 100%; height: 100%; position:fixed; z-index: 999; background-color: rgba(0,0,0,.8);">
            <div class="b" style="padding-top: 45%; text-align: center; color: #fff;">
                <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-12" style="margin-top: 10px;">
                <a type="button" href="" class="btn btn-primary" id="sendAll">GỬI TẤT CẢ</a>
                <?php
                echo '<table class="table table-hover table-bordered table-condensed">';
                echo '<tr>';
                echo '<td>Check All<br /><input type="checkbox" class="check-all" id="check-all" /></td>';
                echo '<td><b><a href="#">Email</a></b></td>';
                echo '<td><b><a href="#">Trạng thái</a></b></td>';
                echo '</tr>';
                if (!empty($subscribes)) {
                    foreach ($subscribes as $key => $item):
                        echo '<tr>';
                        echo '<td><input type="checkbox" id="' . $item['id'] . '" class="checkbox" name="checkbox[' . $item['id'] . ']" /></td>';
                        echo '<td>' . $item['email'] . '</td>';
                        echo '<td><a href="" class="btn btn-success active btn-send-mail" data-email="'.$item['email'].'" data-toggle="modal" data-target="#myModal">Send Mail</a></td>';
                        ?>
                        <?php
                    endforeach;
                }else {
                    echo '<tr class="odd"><td colspan="9">No records</td></tr>';
                }
                echo '</table>';
                ?>
                <div id="encypted_ppbtn"></div>
                <div id="encypted_ppbtn_all" style="display: none;">
                    <div class="modal" role="dialog" style="display: block; opacity: 0.5">
                        <div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">
                            <i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-5 page">
                <?php echo $page_links ?>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/admin/subscribe.js') ?>"></script>