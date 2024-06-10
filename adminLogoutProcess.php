<?php

session_start();

if (!isset($_SESSION["a"])) {
    // No set
    echo ("Please ! Loging First..");
    
} else {
    $_SESSION["a"] = "";
    session_destroy();

    echo ("success");
}
