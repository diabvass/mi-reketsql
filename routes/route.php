<?php

require_once ROOT_PATH  . '/includes/navbar.php'; // NAVBAR
require_once ROOT_PATH . '/includes/footer.php';
require_once ROOT_PATH  . "/pages/index.php"; // MAIN ET A PROPOS

require_once ROOT_PATH . '/pages/connexion/index.php';
function Route()
{
    $page = $_GET['p'] ?? '';  
    if ($page === "log")
        return Login();
    if ($page === "sig")
        return Sign();
    return Main();
}