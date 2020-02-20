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

<?php
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>
<style>
/*.trash{padding:2px; border:1px solid red; margin-left:10px; background-color:red; color:#fff}*/
td{padding:5px}
</style>
<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3 id="myModalLabel">Delete Confirmation</h3>

            </div>
            <div class="modal-body">
                <p class="error-text"><h4><i class="fa fa-warning modal-icon"></i>Yakin ingin menghapus data ini???...</h4>
                    <!-- <br>This cannot be undone. -->
                    </p>
            </div>
            <div class="modal-footer">
               <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Cancel</button> <a href="#" class="btn btn-danger"  id="modalDelete" >Delete</a>

            </div>
        </div>
    </div>
</div>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         
        <!-- <small>Dosen</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jabatan Fungsional</li>
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
                    <h3 class="box-title">Data Penelitian Dosen</h3> 
                    <!-- <div class="box-tools pull-right"><form action="<?php echo site_url('auth/inDosen') ?>" method="post">
                        <div class="box-footer clearfix no-border">
                            <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                        </div></form>
                    </div> -->
                    <div class="box-footer clearfix">
                        <!-- <form action="<?php echo site_url('auth/inDosen') ?>" method="post"> -->
                            <a href="<?php echo site_url('auth/laporanRekapPenelitian') ?>" target="_blank" class="btn btn-sm btn-info btn-flat pull-left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Data Penelitian Dosen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a>
                        <!-- </form> -->
                            <a href="<?php echo site_url('auth/penelitian') ?>" class="btn btn-sm btn-default btn-flat pull-right"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lihat Data Penelitian Saya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="<?php echo site_url('auth/penelitianAdmin'); ?>" method="post">
                        <table border="0" width="100%" >
                            <tr>
                                <th width="30%" height="20px"><input type="search" name="cari" placeholder="Search Keyword..." class="form-control1" width="200%"></th>
                                <th width="1%"></th>
                                <th width="15%"><button class="btn btn-default pull-left" name="q"><i class="fa fa-search"></i> Search</button></th>
                                <th></th>
                            </tr>
                        </table>
                    <table class="table table-hover table-striped">
                        <thead align="center">
                            <tr>
                                <td align="center" width="200px"><b>Nama</b></td>
                                <td align="center" width="200px"><b>Judul Penelitian</b></td>
                                <td align="center" width="200px"><b>ISSN</b></td>
                                <td align="center" width="110px"><b>Tanggal Penelitian</b></td>
                                <td align="center" width="60px"><b>Satuan Hasil</b></td>
                                <td align="center" width="60px"><b>Volume</b></td>
                                <td align="center" width="80px"><b>Angka Kredit</b></td>
                                <td align="center" width="100px"><b>Jum Angka Kredit</b></td>
                                <td align="center"><b>Berkas</b></td>
                                <td align="center" width="50px"><b>Edit</b></td>
                                <td align="center" width="50px"><b>Hapus</b></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($model['rows'] as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->judul; ?></td>
                                <td><?php echo $row->issn; ?></td>
                                <td><?php echo $row->tglPenelitian; ?></td>
                                <td><?php echo $row->satuanHasil; ?></td>
                                <td><?php echo $row->volumeKegiatan; ?></td>
                                <td><?php echo $row->angkaKredit; ?></td>
                                <td><?php echo $row->jumAngkaKredit; ?></td>
                                <td>
                                    <?php 
                                    if($row->berkas == ""){
                                        
                                    }else{ ?>
                                        <a href="<?php echo site_url('auth/lakukan_download/'); echo $row->berkas; ?>" target="_blank"><i class="fa fa-download"></i></a>
                                    <?php 
                                    }?>
                                </td>
                                <td align="center">
                                    <div class="tools">
                                        <a class="fa fa-edit" href="<?php echo site_url('auth/editPenelitianAdmin/'); echo $row->idPenelitian; ?>"></a>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="tools">
                                        <!-- <a class="fa fa-trash-o" href="deletePengajaran/<?php echo $row->idPenelitian; ?>"></a> -->
                                        <a href="#myModal" class="trash" data-id="<?php echo $row->idPenelitian; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    // Tampilkan link-link paginationnya
                    echo $model['pagination'];
                    ?>
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
$('.trash').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','<?php echo site_url('auth/deletePenelitianAdmin/');?>'+id);
})
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