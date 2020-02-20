<?php
$no=1;
$tgl = date("d M Y");
$pdf = new MC_Table('L','mm','A4');
$pdf->setTopMargin(15);
$pdf->setLeftMargin(12);
$pdf->SetFont('helvetica','',9);

$pdf->AddPage();
$pdf->ln(7);
$pdf->SetFont('helvetica','B',11);
$pdf->Cell(270,5,'LAPORAN REKAP',0,1,'C');
$pdf->Cell(270,5,'PELAKSANAAN PENGABDIAN TUGAS DOSEN',0,1,'C');
$pdf->ln(7);
$pdf->SetFont('helvetica','B',8);
$pdf->SetWidths(array(7,30,40,57,20,20,16,15,15,50));
    $pdf->Row1(array(
                array("No","C"),
                array("Nama","C"),
                array("Komponen Pengabdian","C"),
                array("Uraian Kegiatan","C"),
                array("Tanggal","C"),
                array("Satuan Hasil","C"),
                array("Jumlah Volume Kegiatan","C"),
                array("Angka Kredit","C"),
                array("Jumlah Angka Kredit","C"),
                array("Keterangan Bukti Fisik","C")
    ));
foreach($penelitian as $data) {
$pdf->SetFont('helvetica','',8);
    $pdf->Row1(array(
                array($no,"C"),
                array($data->nama,"L"),
                array($data->namaKegiatanLv1." ".$data->namaKegiatanLv2." ".$data->namaKegiatanLv3,"L"),
                array($data->judul,"L"),
                array($data->tglPenelitian,"C"),
                array($data->satuanHasil,"C"),
                array($data->volumeKegiatan,"C"),
                array($data->angkaKredit,"C"),
                array($data->jumAngkaKredit,"C"),
                array($data->ket,"L")
    ));$no++;}
$pdf->ln(10);
foreach($kajur as $data1) {
$pdf->Cell(170);
$pdf->Cell(100,5,'Malang, '.$tgl,0,1,'L');
$pdf->Cell(170);
$pdf->Cell(100,5,'Ketua BKD STMIK ASIA Malang,',0,1,'L');
$pdf->ln(20);
$pdf->Cell(170);
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(100,5,$data1->nama,0,1,'L');
$pdf->Cell(170);
$pdf->Cell(80,0,'',1,1,'L');
$pdf->SetFont('helvetica','',9);
$pdf->Cell(170);
$pdf->Cell(100,5,'NIDN. '.$data1->nidn,0,1,'L');}
$pdf->Output("Rekap_Penunjang_Dosen.pdf","I");
?>