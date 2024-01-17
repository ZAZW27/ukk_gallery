<?php 
include '../partial/_header.php';

$id_album = $_GET['album'];

$fetchAlbum = mysqli_query($con, "SELECT * FROM tbl_foto INNER JOIN tbl_album ON tbl_foto.id_album = tbl_album.id_album WHERE tbl_album.id_album = $id_album");
// $fetchAlbum = mysqli_query($con, "SELECT * FROM tbl_foto INNER JOIN tbl_user ON tbl_foto.id_user = tbl_user.id_user WHERE tbl_user.id_user = $id_user");

$count = mysqli_fetch_array($fetchAlbum);



if ($count == 0) {
?>
    <div class="w-full md:w-[50vw] md:mt-4 px-4 py-3 bg-slate-900 flex flex-col items-center gap-2 text-white">
        <p>Album ini kosong...</p>
        <a href="tambah.php" class="bg-green-700 px-4 py-1 rounded-md">Buat baru +</a>
    </div>
<?php } else {?>
    
    <div class="w-full h-40 md:h-[15rem] bg-slate-700 overflow-hidden flex justify-center items-center">
        <?php 
        
            $mostLiked = mysqli_query($con, "SELECT count(*) AS jumlah_like, directory_file AS dir FROM tbl_likepost 
                INNER JOIN tbl_foto ON tbl_likepost.id_foto = tbl_foto.id_foto 
                WHERE id_album = $id_album GROUP BY tbl_foto.id_foto 
                ORDER BY jumlah_like DESC LIMIT 1;
            ") ;
            
            while ($dir = mysqli_fetch_assoc($mostLiked)) {
        ?>
        <img id="parallax-img" class="object-cover w-full h-full" src="../../../public/images/<?=$dir['dir']?>" alt="">
        <?php } ?>
    </div>

    <div class="w-full md:mt-4 px-4 pt-4 pb-8 bg-slate-900 flex flex-col items-center gap-4 text-white">
        <?php 
            $getProfile = mysqli_query($con, "SELECT tbl_user.id_user from tbl_album 
                inner join tbl_user ON tbl_user.id_user = tbl_album.id_user 
                where tbl_album.id_album = $id_album limit 1;"
            );
            $fetchNum = mysqli_num_rows($getProfile);
            if ($fetchNum > 0) {
                $fetchProfile = mysqli_fetch_assoc($getProfile);
                if($fetchProfile['id_user'] == $id_user){
        ?>
            <a href="#" onclick="confirmDeleteAlbum(<?=$id_album?>); return false;" class="self-end py-4">Delete Album</a>
            <script>
                function confirmDeleteAlbum(albumId) {
                    if (confirm("Are you sure you want to delete this album?")) {
                        // If the user clicks "OK" in the confirmation dialog, proceed with the deletion
                        window.location.href = "../album/crud/aksi-hapus.php?album=" + albumId;
                    }
                }
            </script>

        <?php }}?>
        <div id="post" class="w-full flex flex-wrap gap-12 flex-row justify-center ">
            
            <?php 
                
                $getPic = mysqli_query($con, "SELECT * FROM tbl_foto INNER JOIN tbl_album ON tbl_foto.id_album = tbl_album.id_album WHERE tbl_album.id_album = $id_album");
                
                while ($f = mysqli_fetch_array($getPic)) {
            ?>
            <div class="flex flex-col w-full md:w-[30%]">
                <a href="../../../public/images/<?= $f['directory_file'] ?>" class="overflow-hidden w-full" data-fancybox="galeri" data-caption="<?=$f['deskripsi']?>">
                    <img class="object-cover w-full h-full" src="../../../public/images/<?= $f['directory_file'] ?>" alt="">
                </a>
                
                <?php if ($f['id_user'] == $id_user) {?>
                    <div class="flex justify-between">
                        <a style="pointer-events: all;" href="../foto/update.php?foto=<?=$f['id_foto']?>">Edit</a>
                        <a href="#" onclick="confirmDelete(<?=$f['id_foto']?>); return false;" style="pointer-events: all;">Delete</a>
                        <script>
                            function confirmDelete(photoId) {
                                if (confirm("Are you sure you want to delete this photo?")) {
                                    // If the user clicks "OK" in the confirmation dialog, proceed with the deletion
                                    window.location.href = "../foto/crud/aksi-delete.php?foto=" + photoId;
                                }
                            }
                        </script>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>  
    </div>
    <?php } ?>
<script>
    Fancybox.bind('[data-fancybox="galeri"]', {
        Carousel: {
            transition: "classic",
        },
    });
</script>
<script  src="parallax.js"></script>
<?php include '../partial/_footer.php' ?>