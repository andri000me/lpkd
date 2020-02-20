<?php
$nilai = 0;
$tgl = date("d M Y");
$pdf = new MC_Table('P','mm','A4');
$pdf->setTopMargin(15);
$pdf->setLeftMargin(12);
$pdf->SetFont('helvetica','',9);

$pdf->AddPage();
$pdf->SetWidths(array(185));
$pdf->Row(array(
        array("LAMPIRAN V","L")
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
$pdf->Cell(185,5,'MELAKSANAKAN PENELITIAN',0,1,'C');
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
$pdf->Cell(125,5,$data1->jafa.'/'.$data1->golongan,0,1,'L');
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
                array("II","C"),
                array("Melaksanakan Penelitian","L")
    ));
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'A',1,0,'L');
$pdf->Cell(173,5,'Menghasilkan Karya Ilmiah',1,1,'L');
foreach($CL101 as $dataCL101) {
if ($dataCL101->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'1. Menghasilkan karya ilmiah sesuai dengan bidang ilmunya:',1,1,'L');
foreach($CL201 as $dataCL201) {
if ($dataCL201->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'a. Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk buku ',1,1,'L');
foreach($CL301 as $dataCL301) {
if ($dataCL301->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'a1. Buku referensi ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($dataP1 as $rows1) {
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows1->judul,"L"),
                array($rows1->tglPenelitian,"L"),
                array($rows1->satuanHasil,"C"),
                array($rows1->volumeKegiatan,"C"),
                array($rows1->angkaKredit,"C"),
                array($rows1->jumAngkaKredit,"C"),
                array("II.A.1.a.2/".$rows1->ket,"L")
    ));}
    $nilai = $nilai + $rows1->jumAngkaKredit;
}else{}}
foreach($CL302 as $dataCL302) {
if ($dataCL302->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'a2. Monograf ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($dataP2 as $rows2) {
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows2->judul,"L"),
                array($rows2->tglPenelitian,"L"),
                array($rows2->satuanHasil,"C"),
                array($rows2->volumeKegiatan,"C"),
                array($rows2->angkaKredit,"C"),
                array($rows2->jumAngkaKredit,"C"),
                array("II.A.1.a.1/".$rows2->ket,"L")
    ));}
    $nilai = $nilai + $rows2->jumAngkaKredit;
}else{}}
}else{}}
foreach($CL202 as $dataCL202) {
if ($dataCL202->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("b. Hasil penelitian atau hasil pemikiran dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulis (book chapter):","L")
    ));
foreach($CL303 as $dataCL303) {
if ($dataCL303->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'b1. Internasional ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($dataP3 as $rows3) {
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows3->judul,"L"),
                array($rows3->tglPenelitian,"L"),
                array($rows3->satuanHasil,"C"),
                array($rows3->volumeKegiatan,"C"),
                array($rows3->angkaKredit,"C"),
                array($rows3->jumAngkaKredit,"C"),
                array("II.A.1.a.2.1/".$rows3->ket,"L")
    ));}
    $nilai = $nilai + $rows3->jumAngkaKredit;
}else{}}
foreach($CL304 as $dataCL304) {
if ($dataCL304->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'b2. Nasional ',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($dataP4 as $rows4) {
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows4->judul,"L"),
                array($rows4->tglPenelitian,"L"),
                array($rows4->satuanHasil,"C"),
                array($rows4->volumeKegiatan,"C"),
                array($rows4->angkaKredit,"C"),
                array($rows4->jumAngkaKredit,"C"),
                array("II.A.1.a.2.2/".$rows4->ket,"L")
    ));}
    $nilai = $nilai + $rows4->jumAngkaKredit;
}else{}}
}else{}}
foreach($CL203 as $dataCL203) {
if ($dataCL203->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("c. Hasil penelitian atau hasil pemikiran yang dipublikasikan:","L")
    ));
foreach($CL305 as $dataCL305) {
if ($dataCL305->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("c1. Jurnal internasional bereputasi (terindeks pada database internasional bereputasi dan berfaktor dampak)","L")
    ));
foreach($dataP5 as $rows5) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows5->judul,"L"),
                array($rows5->tglPenelitian,"L"),
                array($rows5->satuanHasil,"C"),
                array($rows5->volumeKegiatan,"C"),
                array($rows5->angkaKredit,"C"),
                array($rows5->jumAngkaKredit,"C"),
                array("II.A.1.b.1.1/".$rows5->ket,"L")
    ));}
    $nilai = $nilai + $rows5->jumAngkaKredit;
}else{}}
foreach($CL306 as $dataCL306) {
if ($dataCL306->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("c2. Jurnal internasional terindeks pada database internasional bereputasi","L")
    ));
foreach($dataP6 as $rows6) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows6->judul,"L"),
                array($rows6->tglPenelitian,"L"),
                array($rows6->satuanHasil,"C"),
                array($rows6->volumeKegiatan,"C"),
                array($rows6->angkaKredit,"C"),
                array($rows6->jumAngkaKredit,"C"),
                array("II.A.1.b.1.2/".$rows6->ket,"L")
    ));}
    $nilai = $nilai + $rows6->jumAngkaKredit;
}else{}}
foreach($CL307 as $dataCL307) {
if ($dataCL307->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("c3. Jurnal internasional terindekss pada database internasional di luar kategori 2)","L")
    ));
foreach($dataP7 as $rows7) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows7->judul,"L"),
                array($rows7->tglPenelitian,"L"),
                array($rows7->satuanHasil,"C"),
                array($rows7->volumeKegiatan,"C"),
                array($rows7->angkaKredit,"C"),
                array($rows7->jumAngkaKredit,"C"),
                array("II.A.1.b.1.3/".$rows7->ket,"L")
    ));}
    $nilai = $nilai + $rows7->jumAngkaKredit;
}else{}}
foreach($CL308 as $dataCL308) {
if ($dataCL308->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("c4. Jurnal Nasional Terakreditasi","L")
    ));
foreach($dataP8 as $rows8) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows8->judul,"L"),
                array($rows8->tglPenelitian,"L"),
                array($rows8->satuanHasil,"C"),
                array($rows8->volumeKegiatan,"C"),
                array($rows8->angkaKredit,"C"),
                array($rows8->jumAngkaKredit,"C"),
                array("II.A.1.b.2/".$rows8->ket,"L")
    ));}
    $nilai = $nilai + $rows8->jumAngkaKredit;
}else{}}
foreach($CL309 as $dataCL309) {
if ($dataCL309->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("c5. Jurnal Nasional berbahasa Indonesia  terindeks pada DOAJ dan Jurnal Nasional berbahasa Inggris atau bahasa resmi (PBB)  terindeks pada DOAJ","L")
    ));
foreach($dataP9 as $rows9) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows9->judul,"L"),
                array($rows9->tglPenelitian,"L"),
                array($rows9->satuanHasil,"C"),
                array($rows9->volumeKegiatan,"C"),
                array($rows9->angkaKredit,"C"),
                array($rows9->jumAngkaKredit,"C"),
                array("II.A.1.b.2.1/".$rows9->ket,"L")
    ));}
    $nilai = $nilai + $rows9->jumAngkaKredit;
}else{}}
foreach($CL310 as $dataCL310) {
if ($dataCL310->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("c6. Jurnal Nasional","L")
    ));
foreach($dataP10 as $rows10) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows10->judul,"L"),
                array($rows10->tglPenelitian,"L"),
                array($rows10->satuanHasil,"C"),
                array($rows10->volumeKegiatan,"C"),
                array($rows10->angkaKredit,"C"),
                array($rows10->jumAngkaKredit,"C"),
                array("II.A.1.b.3/".$rows10->ket,"L")
    ));}
    $nilai = $nilai + $rows10->jumAngkaKredit;
}else{}}
foreach($CL311 as $dataCL311) {
if ($dataCL311->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("c7. Jurnal ilmiah yang ditulis dalam Bahasa Resmi PBB namun tidak memenuhi syarat-syarat sebagai jurnal ilmiah internasional","L")
    ));
foreach($dataP11 as $rows11) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows11->judul,"L"),
                array($rows11->tglPenelitian,"L"),
                array($rows11->satuanHasil,"C"),
                array($rows11->volumeKegiatan,"C"),
                array($rows11->angkaKredit,"C"),
                array($rows11->jumAngkaKredit,"C"),
                array("II.A.1.b.3.1/".$rows11->ket,"L")
    ));}
    $nilai = $nilai + $rows11->jumAngkaKredit;
}else{}}
}else{}}
}else{}}
foreach($CL102 as $dataCL102) {
if ($dataCL102->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'2. Hasil penelitian atau hasil pemikiran yang didesiminasikan',1,1,'L');
foreach($CL204 as $dataCL204) {
if ($dataCL204->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'a. Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN):',1,1,'L');
foreach($CL312 as $dataCL312) {
if ($dataCL312->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'a1. Internasional',1,1,'L');
foreach($dataP12 as $rows12) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows12->judul,"L"),
                array($rows12->tglPenelitian,"L"),
                array($rows12->satuanHasil,"C"),
                array($rows12->volumeKegiatan,"C"),
                array($rows12->angkaKredit,"C"),
                array($rows12->jumAngkaKredit,"C"),
                array("II.A.1.c.1.a.1/".$rows12->ket,"L")
    ));}
    $nilai = $nilai + $rows12->jumAngkaKredit;
}else{}}
foreach($CL313 as $dataCL313) {
if ($dataCL313->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'a2. Nasional',1,1,'L');
foreach($dataP13 as $rows13) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows13->judul,"L"),
                array($rows13->tglPenelitian,"L"),
                array($rows13->satuanHasil,"C"),
                array($rows13->volumeKegiatan,"C"),
                array($rows13->angkaKredit,"C"),
                array($rows13->jumAngkaKredit,"C"),
                array("II.A.1.c.1.b.1/".$rows13->ket,"L")
    ));}
    $nilai = $nilai + $rows13->jumAngkaKredit;
}else{}}
}else{}}
foreach($CL205 as $dataCL205) {
if ($dataCL205->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'b. Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan:',1,1,'L');
foreach($CL314 as $dataCL314) {
if ($dataCL314->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'b1. Internasional',1,1,'L');
foreach($dataP14 as $rows14) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows14->judul,"L"),
                array($rows14->tglPenelitian,"L"),
                array($rows14->satuanHasil,"C"),
                array($rows14->volumeKegiatan,"C"),
                array($rows14->angkaKredit,"C"),
                array($rows14->jumAngkaKredit,"C"),
                array("II.A.1.c.2.a/".$rows14->ket,"L")
    ));}
    $nilai = $nilai + $rows14->jumAngkaKredit;
}else{}}
foreach($CL315 as $dataCL315) {
if ($dataCL315->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'b2. Nasional',1,1,'L');
$pdf->SetFont('helvetica','',8);
foreach($dataP15 as $rows15) {
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows15->judul,"L"),
                array($rows15->tglPenelitian,"L"),
                array($rows15->satuanHasil,"C"),
                array($rows15->volumeKegiatan,"C"),
                array($rows15->angkaKredit,"C"),
                array($rows15->jumAngkaKredit,"C"),
                array("II.A.1.c.2.b/".$rows15->ket,"L")
    ));}
    $nilai = $nilai + $rows15->jumAngkaKredit;
}else{}}
}else{}}
foreach($CL206 as $dataCL206) {
if ($dataCL206->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'c. Disajikan dalam seminar/simposium/ lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan:',1,1,'L');
foreach($CL316 as $dataCL316) {
if ($dataCL316->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'c1. Internasional',1,1,'L');
foreach($dataP16 as $rows16) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows16->judul,"L"),
                array($rows16->tglPenelitian,"L"),
                array($rows16->satuanHasil,"C"),
                array($rows16->volumeKegiatan,"C"),
                array($rows16->angkaKredit,"C"),
                array($rows16->jumAngkaKredit,"C"),
                array("II.A.1.c.1.a/".$rows16->ket,"L")
    ));}
    $nilai = $nilai + $rows16->jumAngkaKredit;
}else{}}
foreach($CL317 as $dataCL317) {
if ($dataCL317->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'c2. Nasional',1,1,'L');
foreach($dataP17 as $rows17) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows17->judul,"L"),
                array($rows17->tglPenelitian,"L"),
                array($rows17->satuanHasil,"C"),
                array($rows17->volumeKegiatan,"C"),
                array($rows17->angkaKredit,"C"),
                array($rows17->jumAngkaKredit,"C"),
                array("II.A.1.c.1.b/".$rows17->ket,"L")
    ));}
    $nilai = $nilai + $rows17->jumAngkaKredit;
}else{}}
}else{}}
foreach($CL207 as $dataCL207) {
if ($dataCL207->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","C"),
                array("d. Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/ simposium/ lokakarya, tetapi dimuat dalam prosiding:","L")
    ));
foreach($CL318 as $dataCL318) {
if ($dataCL318->id1A > 0) {
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'d1. Internasional',1,1,'L');
foreach($dataP18 as $rows18) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows18->judul,"L"),
                array($rows18->tglPenelitian,"L"),
                array($rows18->satuanHasil,"C"),
                array($rows18->volumeKegiatan,"C"),
                array($rows18->angkaKredit,"C"),
                array($rows18->jumAngkaKredit,"C"),
                array("II.A.1.c.3.a/".$rows18->ket,"L")
    ));}
    $nilai = $nilai + $rows18->jumAngkaKredit;
}else{}}
foreach($CL319 as $dataCL319) {
if ($dataCL319->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'d2. Nasional',1,1,'L');
foreach($dataP19 as $rows19) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows19->judul,"L"),
                array($rows19->tglPenelitian,"L"),
                array($rows19->satuanHasil,"C"),
                array($rows19->volumeKegiatan,"C"),
                array($rows19->angkaKredit,"C"),
                array($rows19->jumAngkaKredit,"C"),
                array("II.A.1.c.3.b/".$rows19->ket,"L")
    ));}
    $nilai = $nilai + $rows19->jumAngkaKredit;
}else{}}
}else{}}
foreach($CL208 as $dataCL208) {
if ($dataCL208->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(7,5,'',1,0,'L');
$pdf->Cell(5,5,'',1,0,'L');
$pdf->Cell(173,5,'e. Hasil penelitian/pemikiran yang disajikan dalam koran/majalah  populer/umum',1,1,'L');
foreach($dataP20 as $rows20) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows20->judul,"L"),
                array($rows20->tglPenelitian,"L"),
                array($rows20->satuanHasil,"C"),
                array($rows20->volumeKegiatan,"C"),
                array($rows20->angkaKredit,"C"),
                array($rows20->jumAngkaKredit,"C"),
                array("II.A.1.d/".$rows20->ket,"L")
    ));}
    $nilai = $nilai + $rows20->jumAngkaKredit;
}else{}}
}else{}}
foreach($CL103 as $dataCL103) {
if ($dataCL103->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("3. Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan)","L")
    ));
$pdf->SetFont('helvetica','',8);
foreach($dataP26 as $rows26) {
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows26->judul,"L"),
                array($rows26->tglPenelitian,"L"),
                array($rows26->satuanHasil,"C"),
                array($rows26->volumeKegiatan,"C"),
                array($rows26->angkaKredit,"C"),
                array($rows26->jumAngkaKredit,"C"),
                array("II.B/".$rows26->ket,"L")
    ));}
    $nilai = $nilai + $rows26->jumAngkaKredit;
}else{}}
foreach($CL104 as $dataCL104) {
if ($dataCL104->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("4. Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN)","L")
    ));
$pdf->SetFont('helvetica','',8);
foreach($dataP27 as $rows27) {
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows27->judul,"L"),
                array($rows27->tglPenelitian,"L"),
                array($rows27->satuanHasil,"C"),
                array($rows27->volumeKegiatan,"C"),
                array($rows27->angkaKredit,"C"),
                array($rows27->jumAngkaKredit,"C"),
                array("II.B/".$rows27->ket,"L")
    ));}
    $nilai = $nilai + $rows27->jumAngkaKredit;
}else{}}
foreach($CL105 as $dataCL105) {
if ($dataCL105->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("5. Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)","L")
    ));
foreach($dataP28 as $rows28) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows28->judul,"L"),
                array($rows28->tglPenelitian,"L"),
                array($rows28->satuanHasil,"C"),
                array($rows28->volumeKegiatan,"C"),
                array($rows28->angkaKredit,"C"),
                array($rows28->jumAngkaKredit,"C"),
                array("II.C/".$rows28->ket,"L")
    ));}
    $nilai = $nilai + $rows28->jumAngkaKredit;
}else{}}
foreach($CL106 as $dataCL106) {
if ($dataCL106->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("6. Membuat rancangan dan karya teknologi/seni yang dipatenkan secara nasional atau internasional","L")
    ));
foreach($CL209 as $dataCL209) {
if ($dataCL209->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("a. Internasional (paling sedikit diakui oleh 4 Negara","L")
    ));
foreach($dataP23 as $rows23) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows23->judul,"L"),
                array($rows23->tglPenelitian,"L"),
                array($rows23->satuanHasil,"C"),
                array($rows23->volumeKegiatan,"C"),
                array($rows23->angkaKredit,"C"),
                array($rows23->jumAngkaKredit,"C"),
                array("II.D.1/".$rows23->ket,"L")
    ));}
    $nilai = $nilai + $rows23->jumAngkaKredit;
}else{}}
foreach($CL210 as $dataCL210) {
if ($dataCL210->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("b. Nasional","L")
    ));
foreach($dataP24 as $rows24) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows24->judul,"L"),
                array($rows24->tglPenelitian,"L"),
                array($rows24->satuanHasil,"C"),
                array($rows24->volumeKegiatan,"C"),
                array($rows24->angkaKredit,"C"),
                array($rows24->jumAngkaKredit,"C"),
                array("II.D.2/".$rows24->ket,"L")
    ));}
    $nilai = $nilai + $rows24->jumAngkaKredit;
}else{}}
}else{}}
foreach($CL107 as $dataCL107) {
if ($dataCL107->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("7. Membuat rancangan dan karya teknologi yang tidak dipatenkan; rancangan dan karya seni monumental/ seni pertunjukan; karya sastra:","L")
    ));
foreach($CL211 as $dataCL211) {
if ($dataCL211->id1A > 0) {
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("a. Tingkat Internasional","L")
    ));
foreach($dataP23 as $rows23) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows23->judul,"L"),
                array($rows23->tglPenelitian,"L"),
                array($rows23->satuanHasil,"C"),
                array($rows23->volumeKegiatan,"C"),
                array($rows23->angkaKredit,"C"),
                array($rows23->jumAngkaKredit,"C"),
                array("II.E.1/".$rows23->ket,"L")
    ));}
    $nilai = $nilai + $rows23->jumAngkaKredit;
}else{}}
foreach($CL212 as $dataCL212) {
if ($dataCL212->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("b. Tingkat Nasional","L")
    ));
foreach($dataP24 as $rows24) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows24->judul,"L"),
                array($rows24->tglPenelitian,"L"),
                array($rows24->satuanHasil,"C"),
                array($rows24->volumeKegiatan,"C"),
                array($rows24->angkaKredit,"C"),
                array($rows24->jumAngkaKredit,"C"),
                array("II.E.2/".$rows24->ket,"L")
    ));}
    $nilai = $nilai + $rows24->jumAngkaKredit;
}else{}}
foreach($CL213 as $dataCL213) {
if ($dataCL213->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("c. Tingkat Lokal","L")
    ));
foreach($dataP25 as $rows25) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows25->judul,"L"),
                array($rows25->tglPenelitian,"L"),
                array($rows25->satuanHasil,"C"),
                array($rows25->volumeKegiatan,"C"),
                array($rows25->angkaKredit,"C"),
                array($rows25->jumAngkaKredit,"C"),
                array("II.E.3/".$rows25->ket,"L")
    ));}
    $nilai = $nilai + $rows25->jumAngkaKredit;
}else{}}
}else{}}
foreach($CL108 as $dataCL108) {
if ($dataCL108->id1A > 0) {
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,5,173));
    $pdf->Row1(array(
                array("","C"),
                array("","L"),
                array("8. Membuat rancangan dan karya seni/seni pertunjukan yang tidak mendapatkan HKI*)","L")
    ));
foreach($dataP29 as $rows29) {
$pdf->SetFont('helvetica','',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array($rows29->judul,"L"),
                array($rows29->tglPenelitian,"L"),
                array($rows29->satuanHasil,"C"),
                array($rows29->volumeKegiatan,"C"),
                array($rows29->angkaKredit,"C"),
                array($rows29->jumAngkaKredit,"C"),
                array("II.E.4/".$rows29->ket,"L")
    ));}
    $nilai = $nilai + $rows29->jumAngkaKredit;
}else{}}
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,55,20,20,18,15,15,35));
    $pdf->Row1(array(
                array("","C"),
                array("Total Penelitian Dosen","L"),
                array("","L"),
                array("","C"),
                array("","C"),
                array("","C"),
                array($nilai,"C"),
                array("","L")
    ));
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
$pdf->Output("Penelitian_Dosen.pdf","I");
?>