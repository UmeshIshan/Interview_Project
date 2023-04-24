<?php

session_start();

    include("connect.php");
    include("functions.php");   

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['fullname'];
        $checkpsw = $_POST['checkpsw'];
        $gender = $_POST['gender'];
        $birth_date = date('Y-m-d', strtotime($_POST['dob']));

        if((!empty($email) && !empty($password) && !empty($checkpsw) && !empty($name) && !empty($birth_date)))
        {
            if($password == $checkpsw)
            {
                //save to data base
                $user_id = random_num(20);
                $query = "insert into users (user_id,email,name,password,birth_date,gender) values('$user_id','$email','$name','$password','$birth_date','$gender')";

                mysqli_query($con, $query);

                header("Location: login.php");
                die;
            }
            else{
                echo "Passwords Do Not Match. Try Again!";
            }

        }else
        {
            echo "Please Enter Valid Information";
        }
    }
?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<title> Responsive Login and Signup Form </title>-->

        <!-- CSS -->
        <link rel="stylesheet" href="login.css">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <title> Signup </title>
    
    </head>
    <body>
        <section class="container forms">
        <div class="form login">
                <div class="form-content">
                    <header>Sign Up</header>
                    <form method ="post">
                        <div class="field input-field">
                            <input type="email" placeholder="Email Address" class="input" name="email">
                        </div>

                        <div class="field input-field">
                            <input type="text" placeholder="Name" class="input" name="fullname">
                        </div>

                        <div class="field input-field">
                            <input type="date" placeholder="Date of Birth" class="input" name="dob">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Create password" class="password" name="password">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Confirm password" class="password" name="checkpsw">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field input-field">
                            <label> Gender </label>
                             <select id="gender" name="gender">
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>
                            </select>
                        </div>

                        <div class="field button-field">
                            <button type="submit" value ="signup" name =" signup" >Signup</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="login.php" class="link login-link">Login</a></span>
                    </div>
                </div>

            </div>
        </section>
    </body>
</html>