<?php 

include '../../../config.php';

$name = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$namalengkap = $_POST['namleng'];
$alamat = $_POST['alamat'];


$insert = mysqli_query($con, "INSERT INTO tbl_user 
    (username, password, email, nama_lengkap, alamat)
    VALUES ('$name', '$pass', '$email', '$namalengkap', '$alamat')"
);

if ($insert) {
    header("location:../log.php");
}
else {
    echo"<script>alert('Gagal');window.history.go(-1)</script>";
}


?>
