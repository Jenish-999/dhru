<?php 

    $conn = mysqli_connect("localhost", "root", "", "jenish");

    if(!$conn){
        echo "<script>alert('Database is not connected.');</script>";
    }

?>