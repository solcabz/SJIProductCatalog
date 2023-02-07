<?php
 session_start();
 include 'db_conn.php';
 if (isset($_SESSION['username']) && isset($_SESSION['id']))  { 
  
 
  ?>


<!DOCTYPE html>
<html lang="en">

  <head>
  <title>Sophia | Additional Info</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
  </head>
    <link rel="stylesheet" type="text/css" href="css/navs.css" />
    <link rel="stylesheet" type="text/css" href="css/modal.css" />
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" type="text/css" href="css/searchbars.css" />
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

    
    <div class="topWrap">
      <div class="addMember">
        <button id="open">Add Information</button>
      </div>
      <div class="searchBarMain">
        <input type="text" class="form-control" id="searchBarInput" data-table="order-table" placeholder="Search for..." >
      </div>
    </div>

    <div>
		<article style="overflow-y:auto">
			<table id="myTable" class="table-bordered order-table table">
				<thead class="alert-info">
					<br/>
					<tr>
          <th>ID</th>
						<th>English Description</th>
						<th>size</th>
            <th>Stockcode</th>
            <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require'db_conn.php';
						$query=mysqli_query($conn, "SELECT * FROM `addinfo`") or die(mysqli_error());
						while($fetch=mysqli_fetch_array($query)){
					?>
						<tr>
              <td><?php echo $fetch['id']?></td>
							<td><?php echo $fetch['EngDesc']?></td>
							<td><?php echo $fetch['infoSize']?></td>
							<td><?php echo $fetch['Stockcode']?></td>
              <td>
              <div class="uploadWrap">
                <a class="edit" href="edit.php?id=<?php echo $fetch['id']; ?>">Update</a> 
                <a class="ph-file-image Icons" href="uploadImage.php?id=<?php echo $fetch['id']; ?>"></a> 
              </div>
              </td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</article>
    </div>


     <!-- Modal content -->
  <div id="modal_container" class="modal-container">
  <div  class="modal">
    <span id="close"class="close">&times;</span>

      <form action="add.php" method="post">
        <div class="col-4">
        <input name="account_id" id="account_id" class="effect-7" type="hidden" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" required>
        <input name="account_user" id="account_user" class="effect-7" type="hidden" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" required>
          
          <!-- <input type="file" accept=".jpg,.jpeg.,.png," name="Stockcode" /><br />     -->

          <input name="EngDesc" id="EngDesc" class="effect-7" type="text" placeholder="Eng. Description" required>
          <span class="focus-border"><i></i></span>
        
       
          <input name="infoSize" id="infoSize" class="effect-7" type="text" placeholder="Size">
          <span class="focus-border"><i></i></span>
    
  
          <!-- <input class="effect-7" type="text" placeholder="Stockcode"> -->
          <select id="Stockcode" name="Stockcode" class="effect-7" type="text" required>
            <option value="" >Select stockcode</option>
          <?php 

            $sql = "SELECT * FROM `product`";
            $all_categories = mysqli_query($conn,$sql);
                  // use a while loop to fetch data 
                  // from the $all_categories variable 
                  // and individually display as an option
                  while ($category = mysqli_fetch_array(
                          $all_categories,MYSQLI_ASSOC)):; 
              ?>
                  <option value="<?php echo $category["Stockcode"];
                      // The value we usually set is the primary key
                  ?>">
                      <?php echo $category["Stockcode"];
                          // To show the category name to the user
                      ?>
                  </option>
              <?php 
                  endwhile; 
                  // While loop must be terminated
              ?>
          </select>
          <span class="focus-border"><i></i></span>
        </div>

        <div class="col-4">
          <button name="add" id="add" class="button">Submit</button>
        </div>
      </form> 
  </div>
</div>
    <script src="js/modl.js"></script>
    <script src="js/navbar.js"></script>
    <script  src="js/script.js"></script>
    <script src="https://unpkg.com/phosphor-icons"></script>
  </body>

</html>

<?php }else{
	header("Location: index.php");
} ?>