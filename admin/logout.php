<?php
session_start();
require_once '../helpers.php';
middleware();

session_start();
session_destroy();

header('Location: login.php');
