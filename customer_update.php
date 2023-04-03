<?php
include 'Connections/dbconnect.php';
include 'Controllers/CustomerController.php';

if (isset($_POST['action']) && $_POST['action'] === 'submit') {
  $customer_number = $_POST['customer_number'];
  $customer_name = $_POST['customer_name'];
  $customer_email = $_POST['customer_email'];
  $customer_contact = $_POST['customer_contact'];
  $customer_address = $_POST['customer_address'];
  $customer_date = $_POST['customer_date'];

  // build the data array to pass to the update() function
  $customer_update_data = [
     'customer_number' => $customer_number,
     'customer_name' => $customer_name,
     'customer_email' =>  $customer_email,
     'customer_contact' =>   $customer_contact,
     'customer_address' => $customer_address,
     'customer_date' =>  $customer_date,
  ];
  

  // create a new instance of TransactionController and call the update() function
  $customerController = new CustomerController($con);
  $result = $customerController->update($customer_update_data);

  // return the JSON response from the update() function
  echo $result;
}