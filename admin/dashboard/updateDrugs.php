<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 
session_start();
require "includes/head.php";
?>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php require "includes/header.php"?>
        <?php require "includes/aside.php";?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Medicine Price</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title"> Update Medicine Price </h4>  
                                    </div>
                                </div>
                                <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                }
                                ?>
                                <form class="form-horizontal form-material" action="includes/update_price.php" method="post">
                                    <?php 
                                    require "includes/conn.php";
                                    $sql ="SELECT * FROM store WHERE id = '$id'";
                                    $res = mysqli_query($conn,$sql);
                                    if ($res == TRUE) {
                                        $count = mysqli_num_rows($res);
                                        if($count > 0){
                                            while ($rows=mysqli_fetch_assoc($res)) {
                                                $id = $rows['id'];
                                                $medicine_name = $rows['medicine_name'];
                                                $Qty = $rows['Qty'];
                                                $price = $rows['price'];
                                                $capacity = $rows['capacity'];
                                                $expiry_date = $rows['expiry_date'];
                                    ?>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="medicine-name" class="col-md-4">Medicine Name</label>
                                                    <input type="text" name="name" class="form-control form-control-line" value="<?php echo $medicine_name?>" id="medicine-name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="total-quantity" class="col-md-4">Total Quantity</label>
                                                    <input type="text" name="qty" value="<?php echo $Qty?>" class="form-control form-control-line" id="total-quantity">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="expiry-date" class="col-md-4">Expiry Date</label>
                                                    <input type="date" name="expiryDate" value="<?php echo $expiry_date?>" class="form-control form-control-line" id="expiry-date">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="price" class="col-md-4">Price</label>
                                                    <input type="text" name="price" value="<?php echo $price?>" class="form-control form-control-line" id="price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="id" value="<?php echo $id?>">
                                            <button class="btn btn-success btn-block" type="submit" name="submit">Update Medicine</button>
                                        </div>
                                    </div>
                                </form>
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
