<?php
session_start(); //Add this
//Also you have to add your connection file before your query
if (isset($_SESSION['username']) && isset($_SESSION['id'])) { 
require('db_conn.php');
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account</title>
</head>
    <link rel="stylesheet" type="text/css" href="css/navs.css" />
    <link rel="stylesheet" type="text/css" href="css/account.css" />
    <link rel="icon" type="image/x-icon" href="img/sophiaIcon.png" />
<body>
    <nav id="navbar" class="">
      <div class="nav-wrapper">
        <!-- Navbar Logo -->
        <div class="logo">
          <!-- Logo Placeholder for Inlustration -->
          <a href="#home"><i class="fa fa-angellist"></i> Sophia Jewelry</a>
        </div>

        <!-- Navbar Links -->
        <ul id="menu">
          <li><a href="home.php">Home</a></li>
          <li><a href="account.php">Account</a></li>
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
        <li><a href="account.php">Account</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>

    <section>
        <?php
            require'db_conn.php';
            
            
            $strSQL = "SELECT * FROM users WHERE id = '".$_SESSION['id']."' ";

            // Execute the query (the recordset $rs contains the result)
            $rs = mysqli_query($conn, $strSQL);
            
            // Loop the recordset $rs
            
            // Each row will be made into an array ($row) using mysqli_fetch_array
            while($fetch = mysqli_fetch_assoc($rs)) {
        ?>
        <div class=userForm>
            <div class="userDetails">
                <p>Username: <?php echo $fetch['username']?></p>
                <p>Firstname: <?php echo $fetch['FirstName']?></p>
                <p>Lastname: <?php echo $fetch['LastName']?></p>
                <p>Email: <?php echo $fetch['Email']?></p>
            </div>
            <a  href="changePass.php" class="reset">
                <span>Reset Password</span>
            </a>
        </div>
        <?php } ?>
    </section>
	 
</body>
</html>

<?php }else{
	header("Location: index.php");
} ?>
