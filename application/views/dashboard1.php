<?php
$this->load->view('client/template/head');
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
$this->load->view('client/template/topbar');
$this->load->view('client/template/sidebar');
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
<div class="modal small fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3 id="myModalLabel">Confirmation</h3>

            </div>
            <form method="post" id="modalPrint" target ="_blank">
            <div class="modal-body">
                <p class="error-text"><h5></i>Nama Ketua Tim Penguji</h5>
                    <!-- <br>This cannot be undone. -->
                    <input type="text" name="ketTim" placeholder="Name..." class="form-control1">
                </p>
                <p class="error-text"><h5></i>No Induk Petugas</h5>
                    <!-- <br>This cannot be undone. -->
                    <input type="text" name="nip" placeholder="No Induk Petugas..." class="form-control1">
                </p>
            </div>
            <div class="modal-footer">
               <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Cancel</button> <button class="btn btn-danger">Print</button>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php print $this->session->userdata('nama'); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <?php
                        foreach ($pend as $row) {
                    ?>
                    <h3><?php if ($row->jumlah == null) {
                        $pendSaya = 0;
                        echo "0";
                    } else {
                        echo $row->jumlah;
                        $pendSaya = $row->jumlah; 
                    }?></h3>
                    <?php
                        }
                    ?>
                    <p>Pend & Pengajaran</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    <!-- <i class="ion ion-bag"></i> -->
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <?php
                        foreach ($penel as $row) {
                    ?>
                    <h3><?php if ($row->jumlah == null) {
                        $penelSaya = 0;
                        echo "0";
                    } else {
                        echo $row->jumlah; 
                        $penelSaya = $row->jumlah;
                    }?></h3>
                    <?php
                        }
                    ?>
                    <p>Penelitian</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <?php
                        foreach ($pengab as $row) {
                    ?>
                    <h3><?php if ($row->jumlah == null) {
                        $pengabSaya = 0;
                        echo "0";
                    } else {
                        echo $row->jumlah; 
                        $pengabSaya = $row->jumlah;
                    }?></h3>
                    <?php
                        }
                    ?>
                    <p>Pengabdian</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    <!-- <i class="ion ion-person-add"></i> -->
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <?php
                        foreach ($penun as $row) {
                    ?>
                    <h3><?php if ($row->jumlah == null) {
                        $penunSaya = 0;
                        echo "0";
                    } else {
                        echo $row->jumlah; 
                        $penunSaya = $row->jumlah;
                    }?></h3>
                    <?php
                        }
                    ?>
                    <p>Penunjang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    <!-- <i class="ion ion-pie-graph"></i> -->
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->

    <!-- =========================================================== -->    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                    <?php if ($this->session->userdata('jafa')=="--") {
                        $jafaDosen = "Tidak Punya Jabatan Fungsional";
                        // $totalNilai = $pendSaya+$penunSaya+$pengabSaya+$penelSaya;
                        $acuan1 = (150 * (55/100));
                        $acuan2 = (150 * (25/100));
                        $acuan3 = (150 * (10/100));
                        $acuan4 = (150 * (10/100));
                        $persen1 = ceil(($pendSaya/$acuan1)*100);
                        $persen2 = ceil(($penelSaya/$acuan2)*100);
                        $persen3 = ceil(($pengabSaya/$acuan3)*100);
                        $persen4 = ceil(($penunSaya/$acuan4)*100);
                        echo $jafaDosen." Menuju Asisten Ahli 150";
                    }elseif ($this->session->userdata('jafa')=="Asisten Ahli") {
                        $jafaDosen = $this->session->userdata('jafa');
                        $acuan1 = (50 * (45/100))+150;
                        $acuan2 = (50 * (35/100));
                        $acuan3 = (50 * (10/100));
                        $acuan4 = (50 * (10/100));
                        $persen1 = ceil(($pendSaya/$acuan1)*100);
                        $persen2 = ceil(($penelSaya/$acuan2)*100);
                        $persen3 = ceil(($pengabSaya/$acuan3)*100);
                        $persen4 = ceil(($penunSaya/$acuan4)*100);
                        echo $jafaDosen." 150 Menuju Lektor 200";
                    }elseif ($this->session->userdata('jafa')=="Lektor") {
                        $jafaDosen = $this->session->userdata('jafa');
                        $acuan1 = ((50 * (45/100))+150)+(200 * (40/100));
                        $acuan2 = (50 * (35/100))+(200 * (40/100));
                        $acuan3 = (50 * (10/100))+(200 * (10/100));
                        $acuan4 = (50 * (10/100))+(200 * (10/100));
                        $persen1 = ceil(($pendSaya/$acuan1)*100);
                        $persen2 = ceil(($penelSaya/$acuan2)*100);
                        $persen3 = ceil(($pengabSaya/$acuan3)*100);
                        $persen4 = ceil(($penunSaya/$acuan4)*100);
                        echo $jafaDosen." 200 Menuju Lektor Kepala 400";
                    }elseif ($this->session->userdata('jafa')=="Lektor Kepala") {
                        $jafaDosen = $this->session->userdata('jafa');
                        $acuan1 = ((200 * (40/100))+200)+(450 * (35/100));
                        $acuan2 = (200 * (40/100))+(450 * (45/100));
                        $acuan3 = (200 * (10/100))+(450 * (10/100));
                        $acuan4 = (200 * (10/100))+(450 * (10/100));
                        $persen1 = ceil(($pendSaya/$acuan1)*100);
                        $persen2 = ceil(($penelSaya/$acuan2)*100);
                        $persen3 = ceil(($pengabSaya/$acuan3)*100);
                        $persen4 = ceil(($penunSaya/$acuan4)*100);
                        echo $jafaDosen." 400 Menuju Profesor 800";
                    } else{
                        $jafaDosen = $this->session->userdata('jafa');
                        $persen1 = ceil((1)*100);
                        $persen2 = ceil((1)*100);
                        $persen3 = ceil((1)*100);
                        $persen4 = ceil((1)*100);
                        echo $jafaDosen;
                        }
                    ?>
                    </h3>
                </div><!-- /.box-header -->
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pend & Pengajaran</span>
                      <span class="info-box-number"><?php echo "&#8805; "; echo $acuan1; ?></span>

                      <div class="progress">
                        <div class="progress-bar" style="width: <?php echo ceil(($pendSaya/$acuan1)*100); ?>%"></div>
                      </div>
                          <span class="progress-description">
                            <?php if ($persen1 >100) {
                                echo "100";
                            }else {
                                echo $persen1;
                            } echo " % Terpenuhi"; ?>
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Penelitian</span>
                      <span class="info-box-number"><?php echo "&#8805; "; echo $acuan2; ?></span>

                      <div class="progress">
                        <div class="progress-bar" style="width: <?php echo ceil(($penelSaya/$acuan2)*100);?>%"></div>
                      </div>
                          <span class="progress-description">
                            <?php if ($persen2 >100) {
                                echo "100";
                            }else {
                                echo $persen2;
                            } echo " % Terpenuhi"; ?>
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pengabdian</span>
                      <span class="info-box-number"><?php echo "&#8804; "; echo $acuan3;?></span>

                      <div class="progress">
                        <div class="progress-bar" style="width: <?php echo ceil(($pengabSaya/$acuan3)*100); ?>%"></div>
                      </div>
                          <span class="progress-description">
                            <?php if ($persen3 >100) {
                                echo "100";
                            }else {
                                echo $persen3;
                            } echo " % Terpenuhi"; ?>
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Penunjang</span>
                      <span class="info-box-number"><?php echo "&#8804; "; echo $acuan4;?></span>

                      <div class="progress">
                        <div class="progress-bar" style="width: <?php echo ceil(($penunSaya/$acuan4)*100); ?>%"></div>
                      </div>
                          <span class="progress-description">
                            <?php if ($persen4 >100) {
                                echo "100";
                            }else {
                                echo $persen4;
                            } echo " % Terpenuhi"; ?>
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    <!-- =========================================================== -->
    
    <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Data Dupak Dosen</h3> 
                    <!-- <div class="box-tools pull-right"><form action="<?php echo site_url('auth/inDosen') ?>" method="post">
                        <div class="box-footer clearfix no-border">
                            <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                        </div></form>
                    </div> -->
                    <div class="box-footer clearfix">
                        <!-- <form action="<?php echo site_url('auth/inDosen') ?>" method="post"> -->
                            <!-- <a href="#" class="btn btn-sm btn-info btn-flat pull-left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Pengajaran Saya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a> -->
                        <!-- </form> -->
                            
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form action="<?php echo site_url('auth/loadDashboard'); ?>" method="post">
                        <table border="0" width="100%" >
                            <tr>
                                <th width="30%" height="20px"><input type="search" name="cari" placeholder="Search Keyword..." class="form-control1" width="200%"></th>
                                <th width="1%"></th>
                                <th width="15%"><button class="btn btn-default pull-left" name="q"><i class="fa fa-search"></i> Search</button></th>
                                <th><a href="<?php echo site_url('auth/inDupakClient') ?>" class="btn btn-sm btn-default btn-flat pull-right"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-plus"></i> Add item&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a></th>
                            </tr>
                        </table>
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead align="center">
                            <tr>
                                <td align="center" width="200px"><b>Nama</b></td>
                                <td align="center" width="200px"><b>Pend Yang Diperhitungkan</b></td>
                                <td align="center" width="200px"><b>Jabatan Akademik</b></td>
                                <td align="center" width="150px"><b>Pangkat</b></td>
                                <td align="center" width="80px"><b>Masa Gol Lama</b></td>
                                <td align="center" width="80px"><b>Masa Gol Baru</b></td>
                                <td align="center"><b>Kode Bidang</b></td>
                                <td align="center" width="150px"><b>Nama Bidang</b></td>
                                <td align="center" width="80px"><b>Kredit Sekarang</b></td>
                                <td align="center" width="80px"><b>Yang Diusulkan</b></td>
                                <td align="center" width="50px" colspan="3"><b></b></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($model['rows'] as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->pendDiperhitungkan; ?></td>
                                <td><?php echo $row->jabAkademik;?> &nbsp;/&nbsp; <?php echo $row->TMTAkademik; ?></td>
                                <td><?php echo $row->pangkat; ?> &nbsp;/&nbsp; <?php echo $row->TMTPangkat; ?></td>
                                <td><?php echo $row->masaGolLama; ?></td>
                                <td><?php echo $row->masaGolBaru; ?> &nbsp;/&nbsp; <?php echo $row->TMTGolBaru; ?></td>
                                <td><?php echo $row->kodeBidang; ?></td>
                                <td><?php echo $row->namaBidang; ?></td>
                                <td><?php echo $row->kreditSekarang; ?></td>
                                <td><?php echo $row->kreditDiusulkan; ?></td>
                                <td align="center">
                                    <div class="tools">
                                        <a class="fa fa-edit" href="<?php echo site_url('auth/editDupakClient/'); echo $row->id; ?>"></a>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="tools">
                                        <!-- <a class="fa fa-trash-o" href="deleteDupakClient/<?php echo $row->id; ?>"></a> -->
                                        <a href="#myModal" class="trash" data-id="<?php echo $row->id; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="tools">
                                        <!-- <a class="fa fa-trash-o" href="cetakDupak/<?php echo $row->id; ?>" target ="_blank"></a> -->
                                        <a href="#myModal1" class="print" data-id="<?php echo $row->id; ?>" role="button" data-toggle="modal"><i class="fa fa-file-pdf-o"></i></a>
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
    
</section><!-- /.content -->


<?php
$this->load->view('client/template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
$('.trash').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','<?php echo site_url('auth/deleteDupakClient/');?>'+id);
})
$('.print').click(function(){
    var id=$(this).data('id');
    $('#modalPrint').attr('action','<?php echo site_url('auth/cetakDupak/');?>'+id);
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
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/chartjs/Chart.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('client/template/foot');
?>