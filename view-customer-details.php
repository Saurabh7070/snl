<?php include "backend/restriction.php"; ?>
<?php include 'header.php'; ?>

<style>
    .customer_pic {
        display: flex;
        justify-content: center;
        align-items: center;
        object-fit: cover;
        position: absolute;
        width: 250px;
        height: 230px;
        padding-left: 20px;
        top: 30%;
        left: 10px;

    }
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
                                <td class="label_field"><label class="registration_label" for="customer_first_name">Customer Name</label></td>
                                <td>
                                    <p><?php echo $customer_name ?></p>
                                </td>
                            </tr>


                            <tr class="registeration_feilds">
                                <td class="label_field"><label class="registration_label" for="relative_name">Father/Wife Name</label></td>
                                <td>
                                    <?php echo $relative_name ?>
                                </td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td class="label_field"><label class="registration_label" for="mobile_number">Mobile Number</label></td>
                                <td>
                                    <?php echo $mobile_number ?></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td class="label_field"><label class="registration_label" for="adhaar_number">Adhaar number</label></td>
                                <td><?php echo $adhaar_number ?></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td class="label_field"><label class="registration_label" for="pan_number">PAN Number</label></td>
                                <td><?php echo $pan_number ?></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td class="label_field"><label class="registration_label" for="form_number">Form Number</label></td>
                                <td><?php echo $mobile_number ?></td>
                            </tr>

                            <tr class=" registeration_feilds">
                                <td class="label_field"><label class="registration_label" for="account_number">Account Number</label></td>
                                <td><?php echo $account_number ?></td>
                            </tr>
                            <tr class="registeration_feilds">
                                <td class="label_field"><label class="registration_label" for="account_type">Account Type</label></td>
                                <td><?php echo $account_type ?></td>
                            </tr>

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