<?php

include "Connections/dbconnect.php";

if (isset($_POST['delete_product'])) {
   $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

   $sql = "DELETE FROM `products` WHERE id='$product_id'";
   $result = mysqli_query($con, $sql);

   if ($result) {
       $res = [
           'status' => 200,
           'message' => "Customer Deleted Successfully"
       ];
       echo json_encode($res);
       return false;
   } else {
       $res = [
           'status' => 500,
           'message' => "Customer Not Deleted"
       ];
       echo json_encode($res);
       return false;
   }
}
