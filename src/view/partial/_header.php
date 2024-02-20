<?php 
include '../../config.php' ;

session_start();

if ($_SESSION['username'] == '') {
    header('location:../auth/log.php');
}

$id_user = $_SESSION['id'];
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $username ?></title>
    <link href="../../../public/output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/l10n/de.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css"/>

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<style>
    ::-webkit-scrollbar {
        width: 5px;
    }
    ::-webkit-scrollbar-track {
        background-color: #ececec;
    }

</style>
<body class="bg-slate-800">
    <div class="w-[100vw] h-[100dvh] overflow-x-hidden flex justify-center items-center transition-all duration-300 ease-in-out">
        <header class="fixed z-[10] md:top-0 md:left-0 h-full w-full md:w-[15rem] pointer-events-none flex flex-col justify-between">
            <div class="w-full h-12 bg-slate-950 py-2 px-3 flex flex-wrap items-center gap-1" style="pointer-events: all;">
                <div id="profile" class="w-8 h-8 rounded-full bg-white"></div>
                <p class="text-white">@<?= $_SESSION['username'] ?></p>
                <a class="text-xs ml-auto text-white" href="../auth/crud/aksi-logout.php">Log out</a>
            </div>
            <div class="w-full h-12 md:h-full bg-slate-950 text-white md:pl-4 md:pt-4 flex flex-row justify-center items-center md:flex-col md:justify-start md:items-start gap-4 px-4" style="pointer-events: all;">
                <a href="../main/index.php" class="">beranda</a>
                <a href="../album/index.php?user=<?= $id_user?>" class="">profil</a>
                <a href="../foto/tambah.php">tambah</a>
            </div>
        </header>
        <div id="content" class="w-full md:ml-[15rem] h-full ">
            <div class="w-full h-full bg-slate-800 flex flex-wrap justify-center items-start">
                <div class="py-12 w-full flex flex-col flex-wrap justify-center items-center">