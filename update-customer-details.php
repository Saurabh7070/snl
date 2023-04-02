<?php include "backend/restriction.php"; ?>
<?php include 'header.php'; ?>

<style>

</style>

<div class="main customer-registration">
    <header class="main_header">
        <h3> Update Customer Details: </h3>
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
            <form action="backend/update-customer.php" class="registration_form" method="POST" enctype="multipart/form-data">
                <?php
                include 'backend/connection.php';
                if (isset($_GET['account_no'])) {
                    $account_number = $_GET['account_no'];
                    $query = "SELECT * FROM customers_master WHERE account_number = '{$account_number}'";
                    $sql = mysqli_query($conn, $query);
                    if (mysqli_num_rows($sql) == 1) {
                        while ($result = mysqli_fetch_assoc($sql)) {
                            extract($result);


                ?>
                            <img class="customer_pic" src="customer_images/<?php echo $customer_photo ?>" alt="<?php echo $account_number ?>">
                            <tr class="registeration_feilds">
                                <td><label class="registration_label" for="customer_first_name">Customer Name</label></td>
                                <td><input required class="registration_data" type="text" name="customer_name" value="<?php echo $customer_name ?>"></td>
                            </tr>


                            <tr class="registeration_feilds">
                                <td><label class="registration_label" for="relative_name">Father/Wife Name</label></td>
                                <td><input required class="registration_data" type="text" name="relative_name" value="<?php echo $relative_name ?>"></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td><label class="registration_label" for="mobile_number">Mobile Number</label></td>
                                <td><input required class="registration_data" type="tel" pattern="[0-9]{10}" name="mobile_number" value="<?php echo $mobile_number ?>"></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td><label class="registration_label" for="adhaar_number">Adhaar number</label></td>
                                <td><input required class="registration_data" type="tel" pattern="[0-9]{12}" name="adhaar_number" value="<?php echo $adhaar_number ?>"></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td><label class="registration_label" for="pan_number">PAN Number</label></td>
                                <td><input required class="registration_data" type="text" name="pan_number" value="<?php echo $pan_number ?>"></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td><label class="registration_label" for="form_number">Form Number</label></td>
                                <td><input required class="registration_data" type="text" name="form_number" value="<?php echo $mobile_number ?>"></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td><label class="registration_label" for="customer_photo">Customer Photo</label></td>
                                <td><input required class="registration_data" type="file" accept="image/*" name="customer_photo"></td>
                            </tr>
                            <tr class=" registeration_feilds">
                                <td><label class="registration_label" for="account_number">Account Number</label></td>
                                <td><input required class="registration_data" type="text" name="account_number" value="<?php echo $account_number ?>"></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td><label class="registration_label" for="account_type">Account Type</label></td>
                                <td><select required class="registration_data" name="account_type" id="account_type">
                                        <?php

                                        $sql1 = "SELECT * from account_types";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                if ($account_type == $row2['account_code']) {
                                                    $selected = "selected";
                                                } else {
                                                    $selected = "";
                                                }
                                                echo "<option {$selected} value={$row1['account_code']}>{$row1['account_type']}</option>";
                                            }
                                        }
                                        ?>


                                    </select></td>
                            </tr>
                            <tr class=" registeration_feilds">
                                <td><label class="registration_label" for="account_status">Status</label></td>
                                <td><select required class="registration_data" name="account_status" id="account_status">
                                        <?php

                                        $sql2 = "SELECT * from account_status";
                                        $result2 = mysqli_query($conn, $sql2);
                                        if (mysqli_num_rows($result2) > 0) {
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                if ($account_status == $row2['status_code']) {
                                                    $selected = "selected";
                                                } else {
                                                    $selected = "";
                                                }
                                                echo "<option {$selected} value={$row2['status_code']}>{$row2['account_status']}</option>";
                                            }
                                        }
                                        ?>
                                </td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td colspan="2" class="register_btn_area">
                                    <input required class="register_btn" type="submit" value="Update" name="update">
                                </td>
                            </tr>
        </table>
<?php
                        }
                    } else {
                        header('location: home.php?tab=customer-list');
                    }
                }
?>
</form>
    </div>
</div>