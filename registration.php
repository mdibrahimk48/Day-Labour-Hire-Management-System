<?php
	include_once 'header.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<script language="javascript">
        var flag=0;
          
        function name()
        {
            namecheck=registrationform.name.value;
            if(namecheck=="")
            {
                document.getElementById("error0").innerHTML="Please Enter Your Name Here!";   
                flag=1;
            }
        }
         
      function occupation()
        {
            occupationcheck=registrationform.occupation.value;
            if(occupationcheck=="")
            {
                document.getElementById("error1").innerHTML="Please Enter Your Occupation Here!";
                flag=1;
            }
        }
         
        function nid(){
            nidcheck=registrationform.nid.value;
            if(nidcheck==""){
                document.getElementById("error2").innerHTML="Please Enter Your National ID Here!";
                flag=1;
            }else if(nidcheck.length<17){
                document.getElementById("error2").innerHTML="NID Must Be 17 Character Long!";
                flag=1;
            }
        }
         
          function phone_no(){
            phonenocheck=registrationform.phone_no.value;
            if(phonenocheck==""){
                document.getElementById("error3").innerHTML="Please Enter Your Phone No Here!";
                flag=1;
            }
        }
         
           function address(){
            addresscheck=registrationform.address.value;
            if(addresscheck==""){
                document.getElementById("error4").innerHTML="Enter Your Address Here!";
                flag=1;
            }
        } 
		
		
		function post_code()
        {
            postcodecheck=registrationform.post_code.value;
            if(postcodecheck=="")
            {
                document.getElementById("error5").innerHTML="Enter Post Code Here!";   
                flag=1;
            }
        }
		
        function password(){
            passwordcheck=registrationform.password.value;
            if(passwordcheck==""){
                document.getElementById("error6").innerHTML="Enter password Here!";
                flag=1;
            }else if(passwordcheck.length<6){
                document.getElementById("error6").innerHTML="Password Must Be 6 Character Long!";
                flag=1;
            }
        } 
         function cpassword(){
            passwordcheck=registrationform.cpassword.value;
            if(passwordcheck==""){
                document.getElementById("error7").innerHTML="Please Re Enter Your Password!";
                flag=1;
            }
        }
         
           function ccpassword(){
            passwordcheck1=registrationform.password.value;
            passwordcheck2=registrationform.cpassword.value;
            if(passwordcheck1 != passwordcheck2){
                document.getElementById("error8").innerHTML="Password Doesn't Match, Try Again!";
                flag=1;
            }
        }
         
         

        function check(form)
        {
            flag=0;
         
            name();
            occupation();
            nid();
            phone_no();
			address();
            post_code();
			password();
            cpassword();
            ccpassword();
            if(flag==1)
                return false;
            else
                return true;
        }

    </script>
	
</head>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">Confirm Your Registration</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Registration</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	
	
	
	<?php
	if($_POST){
	$name=$_POST['name'];
	$occupation=$_POST['occupation'];
	$nid=$_POST['nid'];
	$email=$_POST['email'];
	$phone_no=$_POST['phone_no'];
	$address=$_POST['address'];
	$post_code =$_POST['post_code'];
	$gender = $_POST['gender'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];

		

			$con=mysqli_connect("localhost", "root", "","dlh_project");
			
			$query="insert into user values('$name', '$occupation', '$nid', '$email', 
			'$phone_no', '$address', '$post_code', '$gender', 0, 0, 'user', '$password')";
			$result=mysqli_query($con,$query);
			if(!$result){
				if(mysqli_error($con)=="Duplicate entry '$phone_no' for key 'PRIMARY'"){
				echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Phone Number Already Exists! Please Register With Another Number <<<</center></b>";
					}
				else echo mysqli_error($con);
			} else{
			echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Your Registration is Complete! Go to <a href='login.php'> Login</a> Page. <<<</center></b>";
		}
}
?>
	
	
	
	
	
	
	
	
	
	
	
	
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="widget widget-contact">
                        <!-- widget search -->
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
                            <h1>Registration Form</h1>
                            <p> Please fill out the information below to register as a new customer. Must need to fill <span class="star-col">*</span> marked fields.</p>
                            <form name='registrationform' action="registration.php" method="post" onSubmit="return check(this)">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" for="name">name <span class="star-col">*</span></label>
                                        <input type="text" name="name" id="name" placeholder="eg. - Md. Ibrahim Khalil" class="form-control" pattern="[A-Z][A-Za-z' -.]+" title="Only Letters (First Letter Need to be Capital), '-', White Space and ' Are Allowed"/>
											<div id="error0" style="color:red"></div>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="occupation">occupation <span class="star-col">*</span></label>
                                        <input type="text" name="occupation" id="occupation" placeholder="Businessman" class="form-control" pattern="[A-Z][A-Za-z' -.]+" title="Only Letters, '-', White Space and ' Are Allowed"/>
											<div id="error1" style="color:red"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="nid">NID <span class="star-col">*</span></label>
                                        <input type="text" name="nid" id="nid" placeholder="National ID" class="form-control" pattern="[0-9]{17}" title="NID Must Be 17 Digits, and Must Be Numeric"/>
											<div id="error2" style="color:red"></div>	
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="email">email</label>
                                        <input type="email" name="email" id="email" placeholder="eg. - example@gmail.com" class="form-control" title="Enter Valid Email">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="phone_no">phone no <span class="star-col">*</span></label>
                                        <input type="text" name="phone_no" id="phone_no" placeholder="Phone No" class="form-control" pattern="[0-9]{11}" title="Phone No Must Be 11 Digits, and Must Be Numeric"/>
											<div id="error3" style="color:red"></div>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="address">address <span class="star-col">*</span></label>
                                        <input type="text" name="address" id="address" placeholder="eg. 91/1/1, West Razabazar, Dhaka" class="form-control">
											<div id="error4" style="color:red"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="post_code">post code <span class="star-col">*</span></label>
                                        <input type="text" name="post_code" id="post_code" placeholder="eg. WB1CL3AP" class="form-control" pattern="[0-9]{4}" title="Bangladeshi Post Code Must Be 4 Digits Numeric"/>
											<div id="error5" style="color:red"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="gender">gender <span class="star-col">*</span></label>
                                        <select id="gender" name="gender" class="form-control"/>
											<option value="Male"> Male </option>
											<option value="Female"> Female </option>
										</select>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="password">password <span class="star-col">*</span></label>
                                        <input type="password" name="password" id="password" placeholder="Password" class="form-control" maxlength="6" size="6"/>
											<div id="error6" style="color:red"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="cpassword">confirm password <span class="star-col">*</span></label>
                                        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" maxlength="6" size="6"/>
											<div id="error7" style="color:red"></div>
											<div id="error8" style="color:red"></div>
                                    </div>
                                    <center><div class="col-md-12">
                                        <div class="form-group">
                                            <button id="singlebutton" name="singlebutton" class="btn btn-default">submit</button>
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
    <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/sticky-header.js"></script>
</body></html>





