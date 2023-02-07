<?php
include 'db_conn.php';

$get_id=$_REQUEST['id'];

$username = $_POST['username'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$password = $_POST['password'];
$password = md5($password);

$sql = "UPDATE users SET username ='$username', FirstName ='$FirstName', LastName ='$LastName', Email = '$Email', password= '$password'  WHERE id = '$get_id' ";
if (mysqli_query($conn, $sql)) {
    header('location: memberList.php');
 } else {
    echo "Error: " . $sql . mysqli_error($conn);
 }
$conn->close();

?>                        