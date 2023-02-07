<?php 
 require "db_conn.php";
 session_start();
    $id = $_GET['id'];
    $query = " select * from addinfo where id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        
        $id = $row['id'];
        $EngDesc = $row['EngDesc'];
        $infoSize = $row['infoSize'];
        $image = $row['imageProduct'];
    }
    if (isset($_SESSION['username']) && isset($_SESSION['id']))  { 
?>

<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="css/edits.css">

        <div class="container">
            <div class="row">
                <a id="close" class="close" href="info.php">&times;</a>
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="title-wrap">
                            <image class="logoSop" src="img/SOPHIA-LOGO.png" alt="">
                        </div>
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Update Form in PHP</h3>
                        </div>
                        <div class="card-body">
                            <form action="update.php" method="post">
							    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input name="account_id"  class="form-control mb-2" type="hidden" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" required>
                                <input name="account_user"  class="form-control mb-2" type="hidden" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" required> 
                                <input type="text" class="form-control mb-2"  name="EngDesc" value="<?php echo $EngDesc ?>">
                                <input type="text" class="form-control mb-2"  name="infoSize" value="<?php echo $infoSize ?>">
                                <!-- <label for="" ><?php echo $image ?></label> 
                                <input type="file" class="form-control mb-2" placeholder=" imageProduct " name="imageProduct" value="<?php echo $image ?>"> -->
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
 

        
        <?php }else{
	header("Location: index.php");
} ?>