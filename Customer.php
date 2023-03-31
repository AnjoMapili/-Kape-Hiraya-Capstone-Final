<?php
include "Connections/dbconnect.php";
?>

<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet" />
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/> 
<link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="CSS/transaction.css" />
      <link rel="icon" type="image/x-icon" href="img/favicon.png">
<div class="grid-container"> 
    <?php
        include "templates/header.php";
        include "templates/sidebar.php";
    ?>     
    
        <!-- Main -->    
    
    <main class="main-container">
    <?php
      include "templates/dropdownlist.php";
      ?>
    
  <!-- Add Customer Customer Form -->
  <div class="container-fluid px-4">
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 mt-2 border-bottom">
            <h1 class="h2">Customers</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
               <div class="btn-group mr-2">
                  <button class="btn btn-sm btn-secondary btn-create-customer">Add Customer</button>
               </div>
            </div>
         </div>

         <div class="my-3 p-3 shadow-sm tbl-container">
            <table id="tbl-customers" class="display tbl-customers" style="width:100%; color:F3F4F4">
               <thead>
                  <tr>
                     <th class="text-center">Customer #</th>
                     <th class="text-center">Name</th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Contact No.</th>
                     <th class="text-center">Address</th>
                     <th class="text-center">Date</th>
                     <th class="text-right"></th>
                    
                  </tr>
               </thead>
               <tbody>
               </tbody>
            </table>
         </div>

         <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
               <div class="modal-content ">
                  <div class="modal-header " style="color:black;">
                     <h4 class="modal-title" id="exampleModalLabel">Add Customer</h4>
                  </div>


                  <!-- Modal Body -->
                  <div class="modal-body" style="color:black">

                     <div class="col-12 mt-4">
                        <label for="titleInfo" class="form-label">
                           <H3>CUSTOMER INFORMATION</H3>
                        </label>
                     </div>

               <form class="row g-3">

                        
                  <div class="mb-3">
                          <label for="Name" class="form-label">Name</label>
                          <input type="text" class="form-control completeName" name="completeName" aria-describedby="emailHelp" placeholder="Enter your name"  > 
                  </div>

                  <div class="mb-3">
                          <label for="Email" class="form-label">Email address</label>
                          <input type="email" class="form-control completeEmail" name="completeEmail" aria-describedby="emailHelp" placeholder="Enter your email" > 
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>

                  <div class="mb-3">
                        <label for="Contact" class="form-label">Contact #</label>
                        <input type="text" class="form-control completeContact" name="completeContact" aria-describedby="emailHelp" placeholder="Enter your contact number" >   
                  </div>

                  <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" class="form-control completeAddress" name="completeAddress" aria-describedby="emailHelp" placeholder="Enter your Address" >
                  </div>

                  <div class="mb-3">
                        <label for="Date" class="form-label">Date</label>
                        <input type="date" class="form-control completeDate" name="completeDate" aria-describedby="emailHelp" placeholder="Enter your birthdate"> 
                  </div>

               </form>
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                    
                        <button type="submit" value="Submit" class="btn btn-success" id="btn_submit_customer">Sumbit</button>
                        <button type="button" class="btn btn-secondary btn-close-mdl-customer" value="Close">Close</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>                       
  <!-- Update Form -->
  <div class="modal fade" id="updateCustModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
               <div class="modal-content ">
                  <div class="modal-header " style="color:black;">
                     <h3 class="modal-title" id="exampleModalLabel">Edit Customer</h3>
                  </div>


                  <!-- Modal Body -->
                  <div class="modal-body" style="color:black">

                   

               <form  id="updateField"class="row g-3">

                  <div class="mb-3">
                          <label for="Name" class="form-label">Name</label>
                          <input type="text" class="form-control updateName" name="updateName" aria-describedby="emailHelp" placeholder="Enter your name"  > 
                  </div>

                  <div class="mb-3">
                          <label for="Email" class="form-label">Email address</label>
                          <input type="email" class="form-control updateEmail" name="updateEmail" aria-describedby="emailHelp" placeholder="Enter your email" > 
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>

                  <div class="mb-3">
                        <label for="Contact" class="form-label">Contact #</label>
                        <input type="text" class="form-control updateContact" name="updateContact" aria-describedby="emailHelp" placeholder="Enter your contact number" >   
                  </div>

                  <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" class="form-control updateAddress" name="updateAddress" aria-describedby="emailHelp" placeholder="Enter your Address" >
                  </div>

                  <div class="mb-3">
                        <label for="Date" class="form-label">Date</label>
                        <input type="date" class="form-control updateDate" name="updateDate" aria-describedby="emailHelp" placeholder="Enter your birthdate"> 
                  </div>

               </form>
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                    
                        <button type="submit" value="Submit" class="btn btn-success" id="btn_update_customer">Update</button>
                        <button type="button" class="btn btn-secondary btn-close-mdl-customer" value="Close">Close</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
  




</main>
<!-- End Main -->

</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

<script src="JS/adduser.js"></script>
<script src="js/customer.js"></script>
<script src="JS/script.js"></script>











