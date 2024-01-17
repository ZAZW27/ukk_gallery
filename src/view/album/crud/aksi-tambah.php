<?php 
session_start();
include '../../../config.php';
$id_user = $_SESSION['id'];
$judul = $_POST['judul'];
$desc = $_POST['deskripsi'];

$insert = mysqli_query($con, "INSERT INTO tbl_album (nama_album, deskripsi, id_user) VALUE ('$judul', '$desc', '$id_user')");


if ($insert) {
    echo"<script>alert('Berhasil membuat album baru');window.history.go(-2);</script>";
}else{
    echo"<script>alert('Gagal membuat album baru');window.location='../tambah.php';</script>";
}

?>