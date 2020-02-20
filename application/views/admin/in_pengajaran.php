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
    function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
    }
    function hanyaHuruf(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90))
 
            return false;
          return true;
    }
    function hanyaHurufAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 32 && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90) && (charCode < 47 || charCode > 57))
 
            return false;
          return true;
    }
    function hanyaAngkaKoma(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if ((charCode < 46 || charCode > 46) && charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
    }
  $(function() {
    // $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
  });
</script>
<script type="text/javascript">
 function validasi_input(form){
  if (form.judul.value == ""){
    alert("Nama Pengajaran masih kosong!");
    form.judul.focus();
    return (false);
  }
  if (form.tglPenelitian.value == ""){
    alert("Tanggal Pengajaran masih kosong!");
    form.tglPenelitian.focus();
    return (false);
  }
  if (form.satHasil.value == ""){
    alert("Satuan Hasil Pengajaran masih kosong!");
    form.satHasil.focus();
    return (false);
  }
  if (form.volKegiatan.value == ""){
    alert("Jumlah volume kegiatan masih kosong!");
    form.volKegiatan.focus();
    return (false);
  }
  if (form.angkaKredit.value == ""){
    alert("Angka Kredit Pengajaran masih kosong!");
    form.angkaKredit.focus();
    return (false);
  }
  if (form.jumKredit.value == ""){
    alert("Jumlah kredit Pengajaran masih kosong!");
    form.jumKredit.focus();
    return (false);
  }
  if (form.ket.value == ""){
    alert("Keterangan Pengajaran masih kosong!");
    form.ket.focus();
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
                    <h3 class="box-title"> Data Pengajaran Dosen</h3>
                    
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
                        <table border="0" width="100%">
                            <tr>
                                <th width="15%" height="150px"></th>
                                <td width="17%" valign="top"><b>Jenis Kegiatan</b></td>
                                <th>
                                    <select class="form-control" name="kegiatan" id="kegiatan" >
                                        <option value="">-Please Select-</option>
                                        <?php foreach($bagian->result() as $row):?>
                                            <option value="<?php echo $row->idLv1;?>" <?=isset($default['idLv1']) ? (($default['idLv1']==$row->idLv1)? 'selected="selected"' : "") : "";?>><?php echo $row->namaKegiatanLv1?></option>
                                        <?php endforeach;?>
                                    </select><br>
                                    <select name="subkategori" id="subkategori" class="subkategori form-control">
                                        <option value="0">-Please Select-</option>
                                        <?php foreach($bag1 as $row_kota)   {   ?>
                                        <option value="<?php echo $row_kota->idLv2?>" class="<?php echo $row_kota->idLv1; ?>"<?=isset($default['idLv2']) ? (($default['idLv2']==$row_kota->idLv2)? 'selected="selected"' : "") : "";?>> <?php echo $row_kota->namaKegiatanLv2?></option>
                                        <?php } ?>
                                    </select><br>
                                    <select name="subkategori2" id="subkategori2" class="subkategori2 form-control">
                                        <option value="0">-Please Select-</option>
                                        <?php foreach($bag2 as $row_kota2)   {   ?>
                                        <option value="<?php echo $row_kota2->idLv3?>" class="<?php echo $row_kota2->idLv2; ?>"<?=isset($default['idLv3']) ? (($default['idLv3']==$row_kota2->idLv3)? 'selected="selected"' : "") : "";?>> <?php echo $row_kota2->namaKegiatanLv3?></option>
                                        <?php } ?>
                                    </select>
                                    
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <td width="17%" valign="top"><b>Judul Pengajaran</b></td>
                                <th>
                                    <textarea placeholder="Judul kegiatan pend & pengajaran" name="judul" id="judul" style="width: 70%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=isset($default['uraian'])? $default['uraian'] : ""?></textarea>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Masa Pengajaran</th>
                                <th><input type="text" title="Ex. 1 Januari 2018 or Semester Genap 2018/2019" placeholder="Ex. 1 Januari 2018 or Semester Genap 2018/2019" onkeypress="return hanyaHurufAngka(event)" class="form-control" name="tglPenelitian" id="tglPenelitian" value="<?=isset($default['tglPengajaran'])? $default['tglPengajaran'] : ""?>"/>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Satuan Hasil</th>
                                <th><input type="text" onkeypress="return hanyaHurufAngka(event)" class="form-control" name="satHasil" id="satHasil" value="<?=isset($default['satuanHasil'])? $default['satuanHasil'] : ""?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Volume Kegiatan</th>
                                <th><input type="text" onkeypress="return hanyaAngka(event)" class="form-control" style="width: 40%;" name="volKegiatan" id="volKegiatan" value="<?=isset($default['jumVolumKegiatan'])? $default['jumVolumKegiatan'] : "0"?>"/>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Angka Kredit</th>
                                <th><input type="text" onkeypress="return hanyaAngkaKoma(event)" class="form-control" style="width: 40%;" name="angkaKredit" id="angkaKredit" value="<?=isset($default['angkaKredit'])? $default['angkaKredit'] : "0"?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <th width="17%">Jumlah Angka Kredit</th>
                                <th><input type="text" readonly  class="form-control" style="width: 40%;" name="jumKredit" id="jumKredit" value="<?=isset($default['jumAngkaKredit'])? $default['jumAngkaKredit'] : "0"?>"/></th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <td width="17%" valign="top"><b>Keterangan</b></td>
                                <th>
                                    <textarea placeholder="Keterangan" name="ket" id="ket" style="width: 70%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=isset($default['ket'])? $default['ket'] : ""?></textarea>
                                </th>
                                <th width="15%"></th>
                            </tr>
                            <tr>
                                <th width="15%" height="50px"></th>
                                <td width="17%" valign="top"><b></b></td>
                                <th>
                                    <div class="form-group">
                                    <label for="berkas">File Penunjang</label>
                                      <input type="file" name="berkas" id="berkas" accept=".pdf" >

                                      <p class="help-block">File penunjang hanya boleh berekstensi .pdf.</p>
                                    </div>
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

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.chained.min.js"></script>
<script type="text/javascript">            
    $("#subkategori").chained("#kegiatan");            
    $("#subkategori2").chained("#subkategori");
    $(document).ready(function(){
        $('#angkaKredit').keyup(function(){
     
                <!-- Perhitungan bayar-(diskon/100 x bayar) !-->
                if ($('#angkaKredit').val() == null) 
                    {
                        var total_kredit="0";
                    }else{
                        var total_kredit=$('#volKegiatan').val() * $('#angkaKredit').val();
                    };
                $('#jumKredit').val(total_kredit);
                });
        $('#volKegiatan').keyup(function(){
     
                <!-- Perhitungan bayar-(diskon/100 x bayar) !-->
                if ($('#volKegiatan').val() == null) 
                    {
                        var total_kredit="0";
                    }else{
                        var total_kredit=$('#volKegiatan').val() * $('#angkaKredit').val();
                    };
                $('#jumKredit').val(total_kredit);
                });
    //     $('#kegiatan').change(function(){
    //         var id=$(this).val();
    //         $.ajax({
    //             url : "<?php echo base_url();?>index.php/Auth/get_subkategoriPenelitian",
    //             method : "POST",
    //             data : {id: id},
    //             async : false,
    //             dataType : 'json',
    //             success: function(data){
    //                 var html = '';
    //                 var i;
    //                 for(i=0; i<data.length; i++){
    //                     html += '<option value = '+data[i].idLv2 +'>'+data[i].namaKegiatanLv2+'</option>';

    //                 }
    //                 $('.subkategori').html(html);
                     
    //             }
    //         });
    //     });
    //         var id=$("#kegiatan").val();
    //         $.ajax({
    //             url : "<?php echo base_url();?>index.php/Auth/get_subkategoriPenelitian",
    //             method : "POST",
    //             data : {id: id},
    //             async : false,
    //             dataType : 'json',
    //             success: function(data){
    //                 var html = '';
    //                 var i;
    //                 for(i=0; i<data.length; i++){
    //                     $bag1 = data[i].idBag1;
    //                     html += '<option value = '+data[i].idLv2 +'>'+data[i].namaKegiatanLv2+'</option>';
    //                     // console.log(data[i].idBag1);
    //                 }
    //                 $('#subkategori').html(html);
    //             }
    //         });
    // });
    // $(document).ready(function(){
    //     $('#subkategori').change(function(){
    //         var id=$(this).val();
    //         $.ajax({
    //             url : "<?php echo base_url();?>index.php/Auth/get_subkategoriPenelitian1",
    //             method : "POST",
    //             data : {id: id},
    //             async : false,
    //             dataType : 'json',
    //             success: function(data){
    //                 var html = '';
    //                 var i;
    //                 for(i=0; i<data.length; i++){
    //                     html += '<option value = '+data[i].idLv3 +'>'+data[i].namaKegiatanLv3+'</option>';
    //                 }
    //                 $('.subkategori2').html(html);
                     
    //             }
    //         });
    //     });
    //         var id=$("#kegiatan").val();
    //         $.ajax({
    //             url : "<?php echo base_url();?>index.php/Auth/get_subkategoriPenelitian1",
    //             method : "POST",
    //             data : {id: id},
    //             async : false,
    //             dataType : 'json',
    //             success: function(data){
    //                 var html = '';
    //                 var i;
    //                 for(i=0; i<data.length; i++){
    //                     $bag1 = data[i].idBag1;
    //                     html += '<option value = '+data[i].idLv3 +'>'+data[i].namaKegiatanLv3+'</option>';
    //                     // console.log(data[i].idBag1);
    //                 }
    //                 $('#subkategori2').html(html);
    //             }
    //         });
    });
</script>

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