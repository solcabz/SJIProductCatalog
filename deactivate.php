<?php
  
    // Connect to database 
    include 'db_conn.php';
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['id'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $course_id=$_GET['id'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE `users` SET 
            `status`=0 WHERE id='$course_id'";
  
        // Execute the query
        mysqli_query($conn,$sql);
    }
  
    // Go back to course-page.php
    header('location: memberList.php');
?>