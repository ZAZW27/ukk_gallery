<?php 

include '../../../config.php';

$id_album = $_GET['album'];

$deleteAllImages = mysqli_query($con, "DELETE FROM tbl_foto WHERE id_album = '$id_album'");

if ($deleteAllImages) {
    $deletAlbum = mysqli_query($con, "DELETE FROM tbl_album WHERE id_album = '$id_album'");
    if ($deletAlbum) {
        echo "<script>alert('Success: foto deleted'); window.history.go(-2);</script>";
    }else {
        echo "<script>alert('GAGAL: Menghapus foto'); window.history.go(-1);</script>";
    }
}
else {
    echo "<script>alert('GAGAL: Menghapus foto'); window.history.go(-1);</script>";
}

?>