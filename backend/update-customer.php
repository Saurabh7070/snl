<!-- echo date("'Y-m-d H:i:s'"); -->
<?php include "connection.php";
include "restriction.php";

if (isset($_POST['update'])) {
    extract($_POST);
    if (!empty($customer_name) && !empty($relative_name) && !empty($mobile_number) && !empty($adhaar_number) && !empty($pan_number) && !empty($form_number) && !empty($_FILES['customer_photo']['name']) && !empty($account_number) && !empty($account_type)) {

        $image_name = $_FILES['customer_photo']['name'];
        $temp_name = $_FILES['customer_photo']['tmp_name'];
        $tmp_name = $_FILES['customer_photo']['tmp_name'];
        $image_explode  = explode('.', $image_name);
        $image_ext = end($image_explode);
        $extentions = ['png', 'jpeg', 'jpg', 'JPG', 'JPEG', 'PNG'];
        if (in_array($image_ext, $extentions) === true) {
            $new_img_name = $customer_first_name . "_" . $account_number . "." . $image_ext;
            move_uploaded_file($temp_name, "../customer_images/" . $new_img_name);
        }


        $update_query = "UPDATE `customers_master` SET `customer_name`= '{$customer_name}',`relative_name`='{$relative_name}',`mobile_number`='{$mobile_number}',`adhaar_number`='{$adhaar_number}',`pan_number`='{$pan_number}',`form_number`='{$form_number}',`customer_photo`='{$new_img_name}',`account_number`='{$account_number}',`account_type`='{$account_type}',account_status	= '{$account_status}' WHERE `account_number` = '{$account_number}'";

        $result = mysqli_query($conn, $update_query) or die($update_query);
        if ($result) {
            header("location: ../home.php?tab=view-customer-details&account_no=" . $account_number);
            mysqli_close($conn);
        } else {
            header("location: ../home.php?error=Registation Failed.Please try again or contact Admin.");
        }
    } else
        header('location::../home.php?message=Try Again');
} else {
    header('location: ../home.php?tab=update-customer-details&message= Please Enter All And Correct Information');
}

?>