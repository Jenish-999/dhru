<?php 

    include 'config.php';

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']); 
    $c_password = md5($_POST['c_password']);
    $check = $_POST['checkbox'];


    $select = "Select email from dhr where email='$email'";
    $select_query_fire = mysqli_query($conn, $select);
    $get_rows = mysqli_num_rows($select_query_fire);

    if(!$get_rows > 0){

        if($password == $c_password){

            if($check == "Checked"){
                $insert = "Insert into dhr(fname,lname,email,lpassword,lcpassword,termcondition) Values('".strtoupper($fname)."','".strtoupper($lname)."','".strtoupper($email)."', '$password', '$c_password', '$check')";
                $insert_fire = mysqli_query($conn, $insert);
                if($insert_fire){
                    echo 1;
                }else{
                    echo 2;
                }
            }else{
                echo 3;
            }

            

        }else{
            echo 4;    
        }

    }else{
        echo 0;
    }


?>