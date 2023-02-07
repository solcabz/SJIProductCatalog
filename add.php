<?php
require('db_conn.php') ;

if(isset($_POST['add']))
{	
    $user=$_POST['Stockcode'];
		$accountID = $_POST['account_id'];
		$account = $_POST['account_user'];
		$EngDesc = $_POST['EngDesc'];
		$infoSize = $_POST['infoSize'];
		$Stockcode = $_POST['Stockcode'];

		$stockQuery = "SELECT * FROM addinfo WHERE Stockcode ='$Stockcode'";
		$resStock = mysqli_query($conn, $stockQuery);

		if(mysqli_num_rows($resStock) > 0){
			$email_error = "Sorry... email already taken";
			header('location: info.php');
		}else{
			$sql = "INSERT INTO addinfo (account_id, account_user, EngDesc, infoSize, Stockcode)
			VALUES ('$accountID', '$account', '$EngDesc','$infoSize', '$Stockcode')";
			if (mysqli_query($conn, $sql)) {
				header('location: info.php');
			} else {
				echo "Error: " . $sql . mysqli_error($conn);
			}
			$conn->close();
		}
}
?>
