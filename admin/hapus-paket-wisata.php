<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM services WHERE id = $id");

$_SESSION['message'] = 'Data berhasil dihapus!';
header('Location: paket-wisata.php');
exit;
