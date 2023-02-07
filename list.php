<?php
 session_start();
 include 'db_conn.php';
 
if(isset($_GET['delete'])){
	$conn = mysqli_connect('localhost', 'root', '', 'productinfo');
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	// sql to delete a record
	$sql = "DELETE FROM product";
	
	if (mysqli_query($conn, $sql)) {
	  echo "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
}
if (isset($_SESSION['username']) && isset($_SESSION['id']))  {
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Sophia | Catalog List</title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	</head>
		<link rel="stylesheet" type="text/css" href="css/tables.css" />
		<link rel="stylesheet" type="text/css" href="css/navs.css" />
		<link rel="stylesheet" type="text/css" href="css/searchbars.css" />
		<link rel="icon" type="image/x-icon" href="img/sophiaIcon.png" />
	<body>	
		<nav id="navbar" class="">
			<div class="nav-wrapper">
				<!-- Navbar Logo -->
				<div class="logo">
				<!-- Logo Placeholder for Inlustration -->
				<!-- <a href="#home"><img src="image/SOPHIA.webp" alt=""></a> -->
				<a href="#home"><i class="fa fa-angellist"></i> Sophia Jewelry</a>
				</div>

				<!-- Navbar Links -->
				<ul id="menu">
					<li><a href="home.php">Home</a></li>
					<li><a href="list.php">Catalog list</a></li>
					<li><a href="info.php">Add Information</a></li>
					<li><a href="memberList.php">Members</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>

		<!-- Menu Icon -->
		<div class="menuIcon">
			<span class="icon icon-bars"></span>
			<span class="icon icon-bars overlay"></span>
		</div>


		<div class="overlay-menu">
			<ul id="menu">
				<li><a href="home.php">Home</a></li>
				<li><a href="list.php">Catalog list</a></li>
				<li><a href="info.php">Add Information</a></li>
				<li><a href="memberList.php">Members</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		
	<div>
		<div class="title-wrap">
		<image class="soplogo" src="img/SOPHIA-LOGO.png" alt="">
		</div>


		<div class="searchBarMain">
			<input type="text" class="form-control" id="searchBarInput" data-table="order-table" placeholder="Search for..." >
		</div>

		

		<div class="btn-wrapper">
			<form  action="upload.php" class="form-inline" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					
					<div class="wrap-btn">
						<label id="file-label" for="file">Upload CSV file</label>
						<input type="file" name="file" id="file"/>
					</div>
					<br />
					<button  name="upload" class="btn del" id="up-grade"><span class="glyphicon glyphicon-upload"></span> Upload</button>
				
				</div>
			</form>
			<br />
			<form  action="delete.php" class="form-inline red" method="POST" enctype="multipart/form-data">
				<div class="form-group">
				<button name="delete" class="btn" id="red"><span class="glyphicon glyphicon-trash"></span> delete</button>
				</div>
			</form>
		</div>
	
		
		
		<article style="overflow-x:auto">
			<table id="myTable" class="table-bordered order-table table">
				<thead class="alert-info">
					<br/>
					<tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Karats</th>
						<th>Gold Type</th>
						<th>Stockcode</th>
						<th>Color Type</th>
						<th>Store</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require'db_conn.php';
						$query=mysqli_query($conn, "SELECT * FROM `product`") or die(mysqli_error());
						while($fetch=mysqli_fetch_array($query)){
					?>
						<tr>
							<td><?php echo $fetch['JewelryDesign']?></td>
							<td><?php echo $fetch['RetailPrice']?></td>
							<td><?php echo $fetch['Karat']?></td>
							<td><?php echo $fetch['GoldType']?></td>
							<td><?php echo $fetch['Stockcode']?></td>
							<td><?php echo $fetch['ColorType']?></td>
							<td><?php echo $fetch['Outlet']?></td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</article>
	</div>

	<script  src="js/script.js"></script>
	<script  src="js/navbar.js"></script>
	
</body>
</html>

<?php }else{
	header("Location: index.php");
} ?>