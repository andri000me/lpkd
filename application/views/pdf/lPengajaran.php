<?php
$no=1;
$nilai = 0;
$TotalIA = 0;
$TotalIIA = 0;
$TotalIIB = 0;
$TotalIIC = 0;
$TotalIID = 0;
$TotalIIE = 0;
$TotalIIF = 0;
$TotalIIG = 0;
$TotalIIH = 0;
$TotalIII = 0;
$TotalIIJ = 0;
$TotalIIK = 0;
$TotalIIL = 0;
$TotalIIM = 0;
$tgl = date("d M Y");
$pdf = new MC_Table('P','mm','A4');
$pdf->setTopMargin(15);
$pdf->setLeftMargin(12);
$pdf->SetFont('helvetica','',9);

$pdf->AddPage();
$pdf->SetWidths(array(185));
$pdf->Row(array(
        array("LAMPIRAN IV","L")
));$pdf->Row(array(
        array("PERATURAN BERSAMA MENTERI PENDIDIKAN DAN KEBUDAYAAN DAN KEPALA BADAN KEPEGAWAIAN NEGARA NOMOR: 4/VIII/PB/2014 DAN NOMOR: 24 TAHUN 2014","L")
));$pdf->Row(array(
        array("TENTANG","L")
));$pdf->Row(array(
        array("KETENTUAN PELAKSANAAN PERATURAN MENTERI PENDAYAGUNAAN APARATUR NEGARA DAN REFORMASI BIROKRASI NOMOR 17 TAHUN 2013, TENTANG JABATAN FUNGSIONAL DOSEN DAN ANGKA KREDITNYA, SEBAGAIMANA TELAH DIUBAH DENGAN PERATURAN MENTERI PENDAYAGUNAAN APARATUR NEGARA DAN REFORMASI BIROKRASI REPUBLIK INDONESIA NOMOR 46 TAHUN 2013.","L")
));
$pdf->ln(7);
$pdf->SetFont('helvetica','B',11);
$pdf->Cell(185,5,'SURAT PERNYATAAN',0,1,'C');
$pdf->Cell(185,5,'MELAKSANAKAN PENDIDIKAN',0,1,'C');
$pdf->ln(7);
$pdf->SetFont('helvetica','',9);
foreach($kajur as $data) {
$pdf->Cell(60,5,'Yang bertanda tangan di bawah ini',0,1,'L');
$pdf->Cell(60,5,'Nama',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(125,5,$data->nama,0,1,'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(60,5,'NIDN',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(125,5,$data->nidn,0,1,'L');
$pdf->Cell(60,5,'Jabatan Fungsional/Golongan',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(125,5,$data->jafa.'/'.$data->golongan,0,1,'L');
$pdf->Cell(60,5,'Jabatan',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(125,5,'Ketua Program Studi Teknik Informatika',0,1,'L');
$pdf->Cell(60,5,'Unit Kerja',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(125,5,'Sekolah Tinggi Manajemen Informatika dan Komputer ASIA Malang',0,1,'L');
$pdf->ln(5);
foreach($profil as $data1) {
$pdf->Cell(60,5,'Menyatakan Bahwa',0,1,'L');
$pdf->Cell(60,5,'Nama',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(125,5,$data1->nama,0,1,'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(60,5,'NIDN',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(125,5,$data1->nidn,0,1,'L');
$pdf->Cell(60,5,'Jabatan Fungsional/Golongan',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(125,5,$data->jafa.'/'.$data->golongan,0,1,'L');
$pdf->Cell(60,5,'Unit Kerja',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(125,5,'Sekolah Tinggi Manajemen Informatika dan Komputer ASIA Malang',0,1,'L');
$pdf->ln(10);
$pdf->Cell(60,5,'Telah melaksanakan penelitian sebagai berikut:',0,1,'L');
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("No","C"),
                array("Uraian Kegiatan","C"),
                array("Tanggal","C"),
                array("Satuan Hasil","C"),
                array("Jumlah Volume Kegiatan","C"),
                array("Angka Kredit","C"),
                array("Jumlah Angka Kredit","C"),
                array("Keterangan Bukti Fisik","C")
    ));
$pdf->SetWidths(array(7,178));
    $pdf->Row1(array(
                array("I","C"),
                array("UNSUR PENDIDIKAN","L")
    ));
    $pdf->Row1(array(
                array("A","C"),
                array("PENDIDIKAN","L")
    ));
foreach($CL101 as $dataCL101) {
if ($dataCL101->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("1","C"),
                array("Mengikuti pendidikan formal dan memperoleh gelar/sebutan/ijazah:","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,5,50,20,20,18,15,15,35));
foreach($dataP1 as $rows1) {
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("a. Doktor/sederajat ","L"),
                array($rows1->tglPengajaran,"L"),
                array($rows1->satuanHasil,"C"),
                array($rows1->jumVolumKegiatan,"C"),
                array($rows1->angkaKredit,"C"),
                array($rows1->jumAngkaKredit,"C"),
                array("I.A.1.a/".$rows1->ket,"L")
    ));$TotalIA=$TotalIA+$rows1->jumAngkaKredit;}
foreach($dataP2 as $rows2) {
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("b. Magister/sederajat ","L"),
                array($rows2->tglPengajaran,"L"),
                array($rows2->satuanHasil,"C"),
                array($rows2->jumVolumKegiatan,"C"),
                array($rows2->angkaKredit,"C"),
                array($rows2->jumAngkaKredit,"C"),
                array("I.A.1.b/".$rows2->ket,"L")
    ));$TotalIA=$TotalIA+$rows2->jumAngkaKredit;}
}else{}}
foreach($CL102 as $dataCL102) {
if ($dataCL102->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("2","C"),
                array("Mengikuti diklat prajabatan golongan III","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP3 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("I.A.2/".$no.$rows3->ket,"L")
    ));$no++;$TotalIA=$TotalIA+$rows3->jumAngkaKredit;}
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,50,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("Total I.A","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIA,"C"),
                array("","L")
    ));
$pdf->SetWidths(array(7,178));
    $pdf->Row1(array(
                array("II","C"),
                array("UNSUR PELAKSANAAN PENDIDIKAN","L")
    ));
foreach($CL110 as $dataCL110) {
if ($dataCL110->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("A","C"),
                array("Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing,menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan, bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester):","L")
    ));
foreach($CL203 as $dataCL203) {
if ($dataCL203->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1. Asisten Ahli untuk:","L")
    ));
foreach($CL304 as $dataCL304) {
if ($dataCL304->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1a. beban mengajar 10 sks pertama ","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP4 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.1.a/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIA=$TotalIIA+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL305 as $dataCL305) {
if ($dataCL305->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1b. beban mengajar 2 sks berikutnya ","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP5 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.1.b/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIA=$TotalIIA+$rows3->jumAngkaKredit;}
}else{}}
}else{}}
foreach($CL204 as $dataCL204) {
if ($dataCL204->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2. Lektor/Lektor Kepala/Profesor untuk:","L")
    ));
foreach($CL306 as $dataCL306) {
if ($dataCL306->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2a. beban mengajar 10 sks pertama ","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP6 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.2.a/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIA=$TotalIIA+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL307 as $dataCL307) {
if ($dataCL307->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2b. beban mengajar 2 sks berikutnya ","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP7 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.2.b/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIA=$TotalIIA+$rows3->jumAngkaKredit;}
}else{}}
}else{}}
foreach($CL205 as $dataCL205) {
if ($dataCL205->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("3. Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis","L")
    ));
foreach($CL308 as $dataCL308) {
if ($dataCL308->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("3a. Melakukan pengajaran untuk peserta   pendidikan dokter melalui tindakan medik spesialistik","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP8 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.3.a/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIA=$TotalIIA+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL309 as $dataCL309) {
if ($dataCL309->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("3b. Melakukan pengajaran   Konsultasi spesialis  kepada peserta   pendidikan dokter","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP9 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.3.b/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIA=$TotalIIA+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL310 as $dataCL310) {
if ($dataCL310->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("3c. Melakukan pemeriksaan luar dengan pembimbingan terhadap peserta   pendidikan dokter","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP10 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.3.c/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIA=$TotalIIA+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL311 as $dataCL311) {
if ($dataCL311->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("3d. Melakukan pemeriksaan dalam dengan pembimbingan terhadap peserta   pendidikan dokter","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP11 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.3.d/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIA=$TotalIIA+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL312 as $dataCL312) {
if ($dataCL312->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("3e. Menjadi saksi ahli dengan  pembimbingan terhadap peserta pendidikan dokter","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP12 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.3.e/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIA=$TotalIIA+$rows3->jumAngkaKredit;}
}else{}}
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.A","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIA,"C"),
                array("","L")
    ));
}else{}}
foreach($CL313 as $dataCL313) {
if ($dataCL313->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("B","C"),
                array("Membimbing seminar mahasiswa (setiap semester)","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP13 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.B/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIB=$TotalIIB+$rows3->jumAngkaKredit;}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.B","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIB,"C"),
                array("","L")
    ));
}else{}}
foreach($CL314 as $dataCL314) {
if ($dataCL314->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("C","C"),
                array("Membimbing KKN, Praktik Kerja Nyata, Praktik Kerja Lapangan (setiap semester)","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP14 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.C/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIC=$TotalIIC+$rows3->jumAngkaKredit;}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.C","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIC,"C"),
                array("","L")
    ));
}else{}}
foreach($CL103 as $dataCL103) {
if ($dataCL103->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("D","C"),
                array("Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi yang sesuai bidang penugasannya:","L")
    ));
foreach($CL201 as $dataCL201) {
if ($dataCL201->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1. Pembimbing Utama per orang (setiap mahasiswa): ","L")
    ));
foreach($CL315 as $dataCL315) {
if ($dataCL315->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1a. Disertasi","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP15 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.D.1.a/".$no.$rows3->ket,"L")
    ));$no++;$TotalIID=$TotalIID+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL316 as $dataCL316) {
if ($dataCL316->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1b. Tesis","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP16 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.D.1.b/".$no.$rows3->ket,"L")
    ));$no++;$TotalIID=$TotalIID+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL317 as $dataCL317) {
if ($dataCL317->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1c. Skripsi ","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP17 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.D.1.c/".$no.$rows3->ket,"L")
    ));$no++;$TotalIID=$TotalIID+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL318 as $dataCL318) {
if ($dataCL318->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1d. Laporan Akhir","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP18 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.D.1.d/".$no.$rows3->ket,"L")
    ));$no++;$TotalIID=$TotalIID+$rows3->jumAngkaKredit;}
}else{}}
}else{}}
foreach($CL202 as $dataCL202) {
if ($dataCL202->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2. Pembimbing Pendamping/Pembantu per orang (setiap mahasiswa):","L")
    ));
foreach($CL319 as $dataCL319) {
if ($dataCL319->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2a. Disertasi","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP19 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.D.2.a/".$no.$rows3->ket,"L")
    ));$no++;$TotalIID=$TotalIID+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL320 as $dataCL320) {
if ($dataCL320->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2b. Tesis","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP20 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.D.2.b/".$no.$rows3->ket,"L")
    ));$no++;$TotalIID=$TotalIID+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL321 as $dataCL321) {
if ($dataCL321->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2c. Skripsi ","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP21 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.D.2.c/".$no.$rows3->ket,"L")
    ));$no++;$TotalIID=$TotalIID+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL322 as $dataCL322) {
if ($dataCL322->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2d. Laporan Akhir","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP22 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.D.2.d/".$no.$rows3->ket,"L")
    ));$no++;$TotalIID=$TotalIID+$rows3->jumAngkaKredit;}
}else{}}
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.D","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIID,"C"),
                array("","L")
    ));
}else{}}
foreach($CL104 as $dataCL104) {
if ($dataCL104->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("E","C"),
                array("Bertugas sebagai penguji pada ujian akhir/Profesi*** (setiap mahasiswa):","L")
    ));
foreach($CL323 as $dataCL323) {
if ($dataCL323->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1. Ketua Penguji","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP23 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.E.1/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIE=$TotalIIE+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL324 as $dataCL324) {
if ($dataCL324->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2. Anggota penguji","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP24 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.E.2/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIE=$TotalIIE+$rows3->jumAngkaKredit;}
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.E","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIE,"C"),
                array("","L")
    ));
}else{}}
foreach($CL325 as $dataCL325) {
if ($dataCL325->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("F","C"),
                array("Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik (setiap semester)","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP25 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.F/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIF=$TotalIIF+$rows3->jumAngkaKredit;}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.F","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIF,"C"),
                array("","L")
    ));
}else{}}
foreach($CL326 as $dataCL326) {
if ($dataCL326->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("G","C"),
                array("Mengembangkan program kuliah yang mempunyai nilai kebaharuan metode atau substansi (setiap produk) ","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP26 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.G/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIG=$TotalIIG+$rows3->jumAngkaKredit;}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.G","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIG,"C"),
                array("","L")
    ));
}else{}}
foreach($CL105 as $dataCL105) {
if ($dataCL105->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("H","C"),
                array("Mengembangkan bahan pengajaran/ bahan kuliah yang mempunyai nilai kebaharuan  (setiap produk),","L")
    ));
foreach($CL327 as $dataCL327) {
if ($dataCL327->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1. Buku ajar","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP27 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.H.1/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIH=$TotalIIH+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL328 as $dataCL328) {
if ($dataCL328->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2. Diktat,Modul, Petunjuk praktikum, Model, Alat bantu, Audio visual, Naskah tutorial, Job sheet praktikum terkait dengan mata kuliah yang diampu","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP28 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.H.2/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIH=$TotalIIH+$rows3->jumAngkaKredit;}
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.H","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIH,"C"),
                array("","L")
    ));
}else{}}
foreach($CL329 as $dataCL329) {
if ($dataCL329->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("I","C"),
                array("Menyampaikan orasi ilmiah di tingkat perguruan tinggi","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP29 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.I/".$no.$rows3->ket,"L")
    ));$no++;$TotalIII=$TotalIII+$rows3->jumAngkaKredit;}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.I","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIII,"C"),
                array("","L")
    ));
}else{}}
foreach($CL106 as $dataCL106) {
if ($dataCL106->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("J","C"),
                array("Menduduki jabatan pimpinan perguruan tinggi (setiap semester):","L")
    ));
foreach($CL330 as $dataCL330) {
if ($dataCL330->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1. Rektor","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP30 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.J.1/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIJ=$TotalIIJ+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL331 as $dataCL331) {
if ($dataCL331->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2. Wakil rektor/dekan/direktur program pasca sarjana/ketua lembaga","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP31 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.J.2/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIJ=$TotalIIJ+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL332 as $dataCL332) {
if ($dataCL332->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("3. Ketua sekolah tinggi/pembantu dekan/asisten direktur program pasca sarjana/direktur politeknik/koordinator kopertis","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP32 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.J.3/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIJ=$TotalIIJ+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL333 as $dataCL333) {
if ($dataCL333->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("4. Pembantu ketua sekolah tinggi/pembantu direktur politeknik","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP33 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.J.4/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIJ=$TotalIIJ+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL334 as $dataCL334) {
if ($dataCL334->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("5. Direktur akademi","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP34 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.J.5/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIJ=$TotalIIJ+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL335 as $dataCL335) {
if ($dataCL335->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("6. Pembantu direktur politeknik, ketua jurusan/ bagian pada universitas/ institut/sekolah tinggi","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP35 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.J.6/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIJ=$TotalIIJ+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL336 as $dataCL336) {
if ($dataCL336->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("7. Pembantu direktur akademi/ketua jurusan/ketua prodi pada universitas/politeknik/akademi, sekretaris jurusan/bagian pada universitas/institut/sekolah tinggi","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP36 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.J.7/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIJ=$TotalIIJ+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL337 as $dataCL337) {
if ($dataCL337->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("8. Sekretaris jurusan pada politeknik/akademi dan kepala laboratorium (bengkel) universitas/institut/sekolah tinggi/politeknik/akademi","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP37 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.J.8/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIJ=$TotalIIJ+$rows3->jumAngkaKredit;}
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.J","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIJ,"C"),
                array("","L")
    ));
}else{}}
foreach($CL107 as $dataCL107) {
if ($dataCL107->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("K","C"),
                array("Membimbing dosen yang mempunyai jabatan akademik lebih rendah setiap semester (bagi dosen Lektor Kepala ke atas): ","L")
    ));
foreach($CL338 as $dataCL338) {
if ($dataCL338->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1. Pembimbing pencangkokan ","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP38 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.K.1/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIK=$TotalIIK+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL339 as $dataCL339) {
if ($dataCL339->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2. Reguler","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP39 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.K.2/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIK=$TotalIIK+$rows3->jumAngkaKredit;}
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.K","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIK,"C"),
                array("","L")
    ));
}else{}}
foreach($CL108 as $dataCL108) {
if ($dataCL108->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("L","C"),
                array("Melaksanakan kegiatan detasering dan pencangkokan di luar institusi tempat bekerja setiap semester (bagi dosen Lektor kepala ke atas):","L")
    ));
foreach($CL340 as $dataCL340) {
if ($dataCL340->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1. Datasering","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP40 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.L.1/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIL=$TotalIIL+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL341 as $dataCL341) {
if ($dataCL341->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2. Pencangkokan","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP41 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.L.2/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIL=$TotalIIL+$rows3->jumAngkaKredit;}
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.L","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIL,"C"),
                array("","L")
    ));
}else{}}
foreach($CL109 as $dataCL109) {
if ($dataCL109->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("M","C"),
                array("Melaksanakan pengembangan diri untuk meningkatkan kompetensi:","L")
    ));
foreach($CL342 as $dataCL342) {
if ($dataCL342->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("1. Lamanya lebih dari 960 jam","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP42 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.M.1/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIM=$TotalIIM+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL343 as $dataCL343) {
if ($dataCL343->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("2. Lamanya antara  641- 960 jam","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP43 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.M.2/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIM=$TotalIIM+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL344 as $dataCL344) {
if ($dataCL344->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("3. Lamanya antara 481- 640 jam","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP44 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.M.3/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIM=$TotalIIM+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL345 as $dataCL345) {
if ($dataCL345->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("4. Lamanya antara 161- 480 jam","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP45 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.M.4/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIM=$TotalIIM+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL346 as $dataCL346) {
if ($dataCL346->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("5. Lamanya antara   81- 160 jam","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP46 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.M.5/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIM=$TotalIIM+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL347 as $dataCL347) {
if ($dataCL347->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("6. Lamanya antara 30 - 80 jam","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP47 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.M.6/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIM=$TotalIIM+$rows3->jumAngkaKredit;}
}else{}}
foreach($CL348 as $dataCL348) {
if ($dataCL348->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("7. Lamanya antara 10 - 30 jam","L")
    ));
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
foreach($dataP48 as $rows3) {
    $pdf->Row1(array(
                array("","C"),
                array($rows3->uraian,"L"),
                array($rows3->tglPengajaran,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->jumVolumKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.M.7/".$no.$rows3->ket,"L")
    ));$no++;$TotalIIM=$TotalIIM+$rows3->jumAngkaKredit;}
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total II.M","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($TotalIIM,"C"),
                array("","L")
    ));
}else{}}
$pdf->SetFont('helvetica','',9);
$pdf->ln(10);
$pdf->SetWidths(array(185));
$pdf->Row(array(
        array("Demikian pernyataan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.","L")
));
$pdf->ln(10);
$pdf->Cell(125);
$pdf->Cell(60,5,'Malang, '.$tgl,0,1,'L');
$pdf->Cell(125);
$pdf->Cell(60,5,'Ketua Program Studi Teknik Informatika,',0,1,'L');
$pdf->ln(20);
$pdf->Cell(125);
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(60,5,$data->nama,0,1,'L');
$pdf->Cell(125);
$pdf->Cell(60,0,'',1,1,'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(125);
$pdf->Cell(60,5,'NIDN. '.$data->nidn,0,1,'L');
}}
$pdf->Output("Pengajaran_Dosen.pdf","I");
?>