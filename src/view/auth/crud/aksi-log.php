<?php 
session_start();
include '../../../config.php';

$name = $_POST['username'];
$pass = $_POST['password'];

$scanData = mysqli_query($con, "SELECT * FROM tbl_user WHERE username = '$name' AND password = '$pass'");

$fetchRow = mysqli_num_rows($scanData);

$fetchData = mysqli_fetch_array($scanData);


if ($fetchRow > 0) {
    $_SESSION['username'] = $name;
    $_SESSION['password'] = $pass;
    $_SESSION['full_name'] = $fetchData['nama_lengkap'];
    $_SESSION['email'] = $fetchData['email'];
    $_SESSION['id'] = $fetchData['id_user'];

    header("location:../../main/index.php");
    echo 'wey?';
}
else {
    header("location:../log.php?pesan=gagal");
}

?>