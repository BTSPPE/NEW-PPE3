<?php
    if(count($lesRecherchesDemandes)>0){
        foreach($lesRecherchesDemandes as $uneRecherche){
?>
        <div idService=<?php echo $uneRecherche->idService?> idDemande=<?php echo $uneRecherche->idDemande?> idCreateur=<?php echo $uneRecherche->idUser?> class="boite boiteDemande">
<?php   
            echo $uneRecherche->nomService .'<br>'. $uneRecherche->descriptionDemande.'<br>'.$uneRecherche->dateDemande."<br> créé par ".$uneRecherche->nomUser."</div><br>";
        }
    }
    else{
        echo "Il n'y a rien dans cette catégorie";
    }
?>
<div id="popdealdemande"></div>
<script>
    $(document).ready(function() {
        var boites = $(".boiteDemande")
        var i = 0;
            while(i < boites.length) {
                boites[i].addEventListener("click", popupDealDemande)
                i++;
            }
    })
</script>