<div class="grid-container">
    <?php
    include "Connections/dbconnect.php";
    include "templates/header.php";
    include "templates/sidebar.php";
    ?>
    <!-- Main -->
    <style>
        /*.apexcharts-toolbar {
            background-color: #333;
            color: #fff;
        }*/
        .apexcharts-menu-item:hover {
            color: #333;
        }
        .apexcharts-menu.apexcharts-menu-open {
            background-color: #333;
            color: #fff;
        }

    </style>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <main class="main-container">
        <?php
        include "templates/dropdownlist.php";
        ?>

        <div class="main-title">
            <h4>DASHBOARD</h4>
        </div>

        <div class="main-cards">
        <div class="card">
                <div class="card-inner">
                    <h3>CUSTOMERS</h3>
                    <span class="material-icons-outlined"> groups </span>
                </div>
                <?php

                $sql = "SELECT count(1) AS count FROM customers";
                $query = mysqli_query($con, $sql) or die(mysqli_error($con));
                $row = mysqli_fetch_assoc($query);
                echo '<h1>'.$row['count'].'</h1>';
                ?>
            <a class="small text-white stretched-link" href="Customer.php">View Details</a>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>PRODUCTS</h3>
                    <span class="material-icons-outlined"> inventory_2 </span>
                </div>
                <?php

                    $sql = "SELECT count(1) AS count FROM products";
                    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
                    $row = mysqli_fetch_assoc($query);
                    echo '<h1>'.$row['count'].'</h1>';
                ?>
            <a class="small text-white stretched-link" href="Product.php">View Details</a>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>TRANSACTIONS</h3>
                    <span class="material-icons-outlined"> point_of_sale </span>
                </div>
                <h1 class="transaction-count">0</h1>
                <a class="small text-white stretched-link" href="Transaction.php">View Details</a>
            </div>

        

          

            <div class="card">
                <div class="card-inner">
                    <h3>Sales Report</h3>
                    <span class="material-icons-outlined"> receipt_long </span>
                </div>
                <?php

                $sql = "SELECT count(1) AS count FROM transactions";
                $query = mysqli_query($con, $sql) or die(mysqli_error($con));
                $row = mysqli_fetch_assoc($query);
                echo '<h1>'.$row['count'].'</h1>';
                ?>
            <a class="small text-white stretched-link" href="SalesReport.php">View Details</a>
            </div>
            <!--<div class="card">
                <div class="card-inner">
                    <h3>SALES REPORT</h3>
                    <span class="material-icons-outlined"> receipt</span>
                </div>
                <h1>50</h1>
            </div>-->


        </div>

        <!-- Charts -->
        <div class="charts">

            <div class="charts-card">
                <h2 class="chart-title">Monthly Sales Report</h2>
                <div id="chart"></div>
                <?php
                $status = 'Pending';
                $sql = $con->prepare("SELECT *, MONTH(created_at) AS month, SUM(item_quantity * item_price) AS total_sales
                      FROM transactions
                      WHERE status = ?
                      GROUP BY item_flavor, MONTH(created_at)
                      ORDER BY item_flavor, MONTH(created_at)");

                $sql->bind_param("s", $status);
                $sql->execute();
                $result = $sql->get_result();

                $sales_data = array();

                // Loop through the query results and populate the sales data array
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_name = $row['item_flavor'];
                    $month = $row['month'];
                    $sales = floatval($row['total_sales']);

                    if (!isset($sales_data[$product_name])) {
                        $sales_data[$product_name] = array_fill(0, 12, 0.0);
                    }

                    $sales_data[$product_name][$month - 1] = $sales;
                }

                // Build the chart data object
                $data = array(
                    'series' => array(),
                    'labels' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                );

                $colors = array('#F44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50');

                $i = 0;
                foreach ($sales_data as $product_name => $sales) {
                    $color = $colors[$i % count($colors)];

                    $dataset = array(
                        'name' => $product_name,
                        'data' => $sales,
                        'color' => $color,
                    );

                    array_push($data['series'], $dataset);

                    $i++;
                }
                ?>

                <script>
                    var options = {
                        chart: {
                            height: 350,
                            type: 'area', // area, bar, radar

                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: true,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth'
                        },
                        series: <?php echo json_encode($data['series']); ?>,
                        colors: <?php echo json_encode($colors); ?>,
                        markers: {
                            size: 5,
                            strokeWidth: 2,
                            hover: {
                                size: 7,
                                backgroundColor: '#123',
                                color: '#000'
                            }
                        },
                        xaxis: {
                            categories: <?php echo json_encode($data['labels']); ?>,
                            labels: {
                            style: {
                            colors: "#f5f7ff",
                        },
                    },
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: "#f5f7ff",
                                },
                                formatter: function (value) {
                                    return "₱" + value.toFixed(2);
                                }
                            }
                        },

                        legend: {
                            labels: {
                                colors: "#f5f7ff",
                            },
                            show: true,
                            position: "top",
                        },
                        tooltip: {
                            theme: 'dark',
                            style: {
                                backgroundColor: '#000',
                                color: '#fff'
                            },
                            x: {
                                show: true,
                                format: 'MMM',
                            },
                            y: {
                                formatter: function (value) {
                                    return "₱" + value.toFixed(2);
                                },
                                style: {
                                    fontSize: '14px',
                                    fontFamily: undefined,
                                    color: '#fff',
                                    background: '#000'
                                }
                            }
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#chart"), options);

                    chart.render();
                </script>
            </div>

            <div class="charts-card">
                <h2 class="chart-title">Top 5 Products</h2>
                <div id="bar-chart"></div>
                <?php

                try {

                    $status = 'Pending';
                    $sql = $con->prepare("SELECT *, SUM(item_quantity) AS total_quantity 
                                                FROM 
                                                     transactions 
                                                WHERE 
                                                     status = ?
                                                GROUP BY 
                                                     item_flavor
                                                ORDER BY 
                                                     SUM(item_quantity) 
                                                DESC
                                                LIMIT 5;");

                    $sql->bind_param("s",  $status);
                    $sql->execute();
                    $result = $sql->get_result();

                    while($row = mysqli_fetch_assoc($result)) {
                        $product_name1[] = $row['item_flavor'];
                        $product_quantity1[] = $row['total_quantity'];
                    }

                    $jsonName = json_encode($product_name1);
                    $jsonQuantity = json_encode($product_quantity1);

                    $output = '';

                    $output.='<script>
                    var xValues = '.$jsonName.';
                    var yValues = '.$jsonQuantity.';
                    var barColors = ["#2962ff", "#d50000", "#2e7d32", "#ff6d00", "#583cb3"];
        
                    var barChartOptions = {
                        series: [
                            {
                                data: yValues,
                                name: "Products",
                            },
                        ],
                        chart: {
                            type: "bar",
                            background: "transparent",
                            height: 350,
                            toolbar: {
                                show: true,
                            },
                        },
                        colors: barColors,
                        plotOptions: {
                            bar: {
                                distributed: true,
                                borderRadius: 4,
                                horizontal: false,
                                columnWidth: "40%",
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        fill: {
                            opacity: 1,
                        },
                        grid: {
                            borderColor: "#55596e",
                            yaxis: {
                                lines: {
                                    show: true,
                                },
                            },
                            xaxis: {
                                lines: {
                                    show: true,
                                },
                            },
                        },
                        legend: {
                            labels: {
                                colors: "#f5f7ff",
                            },
                            show: true,
                            position: "top",
                        },
                        stroke: {
                            colors: ["transparent"],
                            show: true,
                            width: 2,
                        },
                        tooltip: {
                            shared: true,
                            intersect: false,
                            theme: "dark",
                        },
                        xaxis: {
                            categories: xValues,
                            title: {
                                style: {
                                    color: "#f5f7ff",
                                },
                            },
                            axisBorder: {
                                show: true,
                                color: "#55596e",
                            },
                            axisTicks: {
                                show: true,
                                color: "#55596e",
                            },
                            labels: {
                                style: {
                                    colors: "#f5f7ff",
                                },
                            },
                        },
                        yaxis: {
                            title: {
                                text: "Count",
                                style: {
                                    color: "#f5f7ff",
                                },
                            },
                            axisBorder: {
                                color: "#55596e",
                                show: true,
                            },
                            axisTicks: {
                                color: "#55596e",
                                show: true,
                            },
                            labels: {
                                style: {
                                    colors: "#f5f7ff",
                                },
                            },
                        },
                    };
                    
                    var barChart = new ApexCharts(
                        document.querySelector("#bar-chart"),
                        barChartOptions
                    );
                    barChart.render();
			
		</script>';

                } catch (PDOException $e) {
                    echo "The top 5 products could not be fetch.<br>".$e->getMessage();
                }

                echo $output;
                ?>
            </div>


        </div>
        <!-- End Charts -->
    </main>
    <!-- End Main -->
</div>


<!-- Scripts -->
<!-- ApexCharts -->
<!-- Custom JS -->

<script src="JS/script.js"></script>
<script src="JS/dashboard.js"></script>



