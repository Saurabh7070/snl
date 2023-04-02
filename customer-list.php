<meta http-equiv="refresh" content="30" />
<?php include "backend/restriction.php"; ?>
<?php include 'header.php'; ?>
<div class="main customer-registration">
    <header class="main_header">
        <h3> Customers List: </h3>
        <div class="h5">Please Check And Enter Correct Information !!</div>
    </header>
    <div class="error_display">
        <h5 class="error_message"><?php if (isset($errors)) {
                                        echo $errors;
                                    } ?>fgdfgdfgdfgdfg</h5>
    </div>
    <div class="customer_list_container">
        <div class="customer_selector">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="select_account_type">Account Type</label>
                <select required class="" name="select_account_type" id="select_account_type">
                    <option value=" " selected>Select</option>
                    <option value="RA">Running Account</option>
                    <option value="FD">FD Account</option>
                    <option value="RD">RD Account</option>
                    <option value="FA">Finance Account</option>
                    <input class="button" type="submit" value="Search" name="account_type_request">
                </select>
            </form>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="search" name="search" placeholder="Enter Account No. Or Name..." style="text-align:left;width:300px;">
                <input class="button" type="submit" value="Search" name="customer_request">
            </form>
        </div>
        <div class="customer_list_area">
            <table class="customer_list_table">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Customer Name</th>

                        <th>Mobile No.</th>


                        <th>Form No.</th>
                        <th>Account No.</th>
                        <th>Account Type</th>
                        <th>Registered On</th>
                        <th>Account Status</th>
                        <th colspan="2">Operations</th>
                    </tr>

                </thead>
                <tbody>
                    <?php

                    include 'backend/connection.php';
                    if (isset($_POST['customer_request'])) {
                        $search_query = $_POST['search'];
                        $sql =  "Select * from customers_master where account_number = '{$search_query}' OR customer_name like '{$search_query}%' ORDER BY sn";
                    } else if (isset($_POST['account_type_request'])) {
                        $search_query = $_POST['select_account_type'];
                        if ($search_query != " ") {
                            $sql = "SELECT * from customers_master where account_type = '{$search_query}' ORDER BY sn";
                        } else {

                            $sql = "Select * from customers_master ORDER BY sn ";
                        }
                    } else {

                        $sql = "Select * from customers_master ORDER BY sn ";
                    }
                    $search_result = mysqli_query($conn, $sql) or die("Query failed");
                    if (mysqli_num_rows($search_result) > 0) {
                        while ($search_data = mysqli_fetch_assoc($search_result)) {

                            extract($search_data);
                            // echo $customer_first_name;

                            echo "<tr>";
                            echo "<td>" . $sn . "</td>";
                            echo "<td>" . $customer_name . "</td>";


                            echo "<td>" . $mobile_number . "</td>";


                            echo "<td>" . $form_number . "</td>";
                            echo "<td>" . $account_number . "</td>";
                    ?>
                            <td>
                                <?php
                                $sql1 = "SELECT * from account_types where account_code = '{$account_type}'";
                                $result1 = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($result1) > 0) {
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        echo $row1['account_type'];
                                    }
                                }
                                ?>
                            </td>
                            <?php
                            echo "<td>" . date($registered_on) . "</td>";
                            if ($account_status == 0) {
                                echo "<td>Inactive</td>";
                            } else {
                                echo "<td>Active</td>";
                            }
                            ?>
                            <?php
                            echo "<td><a href='home.php?tab=view-customer-details&account_no={$account_number}' style='font-size:12px;background:transparent;'>View</a></td>";
                            echo "<td><a href='home.php?tab=update-customer-details&account_no={$account_number}' style='font-size:12px;background:transparent;'>Update</a></td>";
                            ?>
                            </tr>




                    <?php
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan= '8'>Customer Does Not Exist</td>";
                    }

                    ?>



                </tbody>
            </table>
        </div>
    </div>
</div>