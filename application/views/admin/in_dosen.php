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
    function hanyaHuruf(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 32 && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90) && (charCode < 44 || charCode > 46))
 
            return false;
          return true;
    }
    function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
    }
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>
 <script type="text/javascript">
 function validasi_input(form){
  if (form.nidn.value == ""){
    alert("NIDN Dosen masih kosong!");
    form.nidn.focus();
    return (false);
  }
  if (form.nama.value == ""){
    alert("Nama Dosen masih kosong!");
    form.nama.focus();
    return (false);
  }if (form.noSeri.value == ""){
    alert("No seri Dosen masih kosong!");
    form.noSeri.focus();
    return (false);
  }
  if (form.tempat.value == ""){
    alert("Tempat Lahir Dosen masih kosong!");
    form.tempat.focus();
    return (false);
  }
  if (form.datepicker.value == ""){
    alert("Tanggal Lahir Dosen masih kosong!");
    form.datepicker.focus();
    return (false);
  }if (form.telp.value == ""){
    alert("No Telepon Dosen masih kosong!");
    form.telp.focus();
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
                    <h3 class="box-title"><?=$tipe?> Data Dosen</h3>
                    
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
                        <table border="0" width="100%" >
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">NIDN</th>
                                <th><input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="nidn" id="nidn" value="<?=isset($default['nidn'])? $default['nidn'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Nama Dosen</th>
                                <th><input type="text" onkeypress="return hanyaHuruf(event)" class="form-control" name="nama" id="nama" value="<?=isset($default['nama'])? $default['nama'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">No Seri Dosen</th>
                                <th><input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="noSeri" id="noSeri" value="<?=isset($default['noSeri'])? $default['noSeri'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Tempat Lahir</th>
                                <th><input type="text" onkeypress="return hanyaHuruf(event)" class="form-control" name="tempat" id="tempat" value="<?=isset($default['tempatLahir'])? $default['tempatLahir'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Tanggal Lahir</th>
                                <th>
                                <input type="text" id="datepicker" class="form-control" name="tgl" value="<?=isset($default['tglLahir'])? $default['tglLahir'] : ""?>"/>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Jenis Kelamin</th>
                                <th>
                                    <form>
                                        <input type="radio" name="sex" value="Laki-Laki" <?=isset($default['jk']) ? (($default['jk']=='Laki-Laki')? 'checked="true"' : "") : 'checked="true"';?>/>&nbsp;Laki-Laki &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="sex" value="Perempuan" <?=isset($default['jk']) ? (($default['jk']=='Perempuan')? 'checked="true"' : "") : "";?>/>&nbsp;Perempuan
                                    </form>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">No Telp</th>
                                <th><input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="telp" id="telp" value="<?=isset($default['noTelp'])? $default['noTelp'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Dosen Prodi</th>
                                <th>
                                    <select class="form-control" name="prodi">
                                        <option value="DKV" <?=isset($default['prodi']) ? (($default['prodi']=='DKV')? 'selected="selected"' : "") : 'selected="selected"';?>>Desain Komunikasi Visual</option>
                                        <option value="SK" <?=isset($default['prodi']) ? (($default['prodi']=='SK')? 'selected="selected"' : "") : "";?>>Sistem Komputer</option>
                                        <option value="TI" <?=isset($default['prodi']) ? (($default['prodi']=='TI')? 'selected="selected"' : "") : "";?>>Teknik Informatika</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Status Dosen</th>
                                <th>
                                    <select class="form-control" name="status" required="required">
                                        <option value ="Dosen Tetap Yayasan" <?=isset($default['statusDosen']) ? (($default['statusDosen']=='Dosen Tetap Yayasan')? 'selected="selected"' : "") : 'selected="selected"';?>>Dosen Tetap Yayasan</option>
                                        <option value ="Dosen PNS DPK" <?=isset($default['statusDosen']) ? (($default['statusDosen']=='Dosen PNS DPK')? 'selected="selected"' : "") : "";?>>Dosen PNS DPK</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Jabatan Fungsional</th>
                                <th>
                                    <select class="form-control" name="jafa" >
                                        <option value="--" <?=isset($default['jafa']) ? (($default['jafa']=='--')? 'selected="selected"' : "") : 'selected="selected"';?>>Tidak Punya</option>
                                        <option value="Asisten Ahli" <?=isset($default['jafa']) ? (($default['jafa']=='Asisten Ahli')? 'selected="selected"' : "") : "";?>>Asisten Ahli</option>
                                        <option value="Lektor" <?=isset($default['jafa']) ? (($default['jafa']=='Lektor')? 'selected="selected"' : "") : "";?>>Lektor</option>
                                        <option value="Lektor Kepala" <?=isset($default['jafa']) ? (($default['jafa']=='Lektor Kepala')? 'selected="selected"' : "") : "";?>>Lektor Kepala</option>
                                        <option value="Profesor" <?=isset($default['jafa']) ? (($default['jafa']=='Profesor')? 'selected="selected"' : "") : "";?>>Profesor</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Golongan</th>
                                <th>
                                    <select class="form-control" name="golongan" >
                                        <option value="Pembina Utama-IV e" <?=isset($default['golongan']) ? (($default['golongan']=='Pembina Utama-IV e')? 'selected="selected"' : "") : 'selected="selected"';?>>Pembina Utama-IV e</option>
                                        <option value="Pembina Utama Madya-IV d" <?=isset($default['golongan']) ? (($default['golongan']=='Pembina Utama Madya-IV d')? 'selected="selected"' : "") : "";?>>Pembina Utama Madya-IV d</option>
                                        <option value="Pembina Utama Muda-IV c" <?=isset($default['golongan']) ? (($default['golongan']=='Pembina Utama Muda-IV c')? 'selected="selected"' : "") : "";?>>Pembina Utama Muda-IV c</option>
                                        <option value="Pembina Tingkat I-IV b" <?=isset($default['golongan']) ? (($default['golongan']=='Pembina Tingkat I-IV b')? 'selected="selected"' : "") : "";?>>Pembina Tingkat I-IV b</option>
                                        <option value="Pembina-IV a" <?=isset($default['golongan']) ? (($default['golongan']=='Pembina-IV a')? 'selected="selected"' : "") : "";?>>Pembina-IV a</option>
                                        <option value="Penata Tingkat I-III d" <?=isset($default['golongan']) ? (($default['golongan']=='Penata Tingkat I-III d')? 'selected="selected"' : "") : "";?>>Penata Tingkat I-III d</option>
                                        <option value="Penata-III c" <?=isset($default['golongan']) ? (($default['golongan']=='Penata-III c')? 'selected="selected"' : "") : "";?>>Penata-III c</option>
                                        <option value="Penata Muda Tingkat I-III b" <?=isset($default['golongan']) ? (($default['golongan']=='Penata Muda Tingkat I-III b')? 'selected="selected"' : "") : "";?>>Penata Muda Tingkat I-III b</option>
                                        <option value="Penata Muda-III a" <?=isset($default['golongan']) ? (($default['golongan']=='Penata Muda-III a')? 'selected="selected"' : "") : "";?>>Penata Muda-III a</option>
                                        <option value="--" <?=isset($default['golongan']) ? (($default['golongan']=='--')? 'selected="selected"' : "") : "";?>>Lain-Lain</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Jabatan Struktural</th>
                                <th>
                                    <select class="form-control" name="jabatan" >
                                        <option value="KAPRODI" <?=isset($default['jabatan']) ? (($default['jabatan']=='KAPRODI')? 'selected="selected"' : "") : 'selected="selected"';?>>KAPRODI</option>
                                        <option value="KETUA" <?=isset($default['jabatan']) ? (($default['jabatan']=='KETUA')? 'selected="selected"' : "") : "";?>>KETUA</option>
                                        <option value="WAKIL KETUA I" <?=isset($default['jabatan']) ? (($default['jabatan']=='WAKIL KETUA I')? 'selected="selected"' : "") : "";?>>WAKIL KETUA I</option>
                                        <option value="WAKIL KETUA II" <?=isset($default['jabatan']) ? (($default['jabatan']=='WAKIL KETUA II')? 'selected="selected"' : "") : "";?>>WAKIL KETUA II</option>
                                        <option value="WAKIL KETUA III" <?=isset($default['jabatan']) ? (($default['jabatan']=='WAKIL KETUA III')? 'selected="selected"' : "") : "";?>>WAKIL KETUA III</option>
                                        <option value="DOSEN" <?=isset($default['jabatan']) ? (($default['jabatan']=='DOSEN')? 'selected="selected"' : "") : "";?>>DOSEN</option>
                                    </select>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="15%">Pengguna</th>
                                <th>
                                    <select class="form-control" name="bagian">
                                        <option value="Admin" <?=isset($default['pengguna']) ? (($default['pengguna']=='Admin')? 'selected="selected"' : "") : 'selected="selected"';?>>Admin</option>
                                        <option value="User" <?=isset($default['pengguna']) ? (($default['pengguna']=='User')? 'selected="selected"' : "") : "";?>>User</option>
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
                                        <input type="reset" onclick="javascript:history.back()" class="btn btn-primary btn-block btn-flat" value="Batal"/>
                                        <!-- <button type="reset" onclick="javascript:history.back()"  class="btn btn-primary btn-block btn-flat" name="tombol_reset">Batal</button> -->
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