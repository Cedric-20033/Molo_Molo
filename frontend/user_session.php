<?php
session_start();
if (isset($_SESSION['id_user'])) {
    unset($_SESSION['id_user']);
}

if (!isset($_SESSION['id_user'])) {
    header("location: ../");
}

?>