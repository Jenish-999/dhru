<!DOCTYPE html>
<html>

<head>
    <title>PROFILE</title>
    <!-- <link rel="stylesheet" href="s1.css"> -->
	
</head>
<style>
	<?php include 's1.css'; ?>
</style>
<body>

    </script>
    <header>
        <h1>DJS LIBRARY</h1>
    </header>
    <div class="wrapper">
        <div class="left">
            <!-- <div class="imgTag"></div> -->
        </div>
        <div class="right">
            <div class="tabs">
                <ul>
                    <li class="register_li">SignUp</li>
                    <li class="login_li">SignIn</li>
                </ul>
            </div>
            <form id="frm">
                <div class="register">
                    <div class="input_field">
                        <input type="text" placeholder="Enter your name" class="input" name="fname" id="fname">
                    </div>

                    <div class="input_field">
                        <input type="text" placeholder="Enter your lastname" class="input" name="lname" id="lname">
                    </div>
                    
                    <div class="input_field">
                        <input type="email" placeholder="Enter your email" class="input" name="email" id="email">
                    </div>

                    <div class="input_field">
                        <input type="password" placeholder="Enter your password" class="input" name="password" id="password">
                    </div>

                    <div class="input_field">
                        <input type="password" placeholder="Enter your Confirm_password" class="input" name="c_password" id="c_password">
                    </div>

                    <div class="input_field">
                        <input class="form-check-input" type="checkbox" name="checkbox" value="Checked">&nbsp;I agree to the license terms.
                    </div>

                    <button type="button" id="submit-btn-1" name="sub">SUBMIT</button>
                    

                    <div class="alert alert-success" role="alert">
                        <!-- A simple danger alert—check it out! -->
                    </div>
					<div class="alert alert-danger" role="alert">
                        <!-- A simple danger alert—check it out! -->
                    </div>
                </div>
            </form>

            <form>
                <div class="login">
                    <div class="input_field">
                        <input type="email" id="email2" name="email2" placeholder="Enter your email" class="input"
                            required>
                    </div>
                    <div class="input_field">
                        <input type="text" name="otp" placeholder="Enter your OTP" class="input">
                    </div>
                    <button type="submit" name="submit2" class="btn1"><a href="">Send OTP</a></button>
                </div>
            </form>
        </div>
    </div>



    <!-- <script type="text/javascript" src="one.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {

        // Signup & SignIn 
        $(".login").hide();
        $(".register_li").addClass("active");

        $(".login_li").click(function() {
            $(this).addClass("active");
            $(".register_li").removeClass("active");
            $(".login").show();
            $(".register").hide();

        });

        $(".register_li").click(function() {
            $(this).addClass("active");
            $(".login_li").removeClass("active");
            $(".register").show();
            $(".login").hide();

        });


            // All Field Validation
            $("#submit-btn-1").click(function() {
            f_name = $('#fname').val();
            l_name = $('#lname').val();
            email = $('#email').val();
            password = $('#password').val();
            c_password = $('#c_password').val();
            password_length = $('#password').val().length;
            c_password_length = $('#c_password').val().length;
           
            if (f_name.length == '' || l_name.length == '' || email.length == '' || password.length == '' || c_password.length == '') {
				$(".alert-danger").html("Please Fill All Fields !!!").fadeIn(1000);
				$(".alert-danger").fadeOut(4000);
            }
            if(password != c_password){
                $(".alert-danger").html("Password is not match !!!").fadeIn(1000);
				$(".alert-danger").fadeOut(4000);
            }

            // Ajax Insert
            $.ajax({
                url : "insert.php",
                type: "POST",
                data: $('#frm').serialize(),
                success: function(data){
                    if(data == 0){
                        $('.alert-danger').html("This Email is exist.").fadeIn(1000);
                        $('.alert-danger').fadeOut(4000);
                    }else if(data == 1){
                        $('.alert-success').html("Data is recorded.").fadeIn(1000);
                        $('.alert-success').fadeOut(4000);
                        $('#frm').trigger("reset");
                    }else if(data == 2){
                        $('.alert-danger').html("Data is not recorded").fadeIn(1000);
                        $('.alert-danger').fadeOut(4000);
                    }else if(data == 3){
                        $('.alert-danger').html("Accept terms & conditions!!").fadeIn(1000);
                        $('.alert-danger').fadeOut(4000);
                    }else if(data == 4){
                        $('.alert-danger').html("Email or password is incorrect!!").fadeIn(1000);
                        $('.alert-danger').fadeOut(4000);
                    }
                }
            });



        });

        // Password Validation
        $('#password').keyup(function(){
            password_length = $('#password').val().length;
            if(password_length < 2 || password_length > 8){
				$(".alert-danger").html("Password should be between 2 to 8 !!!").show();
				
			}else {
                $(".alert-danger").fadeOut(4000);
            }
        });

        $('#c_password').keyup(function(){
            password_length = $('#password').val().length;
            if(password_length < 2 || password_length > 8){
				$(".alert-danger").html("Password should be between 2 to 8 !!!").show();
				
			}else {
                $(".alert-danger").fadeOut(4000);
            }
            

        });


    });
    </script>







</body>

</html>