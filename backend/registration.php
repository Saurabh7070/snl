<!-- echo date("'Y-m-d H:i:s'"); -->
<?php include "connection.php";
include "restriction.php";

if (isset($_POST['register'])) {
    extract($_POST);
    if (!empty($customer_first_name) && !empty($relative_name) && !empty($mobile_number) && !empty($adhaar_number) && !empty($pan_number) && !empty($form_number) && !empty($_FILES['customer_photo']['name']) && !empty($account_number) && !empty($account_type)) {

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
        date_default_timezone_set("Asia/Kolkata");
        $registered_on = date('m/d/Y H:i:s', time());

        $sql = "SELECT * from customers_master WHERE account_number = '$account_number' OR adhaar_number = '$adhaar_number' OR pan_number = '$pan_number'";
        if ($check = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($check) > 0) {
                header("location: ../home.php?tab=customer-registration&message=Account Number or Adhaar number or PAN Number already exists in the database");
            } else {
                $insert_query = "INSERT INTO `customers_master` (`customer_name`, `relative_name`, `mobile_number`, `adhaar_number`, `pan_number`, `form_number`, `customer_photo`, `account_number`, `account_type`, `registered_on`,`account_status`) VALUES ('$customer_first_name $customer_last_name', '$relative_name', '$mobile_number', '$adhaar_number', '$pan_number', '$form_number', '$new_img_name', '$account_number', '$account_type', '$registered_on',1)";

                $result = mysqli_query($conn, $insert_query) or die($insert_query);
                if ($result) {
                    header("location: ../view-customer-details.php");
                    mysqli_close($conn);
                } else {
                    header("location: ../home.php?error=Registation Failed.Please try again or contact Admin.");
                }
            }
        } else
            header('location::../home.php?message=Try Again');
    }
} else {
    header('location: ../home.php?message= Please Enter All And Correct Information');
}

?>