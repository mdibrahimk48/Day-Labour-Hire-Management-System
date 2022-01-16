<?php
	include_once 'header.php';
?>


<!DOCTYPE html>
<html lang="en">

    <div class="page-header1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">Electrician Information</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="alllabour.php">labour</a></li>
                                <li>Electrician</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <div class="section-title mb40 text-center">
                        <h1>Electrician Information Table</h1>
                    </div>
                </div>
            </div>
</div>



<?php
$connect=mysqli_connect("localhost","root","","dlh_project");

$query="select * from labour where l_type='Electrician'";
		$result= mysqli_query($connect,$query);
		echo "<center><table border='4' width='100%'>";
			echo "<tr class='control-label1'>";
				echo "<th width='9%'>LABOUR ID</th>";
				echo "<th width='9%'>LABOUR TYPE</th>";
				echo "<th width='9%'>LABOUR NAME</th>";
				echo "<th width='9%'>GENDER</th>";
				echo "<th width='9%'>AGE</th>";
				echo "<th width='9%'>EMAIL</th>";
				echo "<th width='9%'>PHONE NO</th>";
				echo "<th width='9%'>ADDRESS</th>";
				echo "<th width='9%'>POST CODE</th>";
				echo "<th width='10%'>IMAGE</th>";
				echo "<th width='9%'>Hourly RATE(BDT)</th>";
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$lid=$row["lid"];
				$l_type=$row["l_type"];
				$l_name=$row["l_name"];
				$gender=$row["gender"];
				$age=$row["age"];
				$email=$row["email"];
				$phone_no=$row["phone_no"];
				$address=$row["address"];
				$post_code=$row["post_code"];
				$l_image=$row["l_image"];
				$hourly_rate=$row["hourly_rate"];
				echo "<tr>";
					echo "<td>$lid</td>";
					echo "<td>$l_type</td>";
					echo "<td>$l_name</td>";
					echo "<td>$gender</td>";
					echo "<td>$age</td>";
					echo "<td>$email</td>";
					echo "<td>$phone_no</td>";
					echo "<td>$address</td>";
					echo "<td>$post_code</td>";
					echo "<td class='l_image'><img src='$l_image' style='height:100px; width:100px'/></td>";
					echo "<td>$hourly_rate</td>";
				echo "</tr>";
			}
		}
		echo "</table></center>";
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
