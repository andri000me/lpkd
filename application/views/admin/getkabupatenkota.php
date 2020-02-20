<?php 
//panggil file koneksi.php agar bisa terhubung ke database
include 'koneksi.php';

//tambahkan variabel provinsi. variabel provinsi akan mendapat data dari parameter provinsi yang dimasukkan di browser.
$provinsi =  $_GET['provinsi'];

//buat perintah sql untuk query data kabupatenkota berdasarkan id_provinsi
$sql = "SELECT * FROM tbbagian1 WHERE idBagian = ?";
$stmt = $dbCon->prepare($sql);
//tambahkan parameter $provinsi ke dalam statement. 
$stmt->execute(array($provinsi));

//ubah perintah print_r menjadi echo json_encode(); jangan lupa mengubah header menjadi json.
header('Content-Type: application/json');
echo json_encode($stmt->fetchAll());