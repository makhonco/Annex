<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>AnnexAcademy</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  
</head>

<body>

  <div class="loader"></div>
  <div id="myDiv">
    <!--HEADER-->
    <div class="header">
      <div class="bg-color">
        <header id="main-header">
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="#">Annex<span class="logo-dec">Academy</span></a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#main-header">Home</a></li>
				  <li class=""> <a href = "register.php">Add Student</a></li>
				  <li class=""><a href="index.html">Logout</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        <div class="wrapper">
          <div class="container">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
				<form method ="POST"  action="server.php" enctype="multipart/form-data">
				  <br>
				  <div class="input-file-container">  
					<input type="file" name = "file">
					<!--label tabindex="0" for="my-file" class="input-file-trigger"></label-->
				  </div>
				  
				  <div class="input-group">
					<button type="submit" name="submitUpload">Upload</button>
				  </div>
				  </br>
				  
				</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ HEADER-->
    <!--/Add new student>
	<section id="addStudent">
		<div class="bg-color">
          <div class="container">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
				<form method ="POST" action="admin.php" >
				  
				  <h1>Register a new student</h1>
				  <div class ="input-group">
					<i class="fa fa-user icon"></i>
					<label color="black">Username</label>
					<input type="text" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" 
					name="username" placeholder = "Student number" value
				  </div>
				  <div class="input-group">
					  <label>Email</label>
					  <input type="email" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;"
					  name="email" value="">
				  </div>
				  <div class="input-group">
					<label>Password</label>
					<input type="password" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" 
					name="password_1" placeholder = "ID/Passport number" value>
				  </div>
				  <div class="input-group">
					<label>Confirm password</label>
					<input type="password" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" 
					name="password_2" placeholder = "ID/Passport number" value="">
				  </div>
				  <div class="input-group">
					<button type="submit" name="submitStudent">Add new Student</button>
				  </div>
				  </form>
			   </div>
			</div>
		</div>
	</section-->
	
    
    
    
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>
