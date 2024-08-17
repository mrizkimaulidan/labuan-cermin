<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM open_hours WHERE id = $id");

header('Location: waktu-operasional.php');
