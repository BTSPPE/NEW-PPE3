<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?php echo base_url();?>Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/StyleAcceuil.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>JQuery/jquery-ui.css" />
        <script type="text/javascript" src="<?php echo base_url();?>JQuery/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>JQuery/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>Bootstrap/js/bootstrap.bundle.js"></script>
        <script src="<?php echo base_url();?>JS/MesFonctions.js"></script>    
</head>
<body>
    <main>
    <h1>Inscription</h1><br>
    <?php
    echo "<label>Nom</label> <input type='text' id='txtNom'><br><br>";
    echo "<label>Login</label> <input type='text' id='txtLogin'><br><br>";
    echo "<label>Mot de passe</label> <input type='password' id='txtMdp'><br><br>";
    echo "<input type='button' value='Créer un compte' onclick='Ajoutinscription()'>";
    ?>
    <button id="acceuil">Retournez à l'acceuil</button>
    </main>
    <script>
        $(document).ready(function() {
            $("#acceuil").click(function() {window.location.assign('<?php echo base_url();?>')});
         });
    </script>
    </body>
</html>