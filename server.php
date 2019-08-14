<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$password_1 = "";
$password_2 = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['submitStudent'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  $msg = "Username already exists";
  if ($user) { // if user exists
    if ($user['username'] === $username) {
     echo sprintf("%s",$msg);
	 header('location: admin.php');
    }

    /**if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }**/
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);	
  	echo "<script type=text/javascript'>alert('Successful created a user')</script>";
	echo sprintf("Successful created user");
  	header('location: admin.php');
  }
}

// LOGIN USER
if (isset($_POST['submitLogin'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$query_admin = "SELECT * FROM adminstrator WHERE username='$username' AND password='$password'";
  	$results_student = mysqli_query($db, $query);
	$results_admin = mysqli_query($db, $query_admin);
	if (mysqli_num_rows($results_admin) == 0 && mysqli_num_rows($results_student == 0)){ //Nor student or admin
		array_push($errors, "Invalid login");
	}
	else{
		if (mysqli_num_rows($results_student) == 1) {
		  $_SESSION['username'] = $username;
		  $_SESSION['success'] = "You are now logged in";
		  header('location: student.html');
		}
		else{	//(mysqli_num_rows($results_admin) == 1) {
		  $_SESSION['username'] = $username;
		  $_SESSION['success'] = "You are now logged in";
		  header('location: admin.php');
		}
	}
  	
	
  }
}

//Upload file
if (isset($_POST['submitUpload'])){
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpeg', 'jpg', 'png', 'doc','pdf','mp4');
	
	if (in_array($fileActualExt, $allowed)){
		if ($fileError == 0){
			if ($fileSize < 1000000){
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'files/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				echo "<script type='text/javascript'>alert(\"Upload successful\");</script>";
				header('location: admin.php');
			}
			else{
				
				echo "<script type='text/javascript'>alert(\"You file is too big\");</script>";
				header('location: admin.php');
			}
		}
		else{
			
			echo "<script type='text/javascript'>alert(\"There was an error uploading your file\");</script>";
			header('location: admin.php');
		}
	}
	else{
		
		echo "<script type='text/javascript'>alert(\"you can not upload this type  of file\");</script>";
		header('location: admin.php');
	}
	
}



?>