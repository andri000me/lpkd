<?php
$this->load->view('admin/template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/js/jquery-ui.css')?>" type="text/css"/>
<script src="<?php echo base_url('assets/js/jquery.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js')?>" type="text/javascript"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>
<?php
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         
        <!-- <small>Dosen</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Data Dosen</h3>
                    
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- <ul class="todo-list">
                        <li>
                     -->        <!-- drag handle -->
                            <!-- <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span> -->
                            <!-- checkbox -->
                            <!-- <input type="checkbox" value="" name=""/> -->
                            <!-- todo text -->
                            <!-- <span class="text">Design a nice theme</span> -->
                            <!-- Emphasis label -->
                            <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> -->
                            <!-- General tools such as edit or delete-->
                            <!-- <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                    </ul> -->
                    <form action="<?php echo site_url('auth/inDosen') ?>" method="post">
                        <table border="0" width="100%" >
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">NIDN</th>
                                <th><input type="text" class="form-control" name="nidn" value="<?=isset($default['nidn'])? $default['nidn'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Nama Dosen</th>
                                <th><input type="text" class="form-control" name="nama" value="<?=isset($default['nama'])? $default['nama'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">No Seri Dosen</th>
                                <th><input type="text" class="form-control" name="noSeri" value="<?=isset($default['noSeri'])? $default['noSeri'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Tempat Lahir</th>
                                <th><input type="text" class="form-control" name="tempat" value="<?=isset($default['tempatLahir'])? $default['tempatLahir'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Tanggal Lahir</th>
                                <th><input type="text" id="datepicker" class="form-control" name="tgl" value="<?=isset($default['tglLahir'])? $default['tglLahir'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Jenis Kelamin</th>
                                <th>
                                    <form>
                                        <input type="radio" name="sex" value="Laki-Laki" />&nbsp;Laki-Laki &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="sex" value="Perempuan" />&nbsp;Perempuan
                                    </form>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">No Telp</th>
                                <th><input type="text" class="form-control" name="telp" value="<?=isset($default['noTelp'])? $default['noTelp'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Status Dosen</th>
                                <th>
                                    <select class="form-control" name="status">
                                        <option value="Dosen Tetap Yayasan" <?php if($default['statusDosen']=='Dosen Tetap Yayasan'){ echo "selected"; }?>>Dosen Tetap Yayasan</option>
                                        <option value="Dosen PNS DPK" <?php if($default['statusDosen']=='Dosen PNS DPK'){ echo "selected"; }?>>Dosen PNS DPK</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Jabatan</th>
                                <th>
                                    <select class="form-control" name="jabatan">
                                        <option value="Tenaga Pengajar" <?php if($default['jabatan']=='Tenaga Pengajar'){ echo "selected"; }?>>Tenaga Pengajar</option>
                                        <option value="Asisten Ahli" <?php if($default['jabatan']=='Asisten Ahli'){ echo "selected"; }?>>Asisten Ahli</option>
                                        <option value="Lektor" <?php if($default['jabatan']=='Lektor'){ echo "selected"; }?>>Lektor</option>
                                        <option value="Lektor Kepala" <?php if($default['jabatan']=='Lektor Kepala'){ echo "selected"; }?>>Lektor Kepala</option>
                                        <option value="Guru Besar" <?php if($default['jabatan']=='Guru Besar'){ echo "selected"; }?>>Guru Besar</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Bagian</th>
                                <th>
                                    <select class="form-control" name="bagian">
                                        <option value="Ketua LPKD" selected="<?=isset($default['bagian']) ? (($default['bagian']=='Ketua LPKD')? "selected" : "") : "";?>">Ketua LPKD</option>
                                        <option value="Dosen" selected="<?=isset($default['bagian']) ? (($default['bagian']=='Dosen')? "selected" : "") : "";?>">Dosen</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%"></th>
                                <th>
                                    <div class="col-xs-4">    
                                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="tombol_submit">Simpan</button>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="reset" class="btn btn-primary btn-block btn-flat" value="Batal"/>
                                    </div>
                                </th>
                                <th width="15%"></th>
                            </tr>
                        </table>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
    </div><!-- /.row (main row) -->

</section><!-- /.content -->


<?php
$this->load->view('admin/template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.min.js') ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('admin/template/foot');
?>