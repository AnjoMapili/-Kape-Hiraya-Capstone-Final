<?php
include 'Connections/dbconnect.php';
include 'Controllers/CustomerController.php';

if (isset($_POST['action']) && $_POST['action'] === 'delete') {
   $cust_no = $_POST['cust_no'];
   $customerController = new customerController($con);
   $result = $customerController->delete($cust_no);
   echo $result;
}