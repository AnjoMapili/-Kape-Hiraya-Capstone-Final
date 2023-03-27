<?php
class CustomerController
{
   private $connection;

   public function __construct($connection)
   {
      $this->connection = $connection;
   }
public function create($data)
{
   $customer_number = $this->generateRandomNumber();
   $customer_name = $data['customer_name'];
   $customer_email = $data['customer_email'];
   $customer_contact = $data['customer_contact'];
   $customer_address = $data['customer_address'];
   $customer_date = $data['customer_date'];

   // foreach ($items as $item) {
   //    $flavor = $item['selFlavorItem'];
   //    $roast = $item['selRoastItem'];
   //    $grind = $item['selGrindItem'];
   //    $quantity = $item['txtQuantity'];
   //    $measurement = $item['selMeasurement'];
   //    $price = $item['txtPrice'];
   //    $status = 'Pending';
   //    $created_at = date('Y-m-d H:i:s');

      // prepare the statement
      $stmt = $this->connection->prepare("INSERT INTO `customers` (`name`, `customer_number`, `email`, `contact`, `address`, `date`) VALUES (?, ?, ?, ?, ?, ?)");
      if (!$stmt) {
         return $this->getDataAsJSON([
            'status' => 500,
            'message' => 'Failed to prepare SQL statement'
         ]);
      }

      // bind the values
      $stmt->bind_param("ssssss", $customer_name , $customer_number,   $customer_email, $customer_contact, $customer_address,  $customer_date);

      // execute the statement
      $result = $stmt->execute();
      if (!$result) {
         return $this->getDataAsJSON([
            'status' => 500,
            'message' => 'Failed to prepare SQL statement'
         ]);
      }
   

   return $this->getDataAsJSON([
      'status' => 200,
      'message' => "New record created successfully"
   ]);
}


public function read($customer_number = null)
{
   if ($customer_number) {
      $customer_number = $this->connection->real_escape_string($customer_number);
      $sql = "SELECT
         id,
         customer_number,
         name,
         email,
         contact,
         address,
         date,
         FROM customers
         WHERE customer_number = $customer_number";
   }else {
      $sql = "SELECT 
         t.id,
         t.customer_number,
         t.name,
         t.email,
         t.contact,
         t.address,
         t.date
         FROM customers as t
         GROUP BY t.customer_number ORDER BY t.id DESC";
   }
   $result = $this->connection->query($sql);

if ($result) {
   if ($result->num_rows > 0) {
      $data = [];
      while ($row = $result->fetch_assoc()) {
         $data[] = $row;
      }

      return $this->getDataAsJSON([
         'status' => 200,
         'data' => $data
      ]);
   } else {
      return $this->getDataAsJSON([
         'status' => 404,
         'message' => 'No data found'
      ]);
   }
} else {
   return $this->getDataAsJSON([
      'status' => 500,
      'message' => 'Failed to retrieve data from database'
   ]);
}
}
 public function delete($cust_no)
   {
      $customer_number = $this->connection->real_escape_string($cust_no);
      $sql = "DELETE FROM `customers` WHERE customer_number = '$customer_number'";

      $result = $this->connection->query($sql);

      if ($result) {
         if ($this->connection->affected_rows > 0) {
            return $this->getDataAsJSON([
               'status' => 200,
               'message' => 'Customer deleted successfully'
            ]);
         } else {
            return $this->getDataAsJSON([
               'status' => 404,
               'message' => 'Customer not found'
            ]);
         }
      } else {
         return $this->getDataAsJSON([
            'status' => 500,
            'message' => 'Failed to delete customer'
         ]);
      }
   }

public function getDataAsJSON($data)
{
   header('Content-Type: application/json');
   return json_encode($data);
}

public function generateRandomNumber()
{
   $six_digit_random_number = random_int(100000, 999999);
   return $six_digit_random_number;
}
}
