<?php
$tgl = date("d M Y");
$pdf = new MC_Table('P','mm','A4');
$pdf->setTopMargin(15);
$pdf->setLeftMargin(12);
$pdf->SetFont('helvetica','',9);

$pdf->AddPage();
$pdf->SetWidths(array(185));
$pdf->Row(array(
        array("LAMPIRAN VI","L")
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
$pdf->Cell(185,5,'MELAKSANAKAN PENGABDIAN TUGAS DOSEN',0,1,'C');
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
$pdf->Cell(125,5,$data->nidn,0,1,'L');}
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
$pdf->SetWidths(array(7,178));
    $pdf->Row1(array(
                array("IV","C"),
                array("Pelaksanaan Pengabdian Kepada Masyarakat","L")
    ));

foreach($A1TA as $dataA1TA) {
if ($dataA1TA->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("A","C"),
                array("Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya tiap semester.","l"),
    ));
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

foreach($B1TB as $dataB1TB) {
if ($dataB1TB->id1B > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("B","C"),
                array("Melaksanakan pengembangan hasil pendidikan, dan penelitian yang dapat dimanfaatkan oleh masyarakat/ industry setiap program.","l"),
    ));
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
foreach($C1TC as $dataC1TC) {
if ($dataC1TC->id1C > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("C","C"),
                array("Memberi latihan/penyuluhan/ penataran/ceramah pada masyarakat, terjadwal/terprogram:","l"),
    ));
foreach($C1T as $dataC1T) {
if ($dataC1T->id33 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Dalam satu semester atau lebih, Tingkat Internasional, tiap program',1,1,'L');
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
if ($dataC2T->id34 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Dalam satu semester atau lebih, Tingkat Nasional, tiap program',1,1,'L');
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
if ($dataC3T->id35 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'3. Dalam satu semester atau lebih, Tingkat Lokal, tiap program',1,1,'L');
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
if ($dataC4T->id36 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'4. Kurang dari satu semester dan minimal satu bulan, Tingkat Internasional, tiap program',1,1,'L');
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
if ($dataC5T->id37 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'5. Kurang dari satu semester dan minimal satu bulan, Tingkat Nasional, tiap program',1,1,'L');
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
if ($dataC6T->id38 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'6. Kurang dari satu semester dan minimal satu bulan, Tingkat Lokal, tiap program',1,1,'L');
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
foreach($C7T as $dataC7T) {
if ($dataC7T->id39 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'7. Kurang dari satu semester dan minimal satu bulan, Insidental, tiap kegiatan/program',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($C7 as $dataC7) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataC7->namaKegiatan,"L"),
                array($dataC7->tglKegiatan,"L"),
                array($dataC7->satuanHasil,"C"),
                array($dataC7->jumVolumKegiatan,"C"),
                array($dataC7->angkaKredit,"C"),
                array($dataC7->jumAngkaKredit,"C"),
                array($dataC7->ket,"L")
    ));}
}else{}}
}else{}}
foreach($D1TD as $dataD1TD) {
if ($dataD1TD->id4D > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("D","C"),
                array("Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan  tugas pemerintahan dan pembangunan","l"),
    ));
foreach($D1T as $dataD1T) {
if ($dataD1T->id40 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Dalam satu semester atau lebih, Tingkat Internasional, tiap program',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($D1 as $dataD1) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataD1->namaKegiatan,"L"),
                array($dataD1->tglKegiatan,"L"),
                array($dataD1->satuanHasil,"C"),
                array($dataD1->jumVolumKegiatan,"C"),
                array($dataD1->angkaKredit,"C"),
                array($dataD1->jumAngkaKredit,"C"),
                array($dataD1->ket,"L")
    ));}
}else{}}
foreach($D2T as $dataD2T) {
if ($dataD2T->id41 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Dalam satu semester atau lebih, Tingkat Nasional, tiap program',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($D2 as $dataD2) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataD2->namaKegiatan,"L"),
                array($dataD2->tglKegiatan,"L"),
                array($dataD2->satuanHasil,"C"),
                array($dataD2->jumVolumKegiatan,"C"),
                array($dataD2->angkaKredit,"C"),
                array($dataD2->jumAngkaKredit,"C"),
                array($dataD2->ket,"L")
    ));}
}else{}}
foreach($D3T as $dataD3T) {
if ($dataD3T->id42 > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'3. Dalam satu semester atau lebih, Tingkat Lokal, tiap program',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($D3 as $dataD3) {
$pdf->SetWidths(array(7,57,20,20,16,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($dataD3->namaKegiatan,"L"),
                array($dataD3->tglKegiatan,"L"),
                array($dataD3->satuanHasil,"C"),
                array($dataD3->jumVolumKegiatan,"C"),
                array($dataD3->angkaKredit,"C"),
                array($dataD3->jumAngkaKredit,"C"),
                array($dataD3->ket,"L")
    ));}
}else{}}
}else{}}
foreach($E1TE as $dataE1TE) {
if ($dataE1TE->id1E > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("E","C"),
                array("Membuat/menulis karya pengabdian pada masyarakat yang tidak dipublikasikan,tiap karya.","l"),
    ));
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
}
$pdf->Output("Pengabdian_Dosen.pdf","I");
?>