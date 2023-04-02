<?php include "backend/restriction.php"; ?>


<div class="menu-bar">
    <div class="c-logo">
        <p> Seema Nidhi Ltd.</p>
    </div>
    <div class="welcomeMsg">
        <p>Welcome Admin</p>
    </div>
    <div class="logout-area"><a href="backend/logout.php" class="logout-button">Logout</a></div>

    <div class="menus">
        <div class="dropdown">
            <button class="dropbtn">Dashboard</button>
            <div class="dropdown-content">
                <a href='home.php?tab=dashboard' id=''> Home</a>
                <a href='home.php?tab=admin-change-password' id=''> Change Password</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Customer Managenent</button>
            <div class="dropdown-content">

                <a href='home.php?tab=customer-registration' id=''>Customer Registration</a>
                <a href='home.php?tab=customer-list' id='App-list'>Customer List</a>
                <a href='home.php?tab=update-customer-details' id=''> Update Customer Details</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Transaction Managenent</button>
            <div class="dropdown-content">
                <a href='home.php?tab=new-transaction' id=''>New Transaction </a>
                <a href='home.php?tab=transaction-history' id=''>Transaction History</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Employee Management</button>
            <div class="dropdown-content">
                <a href='home.php?tab=create-new-employee' id=''>Create New Employee</a>
                <a href='home.php?tab=employee-list' id='D-att'>Employee List</a>
                <a href='home.php?tab=update-employe-password' id=''>Employee Passwod Change</a>
            </div>
        </div>
    </div>
</div>
</div>