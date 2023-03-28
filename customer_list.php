<?php
include 'Connections/dbconnect.php';
include 'Controllers/CustomerController.php';

$customerController = new CustomerController($con);

$cust_no = isset($_GET['cust_no']) ? $_GET['cust_no'] : '';

$result = $customerController->read($cust_no);
echo $result;
