<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM galleries WHERE id = $id");

$row = mysqli_fetch_assoc($result);
unlink($row['url']);

mysqli_query($conn, "DELETE FROM galleries WHERE id = $id");

header('Location: galeri.php');
