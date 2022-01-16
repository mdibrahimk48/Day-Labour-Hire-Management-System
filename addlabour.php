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
                        <h2 class="page-title">add different type of labour</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="addlabour.php">labour</a></li>
                                <li>add labour</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php	
$connect=mysqli_connect("localhost","root","","dlh_project");

			if(@$_POST['singlebutton']){
				$l_type=$_POST["l_type"];
				$l_name=$_POST["l_name"];
				$gender=$_POST["gender"];
				$age=$_POST["age"];
				$email=$_POST["email"];
				$phone_no=$_POST["phone_no"];
				$address=$_POST["address"];
				$post_code=$_POST["post_code"];
				$l_image=$_FILES["l_image"]["name"];
				$daily_price=$_POST["daily_price"];
				//echo "test";
				if($l_type==null||$l_name==null||$gender==null||$age==null||$phone_no==null||$address==null||$post_code==null||$l_image==null||$daily_price==null){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Some of The Fields Are Blank. Please Insert Data. <<<</center></b>";
				}else{
						if($_FILES['l_image']){
						//image upload
						$folder = "image/";
						
						if ((($_FILES["l_image"]["type"] == "image/gif")
						 || ($_FILES["l_image"]["type"] == "image/jpeg")
						 || ($_FILES["l_image"]["type"] == "image/jpg")
						 || ($_FILES["l_image"]["type"] == "image/pjpeg")
						 || ($_FILES["l_image"]["type"] == "image/x-png")
						 || ($_FILES["l_image"]["type"] == "image/png"))
						 && ($_FILES["l_image"]["size"] < 50000000)){
							move_uploaded_file($_FILES["l_image"]["tmp_name"] , "$folder".$_FILES["l_image"]["name"]);
							$query="insert into labour values('','$l_type','$l_name','$gender','$age','$email','$phone_no','$address','$post_code','image/$l_image','$daily_price')";
							$result= mysqli_query($connect,$query);
							if(!$result){
								if(mysqli_error($connect)){
				echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Error: Phone Number Already Exists! Please Add Data With Another Number <<<</center></b>";
					}	
							}
							else{
								echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Data of Labour Is Inserted. <<<</center></b>";
							}

						}else{
							echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Something Wrong With Image Type or Size(5 MB). <<<</center></b>";
						}
					}
				}
			}
				if($_GET){
					if($_GET["event"]=="delete"){
					$lid=$_GET["lid"];
					$query="delete from labour where lid=$lid";
					$result= mysqli_query($connect,$query);
				if(!$result){
					echo "<center>Error: </center>".mysql_error();
				}
				else{
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Data of Labour Is Deleted. <<<</center></b>";	
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
                            <h1>Labour Information</h1>
                            <p> Fill out the information below to add new labour. Must need to fill <span class="star-col">*</span> marked fields.</p>
                            <form method="post" action="addlabour.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" for="l_type">labour type <span class="star-col">*</span></label>
                                        <select id="l_type" name="l_type" class="form-control"/>
											<option value="Plumber"> Plumber </option>
											<option value="Electrician"> Electrician </option>
										</select>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="l_name">name <span class="star-col">*</span></label>
                                        <input type="text" name="l_name" id="l_name" placeholder="Labour Name" class="form-control" required="" pattern="[A-Z][A-Za-z' -.]+" title="Only Letters, '-', White Space and ' Are Allowed"/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="gender">gender <span class="star-col">*</span></label>
                                        <select id="gender" name="gender" class="form-control"/>
											<option value="Male"> Male </option>
											<option value="Female"> Female </option>
										</select>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="age">Age <span class="star-col">*</span></label>
                                        <input type="text" name="age" id="age" placeholder="Age" class="form-control" required="" pattern="[0-9]{02}" title="Age Must Be 02 Digits, and Must Be Numeric (Fraction Not Allowed)"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="email">email</label>
                                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" title="Enter a Valid Mail"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="phone_no">phone no <span class="star-col">*</span></label>
                                        <input type="text" name="phone_no" id="phone_no" placeholder="Phone No" class="form-control" required="" pattern="[0-9]{11}" title="Phone No Must Be 11 Digits, and Must Be Numeric"/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="address">address <span class="star-col">*</span></label>
                                        <input type="text" name="address" id="address" placeholder="eg. 91/1/1, West Razabazar, Dhaka" class="form-control" required=""/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="post_code">post code <span class="star-col">*</span></label>
                                        <input type="text" name="post_code" id="post_code" placeholder="eg. WB1CL3AP" class="form-control" required="" pattern="[0-9]{4}" title="Bangladeshi Post Code Must Be 4 Digits Numeric"/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="l_image">Labour Image <span class="star-col">*</span></label>
                                        <input class="control-label" type="file" name="l_image" id="l_image" required=""/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="daily_price">Hourly Rate <span class="star-col">*</span></label>
                                        <input type="text" name="daily_price" id="daily_price" placeholder="eg. Daily Rate of an Labour" class="form-control" required="" pattern="\d+(\.\d{2})?"  title="Input valid Price e.g. (500.00/500)"/>
                                    </div>
                                    <center><div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-default" value="submit" />
                                        </div>
                                    </div></center>
                                </div>
                            </form>
							
							<center><h3>For labour Information <a href="labourmanupulation.php">click</a> here</h3></center>
							
							
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