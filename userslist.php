<?php
    include ('phpcode.php');
    $sql="SELECT * FROM users";
    $result=mysqli_query($conn, $sql);
    session_start();
    if(!isset($_SESSION['uname'])){
        header("Location: Log1n.php");
    }
?>
<!--------------------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dataTables.bootstrap5.min.css">
</head>
<body>
    <form action="" method="POST"> 
        <div class="box">
            <input type="checkbox" id="check">
            <div class="search-box">
                <input type="search" name= "search_" placeholder="Type here">
                <!--<button class="btn"><i class="fa fa-search"></i></button>-->
                <label for="check" class="btn">
                    <i class="fas fa-search"></i>
                </label>
            </div>
        </div>
     </form>
<?php 
    try
    {
        $con = new PDO('mysql:host=localhost;dbname=test','root','');
    } 
        catch(Exception $message)
    {
        die('Erreur:'.$message->getMessage());
    }
    if(isset($_POST['search_']))
    {
        $search = '%'.$_POST['search_'].'%';
       
    }
    else
    {
        $search ='';
    }
    $reponse = $con->prepare('SELECT * FROM users where lname like :search_ or fname like :search_ or uname like :search_');
    $reponse->bindParam(':search_', $search,PDO::PARAM_STR);
    $reponse->execute();

    while ($donnees = $reponse->fetch())
    {
?>
<div class="container">
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 50rem; height: 8rem; margin-top: 1px;">
                    <div class="card-body">
                        <table class="table table-striped table-bordered mydatatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Last name</th>
                                    <th>Firstname</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $donnees['lname'];?></td>
                                    <td><?php echo $donnees['fname'];?></td>
                                    <td><?php echo $donnees['uname'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php   
    }
    $reponse->closeCursor();
?>
<!-------------------------------------------------------------------------------------------------------->
    <div class="container">
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 50rem; height: 40rem; margin-top: 6rem;">
                    <div class="card-body">
                        <form>
                        
                            <legend></legend>
                            <div class="container mb-3 mt-3">
                                <table class="table table-striped table-bordered mydatatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($tbl=mysqli_fetch_assoc($result))
                                    {
                                    ?>  
                                
                                    <tr>
                                        <td><?php echo $tbl['lname'];?></td>
                                        <td><?php echo $tbl['fname'];?></td>
                                        <td><?php echo $tbl['uname'];?></td>
                                        <td><?php echo $tbl['email'];?></td>
                                        <td><button  class="btn btn-warning"><a class="btn_upd" href="updateuser.php?id=<?php echo $tbl['id'];?>">Update</a></button>  <button  class="btn btn-danger"><a class="text-light" onclick="checker()" href="delete_user.php?id=<?php echo $tbl['id'];?>">Delete</a></button></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>       
                                </table>
                            </div>
                            <script>
                                function checker(){
                                    var result = confirm('Are you sure?');
                                    if(result == false){
                                        event.preventDefault();
                                    }
                                }
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form  action="" method="POST">
       <!-- <section>
            <legend>Search</legend>
            <input type="search" name= "search_" placeholder="Type here">
            <button class="btn"><i class="fa fa-search"></i></button>
        </section>-->
    </form>
    <script type="text/javascript" src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>                            
    <script type="text/javascript" src="dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="popper.min.js"></script>
    <script>
        $('.mydatatable').DataTable({
            initComplete:function(){
                this.api().columns().every( function(){
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function(){
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                        .search( val ? '^' +val+'$' : '', true, false)
                        .draw();
                    });
                    column.data().unique().sort().each( function( d, j){
                        select.append('<option value="'+d+'">'+d+'</option>')
                    });
                });
            }
        });
    </script>
</body>
<style>

</style>
</html>
