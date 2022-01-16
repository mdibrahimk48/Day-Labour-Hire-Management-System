<?php
	include_once 'header.php';
	if(isset($_SESSION["login"])){
	if($_SESSION["usertype"]=="user"){
?>


<?php	
$connect=mysqli_connect("localhost","root","","dlh_project");

$phone_no=$_SESSION['phone_no'];

?>

<!DOCTYPE html>
<html lang="en">

    <div class="page-header1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">hire different type of labour</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>hire labour</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="widget widget-social">
						<p>
                            <strong>Contact With Us</strong>
                            <br>
                            <a href="mailto:#">info@daylabourhire.com</a>
                        </p>
						</br>
                        <div class="social-circle">
                            <a href="#" class="#"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="#"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>

        
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1>Search labour for hire</h1>
                            <p>Must need to fill <span class="star-col">*</span> marked fields.</p>
							
                            <form name="hirelabour" method="post" action="hirelabour.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
									
									
									<input type="hidden" name="lid" value = "<?php echo $lid; ?>" >
									<input type="hidden" name="start_time" value = "<?php echo $start_time; ?>" >
									<input type="hidden" name="end_time" value = "<?php echo $end_time; ?>" >
									<input type="hidden" name="hourly_rate" value = "<?php echo $hourly_rate; ?>" >
									<input type="hidden" name="status" value = "<?php echo $status; ?>" >
									
									
									
                                        <label class="control-label" for="l_type">Select Type <span class="star-col">*</span></label>
                                        <select class="form-control" id="l_type" name="l_type" required=""/>
											<option value=""> Select One </option>
											<option value="Plumber"> Plumber </option>
											<option value="Electrician"> Electrician </option>
										</select>
                                    </div>
									<div class="col-md-4">
                                        <label class="control-label" for="available_place">Select Place <span class="star-col">*</span></label>
                                        <select class="form-control" id="available_place" name="available_place" required=""/>
											<option value=""> Select One </option>
											<?php 

                                                $con = mysqli_connect("localhost","root","","dlh_project");
														$output = '';
														$query = "select DISTINCT available_place from schedule";
														$result= mysqli_query($con, $query);

															while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
																$available_place = $row['available_place'];
																echo '<option value="'.$available_place.'">'.$available_place.'</option>';
												}

                                            ?>
										</select>
                                    </div>
									<div class="col-md-4">
                                        <label class="control-label" for="available_date">Select date <span class="star-col">*</span></label>
                                        <input type="date" name="available_date" id="available_date" class="form-control" required=""/>
										
									<script type="text/javascript">
										   var today = new Date().toISOString().split('T')[0];
												document.getElementsByName("available_date")[0].setAttribute('min', today);
									</script>
										   
                                    </div>
									<center><div class="form-group">
                                            <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-default" value="search" />
									</div></center>
									<h3>Do you need other skills? For other types of labour <a href="others_required.php"> Click</a> Here. </h3>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>

	<?php	
	$connect=mysqli_connect("localhost","root","","dlh_project");
			if(@$_POST['singlebutton']){

                $l_type=$_POST['l_type'];
				$available_place=$_POST["available_place"];
				$available_date=$_POST["available_date"];
				if($l_type==null||$available_place==null||$available_date==null){
					echo "<center>Some of The Fields Are Blank. Please Insert Data.</center>";
					}else{
						$query="SELECT s.sno, l.l_name, l.gender, l.l_type, s.available_place, s.available_date, l.age, l.l_image, l.phone_no, 
						s.start_time, s.end_time, l.hourly_rate FROM labour l, schedule s
						WHERE l.lid=s.lid AND s.status='' AND l.l_type='$l_type' AND s.available_date='$available_date' AND s.available_place='$available_place'";
						$result= mysqli_query($connect,$query);
						if($result->num_rows<=0){
							echo "<b><center style='background-color:#ADD8E6; color:red'>>>> There Are No Schedule With This Type, Place and Date! For Further Need <a href='others_required.php'> Click</a> Here.</h3> <<<</center></b>";
						}else{
								echo "<div class='container'>
										<div class='row'>
											<div class='col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12'>
												<div class='section-title mb40 text-center'>
													<h1><i><<< Searching Result >>></i></h1>
												</div>
											</div>
										</div>
								</div>";
								
								echo "<center><table border='4' width='100%'>";
									echo "<tr class='control-label1'>";
										echo "<th width='7%'>Schedule No</th>";
										echo "<th width='7%'>LABOUR NAME</th>";
										echo "<th width='7%'>LABOUR Type</th>";
										echo "<th width='8%'>GENDER</th>";
										echo "<th width='8%'>AGE</th>";
										echo "<th width='8%'>IMAGE</th>";
										echo "<th width='8%'>Phone No</th>";
										echo "<th width='8%'>Available Place</th>";
										echo "<th width='8%'>Available Date</th>";
										echo "<th width='8%'>Start Time</th>";
										echo "<th width='8%'>End Time</th>";
										echo "<th width='8%'>Hourly Rate</th>";
										echo "<th width='8%'>Confirm Hire</th>";
									echo "</tr>";
								if($result){
									while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
										$sno=$row["sno"];
										$l_name=$row["l_name"];
										$l_type=$row["l_type"];
										$gender=$row["gender"];
										$age=$row["age"];
										$l_image=$row["l_image"];
										$phone_no=$row["phone_no"];
										$available_place=$row["available_place"];
										$available_date=$row["available_date"];
										$start_time=$row["start_time"];
										$end_time=$row["end_time"];
										$hourly_rate=$row["hourly_rate"];
										echo "<tr>";
											echo "<td>$sno</td>";
											echo "<td>$l_name</td>";
											echo "<td>$l_type</td>";
											echo "<td>$gender</td>";
											echo "<td>$age</td>";
											echo "<td class='l_image'><img src='$l_image' style='height:100px; width:100px'/></td>";
											echo "<td>$phone_no</td>";
											echo "<td>$available_place</td>";
											echo "<td>$available_date</td>";
											echo "<td>$start_time</td>";
											echo "<td>$end_time</td>";
											echo "<td>$hourly_rate</td>";
											echo "<td><a href='hirelabour.php?event=confirm&sno=$sno'>Confirm</a></td>";
										echo "</tr>";
									}
								}
							echo "</table></center>";
							
						}	
					}
				}

				
				if($_GET){
					if($_GET["event"]=="confirm"){
					$sno=$_GET["sno"];
					$phone_no=$_SESSION['phone_no'];
					$query="insert into hire values('', $sno, '$phone_no')";
					$result= mysqli_query($connect,$query);
				if(!$result){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Error: <<<</center></b>".mysql_error();
				}
				else{
					$query="update schedule set status='hired' where sno='$sno'";
					$result= mysqli_query($connect,$query);
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Your Hired Is Confirmed! <<<</center></b>";	
				}
			}
		}		


?>
	
	
	
	
	<div class="space-medium">
	</div>
    <div class="footer">
        <!-- footer-->
        <div class="container">
            <div class="footer-block">
                <!-- footer block -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">Company's Address</h2>
                            <ul class="listnone contact">
                                <li><i class="fa fa-map-marker"></i> 57/C, Dhanmondi, Dhaka - 1209 </li>
                                <li><i class="fa fa-phone"></i> +088 (02) 179-4917</li>
                                <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
                                <li><i class="fa fa-envelope-o"></i> info@daylabourhire.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                            <!-- social block -->
                            <h2 class="widget-title">Social Feed</h2>
                            <ul class="listnone">
                                <li>
                                    <a href="#"> <i class="fa fa-facebook"></i> Facebook </a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i> Linked In</a></li>
                                <li>
                                    <a href="#"> <i class="fa fa-youtube"></i>Youtube</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.social block -->
                    </div>
                   <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-widget widget-newsletter">
                            <!-- newsletter block -->
                            <h2 class="widget-title">Newsletters</h2>
                            <p>Enter your email address to receive new patient information and other useful information right to your inbox.</p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email Address">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Submit</button> 
                            </span>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- newsletter block -->
                    </div>
                </div>
                <div class="tiny-footer">
                    <!-- tiny footer block -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright-content">
                                <p>© Day Labour Hire | design by ibrahim</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tiny footer block -->
            </div>
            <!-- /.footer block -->
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/sticky-header.js"></script>
</body></html>

<?php
}else {header("location: login.php");
		exit();
	}
}else {header("location: login.php");
	exit();
}
?>