<?php
function logout()
{
    session_start();
    if ($_SESSION) {
        session_destroy();
        header('Location: ../index.php');
    } else {
        echo 'You are not logged in';
    }
}

logout();
