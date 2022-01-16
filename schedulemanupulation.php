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
                        <h2 class="page-title">Schedule Information</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#">Information</a></li>
                                <li>Schedule info</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
	th,td{
		text-align:center;
	}
	</style>
<body>
    
    
	
	<?php
	$connect=mysqli_connect("localhost","root","","dlh_project");

				if($_GET){
					if($_GET["event"]=="delete"){
					$sno=$_GET["sno"];
					$query="delete from schedule where sno=$sno";
					$result= mysqli_query($connect,$query);
				if(!$result){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Error: <<<</center></b>".mysql_error();
				}
				else{
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Data of Labour Is Deleted. <<<</center></b>";	
				}
			}
		}		
?>
	
<div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <div class="section-title mb40 text-center">
                        <h1><i>Labour Schedule Table</i></h1>
                    </div>
                </div>
            </div>
</div>



<?php
$query="select s.sno, l.lid, l.l_type, s.available_place, s.available_date, s.start_time, 
s.end_time from schedule s, labour l where status='' AND l.lid=s.lid ORDER BY sno DESC";
		$result= mysqli_query($connect,$query);
		echo "<center><table border='4' width='100%'>";
			echo "<tr class='control-label1'>";
				echo "<th width='11%'>Schedule no</th>";
				echo "<th width='11%'>LABOUR id</th>";
				echo "<th width='11%'>LABOUR Type</th>";
				echo "<th width='12%'>available place</th>";
				echo "<th width='11%'>available date</th>";
				echo "<th width='11%'>start time</th>";
				echo "<th width='11%'>end time</th>";
				echo "<th width='11%'>Edit Data</th>";
				echo "<th width='11%'>Delete Data</th>";
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$sno=$row["sno"];
				$lid=$row["lid"];
				$l_type=$row["l_type"];
				$available_place=$row["available_place"];
				$available_date=$row["available_date"];
				$start_time=$row["start_time"];
				$end_time=$row["end_time"];
				echo "<tr>";
					echo "<td>$sno</td>";
					echo "<td>$lid</td>";
					echo "<td>$l_type</td>";
					echo "<td>$available_place</td>";
					echo "<td>$available_date</td>";
					echo "<td>$start_time</td>";
					echo "<td>$end_time</td>";
					echo "<td><a href='scheduleedit.php?event=edit&sno=$sno&lid=$lid&available_place=$available_place&available_date=$available_date&start_time=$start_time&end_time=$end_time'>Edit</a></td>";
					echo "<td><a href='schedulemanupulation.php?event=delete&sno=$sno'>Delete</a></td>";
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