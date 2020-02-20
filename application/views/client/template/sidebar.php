<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                 <p>
                 <!-- search form <?php foreach ($hak as $row) { echo $row->nama;}?>-->
                  <?php print $this->session->userdata('nama'); ?>
                 </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="<?php echo site_url('auth/loadDashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <!-- <li>
                <a href="<?php echo site_url('auth/dupakClient') ?>">
                    <i class="fa fa-th"></i>
                    <span>Dupak Dosen</span>
                </a>
            </li> -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Jafa Dosen</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('auth/pengajaranClient') ?>"><i class="fa fa-circle-o"></i> Pendidikan & Pengajaran</a></li>
                    <li><a href="<?php echo site_url('auth/penelitianClient') ?>"><i class="fa fa-circle-o"></i> Penelitian</a></li>
                    <li><a href="<?php echo site_url('auth/pengabdianClient') ?>"><i class="fa fa-circle-o"></i> Pengabdian</a></li>
                    <li><a href="<?php echo site_url('auth/penunjangClient') ?>"><i class="fa fa-circle-o"></i> Penunjang</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('auth/settingAkunUser') ?>">
                    <i class="fa fa-wrench"></i>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
    
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">