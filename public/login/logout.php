<?php
$_SESSION=[];
    if(session_status() === PHP_SESSION_ACTIVE){
        session_destroy();
    }
    setcookie(session_name(), '', time()- 86400, '/');

    header('Location: login.php');
    die;

?>