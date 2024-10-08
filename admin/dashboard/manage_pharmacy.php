
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 
require "includes/head.php";
session_start();
?>


<body>
 
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
  
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
                                    <li class="breadcrumb-item active" aria-current="page"> Top Up Phamacy</li>
									
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
           
            <div class="container-fluid">
                <!-- ============================================================== -->
              
                   <!-- ============================================================== -->
                   <?php 
                        if (isset($_SESSION['out-stock'])) {
                            echo $_SESSION['out-stock'];
                            unset ($_SESSION['out-stock']);
                        }
               ?>
                   <?php 
                        if (isset($_SESSION['exceeds-stock'])) {
                            echo $_SESSION['exceeds-stock'];
                            unset ($_SESSION['exceeds-stock']);
                        }
               ?>

                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title"> Top Up Phamacy </h4>  
                                    </div> 
                                    <form method="post" action="requisation.php">
									</div>
                                   
                                <!-- title -->
                            </div>
                      
						
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            
                                            <th class="border-top-0">Medicine Name</th>
                                            <th class="border-top-0">Stock Available</th>
											 <th class="border-top-0">Expiry Date</th>
                                           <th class="border-top-0">Action</th>
  
                                        </tr>
                                    </thead>
									<?php 
														
								require "includes/conn.php";					
								$sql ="SELECT * FROM store";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);

								//check if there are any records in the database
								if ($res == TRUE) {
									$count = mysqli_num_rows($res);
									$sn=1;
									if($count > 0){
										while ($rows=mysqli_fetch_assoc($res)) {
											$id=$rows['id'];
											$medicine_name=$rows['medicine_name'];
											$type=$rows['type'];
											$capacity=$rows['capacity'];
											$Qty=$rows['Qty'];
											$price=$rows['price'];
											$expiry_date=$rows['expiry_date'];
									   ?>
									
                                    <tbody id="output">
                                        <tr>
                                           
										   <td>
											<input  readonly class="form-control"  value="<?php echo "$medicine_name";?> " name="medicine_name">
										   </td>
											<td><?php echo "$Qty";?></td>
											<td><?php echo "$expiry_date";;?></td>
											<td>
                                              <a  href="requisation.php?id=<?php echo "$id"?>" class="btn btn-success" type="button">Receive</a>
                                               </td>
                                        </tr>                     
                                    </tbody>
											 <?php
										}

									}
								}
							?>		
													
                                </table>
								
								
								
								</form>
						
						
						
						
                        </div>
                    </div>
                </div>
        
              
            </div>
                
              
            </div>
            
            <footer class="footer text-center">
                All Rights Reserved 
            </footer>
            <!-- ============================================================== -->
            
        </div>

    </div>
  
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
	
	<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'action2.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</body>

</html>