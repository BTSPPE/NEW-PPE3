<!DOCTYPE html>
<html>
    <head> <meta charset="utf-8">
        <title>MonProfil</title>
            <link rel="stylesheet" href="<?php echo base_url();?>Bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>CSS/StyleAcceuil.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>JQuery/jquery-ui.css" />
        <script type="text/javascript" src="<?php echo base_url();?>JQuery/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>JQuery/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>Bootstrap/js/bootstrap.bundle.js"></script>
        <script src="<?php echo base_url();?>JS/mesFonctions.js"></script>    
    </head>
    <body>
    <header> 
        <nav>
            <div id="bandeau">
                    <div class="align">
                        <button type="button" class="btn btn-primary" id="Acceuil">Acceuil</button>
                        <div id="Acceuil"></div>
                    </div>
                    <?php
                    if ($this->session->isLogged==false)
                    {?>
                    <div class="align">
                    <button type="button" class="btn btn-primary" id="connexion">Connexion</button>
                    <div id="popconnexion"></div>
                    </div>
                    
                    <div class="align">
                    <button type="button" class="btn btn-primary" id="inscription">Inscription</button>
                    <div id="popinscription"></div>
                    </div>
                    <?php
                    }
                    else {
                        echo "<div class='align'>".$this->session->nomUser."</div><div class='align'> "."<img src='".$this->session->photoUser."' height='38'></div>";
                        ?>
                        <div class="align">
                    <button type="button" class="btn btn-primary" id="deconnexion">Déconnexion</button></div>
                        <?php
                    }
                    ?>
            </div>
        </nav>
    </header>
    <br><br><br><br><br><br>
    <main>
    <h3>Mes demandes</h3>
    Cliquez pour modifier
    <div id="demandes">
    <?php
     foreach ($lesDemandes as $uneDemande)
     {
  ?>
    <div class="boiteDemande">
        <?php
           echo "<p>".$uneDemande->nomService ."</p><br><p>". $uneDemande->descriptionDemande."</p><br><p>". $uneDemande->dateDemande. "</p><p class='invisible'>".$uneDemande->idDemande."</p></div>";
    }
        ?>
    </div>
    <div id=popDmodification></div> 
    <h3>Mes Offres</h3>
    Cliquez pour modifier
    <div id="offres">
    <?php
     foreach ($lesOffres as $uneOffre)
     {
  ?>
    <div class="boiteOffre">
        <?php
           echo '<p>'.$uneOffre->nomService.'</p><br><p>'. $uneOffre->descriptionOffre.'</p><br><p>'. $uneOffre->dateOffre. "</p><p class='invisible'>".$uneOffre->idOffre."</p></div>";
    }
        ?>
    </div>
    <div id=popOmodification></div>
    <h3>Mes Deals</h3>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </main>
     <script>
        $(document).ready(function() {
            $("#deconnexion").click(function() {window.location.assign('Deconnexion')});
            $("#Acceuil").click(function() {window.location.assign('<?php echo base_url();?>index.php')});
            var boites = $(".boiteOffre")
            var i = 0;
            while(i < boites.length) {
                boites[i].addEventListener("click", popupmodificationoffre)
                i++;
            }
            var boiteD = $(".boiteDemande")
            var j = 0;
            while(j < boiteD.length){
                boiteD[j].addEventListener("click", popupmodificationdemande)
                j++;  
            }
         });

     </script>
    </body>
    </html>