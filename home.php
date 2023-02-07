<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html>

  <head>
    <title>Sophia | Home</title>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  	<link rel="stylesheet" type="text/css" href="css/navs.css" />
    <link rel="stylesheet" type="text/css" href="css/searchbars.css" />
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel="icon" type="image/x-icon" href="img/sophiaIcon.png" />
  <body>
    
      <?php if ($_SESSION['role'] == 'admin') {?>
      <!-- For Admin -->

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

      <div class="title-wrap">
        <image class="soplogo" src="img/SOPHIA-LOGO.png" alt="">
      </div>

      <!-- <div id="myBtnContainer">
      <button class="btn active" onclick="filterSelection('all')"> Show all</button>
      <button class="btn" onclick="filterSelection('BRACELET')"> Bracelet</button>
      <button class="btn" onclick="filterSelection('EARRINGS')"> Earrings</button>
    </div> -->

      <div class="searchBarMain">
        <input type="text" class="form-control" id="searchBarInput" data-table="order-table" placeholder="Search for...">
      </div>

      <section class="products">
        <?php
          require'db_conn.php';
          $query=mysqli_query($conn, "SELECT addinfo.imageProduct, addinfo.EngDesc, product.RetailPrice, product.JewelryType, product.Stockcode, product.GoldType, product.Karat, product.Outlet, addinfo.infoSize
          FROM product 
          INNER JOIN addinfo
          ON addinfo.Stockcode= product.Stockcode;") or die(mysqli_error());
          while($fetch=mysqli_fetch_array($query)){
		    ?>
        <div class="product-card">
          <div class="filterDiv <?php echo $value['Jewelry Type']; ?>">
            <div id="product-image" class="product-image">
              <?php 
                $dir    = 'img/upload/';
                $filenames = scandir($dir);
                echo "<img src='".$dir."".$fetch['imageProduct']."' >";
              ?>
            </div>
            <div class="product-info">
              <p>Name: <?php echo $fetch['EngDesc']?></p>
              <p class="price">Price: ₱<?php echo $fetch['RetailPrice']?></p>
              <p>Karats: <?php echo $fetch['Karat']?></p>
              <p>Gold Type: <?php echo $fetch['GoldType']?></p>
              <p>Stockcode: <?php echo $fetch['Stockcode']?></p>
              <p>Jewelry Type: <?php echo $fetch['JewelryType']?></p>
              <p>Size: <?php echo $fetch['infoSize']?></p>
              <p>Store: <?php echo $fetch['Outlet']?></p>
            </div>
          </div>
        </div>
        <?php } ?>
      </section>



      

    <?php }else { ?>

		
    <!-- FORE USERS -->
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

      <div class="title-wrap">
        <image class="soplogo" src="img/SOPHIA-LOGO.png" alt="">
      </div>

      <!-- <div id="myBtnContainer">
      <button class="btn active" onclick="filterSelection('all')"> Show all</button>
      <button class="btn" onclick="filterSelection('BRACELET')"> Bracelet</button>
      <button class="btn" onclick="filterSelection('EARRINGS')"> Earrings</button>
    </div> -->

      <div class="searchBarMain">
        <input type="text" class="form-control" id="searchBarInput" data-table="order-table" placeholder="Search for...">
      </div>

      <section class="products">
        <?php
                require'db_conn.php';
                $query=mysqli_query($conn, "SELECT addinfo.EngDesc, product.RetailPrice, product.JewelryType, product.Stockcode, product.GoldType, product.Karat, product.Outlet, addinfo.infoSize
                FROM product 
                INNER JOIN addinfo
                ON addinfo.Stockcode= product.Stockcode;") or die(mysqli_error());
                while($fetch=mysqli_fetch_array($query)){
                
		        ?>
        <div class="product-card">
          <div class="filterDiv <?php echo $value['Jewelry Type']; ?>">
            <div id="product-image" class="product-image">
              <?php 
              // $ftp_server = "ftp_address";
              // $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
              // $login = ftp_login($ftp_conn, "ftp_username", "ftp_password");
              
              // $dir = "img";
              
              // if (ftp_mkdir($ftp_conn, $dir))
              //   {
              // $dir    = 'img/';
              // $filenames = scandir($dir);
              // echo "<img src='".$dir."".$fetch['Stockcode'].".png' >";
              //   echo "Successfully created $dir";
              //   }
              // else
              //   {
              //   echo "Error while creating $dir";
              //   }
              // ftp_close($ftp_conn);

                $dir    = 'img/upload/';
                $filenames = scandir($dir);
                echo "<img src='".$dir."".$fetch['Stockcode'].".png' >";?>
            </div>
            <div class="product-info">
              <p>Name: <?php echo $fetch['EngDesc']?></p>
              <p class="price">Price: ₱<?php echo $fetch['RetailPrice']?></p>
              <p>Karats: <?php echo $fetch['Karat']?></p>
              <p>Gold Type: <?php echo $fetch['GoldType']?></p>
              <p>Stockcode: <?php echo $fetch['Stockcode']?></p>
              <p>Jewelry Type: <?php echo $fetch['JewelryType']?></p>
              <p>Size: <?php echo $fetch['infoSize']?></p>
              <p>Store: <?php echo $fetch['Outlet']?></p>
            </div>
          </div>
        </div>
        <?php } ?>
      </section>


    <?php } ?>


	<script>
      var searchUsers = document.querySelector('#searchBarInput'),
        productCard = document.querySelectorAll('.product-card'),
        productData = document.querySelectorAll('.product-info'),
        searchVal;

      searchUsers.addEventListener('keydown', function() {
        searchVal = this.value.toLowerCase();

        for (var i = 0; i < productCard.length; i++) {
          if (!searchVal || productData[i].textContent.toLowerCase().indexOf(searchVal) > -1) {
            productCard[i].style['display'] = '';
          } else {
            productCard[i].style['display'] = 'none';
          }
        }
      });
	</script>

	<script src="js/navbar.js"></script>

  </body>
</html>
<?php }else{
	header("Location: index.php");
} ?>
