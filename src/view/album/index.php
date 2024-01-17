<?php 
include '../partial/_header.php';

$id_profile = $_GET['user'];

$fetchAlbum = mysqli_query($con, "SELECT * FROM tbl_album INNER JOIN tbl_user ON tbl_album.id_user = tbl_user.id_user WHERE tbl_user.id_user = $id_profile ");

if (mysqli_num_rows($fetchAlbum) < 1) {
?>
    <div class="w-full md:w-[50vw] md:mt-4 px-4 py-3 bg-slate-900 flex flex-col items-center gap-2 text-white">
        <p>Anda belum memilki album</p>
        <a href="tambah.php" class="bg-green-700 px-4 py-1 rounded-md">Buat baru +</a>
    </div>
<?php }else { ?>
    <div class="w-full md:w-[70vw] h-auto md:mt-4 px-4 py-3 bg-slate-900 items-center gap-2 text-white">
        <?php if($id_user == $id_profile){ ?>
            <a href="tambah.php" class="bg-green-700 px-4 py-1 rounded-md my-1">Album baru +</a>
        <?php } ?>
        <div class="grid grid-cols-3 md:grid-cols-5 gap-4 mt-4">
            <?php 
                
                $getAlbum = mysqli_query($con, "SELECT tbl_foto.id_foto, tbl_album.id_album, tbl_foto.directory_file, tbl_album.nama_album FROM tbl_user 
                INNER JOIN tbl_album on tbl_album.id_user = tbl_user.id_user
                LEFt JOIN tbl_foto ON tbl_foto.id_user = tbl_user.id_user
                WHERE tbl_user.id_user = $id_profile
                GROUP BY tbl_album.id_album"
                );
            
                while ($al = mysqli_fetch_array($getAlbum)) {
            ?>
            <a href="../foto/index.php?album=<?=$al['id_album']?>" class="relative col-span-1 h-[8rem] bg-slate-400">
                <img class="object-cover w-full h-full" src="../../../public/images/<?=$al['directory_file']?>" alt="">
                <div class="absolute inset-0 flex items-center justify-center text-white" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.8),rgba(0, 0, 0, 0.5));">
                    <div class=" text-center"><?= $al['nama_album']?></div>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<?php include '../partial/_footer.php' ?>