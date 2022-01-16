<?php
include_once 'header.php';
 
	$phone_no =$_POST["phone_no"];
	$password = $_POST["password"];
	$con = mysqli_connect("localhost","root","","dlh_project");
	$query = "select * from user where  phone_no='$phone_no'";
	$result = mysqli_query($con, $query);
	$num = mysqli_num_rows($result);
	if($num==0)
		echo "<center> User doesn't exist with this phone number, please enter a valid number in <a href='login.php'> Login</a> Page </center>";
	else{
		$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
		$time = $row['timestamp'];
		if ($time<time()) {
			$dbpassword=$row['password'];
			if($password != $dbpassword){
				echo "<b>Wrong password, please enter right password in <a href='login.php'> Login</a> Page</b>";
				$attempt = $row['attempt']+1;
				$query="update user set attempt=$attempt where phone_no='$phone_no'";
				mysqli_query($con, $query);

				if ($attempt==3) {
					$time = time()+10000;
					$query = "update user set timestamp=$time where phone_no='$phone_no'";	
					mysqli_query($con, $query);
				}
			}
			else{
				$query="update user set attempt=0, timestamp=0 where phone_no='$phone_no'";
				$result=mysqli_query($con,$query);
				$usertype = $row['usertype'];
				$_SESSION['phone_no'] = $phone_no;
				$_SESSION['usertype'] = $usertype;
				$_SESSION['login'] = true;
				if($_SESSION["usertype"]=="super_admin"){
						header("location:index.php");
				}else if($_SESSION["usertype"]=="admin"){
					header("location:index.php? user=$phone_no");
				}else
					header("location:index.php? user=$phone_no");
			}
		}else 
	echo "Time Out";
	}?>