
<?php
    //------insert.php------
     $servername = "localhost";
    $username = "sail";
    $password = "max232415!";
    $dbname = "csc348-cw";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 


          $comment=$_POST['comment'];
            $id=$_POST['posts_id'];
             $sql= mysqli_query($conn,"INSERT INTO insert_tbl(name,pass) VALUES('".$comment."','".$id."')");

 ?>