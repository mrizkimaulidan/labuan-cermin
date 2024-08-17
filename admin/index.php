<?php
session_start();
require_once '../helpers.php';

$title = 'Dashboard';

middleware();
?>

<?php include_once '../layouts/backend/header.php'; ?>

<?php include_once '../layouts/backend/navbar.php'; ?>

<div class="row pt-5 text-center">
    <h1>Selamat Datang Administrator</h1>
    <span>Silahkan pilih menu yang tersedia pada navigation bar</span>
</div>

<?php include_once '../layouts/backend/footer.php'; ?>