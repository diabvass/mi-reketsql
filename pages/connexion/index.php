<?php
 require_once __DIR__ . "/login.php";
 require_once __DIR__ . "/sign.php";
 require_once __DIR__ . "/logout.php";
function connexion(){
    return Login(). Sign(). Logout();
}