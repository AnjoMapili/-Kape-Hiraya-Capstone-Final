 <!-- Sidebar -->

 <style>
     * {
         font-family: "Arial";
     }
 </style>
 <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
             <a href="./dashboard.php"><img src="img/LOGO2.png" alt="" style="height: 75px; width: 150px;"></a>
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">
            close
          </span>
        </div>

        <ul class="sidebar-list">
          <a href="dashboard.php">
            <li class="sidebar-list-items">
            <span class="material-icons-outlined" > dashboard </span> &nbsp;&nbsp;Dashboard
           </li>
           <a href="Customer.php">  <li class="sidebar-list-items">
            <span class="material-icons-outlined"> groups </span> &nbsp;&nbsp;Customers
          </li></a>
          
          <a href="Product.php"><li class="sidebar-list-items">
            <span class="material-icons-outlined"> inventory_2 </span> &nbsp;&nbsp;Products
          </li></a> 
        </a>
          <a href="Transaction.php"><li class="sidebar-list-items">
            <span class="material-icons-outlined"> point_of_sale </span>&nbsp;&nbsp;
            Transactions
          </li></a>
        </a>   
          <a href="SalesReport.php"> 
            <li class="sidebar-list-items">
            <span class="material-icons-outlined"> summarize </span>&nbsp;&nbsp;
            Sales Report 
            </li>
            </a>
           <!-- <a href="About.php"><li class="sidebar-list-items">
                <span class="material-icons-outlined"> info </span>&nbsp;&nbsp;
                About
              </li></a> 
          -->
        </ul>
      </aside>
      <!-- End Sidebar -->