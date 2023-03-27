<?php
include 'Connections/dbconnect.php';
include 'Controllers/CustomerController.php';

if (isset($_POST['action']) && $_POST['action'] === 'submit') {
   $customer_name = $_POST['customer_name'];
   $customer_email = $_POST['customer_email'];
   $customer_contact = $_POST['customer_contact'];
   $customer_address = $_POST['customer_address'];
   $customer_date = $_POST['customer_date'];

   // build the data array to pass to the create() function
   $customer_data = [
      'customer_name' => $customer_name,
      'customer_email' =>  $customer_email,
      'customer_contact' =>   $customer_contact,
      'customer_address' => $customer_address,
      'customer_date' =>  $customer_date,
   ];
   

   // create a new instance of TransactionController and call the create() function
   $customerController = new CustomerController($con);
   $result = $customerController->create($customer_data);

   // return the JSON response from the create() function
   echo $result;
}