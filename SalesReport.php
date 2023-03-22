<?php
include "Connections/dbconnect.php";
/*$dateFirst = '2023-03-01'. '00:00:00';
$convert_date = date("Y-m-t", strtotime($dateFirst));
$dateLast = $convert_date. ' 23:59:59';

echo $dateLast;*/
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="img/favicon.png">

<style>
    table, h1 {
        font-family: "Open Sans", sans-serif;
    }
    th { white-space: nowrap; }

    #per_day, #between_date, #per_year, #per_month{
        display: none;
    }
    .ui-datepicker-calendar {
        display: none;
    }
</style>
<div class="grid-container">
    <?php
    include "templates/header.php";
    include "templates/sidebar.php";
    ?>

    <!-- Main -->

<main class="main-container">
    <?php include("templates/dropdownlist.php"); ?>

    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 mt-2 border-bottom">
            <h1 class="h2">Sales Report</h1>
        </div>
        <form action="">
            <div class="form-group">
                <div class="inputs" style="display: flex; gap: 1rem;">
                    <!--<select class="form-select-sm" aria-label="Default select example" id="type_of_sales" name="type_of_sales">
                        <option selected disabled>-- Type Of Sales --</option>
                        <option value="1">Over All Sales</option>
                        <option value="2">Specific Product</option>
                        <option value="3">Per Customer</option>
                    </select>-->

                    <select class="form-select-sm" aria-label="Default select example" id="type_of_date" name="type_of_date">
                        <option selected value="today">Today</option>
                        <option value="per_day">Per Day</option>
                        <option value="per_month">Per Month</option>
                        <option value="per_year">Per Year</option>
                        <option value="between_date">Between Date</option>
                    </select>


                    <div id="per_day">
                        <label for="perDay">Select Day: </label>
                        <input type="date" name="per_day" id="perDay">
                    </div>

                    <div id="per_month">
                        <label for="perMonth">Select Month: </label>
                        <input type="month"  name="per_month" id="perMonth">
                    </div>

                    <div id="per_year">
                        <label for="perYear">Select Year: </label>
                        <select name="" id="perYear">
                            <option selected disabled> -- Select Year --</option>
                            <?php
                                $year = 2010;
                                $years = 2050;

                                $output = '';
                                for($i = $year;  $i<=$years; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                 }
                            ?>
                        </select>

                    </div>

                    <div id="between_date">
                        <label for="from_date">From: </label>
                        <input type="date"  id="from_date">
                        <label for="to_date">To: </label>
                        <input type="date"  id="to_date">
                    </div>

                </div>

            </div>
        </form>
        <br><br>


        </div>

        <div id="display_report">

        </div>

    </div>


</main>

    <!-- End of Main -->

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
<script src="JS/script.js"></script>

<script>


    $(document).ready(function () {
        var type_of_date = "today";
        $.ajax({
            url:'sales-report-ajax.php',
            method:'POST',
            data:{
                type_of_date: type_of_date,
            },
            success:function(data){
                $('#display_report').html(data);

            }
        })

        $('#type_of_date').change(function () {
            var type_of_date = $(this).find(":selected")[0].value;
            if (type_of_date == "today") {
                $('#per_day').hide();
                $('#between_date').hide();
                $('#per_year').hide();
                $('#per_month').hide();

                    $.ajax({
                        url:'sales-report-ajax.php',
                        method:'POST',
                        data:{
                            type_of_date: type_of_date,
                        },
                        success:function(data){
                            $('#display_report').html(data);

                        }
                    })

            }

            if (type_of_date == "per_day") {
                $('#per_day').show();
                $('#between_date').hide();
                $('#per_year').hide();
                $('#per_month').hide();


                $('#perDay').change(function () {
                    var per_day = document.getElementById('perDay').value;
                    /*console.log(per_day);*/

                    $.ajax({
                        url:'sales-report-ajax.php',
                        method:'POST',
                        data:{
                            type_of_date: type_of_date,
                            per_day: per_day
                        },
                        success:function(data){
                            $('#display_report').html(data);

                        }
                    })
                });
            }
            if (type_of_date == "between_date") {
                $('#between_date').show();
                $('#per_day').hide();

                $('#per_year').hide();
                $('#per_month').hide();

                $('#between_date').change(function () {
                    var from_date = document.getElementById('from_date').value;
                    var to_date = document.getElementById('to_date').value;


                    if(from_date != "" && to_date != "") {
                        $.ajax({
                            url:'sales-report-ajax.php',
                            method:'POST',
                            data:{
                                type_of_date: type_of_date,
                                from_date: from_date,
                                to_date: to_date
                            },
                            success:function(data){
                                $('#display_report').html(data);

                            }
                        })
                    }
                });
            }
            if (type_of_date == "per_year") {
                $('#per_day').hide();
                $('#between_date').hide();
                $('#per_year').show();
                $('#per_month').hide();

                $('#perYear').change(function () {
                    var perYear = $(this).find(":selected")[0].value;

                   /* console.log(perYear);*/

                    $.ajax({
                        url:'sales-report-ajax.php',
                        method:'POST',
                        data:{
                            type_of_date: type_of_date,
                            perYear: perYear
                        },
                        success:function(data){
                            $('#display_report').html(data);

                        }
                    })
                });
            }

            if (type_of_date == "per_month") {
                $('#per_month').show();
                $('#per_day').hide();
                $('#between_date').hide();
                $('#per_year').hide();



                $('#per_month').change(function () {
                    var perMonth = document.getElementById('perMonth').value;

                    /*console.log(perMonth);*/

                    $.ajax({
                        url:'sales-report-ajax.php',
                        method:'POST',
                        data:{
                            type_of_date: type_of_date,
                            perMonth: perMonth
                        },
                        success:function(data){
                            $('#display_report').html(data);

                        }
                    })
                });

            }

        });
    });



</script>