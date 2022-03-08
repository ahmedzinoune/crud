<!doctype html>
<html>
<head>
<title>Se connecter</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
        <div class="container">
          <div class ="row">
            <div class= "col-xs col-sm col-md col-lg">
	        <form  action="" method="post">
                <fieldset class="fs">
                    <legend>Se connecter</legend>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-controle" name="email" placeholder="Saisir votre email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="Saisir votre mot de passe">
                    </div>
                    <br/>
                    <div>
                        <a class="new_acc" href="inscription.php">S'inscrire</a>
                        <input class="log_btn" type="Submit"  name="valider" value="Se connecter">
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
        </div>
    <style>
         body{
            background-image:url(img/bg5.jpg);
        }
            .log_btn{
                background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);
                border: none;
                color: white;
                padding: 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin-left: 700px;
                cursor: pointer;
                border-radius: 12px;
                position:right;
            }
            .new_acc{
                background-color:green;
                border: none;
                color: white;
                padding: 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                border-radius: 12px;
                position:right;
            }
           
             form{
                background-image:url(img/bg3.jpg);
                padding:20px;
                margin-top:60px;
                margin-left:200px;
                margin-right:150px;
                margin-bottom:80px;
                border-radius:12px;
            }
            .form-control{
              border-radius:12px;
              margin-left: 70px;
            }
            .form-controle{
              border-radius:12px;
              margin-left: 116px;
            }
            .fs{
                margin-left:200px;
                margin-right:350px;
            }
    </style>
</body>
</html>