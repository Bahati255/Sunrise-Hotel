<?php


include 'config.php';

session_start ()

error_reporting(0);





if (isset($_SESSION['firstname'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$userpassword = md5($_POST['userpassword']);

	$sql = "SELECT * FROM signup WHERE email='$email' AND userpassword='$userpassword'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
        echo 'Login success';


		//$_SESSION['username'] = $row['username'];
		header("Location: dashboard.php");

	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}
  include "header.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Log in</title>
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


    
</head>
<body>

	<div class="container" style="color:orange"  >
		<h1>For Members Only!</h1>
	</div>
	<div class="container">
		<h4>Welcome!</h4>
		<form action=""  method="post" class="form-horizontal">

			<div class="form-group has-success">
				<label class="control-label col-sm-2"
					for="id1"></label>
				<div class="col-sm-6">
					<input class="form-control" type="text"
						id="id1" name = "firstname" placeholder="Enter your User Name">
				</div>

			</div>
			<div class="form-group has-success">
				<label class="control-label col-sm-2"
					for="id2"></label>
				<div class="col-sm-6">
					<input class="form-control" type="password"
						name="userpassword" id="id2" placeholder="Enter your password">
				</div>


			</div>
			<div class="container">
				<button type="button" class="btn btn-success" name="submit">
					Login
				</button><br><br>
				<button type="button" class="btn btn-info">
				<a href="signup.php">new member?
				</button>
				<label>
					<input type="checkbox">
						Remember me
				</label>
			</div>
		</form>
	</div>

    
</body>
</html>
