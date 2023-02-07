<?php
include 'db_conn.php';

$get_id=$_REQUEST['id'];
$accountID = $_POST['account_id'];
$account = $_POST['account_user'];
$EngDesc= $_POST['EngDesc'];
$infoSize= $_POST['infoSize'];

$sql = "UPDATE addinfo SET  account_id = 'accountID', account_user='$account', EngDesc ='$EngDesc', infoSize ='$infoSize' WHERE id = '$get_id' ";
if (mysqli_query($conn, $sql)) {
    header('location: info.php');
 } else {
    echo "Error: " . $sql . mysqli_error($conn);
 }
$conn->close();

?>