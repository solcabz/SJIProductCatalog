<?php
	require 'db_conn.php';
	
	if(ISSET($_POST['upload'])){
		if($_FILES['file']['name']){
			$filename = explode(".", $_FILES['file']['name']);
			$ext=end($filename);
			
			if($ext=="csv"){
				$handler=fopen($_FILES['file']['tmp_name'], "r");
				while($data=fgetcsv($handler)){
					mysqli_query($conn, "INSERT INTO `product` VALUES('','$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]')") or die(mysqli_error());
				}
				header('location: list.php');
			}else{
				echo"<script>alert('Only csv file is allowed to be upload!')</script>";
				echo"<script>window.location='list.php'</script>";
			}	
		}else{
			echo"<script>alert('Pls upload a csv file!')</script>";
			echo"<script>window.location='list.php'</script>";
		}
	}
?>