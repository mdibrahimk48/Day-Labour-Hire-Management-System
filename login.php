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
</head>

<body>
<div class="header">
        <div class="container">
            <div class="row">
                    <center><a href="index.html"><img src="images/logo.png" alt=""></a></center>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <br> Log In To the System And 
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
                            <h1>Log In Form</h1>
                            <form name='loginform' action="checklogin.php" method="post" onSubmit="return check(this)">
                                <div class="row">
									<div class="col-md-6">
                                        <label class="control-label" for="phone_no">Phone No</label>
                                        <input type="text" name="phone_no" id="phone_no" placeholder="Phone No" class="form-control" required="" pattern="[0-9]{11}" title="Phone No. Must Be 11 Digits, and Must Be Numeric"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="name">Password</label>
                                        <input type="password" name="password" id="password" placeholder="Password" class="form-control" required="" minlength="6" maxlength="6" size="6"/>
                                    </div>
									<center>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button id="singlebutton" name="singlebutton" class="btn btn-default">log in</button>
                                    </div>
									<div><h3> Yet Not Registered? Go To <a href="registration.php">Regiter</a> Page For Log In.</h3>
									</div>
									<div class="widget widget-social">
										<div class="social-circle">
											<a href="#" class="#"><i class="fa fa-facebook"></i></a>
											<a href="#" class="#"><i class="fa fa-google-plus"></i></a>
											<a href="#" class="#"><i class="fa fa-twitter"></i></a>
											<a href="#" class="#"><i class="fa fa-youtube-play"></i></a>
										</div>
									</div>
                                    </div>
									</center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>