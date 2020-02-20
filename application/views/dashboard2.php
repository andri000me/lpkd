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
<script>
    function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
    }
</script>
<?php
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php print $this->session->userdata('nama'); ?>
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
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
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik JaFa Karir Dosen</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <!-- <div class="btn-group">
                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div> -->
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="<?php echo site_url('auth/Dashboard'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-8" style="width: 100%">
                            <p class="text-center">
                                <strong>
                                    <table border="0" width="100%" >
                                        <tr>
                                            <th width="10%" height="20px">Grafik Jafa:</th>
                                            <th width="30%" height="20px"><input type="text" onkeypress="return hanyaAngka(event)" name="cari" placeholder="Masukkan Tahun..." class="form-control1"></th>
                                            <th width="1%"></th>
                                            <th width="15%"><button class="btn btn-default pull-left" name="q"><i class="fa fa-bar-chart"></i> Tampil Grafik</button></th>
                                            <th>
                                                <i class="fa fa-circle-o text-green"></i> Penelitian
                                                <i class="fa fa-circle-o text-yellow"></i> Pengabdian
                                                <i class="fa fa-circle-o text-red"></i> Penunjang
                                            </th>
                                        </tr>
                                    </table>
                                </strong>
                            </p>
                            <div class="chart-responsive">
                                <!-- Sales Chart Canvas -->
                                <canvas id="area-chart" width="1050" height="250"></canvas>
                            </div><!-- /.chart-responsive -->
                        </div><!-- /.col -->
                        <!-- <div class="col-md-4">
                            <p class="text-center">
                                <strong>Goal Completion</strong>
                            </p>
                            <div class="progress-group">
                                <span class="progress-text">Pendidikan & Pengajaran</span>
                                <span class="progress-number"><b>160</b>/200</span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <span class="progress-text">Penelitian</span>
                                <span class="progress-number"><b>310</b>/400</span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <span class="progress-text">Pengabdian</span>
                                <span class="progress-number"><b>480</b>/800</span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <span class="progress-text">Penunjang</span>
                                <span class="progress-number"><b>250</b>/500</span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                </div>
                            </div>
                        </div> -->
                    </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> -->
                                <?php
                                    foreach ($tPend as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran = "0";
                                    } else {
                                        $pengajaran = $row->jumlah;
                                    }}
                                    foreach ($tPend2 as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran2 = "0";
                                    } else {
                                        $pengajaran2 = $row->jumlah;
                                    }}
                                    foreach ($tPend3 as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran3 = "0";
                                    } else {
                                        $pengajaran3 = $row->jumlah;
                                    }}
                                    foreach ($tPend4 as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran4 = "0";
                                    } else {
                                        $pengajaran4 = $row->jumlah;
                                    }}
                                    foreach ($tPend5 as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran5 = "0";
                                    } else {
                                        $pengajaran5 = $row->jumlah;
                                    }}
                                    foreach ($tPend6 as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran6 = "0";
                                    } else {
                                        $pengajaran6 = $row->jumlah;
                                    }}
                                    foreach ($tPend7 as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran7 = "0";
                                    } else {
                                        $pengajaran7 = $row->jumlah;
                                    }}
                                    foreach ($tPend8 as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran8 = "0";
                                    } else {
                                        $pengajaran8 = $row->jumlah;
                                    }}
                                    foreach ($tPend9 as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran9 = "0";
                                    } else {
                                        $pengajaran9 = $row->jumlah;
                                    }}
                                    foreach ($tPend10 as $row) {
                                    if ($row->jumlah == null) {
                                        $pengajaran10 = "0";
                                    } else {
                                        $pengajaran10 = $row->jumlah;
                                    }}

                                ?>
                                <h5 class="description-header"><?php echo $pengajaran+$pengajaran2+$pengajaran3+$pengajaran4+$pengajaran5+$pengajaran6+$pengajaran7+$pengajaran8+$pengajaran9+$pengajaran10; ?></h5>
                                <span class="description-text">TOTAL PENDIDIKAN & PENGAJARAN</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <!-- <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span> -->
                                <?php
                                    foreach ($tPenel as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian = "0";
                                    } else {
                                        $penelitian = $row->jumlah;
                                    }}
                                    foreach ($tPenel2 as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian2 = "0";
                                    } else {
                                        $penelitian2 = $row->jumlah;
                                    }}
                                    foreach ($tPenel3 as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian3 = "0";
                                    } else {
                                        $penelitian3 = $row->jumlah;
                                    }}
                                    foreach ($tPenel4 as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian4 = "0";
                                    } else {
                                        $penelitian4 = $row->jumlah;
                                    }}
                                    foreach ($tPenel5 as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian5 = "0";
                                    } else {
                                        $penelitian5 = $row->jumlah;
                                    }}
                                    foreach ($tPenel6 as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian6 = "0";
                                    } else {
                                        $penelitian6 = $row->jumlah;
                                    }}
                                    foreach ($tPenel7 as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian7 = "0";
                                    } else {
                                        $penelitian7 = $row->jumlah;
                                    }}
                                    foreach ($tPenel8 as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian8 = "0";
                                    } else {
                                        $penelitian8 = $row->jumlah;
                                    }}
                                    foreach ($tPenel9 as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian9 = "0";
                                    } else {
                                        $penelitian9 = $row->jumlah;
                                    }}
                                    foreach ($tPenel10 as $row) {
                                    if ($row->jumlah == null) {
                                        $penelitian10 = "0";
                                    } else {
                                        $penelitian10 = $row->jumlah;
                                    }}
                                ?>
                                <h5 class="description-header"><?php echo $penelitian+$penelitian2+$penelitian3+$penelitian4+$penelitian5+$penelitian6+$penelitian7+$penelitian8+$penelitian9+$penelitian10; ?></h5>
                                <span class="description-text">TOTAL PENELITIAN</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span> -->
                                <?php
                                    foreach ($tPengab as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian = "0";
                                    } else {
                                        $Pengabdian = $row->jumlah;
                                    }}
                                    foreach ($tPengab2 as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian2 = "0";
                                    } else {
                                        $Pengabdian2 = $row->jumlah;
                                    }}
                                    foreach ($tPengab3 as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian3 = "0";
                                    } else {
                                        $Pengabdian3 = $row->jumlah;
                                    }}
                                    foreach ($tPengab4 as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian4 = "0";
                                    } else {
                                        $Pengabdian4 = $row->jumlah;
                                    }}
                                    foreach ($tPengab5 as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian5 = "0";
                                    } else {
                                        $Pengabdian5 = $row->jumlah;
                                    }}
                                    foreach ($tPengab6 as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian6 = "0";
                                    } else {
                                        $Pengabdian6 = $row->jumlah;
                                    }}
                                    foreach ($tPengab7 as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian7 = "0";
                                    } else {
                                        $Pengabdian7 = $row->jumlah;
                                    }}
                                    foreach ($tPengab8 as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian8 = "0";
                                    } else {
                                        $Pengabdian8 = $row->jumlah;
                                    }}
                                    foreach ($tPengab9 as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian9 = "0";
                                    } else {
                                        $Pengabdian9 = $row->jumlah;
                                    }}
                                    foreach ($tPengab10 as $row) {
                                    if ($row->jumlah == null) {
                                        $Pengabdian10 = "0";
                                    } else {
                                        $Pengabdian10 = $row->jumlah;
                                    }}
                                ?>
                                <h5 class="description-header"><?php echo $Pengabdian+$Pengabdian2+$Pengabdian3+$Pengabdian4+$Pengabdian5+$Pengabdian6+$Pengabdian7+$Pengabdian8+$Pengabdian9+$Pengabdian10; ?></h5>
                                <span class="description-text">TOTAL PENGABDIAN</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block">
                                <!-- <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span> -->
                                <?php
                                    foreach ($tPenun as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang = "0";
                                    } else {
                                        $penunjang = $row->jumlah;
                                    }}
                                    foreach ($tPenun2 as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang2 = "0";
                                    } else {
                                        $penunjang2 = $row->jumlah;
                                    }}
                                    foreach ($tPenun3 as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang3 = "0";
                                    } else {
                                        $penunjang3 = $row->jumlah;
                                    }}
                                    foreach ($tPenun4 as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang4 = "0";
                                    } else {
                                        $penunjang4 = $row->jumlah;
                                    }}
                                    foreach ($tPenun5 as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang5 = "0";
                                    } else {
                                        $penunjang5 = $row->jumlah;
                                    }}
                                    foreach ($tPenun6 as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang6 = "0";
                                    } else {
                                        $penunjang6 = $row->jumlah;
                                    }}
                                    foreach ($tPenun7 as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang7 = "0";
                                    } else {
                                        $penunjang7 = $row->jumlah;
                                    }}
                                    foreach ($tPenun8 as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang8 = "0";
                                    } else {
                                        $penunjang8 = $row->jumlah;
                                    }}
                                    foreach ($tPenun9 as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang9 = "0";
                                    } else {
                                        $penunjang9 = $row->jumlah;
                                    }}
                                    foreach ($tPenun10 as $row) {
                                    if ($row->jumlah == null) {
                                        $penunjang10 = "0";
                                    } else {
                                        $penunjang10 = $row->jumlah;
                                    }}

                                ?>
                                <h5 class="description-header"><?php echo $penunjang+$penunjang2+$penunjang3+$penunjang4+$penunjang5+$penunjang6+$penunjang7+$penunjang8+$penunjang9+$penunjang10; ?></h5>
                                <span class="description-text">TOTAL PENUNJANG</span>
                            </div><!-- /.description-block -->
                        </div>
                    </div><!-- /.row -->
                    </form>
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
  

</section><!-- /.content -->



<?php
$this->load->view('admin/template/js');
?>

<!--tambahkan custom js disini-->
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/chartjs/Chart.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard2.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>
<script>
    <?php
        if ($tahun == "now") {
        $tahun = getdate();
        $start = $tahun['year']-9;
        $now = $tahun['year'];
        }else{
        $thnGrafik = $tahun;
        $tahun = getdate();
        $start = $thnGrafik-9;
        $now = $thnGrafik;
        };
    ?>
    var lineChartData = {
            // labels: [<?php echo $tahun['year']-9;?>, <?php echo $tahun['year']-8;?>,<?php echo $tahun['year']-7;?>, <?php echo $tahun['year']-6;?>,<?php echo $tahun['year']-5;?>, <?php echo $tahun['year']-4;?>,<?php echo $tahun['year']-3;?>, <?php echo $tahun['year']-2;?>,<?php echo $tahun['year']-1;?>, <?php echo $tahun['year'];?>],
            labels: [<?php while ($start <= $now) { print("$start"); echo ","; $start++; } ?>],
            datasets: [
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "#006600",
                    pointColor: "#006600",
                    pointStrokeColor: "#fff",
                    data: [<?php echo $penelitian; ?>, <?php echo $penelitian2; ?>,<?php echo $penelitian3; ?>, <?php echo $penelitian4; ?>,<?php echo $penelitian5; ?>, <?php echo $penelitian6; ?>,<?php echo $penelitian7; ?>, <?php echo $penelitian8; ?>,<?php echo $penelitian9; ?>, <?php echo $penelitian10; ?>]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "#ffcc66",
                    pointColor: "#ffcc66",
                    pointStrokeColor: "#fff",
                    data: [<?php echo $Pengabdian; ?>, <?php echo $Pengabdian2; ?>,<?php echo $Pengabdian3; ?>, <?php echo $Pengabdian4; ?>,<?php echo $Pengabdian5; ?>, <?php echo $Pengabdian6; ?>,<?php echo $Pengabdian7; ?>, <?php echo $Pengabdian8; ?>,<?php echo $Pengabdian9; ?>, <?php echo $Pengabdian10; ?>]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "#ff3333",
                    pointColor: "#ff3333",
                    pointStrokeColor: "#fff",
                    data: [<?php echo $penunjang; ?>, <?php echo $penunjang2; ?>,<?php echo $penunjang3; ?>, <?php echo $penunjang4; ?>,<?php echo $penunjang5; ?>, <?php echo $penunjang6; ?>,<?php echo $penunjang7; ?>, <?php echo $penunjang8; ?>,<?php echo $penunjang9; ?>, <?php echo $penunjang10; ?>]
                }
            ]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);
</script>

<?php
$this->load->view('admin/template/foot');
?>