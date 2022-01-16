<?php
	include_once 'header.php';
	if(isset($_SESSION["login"])){
	if($_SESSION["usertype"]=="admin"){
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Day labour hire website for customer service provider.">
    <meta name="keywords" content="A website for hire day labour.">
    <title>Day Labour Hire For Household Work</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i%7cMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>


</head>



<style>
	th,td{
		text-align:center;
	}
	</style>
<body>
    <div class="page-header1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">add schedule for different type of labour</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li>edit schedule info</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	
	
	
<?php	
$connect=mysqli_connect("localhost","root","","dlh_project");

			if(@$_GET){
                $sno=$_GET["sno"];
				$lid=$_GET["lid"];
				$available_place=$_GET["available_place"];
				$available_date=$_GET["available_date"];
				$start_time=$_GET["start_time"];
				$end_time=$_GET["end_time"];
			}
			if(@$_POST['edit']){
				$sno=$_POST["sno"];
				$lid=$_POST["lid"];
				$available_place=$_POST["available_place"];
				$available_date=$_POST["available_date"];
				$start_time=$_POST["start_time"];
				$end_time=$_POST["end_time"];


                if($lid==null||$available_place==null||$available_date==null||$start_time==null||$end_time==null){
                    echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Some of The Fields Are Blank. Please Insert Data. <<<</center></b>";
                }else{
                            $query="update schedule set available_place='$available_place', available_date='$available_date', start_time='$start_time', end_time='$end_time', status='' where sno='$sno'";
                            $result= mysqli_query($connect,$query);
                            if(!$result){
                                echo mysqli_error($connect);
                            }else {
                                echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Schedule Data Edited! <<<</center></b>";
                            }       
                    }
			}
				
?>



	
	<div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="widget widget-contact">
                        <h3 class="widget-title"><strong>attention</strong></h3>
                        <p>
                            <br> You Must Be Registered
                            <br> For Hire Labour.
                            <br> Register Yourself And 
                            <br> Hire Different Types 
                            <br> of Day Labour As You Need. 
                        </p>
                        <p>
                            <strong>Contact With Us</strong>
                            <br>
                            <a href="mailto:#">info@daylabourhire.com</a>
                        </p>
                    </div>
                </div>
				
				
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1>Schedule Edit Form</h1>
							 <p> Please fill out the information Which are <span class="star-col">*</span> marked.</p>
                            <form method="post" action="scheduleedit.php" enctype="multipart/form-data">
                                
                                <div class="row">
                                    <div class="col-md-10">
									<input type="hidden" name="lid" value = "<?php echo $lid; ?>" >
                                        <label class="control-label" for="available_place">available place <span class="star-col">*</span></label>
                                        <input type="text" name="available_place" id="available_place" placeholder="eg. Dhanmondi" class="form-control" value="<?php echo $available_place;?>" required=""/>
                                    </div>
									<div class="col-md-10">
                                        <label class="control-label" for="available_date">avilable date <span class="star-col">*</span></label>
                                        <input type="date" name="available_date" id="available_date" class="form-control" value="<?php echo $available_date;?>" required=""/>
                                    </div>
									<div class="col-md-5">
                                        <label class="control-label" for="start_time">start time <span class="star-col">*</span></label>
                                        <input type="time" name="start_time" id="start_time" class="form-control" value="<?php echo $start_time;?>" required=""/>
                                    </div>
									<div class="col-md-5">
                                        <label class="control-label" for="end_time">end date <span class="star-col">*</span></label>
                                        <input type="time" name="end_time" id="end_time" class="form-control" value="<?php echo $end_time;?>" required=""/>
                                    </div>
										<center><div class="col-md-10">
                                        <div class="form-group">
                                            <input type="hidden" value="<?php echo $_GET["sno"]?>" name="sno"/>
                                            <input type="submit" name="edit" class="btn btn-default" value="Edit"/>
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