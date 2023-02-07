<?php
include 'db_conn.php';
session_start();


$errors = [];
$id=$_SESSION['id'];
$query=mysqli_query($conn,"SELECT * FROM users where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  
// connect to database


// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);

  // Grab to token that came from the email link
  if (empty($password) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($password !== $new_pass_c) array_push($errors, "Password do not match");
  if (count($errors) == 0) {
      $password = md5($password);
      $sql = "UPDATE users SET password='$password' WHERE id='$id' ";
      if (mysqli_query($conn, $sql)) {
		header('location: index.php');
	  } else {
		 echo "Error: " . $sql . mysqli_error($conn);
	  }
	 $conn->close();
  }
}
?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Change Password </title>
	<link rel="icon" type="image/x-icon" href="img/sophiaIcon.png" />
</head>
	<link rel="stylesheet" type="text/css" href="css/changePass.css" />
<body>
	<form class="login-form" action="changePass.php" method="post">
	<a id="close" class="close" href="account.php">&times;</a>
		<div class="title-wrap">
        	<image class="soplogo" src="img/SOPHIA-LOGO.png" alt="">
      	</div>
	
		<h2 class="form-title">New Password</h2>
		<!-- form validation messages -->
		<?php include('messages.php'); ?>
		<div class="form-group">
			<input class="input" type="password" name="password" placeholder="New Password">
		</div>
		<div class="form-group">
			<input class="input" type="password" name="new_pass_c" placeholder="Confirm New Password">
		</div>
		<div class="form-group">
			<button type="submit" name="new_password" class="login-btn">Submit</button>
		</div>
	</form>
</body>
</html>