<?php 
 require "db_conn.php";

    $id = $_GET['id'];
    $query = " select * from users where id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $username = $row['username'];
        $FirstName = $row['FirstName'];
        $LastName =$row['LastName'];
       $Email = $row['Email'];
       $password = $row['password'];
    }

?>

<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="css/edits.css">

        <div class="container">
            <div class="row">
                <a id="close" class="close" href="memberList.php">&times;</a>
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="title-wrap">
                            <image class="logoSop" src="img/SOPHIA-LOGO.png" alt="">
                        </div>
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Update Member Information</h3>
                        </div>
                        <div class="card-body">
                            <form action="editMember.php" method="post">
							    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="text" class="form-control mb-2" placeholder=" Username " name="username" value="<?php echo $username ?>">
                                <input type="text" class="form-control mb-2" placeholder=" First Name " name="FirstName" value="<?php echo $FirstName ?>">
                                <input type="text" class="form-control mb-2" placeholder=" Last Name " name="LastName" value="<?php echo $LastName ?>">
                                <input type="text" class="form-control mb-2" placeholder=" Email " name="Email" value="<?php echo $Email ?>">
                                <input type="text" class="form-control mb-2" placeholder=" Passwword " name="password" required>
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>