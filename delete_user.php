<?php
    $con = new PDO('mysql:host=localhost;dbname=test','root','');
    $pdoStat = $con->prepare('DELETE FROM users WHERE id = :id LIMIT 1');
    $pdoStat->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $truc = isset($_POST['id']) ? $_POST['id'] : NULL;
    $test = $pdoStat->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete result</title>
</head>
<body>
    <?php
        if($test)
        {
            echo "<script>alert('User deleted')</script>";
        }
        else
        {
            echo "<script>alert('Delete failed')</script>";
        }
    ?>
</body>
</html>