<!DOCTYPE html>
<html>
    <head> <meta charset="utf-8">
        <title>Recherche</title>
        <link rel="stylesheet" href="<?php echo base_url();?>Bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>CSS/StyleAcceuil.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>JQuery/jquery-ui.css" />
        <script type="text/javascript" src="<?php echo base_url();?>JQuery/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>JQuery/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>Bootstrap/js/bootstrap.bundle.js"></script>
        <link type="stylesheet" src="<?php echo base_url();?>Bootstrap/css/bootstrap-select.css">
        <script type="text/javascript" src="<?php echo base_url();?>Bootstrap/js/bootstrap-select.js"></script>
        <script src="<?php echo base_url();?>JS/mesFonctions.js"></script>    
    </head>
<body>
    <main>
    <h2>Voici la page de recherche</h2>
    <p>Selectionner le service qu'il vous faut</p>
    <select  data-live-search="true" onchange="Recherche(this.value)">
    <option name="vide">-------------------------------</option>
        <?php
        foreach($lesServices as $unService){
            ?>
           <option name="Service" value="<?php echo $unService->idService ?>"><?php echo $unService->nomService?></option>
           <?php
        }
        ?>
    </select>
    <h3>Les offres recherchées</h3>
    <div id="divoffre"></div>
    <h3>Les demandes recherchées</h3>
    <div id="divdemande"></div>

    <button type="button" class="btn btn-primary" id="Acceuil">Acceuil</button>
    <button type="button" class="btn btn-primary" id="Profil">Profil</button>
    <div id="Acceuil"></div>
    </main>
    <script>
        $(document).ready(function() {
            $("#Acceuil").click(function() {window.location.assign('<?php echo base_url();?>index.php')});
            $("#Profil").click(function() {window.location.assign('<?php echo base_url();?>index.php/indexAcceuilArthur/profil')});
        })
    </script>
</body>
</html>