<?php
    require "db_conn.php";

        $id = $_GET['id'];
        $query = " select * from addinfo where id='".$id."'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $Stockcode = $row['Stockcode'];
        
        }

        if(isset($_POST['upload'])){
            $user=$_POST['c'];
            $image= $_POST['imageProduct'];
            $tmp = $_FILES["file"]["tmp_name"];  
            $extension = explode("/", $_FILES["file"]["type"]);
            $name=$user.".".$extension[1];
            $sql = "UPDATE addinfo set imageProduct='$name' WHERE id = '$id'";
            mysqli_query($conn, $sql);  
            
            move_uploaded_file($tmp, "img/upload/" . $name);
            header('location: info.php');
            
        }
        
 ?>

<html>
    <link rel="stylesheet" href="css/uploadImage.css">
<body>
    <div class="container">
        <form enctype="multipart/form-data" method="post">
            <div>
                <a id="close" class="close" href="info.php">&times;</a>
            </div>
                <label for="file-input">Upload Product Image</label>
                <input  type="text" name="c" value="<?php echo $Stockcode ?>"/><br />
                <input type="file" accept=".jpg,.jpeg.,.png," name="file" /><br />
                <input class="bottom_btn" type="submit" value="Upload" name="upload" />
        </form>
    </div>
   </body>
</html>
