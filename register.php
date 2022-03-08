<?php
    include 'phpcode.php';
    error_reporting(0);
    session_start();
    if(isset($_SESSION['uname'])){
        header("Location: Log1n.php");
    }
    if(isset($_POST['submit'])){
        $lname =$_POST['lname'];
        $fname =$_POST['fname'];
        $uname =$_POST['uname'];
        $email =$_POST['email'];
        $password =md5($_POST['password']);
        $cpassword =md5($_POST['cpassword']);
        if($password ==$cpassword){
            $sql="SELECT * FROM users WHERE email='$email'";
            $result=mysqli_query($conn, $sql);
            if(!$result->num_rows>0){
                $sql= "INSERT INTO users(lname, fname, uname, email, password) VALUES('$lname','$fname','$uname','$email','$password')";
                $result= mysqli_query($conn,$sql);
                if($result){
                    echo "<script>alert('Registration successfully')</script>";
                    $lname="";
                    $fname="";
                    $uname="";
                    $email="";
                    $_POST['password']="";
                    $_POST['cpassword']="";
                }else{
                    echo "<script>alert('Something wrong')</script>";
                }
                
            }else{
                echo "<script>alert('Email already exists')</script>";
            }
            
        }else{
            echo"<script>alert('Password not matched')</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <title>Register</title>
    </head>
    <body>
        <div class="container">
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 50rem; margin-top: 6rem;">
                        <div class="card-body">
                            <form action="" method="POST" class="login_email">
                                <p class="text-center" style="font-size: 2rem; font-weight:800;">Register</p>
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="lname" placeholder="Last name" value="<?php echo $lname;?>" required>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="fname" placeholder="First name" value="<?php echo $fname;?>" required>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="uname" placeholder="Username" value="<?php echo $uname;?>" required>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email;?>" required>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $_POST['password'];?>" required>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="Password" class="form-control" name="cpassword" placeholder="Confirm Password" value="<?php echo $_POST['cpassword'];?>"required>
                                </div>
                                <div class="text-center">
                                    <button name="submit" class="btn btn-primary btn-block mb-4">Register</button>
                                </div>
                                <div class="text-center">
                                    <p class="login_register_txt">Have already an account? <a href="Log1n.php">Login here</a></p>
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
