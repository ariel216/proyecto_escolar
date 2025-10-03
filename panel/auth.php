<?php
session_start();

function protegerPagina() {
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
        exit;
    }
}
