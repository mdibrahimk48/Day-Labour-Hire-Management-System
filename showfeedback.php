<?php
	include_once 'header.php';
	if(isset($_SESSION["login"])){
	if($_SESSION["usertype"]=="admin"){
?>		
		
	

<!DOCTYPE html>
<html lang="en">

    <div class="page-header1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">Feedback Details</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">home</a></li>
                                <li><a href="#">others</a></li>
                                <li>check feedback</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	<?php
	$connect=mysqli_connect("localhost","root","","dlh_project");
	
		if($_GET){
					if($_GET["event"]=="delete"){
					$f_no=$_GET["f_no"];
					$query="delete from feedback where f_no=$f_no";
					$result= mysqli_query($connect,$query);
				if(!$result){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Error: <<<</center></b>".mysql_error();
				}
				else{
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Feedback Data Deleted. <<<</center></b>";	
				}
			}
		}
?>	
	
	
	
	
<div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <div class="section-title mb40 text-center">
                        <h1>Feedback Details Table</h1>
                    </div>
                </div>
            </div>
</div>



<?php
$connect=mysqli_connect("localhost","root","","dlh_project");

$query="select * from feedback ORDER BY f_no DESC";
		$result= mysqli_query($connect,$query);
		echo "<center><table border='4' width='100%'>";
			echo "<tr class='control-label1'>";
				echo "<th width='10%'>feedback no</th>";
				echo "<th width='50%'>description</th>";
				echo "<th width='10%'>customer mobile</th>";
				echo "<th width='10%'>action</th>";
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$f_no=$row["f_no"];
				$feedback=$row["feedback"];
				$phone_no=$row["phone_no"];
				echo "<tr>";
					echo "<td>$f_no</td>";
					echo "<td>$feedback</td>";
					echo "<td>$phone_no</td>";
					echo "<td><a href='showfeedback.php?event=delete&f_no=$f_no'>Delete</a></td>";
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


<?php
}else {header("location: login.php");
		exit();
	}
}else {header("location: login.php");
	exit();
}
?>