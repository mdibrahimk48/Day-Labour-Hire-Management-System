<?php
	include_once 'header.php';
	if(isset($_SESSION["login"])){
	if($_SESSION["usertype"]=="admin"){
?>


<?php	
$connect=mysqli_connect("localhost","root","","dlh_project");

?>

<!DOCTYPE html>
<html lang="en">

    <div class="page-header1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">Hire Information</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#">Information</a></li>
                                <li>hire info</li>
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
					$sno=$_GET["sno"];
					$query="delete from schedule where sno=$sno";
					$result= mysqli_query($connect,$query);
				if(!$result){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Error: <<<</center></b>".mysql_error();
				}
				else{
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Hired Data Deleted! <<<</center></b>";	
				}
			}
		}

?>
	
	<div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p>
                            <strong>Social Links:</strong>
                            <br>
                        </p>
                    <!-- /.widget search -->
                    <div class="widget widget-social">
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
                            <h1>Search Hire Information</h1>
                            <p> Fill out the information below to search. Must need to fill <span class="star-col">*</span> marked fields.</p>
                            <form method="post" action="hireinformation.php" enctype="multipart/form-data">
                                <div class="col-md-6">
								<input type="hidden" name="from_date" value = "<?php echo $from_date; ?>" >
								<input type="hidden" name="to_date" value = "<?php echo $to_date; ?>" >
                                        <label class="control-label" for="from_date">From Date <span class="star-col">*</span></label>
                                        <input type="date" name="from_date" id="from_date" class="form-control" required=""/>
                                    </div>
									
									<div class="col-md-6">
                                        <label class="control-label" for="to_date">To Date <span class="star-col">*</span></label>
                                        <input type="date" name="to_date" id="to_date" class="form-control" required=""/>
                                    </div>
									
                                    <center><div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-default" value="search" />
                                        </div>
                                    </div></center>
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
				$from_date=$_POST["from_date"];
				$to_date=$_POST["to_date"];
				if($from_date==null||$to_date==null){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Some of The Fields Are Blank. Please Insert Data. <<<</center></b>";
				}

$query="select s.sno, l.lid, l.l_type, s.available_place, s.available_date, s.start_time, s.end_time, h.hno, h.phone_no from schedule s, labour l, hire h where status='hired' AND available_date between '$from_date' and '$to_date' AND l.lid=s.lid AND h.sno=s.sno ORDER BY hno DESC";
		$result= mysqli_query($connect,$query);	
		if($result->num_rows<=0){
			echo "<b><center style='background-color:#ADD8E6; color:red'>>>> No Data Found With This Date! <<<</center></b>";
		}else{
			
	
echo "<div class='container'>
            <div class='row'>
                <div class='col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12'>
                    <div class='section-title mb40 text-center'>
                        <h1>Searching Result</h1>
                    </div>
                </div>
            </div>
</div>";	
	
	
	
		echo "<center><table border='4' width='100%'>";
			echo "<tr class='control-label1'>";
				echo "<th width='5%'>Hire no</th>";
				echo "<th width='5%'>Schedule no</th>";
				echo "<th width='5%'>labour id</th>";
				echo "<th width='12%'>labour type</th>";
				echo "<th width='12%'>hired place</th>";
				echo "<th width='12%'>hired date</th>";
				echo "<th width='12%'>starting time</th>";
				echo "<th width='12%'>end time</th>";
				echo "<th width='12%'>Hired By</th>";
				echo "<th width='13%'>action</th>";
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$hno=$row["hno"];
				$sno=$row["sno"];
				$lid=$row["lid"];
				$l_type=$row["l_type"];
				$available_place=$row["available_place"];
				$available_date=$row["available_date"];
				$start_time=$row["start_time"];
				$end_time=$row["end_time"];
				$phone_no=$row["phone_no"];
				echo "<tr>";
					echo "<td>$hno</td>";
					echo "<td>$sno</td>";
					echo "<td>$lid</td>";
					echo "<td>$l_type</td>";
					echo "<td>$available_place</td>";
					echo "<td>$available_date</td>";
					echo "<td>$start_time</td>";
					echo "<td>$end_time</td>";
					echo "<td>$phone_no</td>";
					echo "<td><a href='hireinformation.php?event=delete&sno=$sno'>Delete</a></td>";
				echo "</tr>";
			}
		}
		echo "</table></center>";
}}
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