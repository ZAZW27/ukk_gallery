<?php include '../partial/_header.php' ?>

<div class="w-full md:w-[50vw] md:mt-4 px-4 py-3 bg-slate-900 flex flex-col items-center gap-12">
    <?php 
        $get = mysqli_query($con, "SELECT tbl_foto.id_foto, tbl_user.id_user, username, tbl_foto.directory_file, tbl_foto.judul_foto, tbl_foto.deskripsi_foto, count(id_like) likes 
            FROM tbl_foto 
            INNER JOIN tbl_user ON tbl_foto.id_user = tbl_user.id_user 
            LEFT JOIN tbl_likepost ON tbl_likepost.id_foto = tbl_foto.id_foto
            GROUP BY tbl_foto.id_foto;"
        );

        while ($post = mysqli_fetch_array($get)) {
    ?>
        <div id="post" class="w-full h-auto flex flex-col justify-center ">
            <div class="w-full h-12 py-2 px-3 flex flex-wrap items-center gap-1 justify-between text-white" style="pointer-events: all;">
                <div class="flex">
                    <div id="profile" class="w-8 h-8 rounded-full bg-white"></div>
                    <a href="../album/index.php?user=<?=$post['id_user']?>" class="">@<?= $post['username'] ?></a>
                </div>
                <?php if ($post['id_user'] == $id_user) {?>
                    <a href="#" onclick="confirmDelete(<?=$post['id_foto']?>); return false;" style="pointer-events: all;">Delete</a>
                    <script>
                        function confirmDelete(photoId) {
                            if (confirm("Are you sure you want to delete this photo?")) {
                                // If the user clicks "OK" in the confirmation dialog, proceed with the deletion
                                window.location.href = "../foto/crud/aksi-delete.php?foto=" + photoId;
                            }
                        }
                    </script>
                <?php } ?>
            </div>
            <div class="h-full overflow-hidden w-full rounded-md ">
                <!-- <img class="object-contain w-full" src="../../public/images/Dragon.png" alt=""> -->
                <img class="object-contain w-full" src="../../../public/images/<?= $post['directory_file'] ?>" alt="">
            </div>
            <div class="w-full py-3 flex justify-between">
                <div class="flex justify-start gap-4">
                    <?php 
                        $currPost = $post['id_foto'];
                        $getLike = mysqli_query($con, "SELECT * FROM tbl_likepost 
                            INNER JOIN tbl_foto ON tbl_likepost.id_foto = tbl_foto.id_foto
                            INNER JOIN tbl_user ON tbl_likepost.id_user = tbl_user.id_user WHERE tbl_likepost.id_foto = $currPost AND tbl_likepost.id_user = $id_user"
                        );

                        if (mysqli_num_rows($getLike) > 0) {
                    ?>
                    <div id="like-container">
                        <button class="unlike-btn" userId="<?=$id_user?>" fotoId="<?= $post['id_foto'] ?>">
                            <svg class="mx-0.5" 
                                width="25px" height="25px" viewBox="0 0 24 24" 
                                fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="1.5"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path clip-rule="evenodd" d="M6.47358 1.96511C8.27963 1.93827 10.2651 2.62414 12 4.04838C13.7349 2.62414 15.7204 1.93827 17.5264 1.96511C19.5142 1.99465 21.3334 2.90112 22.2141 4.68531C23.0878 6.45529 22.9326 8.87625 21.4643 11.7362C19.9939 14.6003 17.1643 18.0021 12.4867 21.8566C12.4382 21.898 12.3855 21.9324 12.3298 21.9596C12.1243 22.0601 11.8798 22.0624 11.6702 21.9596C11.6145 21.9324 11.5618 21.898 11.5133 21.8566C6.83565 18.0021 4.00609 14.6003 2.53569 11.7362C1.06742 8.87625 0.912211 6.45529 1.78589 4.68531C2.66659 2.90112 4.4858 1.99465 6.47358 1.96511Z" 
                                fill="#f72c1e" 
                                fill-rule="evenodd"></path></g>
                            </svg>
                        </button>
                    </div>
                    <?php }else{ ?>
                    <div id="like-container">
                        <button class="like-btn" userId="<?=$id_user?>" fotoId="<?= $post['id_foto'] ?>">
                            <svg class="mx-0.5"  style="pointer-events: none"
                                width="25px" height="25px" viewBox="0 0 24 24" 
                                fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="1.968"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path clip-rule="evenodd" d="M6.47358 1.96511C8.27963 1.93827 10.2651 2.62414 12 4.04838C13.7349 2.62414 15.7204 1.93827 17.5264 1.96511C19.5142 1.99465 21.3334 2.90112 22.2141 4.68531C23.0878 6.45529 22.9326 8.87625 21.4643 11.7362C19.9939 14.6003 17.1643 18.0021 12.4867 21.8566C12.4382 21.898 12.3855 21.9324 12.3298 21.9596C12.1243 22.0601 11.8798 22.0624 11.6702 21.9596C11.6145 21.9324 11.5618 21.898 11.5133 21.8566C6.83565 18.0021 4.00609 14.6003 2.53569 11.7362C1.06742 8.87625 0.912211 6.45529 1.78589 4.68531C2.66659 2.90112 4.4858 1.99465 6.47358 1.96511Z" 
                                fill="none" 
                                fill-rule="evenodd"></path></g>
                            </svg>
                        </button>
                    </div>
                    <?php } ?>
                    <button class="comment-btn" userId="<?=$id_user?>" fotoId="<?= $post['id_foto'] ?>">
                        <svg class="mx-0.5" 
                            version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            width="25px" height="25px" viewBox="-5.12 -5.12 74.24 74.24" enable-background="new 0 0 64 64" xml:space="preserve" 
                            fill="#fff" stroke="#fff" stroke-width="6.4"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#fff" stroke-width="0.384"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" 
                            fill="none" d="M60,0H4C1.789,0,0,1.789,0,4v40c0,2.211,1.789,4,4,4h8v12 c0,1.617,0.973,3.078,2.469,3.695C14.965,63.902,15.484,64,16,64c1.039,0,2.062-0.406,2.828-1.172L33.656,48H60c2.211,0,4-1.789,4-4 V4C64,1.789,62.211,0,60,0z"></path> </g></svg>
                    </button>
                </div>
                <div class="flex justify-start text-white">
                    <?php if ($post['id_user'] == $id_user) {?>
                        <a href="../foto/update.php?foto=<?=$post['id_foto']?>">Edit</a>
                    <?php } ?>
                </div>
            </div>
            <div id="desc" class="flex flex-col justify-start items-start text-white">
                <div id="like-amount">
                    <span class="amount" likePost><?= $post['likes'] ?></span> Likes
                </div>
                <div id="description">
                    <p><?= $post['judul_foto'] ?></p>
                    <p class="text-[0.8rem] text-gray-300"><?= $post['deskripsi_foto'] ?></p>
                </div>
            </div>
        </div>  
        <script>
            $(document).ready(function() {
                $(document).off('click', 'button.like-btn').on('click', 'button.like-btn', function(){
                    const userId = $(this).attr('userId');
                    const fotoId = $(this).attr('fotoId');
    
                    // Store a reference to 'this'
                    var currentButton = $(this);
    
                    $.ajax({
                        type: 'POST',
                        dataType: "html",
                        url: "crud/aksi-like.php",
                        data: {userId: userId, fotoId: fotoId},
                        success: function(msg) {
                            var likeAmount = currentButton.parent().parent().parent().parent().find('.amount').text();
                            var newLike = parseInt(likeAmount) + 1;

                            currentButton.parent().parent().parent().parent().find('.amount').html(newLike);
                            currentButton.parent().html(msg)
                        }, 
                        error: function (error) {
                            console.log(error);
                        }
                    });
                });
    
                $(document).off('click', 'button.unlike-btn').on('click', 'button.unlike-btn', function(){
                    const userId = $(this).attr('userId');
                    const fotoId = $(this).attr('fotoId');
                    // console.log('clicked');
                    var currentButton = $(this);
                    $.ajax({
                        type: 'POST',
                        dataType: "html",
                        url: "crud/aksi-unlike.php",
                        data: {userId: userId, fotoId: fotoId},
                        success: function(msg) {
                            var likeAmount = currentButton.parent().parent().parent().parent().find('.amount').text();
                            var newLike = parseInt(likeAmount) - 1;

                            currentButton.parent().parent().parent().parent().find('.amount').html(newLike);
                            currentButton.parent().html(msg)
                        }, 
                        error: function (error) {
                            console.log(error);
                        }
                    });
                });
            });
        </script>
        <?php } ?>
    </div>

    <div id="comment-model" class="fixed w-[100vw] h-[100svh] top-0 left-0 z-[101] bg-black/60 justify-center gap-4 items-center pointer-events-none hidden">
        <div class="w-full md:w-5/12 h-[60svh] bg-slate-900 overflow-x-hidden overflow-y-auto flex flex-col justify-start items-start text-white" style="pointer-events: all;">
            <div id="comments">
                <!-- COMMENT SECTIONS -->
            </div>
        </div>
        <div id="commentBar" >
            <button class="bg-red-600 px-4 py-1 font-bold cancel-comment text-white" style="pointer-events: all;" id="">Kembali</button>
            <form id="commentForm" class="relative bottom-0 left-0 w-full h-[50svh] px-3 py-4 bg-slate-900 overflow-hidden" style="pointer-events: all;">
                <div class="utils flex flex-row justify-between">
                    <h1 class="text-white text-lg">Make a comment</h1>
                    <button class="bg-green-600 py-1 px-4 text-white rounded-md" type="button" id="submitComment">Send!</button>
                </div>
                <input type="text" name="id_user" value="<?= $id_user ?>" hidden>
                <input type="text" name="id_foto" id="foto_id_form" value="" hidden>
                <textarea name="comment" cols="30" rows="10" class="text-white w-full h-[95%] flex justify-start p-1 mt-2 items-start bg-slate-200/10 rounded-md outline-none border-none focus:border-none"></textarea>
            </form>
        </div>
    </div>
    <script>
        $(document).off('click', 'button.comment-btn').on('click', 'button.comment-btn', function(){
            const userId = $(this).attr('userId');
            const fotoId = $(this).attr('fotoId');
            $('#foto_id_form').val(fotoId);
            $.ajax({
                type: 'POST',
                dataType: "html",
                url: "crud/show-com.php",
                data: {id_foto: fotoId}, 
                success: function(msg){
                    $('#comments').html(msg)
                }
            })

            $('#comment-model').removeClass('hidden').addClass('flex');
        })

        $(document).on('click', 'button.cancel-comment', function () {
            console.log('clicked?')
            $('#comment-model').addClass('hidden').removeClass('flex');
        })

        $("#submitComment").click(function() {
            var formData = $("#commentForm").serialize();

            $.ajax({
                type: "POST", 
                url: "crud/tambah-com.php",
                data: formData,
                success: function(msg   ) {
                
                    $('#comments').html(msg)
                },
                error: function(error) {
                // Handle errors here
                console.log(error);
                }
            });
            });
    </script>
    <?php include '../partial/_footer.php' ?>