<?php 
echo "<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content='Day labour hire website for customer service provider.'>
    <meta name='keywords' content='A website for hire day labour.'>
    <title>Day Labour Hire For Household Work</title>
    <link href='css/bootstrap.min.css' rel='stylesheet'
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i%7cMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i' rel='stylesheet'>
    <link href='css/font-awesome.min.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
	
	<style>
	th,td{
		text-align:center;
	}
	</style>	

</head>

<body>
    <div class='header'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
                    <a href='index.php'><img src='images/logo.PNG' alt='Website for Day Labour Hire'></a>
                </div>
                <div class='col-lg-8 col-md-4 col-sm-12 col-xs-12'>
                    <div class='navigation'>
                        <div id='navigation'>
                            <ul>";

							
							session_start();


					if(isset($_SESSION["login"])){
						echo"<li class='active'><a href='index.php' title='Home'>Home</a></li>
											<li class='has-sub'><a href='service-detail.php' title='Service Detail'>Service</a>
												<ul>
													<li><a href='service-detail.php' title='Service Detail'>Service Detail</a></li>
												</ul>
										</li>";

			
								if($_SESSION['usertype']=='admin'){
									echo "<li class='has-sub'><a href='addlabour.php' title='Admin Option'>Admin Option</a>
                                    <ul>
                                        <li><a href='addlabour.php' title='Add labour'>add labour</a></li>		
                                        <li><a href='setschedule.php' title='Set Schedule'>set schedule</a></li>		  	
                                    </ul>
                                </li>
								<li class='has-sub'><a href='#' title='Information'>Information</a>
                                    <ul>
                                        <li><a href='labourmanupulation.php' title='Labour Information'>labour Info</a></li>	
                                        <li><a href='schedulemanupulation.php' title='Schedule Information'>schedule Info</a></li>	
                                        <li><a href='userinformation.php' title='User Information'>User Info</a></li>
										<li><a href='hireinformation.php' title='Hire Information'>Hire Info</a></li>
                                    </ul>
								</li>
								<li class='has-sub'><a href='#' title='Others'>Others</a>
                                    <ul>
                                        <li><a href='showfeedback.php' title='Show Feedback'>Check feedback</a></li>	
                                        <li><a href='customerneed.php' title='Customer Request'>Customer requ</a></li>	
                                    </ul>
                            </li>";
								}
								
								if($_SESSION["usertype"]=="user"){
									echo "<li class='has-sub'><a href='alllabour.php' title='Labour'>labour</a>
                                    <ul>
                                        <li><a href='alllabour.php' title='All labour'>all labour</a></li>	
                                        <li><a href='electrician.php' title='Electrician'>electrician</a></li>	
                                        <li><a href='plumbers.php' title='Plumber'>plumber</a></li>
										<li><a href='scheduleinfo.php' title='Schedule Information'>Labour schedule</a></li>
                                    </ul>
                            </li>
									<li><a href='hirelabour.php' title='Hire Labour'>hire labour</a></li>
								
								<li class='has-sub'><a href='others_required.php' title='Other Field'>others</a>
                                    <ul>
                                        <li><a href='others_required.php' title='Other Field'>others need</a></li>	
                                        <li><a href='feedback.php' title='Feedback'>feedback</a></li>
                                    </ul>
                                </li>";
                                
								}
                                
								echo "<li><a href='logout.php' title='Log Out'>Log Out</a></li>";
}else{
						echo "<li class='active'><a href='index.php' title='Home'>Home</a></li>
                                <li class='has-sub'><a href='service-detail.php' title='Service Detail'>Service</a>
                                    <ul>
                                        <li><a href='service-detail.php' title='Service Detail'>Service Detail</a></li>
                                    </ul>
                            </li>
							<li class='has-sub'><a href='alllabour.php' title='Labour'>labour</a>
                                    <ul>
                                        <li><a href='alllabour.php' title='All labour'>all labour</a></li>	
                                        <li><a href='electrician.php' title='Electrician'>electrician</a></li>	
                                        <li><a href='plumbers.php' title='Plumber'>plumber</a></li>
                                    </ul>
                            </li>
							
							<li><a href='registration.php' title='Registration'>registration</a></li>
							

                                        <li><a href='login.php' title='Log In'>Log In</a></li>";
}




			echo "</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
	
?>