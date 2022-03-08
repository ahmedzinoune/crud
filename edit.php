<?php
   include 'phpcode.php';
   error_reporting(0);
   session_start();
   if(isset($_SESSION['uname']))
   {
      header("Location: Log1n.php");
   }
   if(isset($_POST['submit']))
   {
      $id=$_REQUEST['id'];
      $lname=$_POST['lname'];
      $fname=$_POST['fname'];
      $uname=$_POST['uname'];
      if(!$result->num_rows>0)
      {
         $sql="UPDATE users SET lname='$lname', fname='$fname', uname='$uname' WHERE id='$id'";
         $result= mysqli_query($conn,$sql);
         if($result)
         {
               
            echo "<script>alert('Update successfully')</script>";
         }
         else
         {
            echo "<script>alert('Something went wrong!!')</script>";
         }
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
   <?php header("Location: userslist.php");?>
</body>
</html>