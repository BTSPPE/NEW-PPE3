<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscription</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <script type="text/javascript" src="JQuery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="JS/MesFonctions.js"></script>
</head>
<body>
    <h1>Inscription</h1><br>
    <?php
    echo "<label>Nom</label> <input type='text' id='txtNom'><br><br>";
    echo "<label>Login</label> <input type='text' id='txtLogin'><br><br>";
    echo "<label>Mot de passe</label> <input type='password' id='txtMdp'><br><br>";
    echo "<input type='button' value='Créer un compte' onclick='Ajoutinscription()'>"
    ?>
    </body>
</html>