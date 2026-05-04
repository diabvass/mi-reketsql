<?php
function Logout()
{
    session_destroy();
    header("Location: ./");
    exit();
}
