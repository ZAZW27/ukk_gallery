<?php 
include '../partial/_header.php';

$fetchAlbum = mysqli_query($con, "SELECT * FROM tbl_album INNER JOIN tbl_user ON tbl_album.id_user = tbl_user.id_user WHERE tbl_user.id_user = $id_user");

if (mysqli_num_rows($fetchAlbum) < 1) {
    header('location:../album/index.php');
}

?>

<div class="w-full md:w-[50vw] md:mt-4 px-4 pt-2 pb-6 bg-slate-900 flex flex-col items-center gap-12">
    <?php 
        $id_foto = $_GET['foto'];
        $getFoto = mysqli_query($con, "SELECT * FROM tbl_foto WHERE id_foto = $id_foto");

        $foto = mysqli_fetch_assoc($getFoto);   
    ?>
    <img class="rounded-md mt-2" src="../../../public/images/<?= $foto['directory_file'] ?>" alt="">
    <form method="POST" enctype="multipart/form-data" action="crud/aksi-update.php" class="max-w-lg mx-auto w-full">
        <input type="text" name="id_foto" value="<?=$foto['id_foto']?>" hidden>
        <div id="form-section" class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 md:grid-rows-1 mt-4 gap-4">
            <div class="w-full col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload gambar</label>
                <input name="gambar" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
            </div>
            <div class="col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Album</label>
                <select name="album" class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <?php 
                    $query = mysqli_query($con, "SELECT * FROM tbl_album WHERE id_user = $id_user");
                    while ($g = mysqli_fetch_array($query)) {
                        if ($foto['id_album'] == $g['id_album']) {
                    ?>
                        <option selected value="<?= $g['id_album'] ?>"><?= $g['nama_album'] ?></option>
                    <?php }else { ?>
                        <option value="<?= $g['id_album'] ?>"><?= $g['nama_album'] ?></option>
                    <?php } }?>
                </select>
            </div>
        </div>

        <div id="form-section" class="mt-4">
            <label class="block w-full mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Judul post</label>
            <input value="<?= $foto['judul_foto'] ?>" name="judul" type="text" class="block w-full text-sm p-1 pt-0 text-gray-400  border-b-2 border-gray-300 rounded-sm cursor-pointer bg-transparent focus:outline-none" aria-describedby="user_avatar_help" id="user_avatar">     
        </div>
        <div id="form-section" class="mt-4">
            <label class="block w-full mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Deskripsi post</label>
            <input value="<?= $foto['deskripsi_foto'] ?>" name="deskripsi" type="text" class="block w-full text-sm p-1 pt-0 text-gray-400  border-b-2 border-gray-300 rounded-sm cursor-pointer bg-transparent focus:outline-none" aria-describedby="user_avatar_help" id="user_avatar">     
        </div>
        <div id="btn" class="text-white flex gap-4 mt-8">
            <button type="submit" class="bg-green-600 px-3 py-1 rounded-md ">Submit</button>
            <button type="reset" class="bg-red-600 px-3 py-1 rounded-md ">Reset</button>
        </div>
    </form>
</div>
<?php include '../partial/_footer.php' ?>