<?php

$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'labuan_cermin');

if (!$conn) {
    die('connection failed: ' . mysqli_connect_errno());
}
