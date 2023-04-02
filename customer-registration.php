<?php include "backend/restriction.php"; ?>
<?php include 'header.php'; ?>

<div class="main customer-registration">
    <header class="main_header">
        <h3> Customer Registration: </h3>
        <div class="h5">Please Check And Enter Correct Information !!</div>
    </header>
    <div class="error_display">
        <h5 class="error_message"><?php if (isset($errors)) {
                                        echo $errors;
                                    } ?></h5>
    </div>

    <div class="registration_content">
        <table class="table registration_table">
            <?php if (isset($_GET['message'])) {
                echo "<script> alert('" . $_GET['message'] . "'); </script>";
            } ?>
            <form action="backend/registration.php" class="registration_form" method="POST" enctype="multipart/form-data">
                <tr class="registeration_feilds">
                    <td><label class="registration_label" for="customer_first_name">Customer First Name</label></td>
                    <td><input required class="registration_data" type="text" name="customer_first_name"></td>
                </tr>
                <tr class="registeration_feilds">
                    <td><label class="registration_label" for="customer_last_name">Customer Last Name</label></td>
                    <td><input class="registration_data" type="text" name="customer_last_name"></td>
                </tr>
                <tr class="registeration_feilds">
                    <td><label class="registration_label" for="relative_name">Father/Wife Name</label></td>
                    <td><input required class="registration_data" type="text" name="relative_name"></td>
                </tr>
                <tr class="registeration_feilds">
                    <td><label class="registration_label" for="mobile_number">Mobile Number</label></td>
                    <td><input required class="registration_data" type="tel" pattern="[0-9]{10}" name="mobile_number"></td>
                </tr>
                <tr class="registeration_feilds">
                    <td><label class="registration_label" for="adhaar_number">Adhaar number</label></td>
                    <td><input required class="registration_data" type="tel" pattern="[0-9]{12}" name="adhaar_number"></td>
                </tr>
                <tr class="registeration_feilds">
                    <td><label class="registration_label" for="pan_number">PAN Number</label></td>
                    <td><input required class="registration_data" type="text" name="pan_number"></td>
                </tr>
                <tr class="registeration_feilds">
                    <td><label class="registration_label" for="form_number">Form Number</label></td>
                    <td><input required class="registration_data" type="text" name="form_number"></td>
                </tr>
                <tr class="registeration_feilds">
                    <td><label class="registration_label" for="customer_photo">Customer Photo</label></td>
                    <td><input required class="registration_data" type="file" accept="image/*" name="customer_photo"></td>
                </tr>
                <tr class=" registeration_feilds">
                    <td><label class="registration_label" for="account_number">Account Number</label></td>
                    <td><input required class="registration_data" type="text" name="account_number"></td>
                </tr>
                <tr class="registeration_feilds">
                    <td><label class="registration_label" for="account_type">Account Type</label></td>
                    <td><select required class="registration_data" name="account_type" id="account_type">
                            <option value="running_account">Running Account</option>
                            <option value="fd_account">FD Account</option>
                            <option value="rd_account">RD Account</option>
                            <option value="finance_account">Finance Account</option>
                        </select></td>
                </tr>
                <tr class="registeration_feilds">
                    <td colspan="2" class="register_btn_area">
                        <input required class="register_btn" type="submit" value="Register" name="register">
                    </td>
                </tr>
        </table>
        </form>
    </div>
</div>