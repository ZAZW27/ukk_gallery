<?php 

include '../../../config.php';
$id_user = $_POST['userId'];
$id_foto = $_POST['fotoId'];

$insert = mysqli_query($con, "DELETE FROM tbl_likepost WHERE id_user = $id_user AND id_foto = $id_foto");

if ($insert) {
?>
<button class="like-btn" userId="<?=$id_user?>" fotoId="<?= $id_foto ?>">
    <svg class="mx-0.5"  style="pointer-events: none"
        width="25px" height="25px" viewBox="0 0 24 24" 
        fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="1.968"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path clip-rule="evenodd" d="M6.47358 1.96511C8.27963 1.93827 10.2651 2.62414 12 4.04838C13.7349 2.62414 15.7204 1.93827 17.5264 1.96511C19.5142 1.99465 21.3334 2.90112 22.2141 4.68531C23.0878 6.45529 22.9326 8.87625 21.4643 11.7362C19.9939 14.6003 17.1643 18.0021 12.4867 21.8566C12.4382 21.898 12.3855 21.9324 12.3298 21.9596C12.1243 22.0601 11.8798 22.0624 11.6702 21.9596C11.6145 21.9324 11.5618 21.898 11.5133 21.8566C6.83565 18.0021 4.00609 14.6003 2.53569 11.7362C1.06742 8.87625 0.912211 6.45529 1.78589 4.68531C2.66659 2.90112 4.4858 1.99465 6.47358 1.96511Z" 
        fill="none" 
        fill-rule="evenodd"></path></g>
    </svg>
</button>
<?php 
} 
?>