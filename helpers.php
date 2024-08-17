<?php

if (!function_exists('local_currency_format')) {
    function local_currency_format($num)
    {
        return 'Rp' . number_format($num, 0, ',', '.');
    }
}

if (!function_exists('middleware')) {
    function middleware()
    {
        if (!$_SESSION['login']) {
            return header('Location: login.php');
        }
    }
}
