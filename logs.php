<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['username']) && isset($_SESSION['id']))  {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/sophiaIcon.png" />
    <title>Sophia | User Logs</title>
</head>
    <link rel="stylesheet" type="text/css" href="css/tables.css" />
    <link rel="stylesheet" type="text/css" href="css/navs.css" />
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

        <article style="overflow-x:auto">
			<table id="myTable" class="table-bordered order-table table">
				<thead class="alert-info">
					<br/>
					<tr>
                        <th>Account Name</th>
						<th>Activity</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require'db_conn.php';
						$query=mysqli_query($conn, "SELECT * FROM `logs`") or die(mysqli_error());
						while($fetch=mysqli_fetch_array($query)){
					?>
						<tr>
							<td><?php echo $fetch['users']?></td>
							<td><?php echo $fetch['activity']?></td>
							<td><?php echo $fetch['cdate']?></td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</article>

    </div>
    <script  src="js/navbar.js"></script>
</body>
</html>

<?php }else{
	header("Location: index.php");
} ?>

