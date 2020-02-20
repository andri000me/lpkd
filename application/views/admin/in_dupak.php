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
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
  });
</script>
<script type="text/javascript">
 function validasi_input(form){
  if (form.pend.value == ""){
    alert("Pendidikan Yang Diperhitungkan masih kosong!");
    form.pend.focus();
    return (false);
  }
  if (form.tmtAkad.value == ""){
    alert("TMT Jabatan AKademik Dosen masih kosong!");
    form.tmtAkad.focus();
    return (false);
  }if (form.pangkat.value == ""){
    alert("Pangkat Dosen masih kosong!");
    form.pangkat.focus();
    return (false);
  }
  if (form.tmtPangkat.value == ""){
    alert("TMT Pangkat Dosen masih kosong!");
    form.tmtPangkat.focus();
    return (false);
  }
  if (form.golLama.value == ""){
    alert("Golongan Lama Dosen masih kosong!");
    form.golLama.focus();
    return (false);
  }if (form.golBaru.value == ""){
    alert("Golongan Baru Dosen masih kosong!");
    form.golBaru.focus();
    return (false);
  }if (form.tmtGolBaru.value == ""){
    alert("TMT Golongan Baru Dosen masih kosong!");
    form.tmtGolBaru.focus();
    return (false);
  }if (form.namaBidang.value == ""){
    alert("Nama bidang masih kosong!");
    form.namaBidang.focus();
    return (false);
  }
return (true);
}
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
                    <h3 class="box-title"><?=$tipe?> Data Dupak Dosen</h3>
                    
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
                    <form method="post" onsubmit="return validasi_input(this)">
                        <table border="0" width="100%">
                            <tr>
                                <th width="15%" height="50px"></th>
                                <td width="17%" valign="top"><b>Pendidikan Yang di Perhitungkan</b></td>
                                <th colspan="3">
                                    <!-- <input type="text" class="form-control" name="pend" value="<?=isset($default['pendDiperhitungkan'])? $default['pendDiperhitungkan'] : ""?>"/> -->
                                    <textarea placeholder="Pendidikan & Pengajaran Yang Diajukan" name="pend" id="pend" style="width: 70%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=isset($default['pendDiperhitungkan'])? $default['pendDiperhitungkan'] : ""?></textarea>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Jabatan Akademik/TMT</th>
                                <th width="20%">
                                    <select class="form-control" style="width:98%;" name="jabAkad" value="">
                                        <option value="TENAGA PENGAJAR" <?=isset($default['jabAkademik']) ? (($default['jabAkademik']=='TENAGA PENGAJAR')? 'selected="selected"' : "") : 'selected="selected"';?>>TENAGA PENGAJAR</option>
                                        <option value="ASISTEN AHLI" <?=isset($default['jabAkademik']) ? (($default['jabAkademik']=='ASISTEN AHLI')? 'selected="selected"' : "") : "";?>>ASISTEN AHLI</option>
                                        <option value="LEKTOR" <?=isset($default['jabAkademik']) ? (($default['jabAkademik']=='LEKTOR')? 'selected="selected"' : "") : "";?>>LEKTOR</option>
                                        <option value="LEKTOR KEPALA" <?=isset($default['jabAkademik']) ? (($default['jabAkademik']=='LEKTOR KEPALA')? 'selected="selected"' : "") : "";?>>LEKTOR KEPALA</option>
                                        <option value="GURU BESAR" <?=isset($default['jabAkademik']) ? (($default['jabAkademik']=='GURU BESAR')? 'selected="selected"' : "") : "";?>>GURU BESAR</option>
                                    </select>
                                </th>
                                <td width="2%" align="center"><font size="6">/</font></td>
                                <th><input type="text" style="width:49%;" class="form-control" name="tmtAkad" id="tmtAkad" value="<?=isset($default['TMTAkademik'])? $default['TMTAkademik'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Pangkat/TMT</th>
                                <th><input type="text" class="form-control" style="width:98%;" name="pangkat" id="pangkat" value="<?=isset($default['pangkat'])? $default['pangkat'] : ""?>"/>
                                </th>
                                <td width="2%" align="center"><font size="6">/</font></td>
                                <th><input type="text" style="width:49%;" class="form-control" name="tmtPangkat" id="tmtPangkat" value="<?=isset($default['TMTPangkat'])? $default['TMTPangkat'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Masa Gol Lama</th>
                                <th colspan="3"><input type="text" class="form-control" name="golLama" id="golLama" value="<?=isset($default['masaGolLama'])? $default['masaGolLama'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Masa Gol Baru/TMT</th>
                                <th><input type="text" class="form-control" style="width:98%;" name="golBaru" id="golBaru" value="<?=isset($default['masaGolBaru'])? $default['masaGolBaru'] : ""?>"/>
                                </th>
                                <td width="2%" align="center"><font size="6">/</font></td>
                                <th><input type="text" style="width:49%;" class="form-control" name="tmtGolBaru" id="tmtGolBaru" value="<?=isset($default['TMTGolBaru'])? $default['TMTGolBaru'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Kode Bidang Ilmu</th>
                                <th colspan="3">
                                <select class="form-control" name="kodeBidang" value="">
                                        <option value="EKONOMI" <?=isset($default['kodeBidang']) ? (($default['kodeBidang']=='EKONOMI')? 'selected="selected"' : "") : 'selected="selected"';?>>EKONOMI</option>
                                        <option value="HUKUM" <?=isset($default['kodeBidang']) ? (($default['kodeBidang']=='HUKUM')? 'selected="selected"' : "") : "";?>>HUKUM</option>
                                        <option value="KESEHATAN" <?=isset($default['kodeBidang']) ? (($default['kodeBidang']=='KESEHATAN')? 'selected="selected"' : "") : "";?>>KESEHATAN</option>
                                        <option value="PENDIDIKAN" <?=isset($default['kodeBidang']) ? (($default['kodeBidang']=='PENDIDIKAN')? 'selected="selected"' : "") : "";?>>PENDIDIKAN</option>
                                        <option value="PERTANIAN" <?=isset($default['kodeBidang']) ? (($default['kodeBidang']=='PERTANIAN')? 'selected="selected"' : "") : "";?>>PERTANIAN</option>
                                        <option value="SASTRA" <?=isset($default['kodeBidang']) ? (($default['kodeBidang']=='SASTRA')? 'selected="selected"' : "") : "";?>>SASTRA</option>
                                        <option value="SOSIAL" <?=isset($default['kodeBidang']) ? (($default['kodeBidang']=='SOSIAL')? 'selected="selected"' : "") : "";?>>SOSIAL</option>
                                        <option value="TEKNIK" <?=isset($default['kodeBidang']) ? (($default['kodeBidang']=='TEKNIK')? 'selected="selected"' : "") : "";?>>TEKNIK</option>
                                        <option value="LAIN-LAIN" <?=isset($default['kodeBidang']) ? (($default['kodeBidang']=='LAIN-LAIN')? 'selected="selected"' : "") : "";?>>LAIN-LAIN</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Nama Bidang Ilmu</th>
                                <th colspan="3"><input type="text" class="form-control" name="namaBidang" id="namaBidang" value="<?=isset($default['namaBidang'])? $default['namaBidang'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Kredit Sekarang</th>
                                <th colspan="3">
                                    <select class="form-control" style="width:38%;" name="kreSekarang" value="">
                                        <option value ="0"  <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='0')? 'selected="selected"' : "") : 'selected="selected"';?>>0</option>
                                        <option value ="100" <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='100')? 'selected="selected"' : "") : "";?>>100</option>
                                        <option value ="150" <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='150')? 'selected="selected"' : "") : "";?>>150</option>
                                        <option value ="200" <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='200')? 'selected="selected"' : "") : "";?>>200</option>
                                        <option value ="300" <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='300')? 'selected="selected"' : "") : "";?>>300</option>
                                        <option value ="400" <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='400')? 'selected="selected"' : "") : "";?>>400</option>
                                        <option value ="550" <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='550')? 'selected="selected"' : "") : "";?>>550</option>
                                        <option value ="700" <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='700')? 'selected="selected"' : "") : "";?>>700</option>
                                        <option value ="850" <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='850')? 'selected="selected"' : "") : "";?>>850</option>
                                        <option value ="1050" <?=isset($default['kreditSekarang']) ? (($default['kreditSekarang']=='1050')? 'selected="selected"' : "") : "";?>>1050</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Kredit Diusulkan</th>
                                <th colspan="3">
                                    <select class="form-control" style="width:38%;" name="kreDiusulkan" value="">
                                        <option value ="0" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='0')? 'selected="selected"' : "") : 'selected="selected"';?>>0</option>
                                        <option value ="100" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='100')? 'selected="selected"' : "") : "";?>>100</option>
                                        <option value ="150" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='150')? 'selected="selected"' : "") : "";?>>150</option>
                                        <option value ="200" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='200')? 'selected="selected"' : "") : "";?>>200</option>
                                        <option value ="300" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='300')? 'selected="selected"' : "") : "";?>>300</option>
                                        <option value ="400" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='400')? 'selected="selected"' : "") : "";?>>400</option>
                                        <option value ="550" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='550')? 'selected="selected"' : "") : "";?>>550</option>
                                        <option value ="700" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='700')? 'selected="selected"' : "") : "";?>>700</option>
                                        <option value ="850" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='850')? 'selected="selected"' : "") : "";?>>850</option>
                                        <option value ="1050" <?=isset($default['kreditDiusulkan']) ? (($default['kreditDiusulkan']=='1050')? 'selected="selected"' : "") : "";?>>1050</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%"></th>
                                <th colspan="3">
                                    <div class="col-xs-4">    
                                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="tombol_submit">Simpan</button>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="reset" onclick="javascript:history.back()" class="btn btn-primary btn-block btn-flat" value="Batal"/>
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