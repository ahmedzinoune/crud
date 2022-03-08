<?php
    session_start();
    if(!isset($_SESSION['uname'])){
        header("Location: Log1n.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 50rem; height: 20rem; margin-top: 10rem;">
                    <div class="card-body">
                        <div class="text-center">      
                            <?php echo "<h1>Welcome ".$_SESSION['uname']. "</h1>";?>
                        </div>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <button class="btn btn-warning btn-rounded btn-block mb-4"><a href="logout.php">Logout</a></button>
                            </div> 
                            <div class="btn-group" role="group" aria-label="Third group">
                                <div class="">
                                    <button class="btn btn-info btn-rounded btn-block mb-4"><a href="userslist.php">Users list</a></button>
                                </div>
                            </div>                  
                        </div>
                        
                    </div>
                </div>
            </div>      
        </div>
    </div>
    <script type="text/javascript" src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</body>
</html>