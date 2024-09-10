<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "includes/head.php";
?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php require "includes/header.php"; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php require "includes/aside.php"; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Expired</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Expired</h4>
                                    </div>
                                </div>
                                
                                <!-- Fetching data from the database -->
                                <?php 
                                require "includes/conn.php";
                                $sql ="SELECT * FROM store";
                                $res = mysqli_query($conn, $sql);

                                if ($res == TRUE) {
                                    $count = mysqli_num_rows($res);
                                    $sn=1;
                                    if($count > 0){
                                        while ($rows = mysqli_fetch_assoc($res)) {
                                            $id = $rows['id'];
                                            $medicine_name = $rows['medicine_name'];
                                            $type = $rows['type'];
                                            $capacity = $rows['capacity'];
                                            $Qty = $rows['Qty'];
                                            $price = $rows['price'];
                                            $amount = $rows['amount'];
                                            $expiry_date = $rows['expiry_date'];
                                            $drug_expiry_date = date("Y-m-d", strtotime(date("Y-m-d")));
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                    <tr class="bg-danger text-white">
                                        <th class="border-top-0">S.N</th>
                                        <th class="border-top-0">Medicine Name</th>
                                        <th class="border-top-0">Date Expired</th>
                                        <th class="border-top-0">Quantity</th>
                                        <th class="border-top-0">Price</th>
                                        <th class="border-top-0">Amount</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $sql = "SELECT * FROM store WHERE expiry_date < CURDATE()";
                                    $res = mysqli_query($conn, $sql);

                                    if ($res == TRUE) {
                                        $count = mysqli_num_rows($res);
                                        $sn = 1;
                                        if($count > 0){
                                            while ($rows = mysqli_fetch_assoc($res)) {
                                                $id = $rows['id'];
                                                $medicine_name = $rows['medicine_name'];
                                                $Qty = $rows['Qty'];
                                                $price = $rows['price'];
                                                $expiry_date = $rows['expiry_date'];
                                                $dosage_sold = $rows['dosage_sold'];
                                                $price_dosage = $rows['price_dosage'];
                                                $confirm = $rows['confirm'];

                                                $price_display = ($dosage_sold == "Yes") ? $price_dosage : $price;
                                                $amount = ($dosage_sold == "Yes") ? $Qty * $price_dosage : $Qty * $price;
                                                $status = ($confirm == '0') ? "Not Yet Confirmed" : "Confirmed";
                                                ?>
                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $medicine_name; ?></td>
                                                    <td><?php echo $expiry_date; ?></td>
                                                    <td><?php echo $Qty; ?></td>
                                                    <td><?php echo $price_display; ?></td>
                                                    <td><?php echo $amount; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                    <td><a href="delete_expired.php?id=<?php echo $id; ?>" class="btn btn-warning">Confirm</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer text-center">
                All Rights Reserved
            </footer>
        </div>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.js"></script>
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
