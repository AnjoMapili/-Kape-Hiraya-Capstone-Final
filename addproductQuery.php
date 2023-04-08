<?php
include "Connections/dbconnect.php";

// Delete Query

if(isset($_POST['delete_product'])){
    $product_id = mysqli_real_escape_string($con,$_POST['product_id']);

    $sql="DELETE FROM `products` WHERE id='$product_id'";
    $result = mysqli_query($con,$sql);

    if($result){
        $res = [
            'status' => 200,
            'message' => "Customer Deleted Successfully"
        ];
        echo json_encode($res);
        return false;
    }
    else{
        $res = [
            'status' => 500,
            'message' => "Customer Not Deleted"
        ];
        echo json_encode($res);
        return false;
    }

}
// Add Customer Query

if(isset($_POST['add_product']))
{
    
    $name = mysqli_real_escape_string($con, $_POST['productName']);
  
    $qty_250g = mysqli_real_escape_string($con, $_POST['qty_250g']);
    $qty_500g = mysqli_real_escape_string($con, $_POST['qty_500g']);
    $qty_1kg = mysqli_real_escape_string($con, $_POST['qty_1kg']);

    $price2 = mysqli_real_escape_string($con, $_POST['productPrice2']);
    $price3 = mysqli_real_escape_string($con, $_POST['productPrice3']);
    $price4 = mysqli_real_escape_string($con, $_POST['productPrice4']);

    if($name == NULL || $qty_250g == NULL || $qty_500g == NULL || $qty_1kg == NULL || $price2 == NULL || $price3 == NULL || $price4 == NULL){
        $res = [
            'status' => 422,
            'message' => "All field are mandatory"
        ];
        echo json_encode($res);
        return false;
    }

    $sql="INSERT INTO `products`(`name`, `qty_250g`, `qty_500g`, `qty_1kg`, `price_250g`, `price_500g`, `price_1kg`)
    VALUES ('$name','$qty_250g','$qty_500g','$qty_1kg','$price2','$price3','$price4')";
    $query_run=mysqli_query($con,$sql);
   

    if($query_run){
        $res = [
            'status' => 200,
            'message' => "Product: Created Successfully"
        ];
        echo json_encode($res);
        return false;
    }
    else{
        $res = [
            'status' => 500,
            'message' => "Product Not Created"
        ];
        echo json_encode($res);
        return false;
    }


}

// Get Customer Details Query

if($_POST['product_id'] != ""){

    $id = $_POST["product_id"];

    $sql = "SELECT * FROM products WHERE id ='".$_POST['product_id']."'";
   //  $sql = "SELECT 
   //    p.id,
   //    p.name,
   //    SUM(p.qty_250g) as inv_qty_250g,
   //    SUM(p.qty_500g) as inv_qty_500g,
   //    SUM(p.qty_1kg) as inv_qty_1kg,
   //    p.price_250g,
   //    p.price_500g,
   //    p.price_1kg,
   //    (SELECT COALESCE(SUM(item_quantity), 0) FROM transactions WHERE item_flavor = p.name AND item_grams = '250G') as trans_qty_250g,
   //    (SELECT COALESCE(SUM(item_quantity), 0) FROM transactions WHERE item_flavor = p.name AND item_grams = '500G') as trans_qty_500g,
   //    (SELECT COALESCE(SUM(item_quantity), 0) FROM transactions WHERE item_flavor = p.name AND item_grams = '1KG') as trans_qty_1kg
   //    FROM products as p WHERE id ='".$_POST['product_id']."'
   //  ";
    $result = $con->query($sql);

    if($result->num_rows > 0){

        $array_result = array();
        while($row = $result->fetch_assoc()){
    
            $array_result['productid'] = $row['id'];
            $array_result['UproductName'] = $row['name'];
            
            $array_result['qty_250g'] = $row['qty_250g'];
            $array_result['qty_500g'] = $row['qty_500g'];
            $array_result['qty_1kg'] = $row['qty_1kg'];
            // $array_result['qty_250g'] = $row['inv_qty_250g'] - $row['trans_qty_250g'];
            // $array_result['qty_500g'] = $row['inv_qty_500g'] - $row['trans_qty_500g'];
            // $array_result['qty_1kg'] = $row['inv_qty_1kg'] - $row['trans_qty_1kg'];
            
            $array_result['UproductPrice2'] = $row['price_250g'];
            $array_result['UproductPrice3'] = $row['price_500g'];
            $array_result['UproductPrice4'] = $row['price_1kg'];
            
    
        }
    
        echo json_encode($array_result);
    }


}




?>