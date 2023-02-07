<?php
 session_start();
 include 'db_conn.php';


if(isset($_POST['submit']))
{	$username = $_POST['username'];
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
   $email = $_POST['Email'];
   $role = $_POST['role'];
   $password = $_POST['password'];
   $password = md5($password);
	 $sql = "INSERT INTO users (username, FirstName, LastName, Email,  password, role )
	 VALUES ('$username','$FirstName', '$LastName', '$email', '$password', '$role')";
	 if (mysqli_query($conn, $sql)) {
		 header('location: memberlist.php');
      echo "inserted ";
	 } else {
		echo "Error: " . $sql . mysqli_error($conn);
	 }
   $conn->close();
}

if (isset($_SESSION['username']) && isset($_SESSION['id']))  { 
?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sophia | Add Members</title>
 </head>
 <body>
    

    <div id="myModal" class="modal">

 </body>
 </html>

 <?php }else{
	header("Location: index.php");
} ?>