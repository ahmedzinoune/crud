<?php
    include 'phpcode.php';
    session_start();
    error_reporting(0);
    if(isset($_SESSION['uname'])){
        header("Location: homescreen.php");
    }
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conn, $sql);
        if($result->num_rows>0){
            $row=mysqli_fetch_assoc($result);
            $_SESSION['uname']=$row['uname'];
            header("Location: homescreen.php");
        }else{
            echo "<script>alert('Email or password is wrong')</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
        
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 50rem; margin-top: 10rem;">
                        <div class="card-body">
                            <form action="" method="POST" class="login_email">
                                <p class="text-center" style="font-size: 2rem; font-weight:800;">Login</p>
                                <div class="form-outline mb-4">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="text-center">
                                    <button name="submit" class="btn btn-success btn-rounded btn-block mb-4">Login</button>
                                </div>
                                <div class="text-center">
                                    <p class="login_register_txt">Don't have an account yet? <a href="register.php">Register here</a></p>
                                </div>
                            </form>
                        </div>      
                    </div>              
                </div>
            </div>
        </div>
        <script type="text/javascript" src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    </body>
</html>