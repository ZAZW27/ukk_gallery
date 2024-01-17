<?php 
include '../../../config.php';
$id_user = $_POST['id_user'];
$id_foto = $_POST['id_foto'];
$comment = $_POST['comment'];

$insert = mysqli_query($con, "INSERT INTO tbl_post_comment (id_user, id_foto, comment) VALUES ('$id_user', '$id_foto', '$comment')");

if ($insert) {
    $show = mysqli_query($con, "SELECT username, comment, tbl_post_comment.created_at FROM tbl_post_comment INNER JOIN tbl_foto ON tbl_foto.id_foto = tbl_post_comment.id_foto INNER JOIN tbl_user ON tbl_user.id_user = tbl_post_comment.id_user WHERE tbl_foto.id_foto = $id_foto");
    
    while ($q = mysqli_fetch_array($show)) {
?>
<div id="comment" class="w-full pt-4 flex flex-col flex-wrap px-4" >
    <div class="w-full h-10 flex flex-wrap items-center gap-1" >
        <div id="profile" class="w-6 h-6 rounded-full bg-white"></div>
        <p class="text-xs"><?= $q['username'] ?></p>
    </div>
    <div class="w-full text-[0.82rem]"><?= $q['comment'] ?></div>
</div>
<?php }} ?>