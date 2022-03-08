<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dataTables.bootstrap5.min.css">
    <title>test</title>
</head>
<body>
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
                                    <tr>
                                        <td>tt</td>
                                        <td>yy</td>
                                        <td>ee</td>
                                        <td>gg</td>
                                        
                                    </tr>
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
    <script type="text/javascript" src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script  src="dataTables.bootstrap5.min.js"></script>
    <script  src="jquery.dataTables.min.js"></script>
    <script  src="jquery-3.6.0.min.js"></script>
    <script  src="popper.min.js"></script>
    <script>
        $('.mydatatable').DataTable({
            initComplete:function(){
                this.api().columns().every( function(){
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()).empty())
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
</html>
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
<!--</table>
<div class="container">
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 20rem; height: 10rem; margin-top: 1px;">
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
    <label>Last name: </label><?php echo $donnees['lname'];?><br>
                        <label>First name: </label><?php echo $donnees['fname'];?><br>
                        <label>Username: </label><?php echo $donnees['uname'];?><br>-->