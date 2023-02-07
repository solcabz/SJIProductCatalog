<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id']))  { ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sophia | Members</title>
</head>
<link rel="stylesheet" href="css/tables.css">
<link rel="stylesheet" type="text/css" href="css/navs.css" />
<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/searchbars.css" />
<link rel="icon" type="image/x-icon" href="img/sophiaIcon.png" />
<style>
  .btn{
  background-color: red;
  border: none;
  color: white;
  padding: 7px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: inherit;
  cursor: pointer;
  border-radius: 20px;
}
.green{
  background-color: #199319;
}
.red{
  background-color: red;
}
</style>
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
        <button id="open">Add Members</button>
      </div>
      <div class="searchBarMain">
          <input type="text" class="form-control" id="searchBarInput" data-table="order-table" placeholder="Search for..." >
      </div>
    </div>

    <article style="overflow-y:auto">
			<table id="myTable" class="table-bordered order-table table">
				<thead class="alert-info">
					<br/>
					<tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require'db_conn.php';
						$query=mysqli_query($conn, "SELECT * FROM `users`") or die(mysqli_error());
						while($fetch=mysqli_fetch_array($query,MYSQLI_ASSOC)){
					?>
						<tr>
              <td><?php echo $fetch['id']?></td>
							<td><?php echo $fetch['FirstName']?></td>
							<td><?php echo $fetch['LastName']?></td>
							<td><?php echo $fetch['username']?></td>
              <td><?php echo $fetch['Email']?></td>
              <td><?php echo $fetch['role']?></td>
              <td>
                <?php 
                  // Usage of if-else statement to translate the 
                  // tinyint status value into some common terms
                  // 0-Inactive
                  // 1-Active
                  if($fetch['status']=="1") 
                    echo "Active";
                  else 
                       echo "Inactive";
                    ?>                          
                </td>
              <td>
                <div class="uploadWrap">
                <?php 
                    if($fetch['status']=="1") 
  
                    //     // if a course is active i.e. status is 1 
                    //     // the toggle button must be able to deactivate 
                    //     // we echo the hyperlink to the page "deactivate.php"
                    //     // in order to make it look like a button
                    //     // we use the appropriate css
                    //     // red-deactivate
                    //     // green- activate
                       echo 
                    "<a href=deactivate.php?id=".$fetch['id']." class='btn red'>Deactivate</a>";
                                        else 
                                            echo 
                    "<a href=activate.php?id=".$fetch['id']." class='btn green'>Activate</a>";
                    ?>
                  <a class="edit" href="updateMember.php?id=<?php echo $fetch['id']; ?>">Update</a> 
                  <!-- <a  class="delete" href="delmember.php?id=<?php echo $fetch['id']; ?>"> Delete</a> -->
                </div>
              </td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</article>


        
  <!-- Modal content -->
  <div id="modal_container" class="modal-container">
  <div  class="modal">
    <span id="close"class="close">&times;</span>
   <form action="create.php" method="post">
        <input type="text" name="username" placeholder="Username" required></input>
        <input type="text" name="FirstName" placeholder="Firdt Name" required></input>
        <input type="text" name="LastName" placeholder="Last Name" required ></input>
        <input type="text" name="Email" placeholder="Email" required></input>
        <input type="text" name="role" placeholder="Role" required></input>
        <input type="password" name="password" placeholder="Password" required></input>
        <button type="submit" name="submit">Submit</button>
    </form>
  </div>
</div>

<script src="js/modl.js"></script>
<script src="js/navbar.js"></script>
</body>
</html>

<?php }else{
	header("Location: index.php");
} ?>


