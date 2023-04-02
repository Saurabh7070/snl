<?php include "backend/restriction.php"; ?>
<?php
include "backend/connection.php";
if (isset($_POST['login'])) {
    if ($_POST['emp_code'] != "" || $_POST['password'] != "") {
        $emp_code = mysqli_escape_string($conn, $_POST['emp_code']);
        $password = md5($_POST['password']);
        $errors = [];

        $sql = "SELECT id,emp_code,name,user_type FROM employee_master WHERE emp_code = '{$emp_code}' AND password = '{$password}'";

        $query = mysqli_query($conn, $sql) or die("Query Failed");

        if (mysqli_num_rows($query) > 0) {
            session_start();
            while ($result = mysqli_fetch_assoc($query)) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['emp_code'] = $result['emp_code'];
                $_SESSION['name'] = $result['name'];
                $_SESSION['user_type'] = $result['user_type'];
            }

            header('location:home.php');
        } else {
            $errors = "Wrong id or password";
        }
    } else {
        $errors = "Please fill all the fields";
    }
}

?>

<div class="login-container">
    <div class="login-area">
        <div class="heading">
            <p>Please Login As: </p>
            <h4>Employee</h4>
        </div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="login-form" method="POST">
            <input type="text" name="emp_code" id="emp_code" placeholder="Employee Code..">
            <input type="password" name="password" id="password" placeholder="Password..">
            <input type="submit" value="login" name="login">


        </form>
        <div class="error_display">
            <h5 class="error_message"><?php if (isset($errors)) {
                                            echo $errors;
                                        } ?></h5>
        </div>
    </div>
</div>
<script>
    const errorDisplay = document.querySelector('.error_display');
    var error = "<?php echo $errors; ?>";
    if (error.innertext != " ") {
        errorDisplay.style.visibility = "visible";
    } else {
        errorDisplay.style.visibility = "visible";

    }
</script>