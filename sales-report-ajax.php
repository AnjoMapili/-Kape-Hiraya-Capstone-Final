<?php

include "Connections/dbconnect.php";
date_default_timezone_set('Asia/Manila');

if(isset($_POST['type_of_date'])) {

    try {

        $status = "Pending";
        $date_today =  date("Y-m-d");

        if($_POST['type_of_date'] == "today") {
            $dateFirst = $date_today. ' 00:00:00';
            $dateLast = $date_today. ' 23:59:59';

            $dateDisplay = $date_today. ' (Today)';
        } elseif($_POST['type_of_date'] == "per_day") {
            $dateFirst = $_POST['per_day']. ' 00:00:00';
            $dateLast = $_POST['per_day']. ' 23:59:59';

            $dateDisplay = $_POST['per_day'] .' (Per Day)';
        } elseif($_POST['type_of_date'] == "between_date") {
            $dateFirst = $_POST['from_date']. ' 00:00:00';
            $dateLast = $_POST['to_date']. ' 23:59:59';

            $dateDisplay = 'From: '. $_POST['from_date'] .' To: ' .$_POST['to_date'];
        } elseif($_POST['type_of_date'] == "per_month") {
            $dateFirst = $_POST['perMonth'].'-01'. ' 00:00:00';
            $convert_date = date("Y-m-t", strtotime($dateFirst));
            $dateLast = $convert_date. ' 23:59:59';

            $dateDisplay = $_POST['perMonth'] .' (Per Month)';
        } elseif($_POST['type_of_date'] == "per_year") {
            $dateFirst = $_POST['perYear'].'-01-01'. ' 00:00:00';
            $dateLast = $_POST['perYear'].'-12-31'. ' 23:59:59';

            $dateDisplay = $_POST['perYear'] .' (Per Year)';
        }

        $sql = $con->prepare("SELECT *, SUM(item_quantity) AS quantity
                                    FROM transactions 
                                    WHERE (created_at BETWEEN ? AND ?) 
                                    AND (status = ?) 
                                    GROUP BY customer_name, item_flavor, item_type_of_roast, item_type_of_grind, item_grams");
        $sql->bind_param("sss", $dateFirst, $dateLast, $status);

        $sql->execute();

        $result = $sql->get_result();

        $table = '<table id="example1" class="display" style="width:100%;">
            <thead>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Type of Roast</th>
                <th>Type of Grind</th>
                <th>Grams</th>
                <th>Item Count</th>
                <th>Item Price</th>
                <th>Total</th>

            </tr>
            </thead>
            <tbody>';

        while($row = mysqli_fetch_assoc($result)) {
            /*$item_count = 0;
            if($row['customer_name'] && $row['item_flavor'] && $row['item_type_of_roast'] && $row['item_type_of_grind'] > 1) {

                $sql = mysqli_query($conn, "SELECT * FROM transactions WHERE ")
            }*/

            $table.='<tr>
                        <td>'.$row['customer_name'].'</td>
                            <td>'.$row['item_flavor'].'</td>
                            <td>'.$row['item_type_of_roast'].'</td>
                            <td>'.$row['item_type_of_grind'].'</td>
                            <td>'.$row['item_grams'].'</td>
                            <td>'.$row['quantity'].'</td>
                            <td>₱'.number_format($row['item_price'], 2).'</td>
                            <td>₱'.number_format($row['quantity'] * $row['item_price'], 2).'</td>
                    </tr>';
        }

        $table.='</tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th id="totalSales" style="text-align:right">Total Sales:</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>';


        $table.='<script>
              
                </script>';
        $table.= "<script>

    $(document).ready(function () {
        var titleTotalSales = 'Total Sales of ' + '$dateDisplay';
        $('#example1').DataTable({
            bDestroy: true,
            'paging': false,
            dom: 'Bfrtip',
            
            buttons: [
                    { extend: 'copyHtml5', footer: true, title: titleTotalSales, },
                    { extend: 'excelHtml5', footer: true, title: titleTotalSales, },
                    { extend: 'csvHtml5', footer: true, title: titleTotalSales, },
                    { extend: 'pdfHtml5', footer: true, title: titleTotalSales, },
                    { extend: 'print', footer: true, title: titleTotalSales, }
                
            ],
           
            
            
            
            footerCallback: function (row, data, start, end, display) {
                var api = this.api();

                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\₱,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(7)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(7, { page: 'current' })
                    .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                // Update footer
                $(api.column(7).footer()).html('₱' + pageTotal + ' ( ₱' + total + ' total)');
            },
        });
    });
    
                    </script>";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    echo $table;

}
