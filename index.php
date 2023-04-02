<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
session_start();
if (isset($_SESSION['user_type']) && isset($_SESSION['emp_code'])) {
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seema Nidhi</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <section class="home" id="home">
        <header class="header">
            <nav class="navbar">
                <div class="logo">
                    <h2>Seema Nidhi Ltd.</h2>
                </div>
                <div class="selection">
                    <ul class="navlinks">
                        <li class="navlink">
                            <a href="index.php?login-type=admin">Admin Login</a>
                        </li>
                        <li class="navlink">
                            <a href="index.php?login-type=employee">Employee Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php if (isset($_GET['login-type'])) {
            if ($_GET['login-type'] == 'employee') {
                include('emp-login.php');
            } else if ($_GET['login-type'] == 'admin') {
                include('admin-login.php');
            }
        } else {
            include('emp-login.php');
        } ?>
        <footer>
            <marquee behavior="scroll" direction="left"><b>Please Logout After Done</b></marquee>
        </footer>
    </section>


</html>