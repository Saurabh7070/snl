<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();

    if (!isset($_SESSION['emp_code']) && !isset($_SESSION['user_type'])) {
        header('location:index.php');
    }
}
