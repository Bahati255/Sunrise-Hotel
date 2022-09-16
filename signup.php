<?php
    session_start();
    if (isset($_SESSION["SESSION_EMAIL"])) {
        header("Location: dashboard.php");
    }

    if (isset($_POST["submit"])) { 
        include 'config.php';

        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $phonenumber = mysqli_real_escape_string($conn, $_POST["phonenumber"]);
        $county = mysqli_real_escape_string($conn, $_POST["county"]);
        $userpassword = mysqli_real_escape_string($conn, md5($_POST["userpassword"]));
        $confirmpassword = mysqli_real_escape_string($conn, md5($_POST["confirmpassword"]));
      

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM signup WHERE email='{$email}'")) > 0) {
            echo "<script>alert('{$email} - email has already taken.');</script>";
        }
        
        else {
            if ($userpassword === $confirmpassword) {
                $sql = "INSERT INTO signup (firstname,lastname,email,phonenumber,county,userpassword) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$phonenumber}', '{$county}','{$userpassword}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {

                     //echo success then redirect

                     echo "<script>alert('Success account created.');</script>";

                    //if result is successfull navigate to dashboard page
                    header("Location: dashboard.php");

                }else {
                    echo "<script>Error: ".$sql.mysqli_error($conn)."</script>";
                }
            }else {
                echo "<script>alert('Password and confirm password do not match.');</script>";
            }
        }
    }
?>









<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign up page</title>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
	</script>
	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
	</script>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

<link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

<link rel="stylesheet" href="assets/css/owl-carousel.css">

<link rel="stylesheet" href="assets/css/lightbox.css">
<?php include "header.php"?>


</head>
<body>
  
	<div class="container" style="color:orange">
		<h1>SIGN UP</h1>
	</div>
	<div class="container p">
		<h4>BECOME A MEMBER TODAY!</h4>
		<form class="" action="" method="post">
			<div class="form-group">
				<label for="firstname"></label>
				<input class="form-control" type="text" name="firstname"
					id="firstname" placeholder="Enter your first Name">
			</div>
      <div class="form-group">
				<label for="lastname"></label>
				<input class="form-control" type="text" name="lastname"
					id="lastname" placeholder="Enter your last Name">
			</div>
      <div class="form-group">
				<label for="email"></label>
				<input class="form-control" type="email" name="email"
					id="email" placeholder="Enter your email address">
			</div>
      <div class="form-group">
				<label for="phonenumber"></label>
				<input class="form-control" type="text" name="phonenumber"
					id="phonenumber" placeholder="Enter your phone number">
			</div>
			<div class="form-group">
				<label for="county"></label>
				<input class="form-control" type="text" name="county"
					id="county" placeholder="County">
			</div>
			<div class="form-group">
				<label for="password"></label>
				<input class="form-control" type="password" name="userpassword"
					id="userpassword" placeholder="Enter your password">
			</div>
      <div class="form-group">
				<label for="confirmpassword"></label>
				<input class="form-control" type="password" name="confirmpassword"
					id="confirmpassword" placeholder="Confirm your password">
			</div>

			<div class="container">
				<button type="submit" id="form-submit" name="submit" class="btn btn-success">
					Register
				</button>
				<div class="container">
				<button type="submit" id="form-submit"  class="btn btn-important">
				 Already a member? log in
				</button>
				
				

				
			</div>
		</form>
	</div>
	
<?php include "footer.php"?>
</body>
</html>
