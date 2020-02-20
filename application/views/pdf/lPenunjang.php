<?php
$tgl = date("d M Y");
$pdf = new MC_Table('P','mm','A4');
$pdf->setTopMargin(15);
$pdf->setLeftMargin(12);
$pdf->SetFont('helvetica','',9);

$pdf->AddPage();
$pdf->SetWidths(array(185));
$pdf->Row(array(
        array("LAMPIRAN VII","L")
));$pdf->Row(array(
        array("PERATURAN BERSAMA MENTERI PENDIDIKAN DAN KEBUDAYAAN DAN KEPALA BADAN KEPEGAWAIAN NEGARA NOMOR: 4/VIII/PB/2014 DAN NOMOR: 24 TAHUN 2014","L")
));$pdf->Row(array(
        array("TENTANG","L")
));$pdf->Row(array(
        array("KETENTUAN PELAKSANAAN PERATURAN MENTERI PENDAYAGUNAAN APARATUR NEGARA DAN REFORMASI BIROKRASI NOMOR 17 TAHUN 2013, TENTANG JABATAN FUNGSIONAL DOSEN DAN ANGKA KREDITNYA, SEBAGAIMANA TELAH DIUBAH DENGAN PERATURAN MENTERI PENDAYAGUNAAN APARATUR NEGARA DAN REFORMASI BIROKRASI REPUBLIK INDONESIA NOMOR 46 TAHUN 2013","L")
));
$pdf->ln(7);
$pdf->SetFont('helvetica','B',11);
$pdf->Cell(185,5,'SURAT PERNYATAAN',0,1,'C');
$pdf->Cell(185,5,'MELAKSANAKAN PENUNJANG TUGAS DOSEN',0,1,'C');
$pdf->ln(7);
$pdf->SetFont('helvetica','',9);
foreach($kajur as $data) {
    if ($data->prodi=="TI") {
        $prodi = "Teknik Informatika";
    }elseif ($data->prodi=="SK") {
        $prodi = "Sistem Komputer";
    }else{
        $prodi = "Desain Komunikasi Visual";
    }
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
$pdf->Cell(125,5,'Ketua Program Studi '.$prodi,0,1,'L');
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
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
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
    $pdf->Row1(array(
                array("VI","C"),
                array("Penunjang Dosen","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array("","C"),
                array("","C"),
                array("","C")
    ));
foreach($A1TA as $dataA1TA) {
if ($dataA1TA->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'A',1,0,'L');
$pdf->Cell(173,5,'Menjadi anggota dalam suatu Panitia/Badan  pada Perguruan Tinggi ',1,1,'L');
foreach($A1T as $dataA1T) {
if ($dataA1T->id1 > 0) {
    # code...
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Sebagai Ketua/Wakil Ketua merangkap Anggota, tiap tahun ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($A1 as $dataA1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataA1->namaKegiatan,"L"),
                array($dataA1->tglKegiatan,"L"),
                array($dataA1->satuanHasil,"C"),
                array($dataA1->jumVolumKegiatan,"C"),
                array($dataA1->angkaKredit,"C"),
                array($dataA1->jumAngkaKredit,"C"),
                array($dataA1->ket,"L")
    ));}
}else{}}
foreach($A2T as $dataA2T) {
if ($dataA2T->id2 > 0) {
    # code...
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Sebagai Anggota, tiap tahun ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($A2 as $dataA2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataA2->namaKegiatan,"L"),
                array($dataA2->tglKegiatan,"L"),
                array($dataA2->satuanHasil,"C"),
                array($dataA2->jumVolumKegiatan,"C"),
                array($dataA2->angkaKredit,"C"),
                array($dataA2->jumAngkaKredit,"C"),
                array($dataA2->ket,"L")
    ));}
}else{}}
}else{}}
$pdf->SetFont('helvetica','B',8);

foreach($B1TB as $dataB1TB) {
if ($dataB1TB->id1B > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'B',1,0,'L');
$pdf->Cell(173,5,'Menjadi anggota panitia/badan pada lembaga  pemerintah ',1,1,'L');
foreach($B1T as $dataB1T) {
if ($dataB1T->id3 > 0) {
    # code...
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Panitia Pusat sebagai Ketua/Wakil Ketua, tiap kepanitiaan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($B1 as $dataB1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataB1->namaKegiatan,"L"),
                array($dataB1->tglKegiatan,"L"),
                array($dataB1->satuanHasil,"C"),
                array($dataB1->jumVolumKegiatan,"C"),
                array($dataB1->angkaKredit,"C"),
                array($dataB1->jumAngkaKredit,"C"),
                array($dataB1->ket,"L")
    ));}
}else{}}
foreach($B2T as $dataB2T) {
if ($dataB2T->id4 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Panitia Pusat sebagai Anggota, tiap kepanitiaan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($B2 as $dataB2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataB2->namaKegiatan,"L"),
                array($dataB2->tglKegiatan,"L"),
                array($dataB2->satuanHasil,"C"),
                array($dataB2->jumVolumKegiatan,"C"),
                array($dataB2->angkaKredit,"C"),
                array($dataB2->jumAngkaKredit,"C"),
                array($dataB2->ket,"L")
    ));}
}else{}}
foreach($B3T as $dataB3T) {
if ($dataB3T->id5 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'3. Panitia Daerah, sebagai Ketua/Wakil Ketua, tiap kepanitiaan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($B3 as $dataB3) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataB3->namaKegiatan,"L"),
                array($dataB3->tglKegiatan,"L"),
                array($dataB3->satuanHasil,"C"),
                array($dataB3->jumVolumKegiatan,"C"),
                array($dataB3->angkaKredit,"C"),
                array($dataB3->jumAngkaKredit,"C"),
                array($dataB3->ket,"L")
    ));}
}else{}}
foreach($B4T as $dataB4T) {
if ($dataB4T->id6 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'4. Panitia Daerah, sebagai Anggota, tiap kepanitiaan ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($B4 as $dataB4) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataB4->namaKegiatan,"L"),
                array($dataB4->tglKegiatan,"L"),
                array($dataB4->satuanHasil,"C"),
                array($dataB4->jumVolumKegiatan,"C"),
                array($dataB4->angkaKredit,"C"),
                array($dataB4->jumAngkaKredit,"C"),
                array($dataB4->ket,"L")
    ));}
}else{}}
}else{}}
foreach($C1TC as $dataC1TC) {
if ($dataC1TC->id1C > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'C',1,0,'L');
$pdf->Cell(173,5,'Menjadi anggota organisasi profesi ',1,1,'L');
foreach($C1T as $dataC1T) {
if ($dataC1T->id7 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Tingkat Internasional, sebagai Pengurus, tiap periode jabatan** ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($C1 as $dataC1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataC1->namaKegiatan,"L"),
                array($dataC1->tglKegiatan,"L"),
                array($dataC1->satuanHasil,"C"),
                array($dataC1->jumVolumKegiatan,"C"),
                array($dataC1->angkaKredit,"C"),
                array($dataC1->jumAngkaKredit,"C"),
                array($dataC1->ket,"L")
    ));}
}else{}}
foreach($C2T as $dataC2T) {
if ($dataC2T->id8 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Tingkat Internasional, sebagai Anggota atas permintaan, tiap periode jabatan* ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($C2 as $dataC2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataC2->namaKegiatan,"L"),
                array($dataC2->tglKegiatan,"L"),
                array($dataC2->satuanHasil,"C"),
                array($dataC2->jumVolumKegiatan,"C"),
                array($dataC2->angkaKredit,"C"),
                array($dataC2->jumAngkaKredit,"C"),
                array($dataC2->ket,"L")
    ));}
}else{}}
foreach($C3T as $dataC3T) {
if ($dataC3T->id9 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'3. Tingkat Internasional, sebagai Anggota,  tiap periode jabatan* ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($C3 as $dataC3) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataC3->namaKegiatan,"L"),
                array($dataC3->tglKegiatan,"L"),
                array($dataC3->satuanHasil,"C"),
                array($dataC3->jumVolumKegiatan,"C"),
                array($dataC3->angkaKredit,"C"),
                array($dataC3->jumAngkaKredit,"C"),
                array($dataC3->ket,"L")
    ));}
}else{}}
foreach($C4T as $dataC4T) {
if ($dataC4T->id10 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'4. Tingkat Nasional, sebagai Pengurus, tiap periode jabatan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($C4 as $dataC4) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataC4->namaKegiatan,"L"),
                array($dataC4->tglKegiatan,"L"),
                array($dataC4->satuanHasil,"C"),
                array($dataC4->jumVolumKegiatan,"C"),
                array($dataC4->angkaKredit,"C"),
                array($dataC4->jumAngkaKredit,"C"),
                array($dataC4->ket,"L")
    ));}
}else{}}
foreach($C5T as $dataC5T) {
if ($dataC5T->id11 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'5. Tingkat Nasional, sebagai Anggota, atas permintaan, tiap periode jabatan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($C5 as $dataC5) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataC5->namaKegiatan,"L"),
                array($dataC5->tglKegiatan,"L"),
                array($dataC5->satuanHasil,"C"),
                array($dataC5->jumVolumKegiatan,"C"),
                array($dataC5->angkaKredit,"C"),
                array($dataC5->jumAngkaKredit,"C"),
                array($dataC5->ket,"L")
    ));}
}else{}}
foreach($C6T as $dataC6T) {
if ($dataC6T->id12 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'6. Tingkat Nasional, sebagai Anggota, tiap periode jabatan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($C6 as $dataC6) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataC6->namaKegiatan,"L"),
                array($dataC6->tglKegiatan,"L"),
                array($dataC6->satuanHasil,"C"),
                array($dataC6->jumVolumKegiatan,"C"),
                array($dataC6->angkaKredit,"C"),
                array($dataC6->jumAngkaKredit,"C"),
                array($dataC6->ket,"L")
    ));}
}else{}}
}else{}}
$pdf->SetFont('helvetica','B',8);

foreach($D1TD as $dataD1TD) {
if ($dataD1TD->id4D > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'D',1,0,'L');
$pdf->Cell(173,5,'Mewakili Perguruan Tinggi/Lembaga Pemerintah  duduk dalam Panitia Antar Lembaga, tiap kepanitiaan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($D as $dataD) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataD->namaKegiatan,"L"),
                array($dataD->tglKegiatan,"L"),
                array($dataD->satuanHasil,"C"),
                array($dataD->jumVolumKegiatan,"C"),
                array($dataD->angkaKredit,"C"),
                array($dataD->jumAngkaKredit,"C"),
                array($dataD->ket,"L")
    ));}
}else{}}
$pdf->SetFont('helvetica','B',8);

foreach($E1TE as $dataE1TE) {
if ($dataE1TE->id1E > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'E',1,0,'L');
$pdf->Cell(173,5,'Menjadi anggota delegasi Nasional ke pertemuan Internasional ',1,1,'L');
foreach($E1T as $dataE1T) {
if ($dataE1T->id13 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Sebagai Ketua delegasi, tiap kegiatan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($E1 as $dataE1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataE1->namaKegiatan,"L"),
                array($dataE1->tglKegiatan,"L"),
                array($dataE1->satuanHasil,"C"),
                array($dataE1->jumVolumKegiatan,"C"),
                array($dataE1->angkaKredit,"C"),
                array($dataE1->jumAngkaKredit,"C"),
                array($dataE1->ket,"L")
    ));}
}else{}}
foreach($E2T as $dataE2T) {
if ($dataE2T->id14 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Sebagai Anggota, tiap kegiatan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($E2 as $dataE2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataE2->namaKegiatan,"L"),
                array($dataE2->tglKegiatan,"L"),
                array($dataE2->satuanHasil,"C"),
                array($dataE2->jumVolumKegiatan,"C"),
                array($dataE2->angkaKredit,"C"),
                array($dataE2->jumAngkaKredit,"C"),
                array($dataE2->ket,"L")
    ));}
}else{}}
}else{}}
foreach($F1TF as $dataF1TF) {
if ($dataF1TF->id1F > 0) {
$pdf->SetFont('helvetica','B',8);

$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'F',1,0,'L');
$pdf->Cell(173,5,'Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun) ',1,1,'L');
foreach($F1T as $dataF1T) {
if ($dataF1T->id15 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Editor/dewan penyunting/dewan redaksi  jurnal ilmiah internasional',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($F1 as $dataF1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataF1->namaKegiatan,"L"),
                array($dataF1->tglKegiatan,"L"),
                array($dataF1->satuanHasil,"C"),
                array($dataF1->jumVolumKegiatan,"C"),
                array($dataF1->angkaKredit,"C"),
                array($dataF1->jumAngkaKredit,"C"),
                array($dataF1->ket,"L")
    ));}
}else{}}
foreach($F2T as $dataF2T) {
if ($dataF2T->id16 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Editor/dewan penyunting/dewan redaksi  jurnal ilmiah nasional',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($F2 as $dataF2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataF2->namaKegiatan,"L"),
                array($dataF2->tglKegiatan,"L"),
                array($dataF2->satuanHasil,"C"),
                array($dataF2->jumVolumKegiatan,"C"),
                array($dataF2->angkaKredit,"C"),
                array($dataF2->jumAngkaKredit,"C"),
                array($dataF2->ket,"L")
    ));}
}else{}}
}else{}}
foreach($G1TG as $dataG1TG) {
if ($dataG1TG->id1G > 0) {
$pdf->SetFont('helvetica','B',8);

$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'G',1,0,'L');
$pdf->Cell(173,5,'Berperan serta aktif dalam pertemuan ilmiah ',1,1,'L');
foreach($G1T as $dataG1T) {
if ($dataG1T->id17 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Tingkat Internasional/Nasional/Regional sebagai Ketua, tiap kegiatan ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($G1 as $dataG1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataG1->namaKegiatan,"L"),
                array($dataG1->tglKegiatan,"L"),
                array($dataG1->satuanHasil,"C"),
                array($dataG1->jumVolumKegiatan,"C"),
                array($dataG1->angkaKredit,"C"),
                array($dataG1->jumAngkaKredit,"C"),
                array($dataG1->ket,"L")
    ));}
}else{}}
foreach($G2T as $dataG2T) {
if ($dataG2T->id18 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Tingkat Internasional/Nasional/Regional sebagai Anggota/peserta, tiap kegiatan ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($G2 as $dataG2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataG2->namaKegiatan,"L"),
                array($dataG2->tglKegiatan,"L"),
                array($dataG2->satuanHasil,"C"),
                array($dataG2->jumVolumKegiatan,"C"),
                array($dataG2->angkaKredit,"C"),
                array($dataG2->jumAngkaKredit,"C"),
                array($dataG2->ket,"L")
    ));}
}else{}}
foreach($G3T as $dataG3T) {
if ($dataG3T->id19 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'3. Di lingkungan Perguruan Tinggi sebagai Ketua, tiap kegiatan ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($G3 as $dataG3) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataG3->namaKegiatan,"L"),
                array($dataG3->tglKegiatan,"L"),
                array($dataG3->satuanHasil,"C"),
                array($dataG3->jumVolumKegiatan,"C"),
                array($dataG3->angkaKredit,"C"),
                array($dataG3->jumAngkaKredit,"C"),
                array($dataG3->ket,"L")
    ));}
}else{}}
foreach($G4T as $dataG4T) {
if ($dataG4T->id20 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'4. Di lingkungan Perguruan Tinggi sebagai Anggota/peserta, tiap kegiatan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($G4 as $dataG4) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataG4->namaKegiatan,"L"),
                array($dataG4->tglKegiatan,"L"),
                array($dataG4->satuanHasil,"C"),
                array($dataG4->jumVolumKegiatan,"C"),
                array($dataG4->angkaKredit,"C"),
                array($dataG4->jumAngkaKredit,"C"),
                array($dataG4->ket,"L")
    ));}
}else{}}
}else{}}
foreach($H1TH as $dataH1TH) {
if ($dataH1TH->id1H > 0) {
$pdf->SetFont('helvetica','B',8);

$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'H',1,0,'L');
$pdf->Cell(173,5,'Mendapat tanda jasa/penghargaan ',1,1,'L');
foreach($H1T as $dataH1T) {
if ($dataH1T->id21 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Penghargaan/tanda jasa Satya lencana 30 tahun',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($H1 as $dataH1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataH1->namaKegiatan,"L"),
                array($dataH1->tglKegiatan,"L"),
                array($dataH1->satuanHasil,"C"),
                array($dataH1->jumVolumKegiatan,"C"),
                array($dataH1->angkaKredit,"C"),
                array($dataH1->jumAngkaKredit,"C"),
                array($dataH1->ket,"L")
    ));}
}else{}}
foreach($H2T as $dataH2T) {
if ($dataH2T->id22 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Penghargaan/tanda jasa Satya lencana 20 tahun',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($H2 as $dataH2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataH2->namaKegiatan,"L"),
                array($dataH2->tglKegiatan,"L"),
                array($dataH2->satuanHasil,"C"),
                array($dataH2->jumVolumKegiatan,"C"),
                array($dataH2->angkaKredit,"C"),
                array($dataH2->jumAngkaKredit,"C"),
                array($dataH2->ket,"L")
    ));}
}else{}}
foreach($H3T as $dataH3T) {
if ($dataH3T->id23 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'3. Penghargaan/tanda jasa Satya lencana 10 tahun ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($H3 as $dataH3) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataH3->namaKegiatan,"L"),
                array($dataH3->tglKegiatan,"L"),
                array($dataH3->satuanHasil,"C"),
                array($dataH3->jumVolumKegiatan,"C"),
                array($dataH3->angkaKredit,"C"),
                array($dataH3->jumAngkaKredit,"C"),
                array($dataH3->ket,"L")
    ));}
}else{}}
foreach($H4T as $dataH4T) {
if ($dataH4T->id24 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'4. Tingkat Internasional, tiap tanda jasa/penghargaan ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($H4 as $dataH4) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataH4->namaKegiatan,"L"),
                array($dataH4->tglKegiatan,"L"),
                array($dataH4->satuanHasil,"C"),
                array($dataH4->jumVolumKegiatan,"C"),
                array($dataH4->angkaKredit,"C"),
                array($dataH4->jumAngkaKredit,"C"),
                array($dataH4->ket,"L")
    ));}
}else{}}
foreach($H5T as $dataH5T) {
if ($dataH5T->id25 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'5. Tingkat Nasional, tiap tanda  jasa/penghargaan ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($H5 as $dataH5) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataH5->namaKegiatan,"L"),
                array($dataH5->tglKegiatan,"L"),
                array($dataH5->satuanHasil,"C"),
                array($dataH5->jumVolumKegiatan,"C"),
                array($dataH5->angkaKredit,"C"),
                array($dataH5->jumAngkaKredit,"C"),
                array($dataH5->ket,"L")
    ));}
}else{}}
foreach($H6T as $dataH6T) {
if ($dataH6T->id26 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'6. Tingkat Daerah/Lokal, tiap tanda jasa/penghargaan',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($H6 as $dataH6) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataH6->namaKegiatan,"L"),
                array($dataH6->tglKegiatan,"L"),
                array($dataH6->satuanHasil,"C"),
                array($dataH6->jumVolumKegiatan,"C"),
                array($dataH6->angkaKredit,"C"),
                array($dataH6->jumAngkaKredit,"C"),
                array($dataH6->ket,"L")
    ));}
}else{}}
}else{}}
foreach($I1TI as $dataI1TI) {
if ($dataI1TI->id1I > 0) {
$pdf->SetFont('helvetica','B',8);

$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'I',1,0,'L');
$pdf->Cell(173,5,'Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional ',1,1,'L');
foreach($I1T as $dataI1T) {
if ($dataI1T->id27 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Buku SMTA atau setingkat, tiap buku',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($I1 as $dataI1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataI1->namaKegiatan,"L"),
                array($dataI1->tglKegiatan,"L"),
                array($dataI1->satuanHasil,"C"),
                array($dataI1->jumVolumKegiatan,"C"),
                array($dataI1->angkaKredit,"C"),
                array($dataI1->jumAngkaKredit,"C"),
                array($dataI1->ket,"L")
    ));}
}else{}}
foreach($I2T as $dataI2T) {
if ($dataI2T->id28 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Buku SMTP atau setingkat, tiap buku',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($I2 as $dataI2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataI2->namaKegiatan,"L"),
                array($dataI2->tglKegiatan,"L"),
                array($dataI2->satuanHasil,"C"),
                array($dataI2->jumVolumKegiatan,"C"),
                array($dataI2->angkaKredit,"C"),
                array($dataI2->jumAngkaKredit,"C"),
                array($dataI2->ket,"L")
    ));}
}else{}}
foreach($I3T as $dataI3T) {
if ($dataI3T->id29 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'3. Buku SD atau setingkat, tiap buku',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($I3 as $dataI3) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataI3->namaKegiatan,"L"),
                array($dataI3->tglKegiatan,"L"),
                array($dataI3->satuanHasil,"C"),
                array($dataI3->jumVolumKegiatan,"C"),
                array($dataI3->angkaKredit,"C"),
                array($dataI3->jumAngkaKredit,"C"),
                array($dataI3->ket,"L")
    ));}
}else{}}
}else{}}
foreach($J1TJ as $dataJ1TJ) {
if ($dataJ1TJ->id1J > 0) {
$pdf->SetFont('helvetica','B',8);

$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'J',1,0,'L');
$pdf->Cell(173,5,'Mempunyai prestasi di bidang olahraga/ Humaniora ',1,1,'L');
foreach($J1T as $dataJ1T) {
if ($dataJ1T->id30 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Tingkat Internasional, tiap piagam/medali',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($J1 as $dataJ1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataJ1->namaKegiatan,"L"),
                array($dataJ1->tglKegiatan,"L"),
                array($dataJ1->satuanHasil,"C"),
                array($dataJ1->jumVolumKegiatan,"C"),
                array($dataJ1->angkaKredit,"C"),
                array($dataJ1->jumAngkaKredit,"C"),
                array($dataJ1->ket,"L")
    ));}
}else{}}
foreach($J2T as $dataJ2T) {
if ($dataJ2T->id31 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Tingkat Nasional, tiap piagam/medali',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($J2 as $dataJ2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataJ2->namaKegiatan,"L"),
                array($dataJ2->tglKegiatan,"L"),
                array($dataJ2->satuanHasil,"C"),
                array($dataJ2->jumVolumKegiatan,"C"),
                array($dataJ2->angkaKredit,"C"),
                array($dataJ2->jumAngkaKredit,"C"),
                array($dataJ2->ket,"L")
    ));}
}else{}}
foreach($J3T as $dataJ3T) {
if ($dataJ3T->id32 > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'3. Tingkat Daerah/Lokal, tiap piagam/medali',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($J3 as $dataJ3) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataJ3->namaKegiatan,"L"),
                array($dataJ3->tglKegiatan,"L"),
                array($dataJ3->satuanHasil,"C"),
                array($dataJ3->jumVolumKegiatan,"C"),
                array($dataJ3->angkaKredit,"C"),
                array($dataJ3->jumAngkaKredit,"C"),
                array($dataJ3->ket,"L")
    ));}
}else{}}
}else{}}
foreach($K1TK as $dataK1TK) {
if ($dataK1TK->id1K > 0) {
$pdf->SetFont('helvetica','B',8);

$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'K',1,0,'L');
$pdf->Cell(173,5,'Keanggotaan dalam tim penilai jabatan akademik dosen (tiap semester)',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($K as $dataK) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataK->namaKegiatan,"L"),
                array($dataK->tglKegiatan,"L"),
                array($dataK->satuanHasil,"C"),
                array($dataK->jumVolumKegiatan,"C"),
                array($dataK->angkaKredit,"C"),
                array($dataK->jumAngkaKredit,"C"),
                array($dataK->ket,"L")
    ));}
}else{}}
$pdf->SetFont('helvetica','B',8);
foreach($total as $datatotal) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total Penunjang Tugas Dosen","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($datatotal->totJum,"C"),
                array("","L")
    ));}
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
$pdf->Cell(60,5,'Ketua Program Studi '.$prodi,0,1,'L');
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
$pdf->Output("Penunjang_Dosen.pdf","I");
?>