<?php if ($this->ion_auth->logged_in()): ?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/admin/'); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Dragon Gate</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu tree" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <!--Dashboard-->
                
                <li class="">
                    <a href="<?php echo base_url('admin/dashboard'); ?>">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span>Dashboard</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <!-- end Dashboard -->
                
                
                <!-- Banner -->
                <li class="">
                    <a href="<?php echo base_url('admin/banner/index'); ?>">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span>Banner</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <!-- end Banner -->
                
                
                <li class="treeview">
                    <a href=""><i class="fa fa-graduation-cap" aria-hidden="true"></i> Dịch vụ
                        <span class="pull-right-container">
                    <span class="label label-primary pull-right">2</span>
                  </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="">
                            <a href="<?php echo base_url('admin/service/index'); ?>"><i class="fa fa-minus" aria-hidden="true"></i> Dịch vụ</a>
                        </li>

                        <li class="">
                            <a href="<?php echo base_url('admin/subservice/index'); ?>"><i class="fa fa-minus" aria-hidden="true"></i> Hạng mục</a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="<?php echo base_url('admin/work/index'); ?>">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span>Công việc</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>

            </ul>
            
        </section>
        <!-- /.sidebar -->
    </aside>
<?php endif; ?>