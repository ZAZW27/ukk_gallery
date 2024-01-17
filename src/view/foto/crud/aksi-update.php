<?php 

session_start();
$id_user = $_SESSION['id'];
include '../../../config.php';

$id_foto = $_POST['id_foto'];
$album = $_POST["album"];
$judul = $_POST["judul"];
$deskripsi = $_POST["deskripsi"];

if ($_FILES['gambar']["name"] > 0) {
    // echo "ada gambar";
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
        
        $imagePath = $newFileName;
    
        $sql = "UPDATE tbl_foto 
        SET judul_foto = '$judul', deskripsi_foto='$deskripsi', 
        id_album = '$album', directory_file='$imagePath' WHERE id_foto = '$id_foto'";
    
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Foto Uploaded'); window.history.go(-2);</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
else {
    // echo 'nga ada gambar';
    $sql = "UPDATE tbl_foto 
        SET judul_foto = '$judul', deskripsi_foto='$deskripsi', 
        id_album = '$album' WHERE id_foto = '$id_foto'";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Foto Uploaded'); window.history.go(-2);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>