<?php include "backend/restriction.php"; ?>
<?php include 'header.php'; ?>

<body>
    <section class="homepage">
        <?php include_once "sidebar.php"; ?>
        <div class="content-side">
            <?php
            if (isset($_GET["tab"])) {
                $selected_tab = $_GET["tab"];
                switch ($selected_tab) {
                    case "customer-registration":
                        include "customer-registration.php";
                        break;
                    case "update-customer-details-admin":
                        include "update-customer-details.php";
                        break;
                    case "customer-list":
                        include "customer-list.php";
                        break;
                    case "new-transaction":
                        include "new-transaction.php";
                        break;
                    case "transaction-history":
                        include "transaction-history.php";
                        break;
                    case "create-new-employee":
                        include "create-new-employee.php";
                        break;
                    case "employee-list":
                        include "employee-list.php";
                        break;
                    case "change-employe-password":
                        include "change-employe-password.php";
                        break;
                    case "admin-change-password":
                        include "admin-change-password.php";
                        break;
                    case "update-employee-password":
                        include "update-employee-password.php";
                        break;
                    case "view-customer-details":
                        include "view-customer-details.php";
                        break;
                    case "update-customer-details":
                        include "update-customer-details.php";
                        break;
                    case "update-details-admin":
                        include "update-details-admin.php";
                        break;
                    default:
                        include "dashboard.php";
                        break;
                }
            } else {
                include "dashboard.php";
            }
            ?>
        </div>
    </section>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>