<?php 
  $con = new PDO('mysql:host=localhost;dbname=test','root','');
  $pdoStat = $con->prepare('SELECT * FROM users WHERE id = :id');
  $pdoStat->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
  $truc = isset($_POST['id']) ? $_POST['id'] : NULL;
  $test = $pdoStat->execute();
  $ts=$pdoStat->fetch();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <title>Update</title>
    </head>
    <body>
        <div class="container">
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 50rem; margin-top: 10rem;">
                        <div class="card-body">
                            <form action="edit.php?id=<?php echo $ts['id'];?>" method="post">
                                <p class="text-center" style="font-size: 2rem; font-weight:800;">Update</p>
                                <div class="input-group">
                                    <input type="hidden" name="id" value="<?php echo $ts['id']; ?>">
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="lname" placeholder="Last name" value="<?php echo $ts['lname']; ?>">
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="fname" placeholder="First name" value="<?php echo $ts['fname']; ?>">
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="uname" placeholder="Username" value="<?php echo $ts['uname']; ?>">
                                </div>
                                <div class="text-center">
                                 
                                    <button name="submit" class="btn btn-primary btn-block mb-4">UPDATE</button> 
                                    
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

