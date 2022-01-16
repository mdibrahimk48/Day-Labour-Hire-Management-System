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

	
	<script language="javascript">
        var flag=0;
		
		function time(){
            timecheck1=setsechedule.start_time.value;
            timecheck2=setsechedule.end_time.value;
            if(timecheck1 == timecheck2){
                document.getElementById("error0").innerHTML="You Select Same Time for Both Field!";
                flag=1;
            }
        }
		
		function check(form)
        {
            flag=0;
            time();
            if(flag==1)
                return false;
            else
                return true;
        }

    </script>
	
	
	

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
                        <h2 class="page-title">schedule for different type of labour</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">admin option</a></li>
                                <li>set schedule</li>
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

                $lid=$_POST['lid'];
				$available_place=$_POST["available_place"];
				$available_date=$_POST["available_date"];
				$start_time=$_POST["start_time"];
				$end_time=$_POST["end_time"];
				if($lid==null||$available_place==null||$available_date==null||$start_time==null||$end_time==null){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Some of The Fields Are Blank. Please Insert Data. <<<</center></b>";
				}else{
							$query="insert into schedule values('', '$lid', '$available_place','$available_date', '$start_time', 
							'$end_time', '')";
							//$connect=mysqli_connect("localhost","root","","dlh_project");
							$result= mysqli_query($connect,$query);
							if(!$result){
								echo mysqli_error($connect);
							}else {
								echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Schedule for a Labour Is Inserted. <<<</center></b>";
							}		
					}
				}

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
                        <div class="social-circle">
                            <a href="#" class="#"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="#"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>

        <script type="text/javascript">
        $(document).ready(function() {
           
           $('#lid').change(function(){
                var eventName = $(this).val();
                //var date = $('#visitingDate').val();
                $('#labour_id').val(eventName);
                 $('#lid').html(eventName);
                $.ajax({
                    url:'fetchData.php',
                    method:'POST',          
                    data:{'lid':eventName},
                    success:function(data){
                        //alert(data);
                     
                        result = $.parseJSON(data);
                        for(i in result){

                            
                           //alert(result[i].lid);
                            if(result[i]=="false"){
                           $('#image').html("");
                                $('#lid').html("");
                                $('#ltype').html("");
                                $('#name').html("");
                                $('#gender').html("");
                                $('#age').html("");
                                $('#email').html('');
                                $('#phone_no').html("");
                       }
                           else{

                           $("#data").html("<input type='hidden' name='lid' value='"+result[i].lid+"' />");
                             $('#image').html("<img src='"+result[i].l_image+"' style='height:100px; width:150px' />");
                                $('#type').html(result[i].lid);
                                $('#ltype').html(result[i].l_type);
                                $('#name').html(result[i].l_name);
                                $('#gender').html(result[i].gender);
                                $('#age').html(result[i].age);
                                $('#email').html(result[i].email);
                                $('#phone_no').html(result[i].phone_no);
                           }

                        }
                    
                    }
                });
          });

        });
            
    </script>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1>Set Schedule For Labour</h1>
                            <p> Fill out the information below to add labour's schedule. Must need to fill <span class="star-col">*</span> marked fields.</p>
                            <form name="setsechedule" method="post" action="setschedule.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-10">
									<input type="hidden" name="lid" value = "<?php echo $lid; ?>" >
                                        <label class="control-label" for="lid">labour id <span class="star-col">*</span></label>
                                        <select class="form-control" id="lid" name="lid" required="" />
											 <option value="">Select One</option>
                                            <?php 

                                                $con = mysqli_connect("localhost","root","","dlh_project");
														$output = '';
														$query = "select lid from labour ORDER BY lid DESC";
														$result= mysqli_query($con, $query);

															while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
																$lid = $row['lid'];
																echo '<option value="'.$lid.'">'.$lid.'</option>';
												}
                                            ?>
										</select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	

       <center> <table border="4" width="100%">
            <tr class='control-label1'>
                <th width="12%">LABOUR Image</th>
                <th width="12%">LABOUR ID</th>
                <th width="12%">LABOUR TYPE</th>
                <th width="12%">LABOUR NAME</th>
                <th width="13%">GENDER</th>
                <th width="13%">AGE</th>
                <th width="13%">Email</th>
                <th width="13%">Phone no</th>
            </tr>
            <tr>
                <td class="r1" id="image"></td>
                <td class="r1" id="type"></td>
                <td class="r1" id="ltype"></td>
                <td class="r1" id="name"></td>
                <td class="r1" id="gender"></td>
                <td class="r1" id="age"></td>
                <td class="r1" id="email"></td>
                <td class="r1" id="phone_no"></td>
            </tr>
        </table></center>
	
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
                            <form name="setsechedule" method="post" action="setschedule.php" enctype="multipart/form-data">
                                
                                <div class="row">
                                    <div  class="col-md-10">
									<input type="hidden" name="lid" value = "<?php echo $lid; ?>" >
									<div id="data"></div>
                                        <label class="control-label" for="available_place">available place <span class="star-col">*</span></label>
                                        <input type="text" name="available_place" id="available_place" placeholder="eg. Dhanmondi" class="form-control" required="" pattern="[A-Z][A-Za-z' -.]+" title="Only Letters (First Letter Need to be Capital), '-', White Space and ' Are Allowed"/>
                                    </div>
									<div class="col-md-10">
                                        <label class="control-label" for="available_date">avilable date <span class="star-col">*</span></label>
                                        <input type="date" name="available_date" id="available_date" class="form-control" required="" />
                                    </div>
									<div class="col-md-5">
                                        <label class="control-label" for="start_time">start time <span class="star-col">*</span></label>
                                        <input type="time" name="start_time" id="start_time" class="form-control" required="" />
                                    </div>
									<div class="col-md-5">
                                        <label class="control-label" for="end_time">end time <span class="star-col">*</span></label>
                                        <input type="time" name="end_time" id="end_time" class="form-control" required="" />
										<div id="error0" style="color:red"></div>
                                    </div>
									
									<script type="text/javascript">
										   var today = new Date().toISOString().split('T')[0];
												document.getElementsByName("available_date")[0].setAttribute('min', today);
									</script>
									
										<center><div class="col-md-10">
                                        <div class="form-group">
                                            <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-default" value="Submit" />
                                        </div>
                                    </div><center>
                                </div>
								
                            </form>
							<center><h3>For schedule Information <a href="schedulemanupulation.php">click</a> here</h3></center>
							
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