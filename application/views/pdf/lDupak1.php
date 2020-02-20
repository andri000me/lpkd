<?php
$nilai = 0;
$jumUtama = 0;
$jumPenunjang = 0;
$ketuapenguji1 = "adfsadfsfd";
$tgl = date("d M Y");
$pdf = new MC_Table('P','mm','A4');
$pdf->setTopMargin(15);
$pdf->setLeftMargin(12);
$pdf->SetFont('helvetica','',9);

$pdf->AddPage();
$pdf->SetWidths(array(185));
$pdf->Row(array(
        array("LAMPIRAN III","L")
));$pdf->Row(array(
        array("PERATURAN BERSAMA MENTERI PENDIDIKAN DAN KEBUDAYAAN DAN KEPALA BADAN KEPEGAWAIAN NEGARA  NOMOR: 4/VIII/PB/2014 DAN NOMOR: 24 TAHUN 2014","L")
));$pdf->Row(array(
        array("TENTANG","L")
));$pdf->Row(array(
        array("KETENTUAN PELAKSANAAN PERATURATURAN MENTERI PENDAYAGUNAAN APARATUR NEGARA DAN REFORMASI BIROKRASI NOMOR 17 TAHUN 2013, TENTANG JABATAN FUNGSIONAL DOSEN DAN ANGKA KREDITNYA, SEBAGAIMANA TELAH DIUBAH DENGAN PERATURAN MENTERI PENDAYAGUNAAN APARATUR NEGARA DAN REFORMASI BIROKRASI REPUBLIK INDONESIA NOMOR 46 TAHUN 2013.","L")
));
$pdf->ln(7);
$pdf->SetFont('helvetica','B',11);
$pdf->Cell(185,5,'HASIL PENILAIAN ANGKA KREDIT PTS',0,1,'C');
$pdf->Cell(185,5,'JABATAN AKADEMIK DOSEN',0,1,'C');
$pdf->Cell(185,5,'Nomor :...................................',0,1,'C');
$pdf->ln(7);
$pdf->SetFont('helvetica','B',10);
$pdf->SetWidths(array(40,5,140));
$pdf->Row(array(
        array("INSTANSI","L"),
        array(":","C"),
        array("SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER ASIA MALANG","L")
));
$pdf->Row(array(
        array("MASA PENILAIAN","L"),
        array(":","C"),
        array("","L")
));
$pdf->ln(10);
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("","L"),
        array("KETERANGAN PERORANGAN","C")
));
foreach($profil as $data1) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(10,70,105));
$pdf->Row1(array(
        array("1","C"),
        array("Nama","L"),
        array($data1->nama,"L")
));
$pdf->Row1(array(
        array("2","C"),
        array("NIDN","L"),
        array($data1->nidn,"L")
));
$pdf->Row1(array(
        array("3","C"),
        array("Nomor Seri Kartu Pegawai","L"),
        array($data1->noSeri,"L")
));
$pdf->Row1(array(
        array("4","C"),
        array("Tempat dan Tanggal Lahir","L"),
        array($data1->tempatLahir.", ".$data1->tglLahir,"L")
));
$pdf->Row1(array(
        array("5","C"),
        array("Jenis Kelamin","L"),
        array($data1->jk,"L")
));
$pdf->Row1(array(
        array("6","C"),
        array("Pendidikan yang diperhitungkan angka kreditnya","L"),
        array($data1->pendDiperhitungkan,"L")
));
$pdf->Row1(array(
        array("7","C"),
        array("Jabatan Akademik Dosen/TMT","L"),
        array($data1->jabAkademik."/".$data1->TMTAkademik,"L")
));
$pdf->Row1(array(
        array("8","C"),
        array("Pangkat, golongan, ruang (Inpassing) / TMT","L"),
        array($data1->pangkat."/".$data1->TMTPangkat,"L")
));
$pdf->Row1(array(
        array("9","C"),
        array("Masa kerja golongan lama","L"),
        array($data1->masaGolLama,"L")
));
$pdf->Row1(array(
        array("10","C"),
        array("Masa kerja golongan baru (Inpassing)/ TMT","L"),
        array($data1->masaGolBaru."/".$data1->TMTGolBaru,"L")
));
$pdf->Row1(array(
        array("11","C"),
        array("Unit Kerja","L"),
        array("Sekolah Tinggi Manajemen Informatika dan Komputer ASIA Malang","L")
));}
$pdf->ln(20);
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(10,20,'NO',1,0,'C');
$pdf->Cell(175,5,'UNSUR YANG DINILAI',1,1,'C');
$pdf->setX(22);
$pdf->Cell(70,15,'UNSUR, SUB UNSUR DAN BUTIR KEGIATAN',1,0,'C');
$pdf->Cell(105,5,'ANGKA KREDIT MENURUT',1,1,'C');
$pdf->setX(92);
$pdf->Cell(53,5,'INSTANSI PENGUSUL',1,0,'C');
$pdf->Cell(52,5,'TIM PENILAI',1,1,'C');
$pdf->setX(92);
$pdf->SetWidths(array(17,18,18,17,17,18));
$pdf->Row1(array(
        array("LAMA","C"),
        array("BARU","C"),
        array("JUMLAH","C"),
        array("LAMA","C"),
        array("BARU","C"),
        array("JUMLAH","C")
));
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("I","C"),
        array("PENDIDIKAN","L")
));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("A","C"),
        array("Pendidikan formal","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP1 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Doktor (S3)","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP2 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Magister (S2)","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("B","C"),
        array("Pendidikan dan Pelatihan Prajabatan","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP3 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","L"),
        array("Pendidikan dan Pelatihan Prajabatan Golongan III","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("II","C"),
        array("PELAKSANAAN PENDIDIKAN","L")
));
$pdf->SetFont('helvetica','',8);

$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("A","C"),
        array("Melaksanakan perkuliahan/ tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktek keguruan bengkel/ studio/kebun percobaan/teknologi pengajaran dan praktek lapangan","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP4 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","L"),
        array("Melaksanakan perkulihan/tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di Laboratorium, Praktik Keguruan Bengkel/Studio/ Kebun pada Fakultas/Sekolah Tinggi/Akademi/ Politeknik sendiri, pada fakultas lain dalam lingkungan Universitas/Institut sendiri, maupun di luar perguruan tinggi sendiri secara melembaga paling banyak 12 sks per semester","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("B","C"),
        array("Membimbing seminar","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP5 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","L"),
        array("Membimbing mahasiswa seminar","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("C","C"),
        array("Membing kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan ","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP6 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","L"),
        array("Membimbing mahasiswa kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan ","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("D","C"),
        array("Membimbing dan ikut membimbing dalam menghasilkan disertasi, thesis, skripsi dan laporan akhir studi","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Pembimbing Utama","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP7 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Disertasi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP8 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Tesis","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP9 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("c","C"),
        array("Skripsi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP10 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("d","C"),
        array("Laporan Akhir","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Pembimbing Pembantu/Pendamping","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP11 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Disertasi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP12 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Tesis","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP13 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("c","C"),
        array("Skripsi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP14 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("d","C"),
        array("Laporan Akhir","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("E","C"),
        array("Bertugas sebagai penguji pada ujian akhir","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP15 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Ketua Penguji","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP16 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Anggota Penguji","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("F","C"),
        array("Membina kegiatan mahasiswa","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP17 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","L"),
        array("Melakukan pembinaan kegiatan mahasiswa di bidang Akademik dan kemahasiswaan","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("G","C"),
        array("Mengembangkan program kuliah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
foreach($dataP18 as $rows1) {
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","L"),
        array("Melakukan kegiatan pengembangan program kuliah","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("H","C"),
        array("Mengembangkan bahan pengajaran","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP19 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Buku ajar","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP20 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Diktat, modul, petunjuk praktikum, model, alat bantu, audio visual, naskah tutorial","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("I","C"),
        array("Menyampaikan orasi ilmiah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP21 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","L"),
        array("Melakukan kegiatan orasi ilmiah pada perguruan tinggi tiap tahun ","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("J","C"),
        array("Menduduki jabatan pimpinan perguruan tinggi","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP22 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Rektor","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP23 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Pembantu rektor/dekan/direktur program pasca sarjana","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP24 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("3","C"),
        array("Ketua sekolah tinggi/pembantu dekan/ asisten direktur program pasca sarjana/ direktur politeknik","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP25 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("4","C"),
        array("Pembantu ketua sekolah tinggi/pembantu direktur politeknik","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP26 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("5","C"),
        array("Direktur akademi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP27 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("6","C"),
        array("Pembantu direktur akademi/ketua jurusan /bagian pada Universitas/institut/sekolah tinggi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP28 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("7","C"),
        array("Ketua jurusan pada politeknik/akademi/ sekretaris jurusan/bagian pada universitas/ institut/sekolah tinggi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP29 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("8","C"),
        array("Sekretaris jurusan pada politeknik/ akademik dan kepala laboratorium universitas/institut/sekolah tinggi/politeknik /akademi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("K","C"),
        array("Membimbing Akademik Dosen yang lebih rendah jabatannya","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP30 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Pembimbing pencangkokan","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP31 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Reguler","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("L","C"),
        array("Melaksanakan kegiatan Detasering dan pencangkokan Akademik Dosen","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP32 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Datasering","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP33 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Pencangkokan","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("M","C"),
        array("Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP34 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Lamanya lebih dari 960 jam","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP35 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Lamanya 641-960 jam","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP36 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("3","C"),
        array("Lamanya 481-640 jam","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP37 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("4","C"),
        array("Lamanya 161-480 jam","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP38 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("5","C"),
        array("Lamanya 81-160 jam","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP39 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("6","C"),
        array("Lamanya 31-80 jam","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP40 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("7","C"),
        array("Lamanya 10-30 jam","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
/////PENELITIAN///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("III","C"),
        array("PELAKSANAAN PENELITIAN","L")
));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("A","C"),
        array("Menghasilkan karya ilmiah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Hasil penelitian atau pemikiran yang dipublikasi","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Dalam bentuk","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,5,50,17,18,18,17,17,18));
foreach($dataP41 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("1)","C"),
        array("Monograf","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP42 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("2)","C"),
        array("Buku referensi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Jurnal ilmiah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,5,50,17,18,18,17,17,18));
foreach($dataP43 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("1)","C"),
        array("Internasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP44 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("2)","C"),
        array("Nasional terakreditasi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP45 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("3)","C"),
        array("Tidak terakreditasi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("c","C"),
        array("Seminar","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,5,50,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("1)","C"),
        array("Disajikan tingkat","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
foreach($dataP46 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("a) Internasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP47 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("b) Nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("2)","C"),
        array("Poster tingkat","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
foreach($dataP48 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("a) Internasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP49 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("b) Nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP50 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("d","C"),
        array("Dalam koran/majalah populer/umum","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP51 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Hasil penelitian atau hasil pemikiran yang tidak di publikasikan (tersimpan di perpustakaan perguruan tinggi)","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("B","C"),
        array("Menerjemahkan/menyadur buku ilmiah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP52 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("Diterbitkan dan diedarkan secara nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("C","C"),
        array("Mengedit/menyunting karya ilmiah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP53 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("Diterbitkan dan diedarkan secara nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("D","C"),
        array("Membuat rencana dan karya teknologi yang dipatenkan","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP54 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Internasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP55 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("E","C"),
        array("Membuat rancangan dan karya teknologi, rancangan dan karya seni monumental/seni pertunjukan/karya sastra","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP56 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Tingkat internasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP57 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Tingkat nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP58 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("3","C"),
        array("Tingkat lokal","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
/////PENGABDIAN////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("IV","C"),
        array("PELAKSANAAN PENGABDIAN KEPADA MASYARAKAT","L")
));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("A","C"),
        array("Menduduki jabatan pimpinan","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP59 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("B","C"),
        array("Melaksankan pengembangan hasil pendidikan dan penelitian","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP60 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("Melaksanakan pengembangan hasil pendidikan dan penelitian yang dapat dimanfaatkan oleh masyarakat","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("C","C"),
        array("Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Terjadwal/terprogram","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Dalam satu semester atau lebih","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,5,50,17,18,18,17,17,18));
foreach($dataP61 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("1)","C"),
        array("Tingkat internasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP62 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("2)","C"),
        array("Tingkat Nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP63 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("3)","C"),
        array("Tingkat lokal","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Kurang dari satu semester dan minimal satu bulan","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,5,50,17,18,18,17,17,18));
foreach($dataP64 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("1)","C"),
        array("Tingkat internasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP65 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("2)","C"),
        array("Tingkat Nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP66 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("3)","C"),
        array("Tingkat lokal","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP67 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Insidental","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("D","C"),
        array("Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum pemerintah dan pembangunan","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP68 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Berdasarkan bidang keahlian","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP69 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Berdasarkan penugasan lembaga perguruan tinggi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
foreach($dataP70 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("3","C"),
        array("Berdasarkan fungsi/jabatan","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("E","C"),
        array("Membuat/menulis karya pengabdian","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP71 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Membuat/menulis karya pengabdian pada masyarakat yang tidak dipublikasikan","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumUtama=$jumUtama+$rows1->total;}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(10,70,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("JUMLAH UNSUR UTAMA ","L"),
        array("","C"),
        array($jumUtama,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
/////PENUNJANG////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("VI","C"),
        array("PENUNJANG TUGAS DOSEN","L")
));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("A","C"),
        array("Menjadi anggota dalam suatu Panitia/Badan pada perguruan tinggi","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP72 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Sebagai ketua/wakil ketua merangkap anggota","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP73 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Sebagai anggota","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("B","C"),
        array("Menjadi anggota panitia/badan pada lembaga pemerintah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Panitian pusat","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP74 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Ketua/wakil ketua","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP75 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Anggota","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Panitian daerah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP76 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Ketua/wakil ketua","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP77 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Anggota","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("C","C"),
        array("Menjadi anggota organisasi profesi","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Tingkat innasional","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP78 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Pengurus","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP79 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Anggota atas permintaan","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP80 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("c","C"),
        array("Anggota","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Tingkat nasional","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP81 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Pengurus","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP82 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Anggota atas permintaan","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP83 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("c","C"),
        array("Anggota","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("D","C"),
        array("Mewakili perguruan tinggi/lembaga pemerintah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP84 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("Mewakili perguruan tinggi/lembaga pemerintah duduk dalam panitia antar lembaga","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("E","C"),
        array("Menjadi anggota delegasi nasional ke pertemuan internasional","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP85 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Sebagai ketua delegasi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP86 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Sebagai anggota delegasi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("F","C"),
        array("Berperan serta aktif dalam pertemuan ilmiah","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Tingkat internasional/nasional/regional sebagai:","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP87 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Ketua","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP88 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Anggota","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Di lingkungan perguruan tinggi sebagai:","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP89 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Ketua","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP90 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Anggota","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("G","C"),
        array("Mendapat penghargaan/tanda jasa","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Penghargaan/tanda jasa Satya Lancana Karya Satya","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP91 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("30 (tiga puluh) tahun","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP92 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("20 (dua puluh) tahun","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP93 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("c","C"),
        array("10 (sepuluh) tahun","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Memperoleh penghargaan lainnya","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,5,55,17,18,18,17,17,18));
foreach($dataP94 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("a","C"),
        array("Tingkat internasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP95 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("b","C"),
        array("Tingkat nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP96 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("c","C"),
        array("Tingkat provinsi","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("H","C"),
        array("Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP97 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Buku SLTA atau setingkat","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP98 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Buku SLTP atau setingkat","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP99 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("3","C"),
        array("Buku SD atau setingkat","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("I","C"),
        array("Mempunyai prestasi di bidang olahraga/humaniora","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP100 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("1","C"),
        array("Tingkat internasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP101 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("2","C"),
        array("Tingkat nasional","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
foreach($dataP102 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("3","C"),
        array("Tingkat daerah/lokal","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetWidths(array(10,5,65,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("J","C"),
        array("Keanggotaan dalam tim penilaian","L"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetWidths(array(10,5,5,60,17,18,18,17,17,18));
foreach($dataP103 as $rows1) {
$pdf->Row1(array(
        array("","C"),
        array("","C"),
        array("","C"),
        array("Menjadi anggota tim penilaian  jabatan Akademik Dosen","L"),
        array("","C"),
        array($rows1->total,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$jumPenunjang=$jumPenunjang+$rows1->total;}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(10,70,17,18,18,17,17,18));
$pdf->Row1(array(
        array("","C"),
        array("JUMLAH UNSUR PENUNJANG ","L"),
        array("","C"),
        array($jumPenunjang,"C"),
        array("","C"),
        array("","C"),
        array("","C"),
        array("","C")
));
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("III","C"),
        array("LAMPIRAN PENDUKUNG DUPAK :","L")
));
$pdf->Cell(10,75,'',1,0,'L');
$pdf->Cell(70,75,'',1,0,'L');
$pdf->Cell(105,75,'',1,1,'L');
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("IV","C"),
        array("Catatan Pejabat Pengusul :","L")
));
$pdf->Cell(10,40,'',1,0,'L');
$pdf->Cell(70,40,'',1,0,'L');
$pdf->Cell(105,40,'',1,1,'L');
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("V","C"),
        array("Catatan Anggota Tim Penilai :","L")
));
$pdf->Cell(10,85,'',1,0,'L');
$pdf->Cell(70,85,'',1,0,'L');
$pdf->Cell(105,45,'',1,1,'L');
$pdf->setX(92);
$pdf->Cell(105,40,'',1,1,'L');
$pdf->setY(65);
$pdf->setX(22);
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(5,65));
$pdf->Row(array(
        array("1","C"),
        array("Surat pernyataan telah melaksanakan kegiatan pendidikan dan pengajaran","L")
));
$pdf->setX(22);
$pdf->Row(array(
        array("2","C"),
        array("Surat pernyataan telah melakukan kegiatan penelitian","L")
));
$pdf->setX(22);
$pdf->Row(array(
        array("3","C"),
        array("Surat pernyataan telah melakukan kegiatan pengabdian kepada masyarakat","L")
));
$pdf->setX(22);
$pdf->Row(array(
        array("4","C"),
        array("Surat pernyataan melakukan kegiatan penunjang ","L")
));
$pdf->SetFont('helvetica','',9);
foreach($kajur as $data) {
$pdf->Cell(82);
$pdf->Cell(60,5,'Malang, '.$tgl,0,1,'L');
$pdf->Cell(82);
$pdf->Cell(60,5,'Ketua Program Studi Teknik Informatika,',0,1,'L');
$pdf->ln(20);
$pdf->Cell(82);
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(82,5,$data->nama,0,1,'L');
$pdf->Cell(82);
$pdf->Cell(80,0,'',1,1,'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(82);
$pdf->Cell(60,5,'NIDN.'.$data->nidn,0,1,'L');}

$pdf->ln(10);
foreach($ketua as $data) {
$pdf->Cell(82);
$pdf->Cell(60,5,'Ketua STMIK ASIA MALANG,',0,1,'L');
$pdf->ln(20);
$pdf->Cell(82);
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(82,5,$data->nama,0,1,'L');
$pdf->Cell(82);
$pdf->Cell(80,0,'',1,1,'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(82);
$pdf->Cell(60,5,'NIDN.'.$data->nidn,0,1,'L');}

$pdf->ln(10);
$pdf->Cell(82);
$pdf->Cell(60,5,'Malang, ',0,1,'L');
$pdf->Cell(82);
$pdf->Cell(60,5,'Penilai I,',0,1,'L');
$pdf->ln(20);
$pdf->Cell(82);
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(82,5,'AZWAR RIZA HABIBI, S.Si, M.Si',0,1,'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(82);
$pdf->Cell(60,5,'NIP.',0,1,'L');
$pdf->ln(5);
$pdf->Cell(82);
$pdf->Cell(60,5,'Penilai II,',0,1,'L');
$pdf->ln(20);
$pdf->Cell(82);
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(82,5,'LUKMAN HAKIM, S.Si, M.Si',0,1,'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(82);
$pdf->Cell(60,5,'NIP.',0,1,'L');
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(10,175));
$pdf->Row1(array(
        array("VI","C"),
        array("Catatan Ketua Tim Penilai :","L")
));
$pdf->Cell(10,40,'',1,0,'L');
$pdf->Cell(70,40,'',1,0,'L');
$pdf->Cell(105,40,'',1,1,'L');
$pdf->setY(20);
$pdf->setX(22);
$pdf->ln(5);
$pdf->SetFont('helvetica','',9);
$pdf->Cell(82);
$pdf->Cell(60,5,'Ketua Tim Penilai,',0,1,'L');
$pdf->ln(20);
$pdf->Cell(82);
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(82,5,'VIVI AIDA FITRIA, S.Si, M.Si',0,1,'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(82);
$pdf->Cell(60,5,'NIP. '.$nip,0,1,'L');
$pdf->Output("Dupak_Dosen.pdf","I");
?>