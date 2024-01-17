<?php 
include '../partial/_header.php';

?>

<div class="w-full md:w-[50vw] md:mt-4 px-4 pt-2 pb-6 bg-slate-900 flex flex-col items-center gap-12">
    <h1 class="text-white text-6xl font-bold">ALBUM BARU</h1>
    <form method="post" action="crud/aksi-tambah.php" class="max-w-lg mx-auto w-full">
        <div id="form-section" class="mt-4">
            <label class="block w-full mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Judul album</label>
            <input name="judul" required type="text" class="block w-full text-sm p-1 pt-0 text-gray-400  border-b-2 border-gray-300 rounded-sm cursor-pointer bg-transparent focus:outline-none" aria-describedby="user_avatar_help" id="user_avatar">     
        </div>
        <div id="form-section" class="mt-4">
            <label class="block w-full mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Deskripsi album</label>
            <textarea name="deskripsi" class="block w-full text-sm p-1 pt-0 text-gray-400 border-x-[1px] border-t-[1px] border-b-2 border-gray-300 rounded-sm cursor-pointer bg-transparent focus:outline-none" id="" cols="30" rows="10"></textarea>
        </div>
        <div id="btn" class="text-white flex gap-4 mt-8">
            <button type="submit" class="bg-green-600 px-3 py-1 rounded-md ">Submit</button>
            <button type="reset" class="bg-red-600 px-3 py-1 rounded-md ">Reset</button>
        </div>
    </form>
</div>
<?php include '../partial/_footer.php' ?>