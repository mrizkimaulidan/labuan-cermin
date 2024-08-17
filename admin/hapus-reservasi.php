<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM reservation_details WHERE reservation_id = $id");
mysqli_query($conn, "DELETE FROM reservation_summary WHERE reservation_id = $id");

mysqli_query($conn, "DELETE FROM reservations WHERE id = $id");

header('Location: reservasi.php');
