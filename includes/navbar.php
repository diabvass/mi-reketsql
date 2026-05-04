<?php
function Navbar()
{   
    $actif = isset($_SESSION["User"]); 
    $log = $actif ? '<span class="dot"></span> ligne' : '<a href="./?p=log" class="connexion"><i class="fa-solid fa-user"></i> compte</a>';
    return <<<HTML
    <link rel="stylesheet" href="./css/navbar.css">
    <nav class="navbar sticky-top">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand fw-bold nomApp" href="./">
                <i class="fa-solid fa-database me-2"></i>reket<span>SQL</span>
            </a>
            <div class="ms-auto">
                <span class="status-badge">
                    $log
                </span>
            </div>
        </div>
    </nav>
HTML;
}