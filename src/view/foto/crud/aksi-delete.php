<?php 

include '../../../config.php';

$id_foto = $_GET['foto'];

$delete = mysqli_query($con, "DELETE FROM tbl_foto WHERE id_foto = '$id_foto'");

if ($delete) {
    echo "<script>alert('Success: foto deleted'); window.history.go(-1);</script>";
}

?>