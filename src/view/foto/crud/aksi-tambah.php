<?php 

session_start();
$id_user = $_SESSION['id'];
include '../../../config.php';

$targetDir = "../../../../public/images/";  // Specify your upload directory
$originalFileName = $_FILES["gambar"]["name"];
$fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);


$uniqueID = uniqid();
$newFileName = $uniqueID . "_" . $originalFileName;

$targetFile = $targetDir . $newFileName;

$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // If everything is ok, try to upload file
if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
    echo "The file " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " has been uploaded.";

    // Insert data into the database
    $album = $_POST["album"];
    $judul = $_POST["judul"];
    $deskripsi = $_POST["deskripsi"];
    $imagePath = $newFileName;

    $sql = "INSERT INTO tbl_foto 
    (judul_foto, deskripsi_foto, directory_file, id_album, id_user) 
    VALUES ('$judul', '$deskripsi', '$imagePath', '$album', '$id_user')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Foto Uploaded'); window.history.go(-2);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>