<?php
    if(count($lesRecherchesOffres)>0){
        foreach($lesRecherchesOffres as $uneRecherche){
?>
        <div idService=<?php echo $uneRecherche->idService?> idOffre=<?php echo $uneRecherche->idOffre?> idCreateur=<?php echo $uneRecherche->idUser?> class="boite boiteOffre">
<?php   
            echo $uneRecherche->nomService .'<br>'. $uneRecherche->descriptionOffre.'<br>'.$uneRecherche->dateOffre."<br> créé par ".$uneRecherche->nomUser."</div><br>";
        }
    }
    else{
        echo "Il n'y a rien dans cette catégorie";
    }
?>
<div id="popdealoffre"></div>
<script>
    $(document).ready(function() {
        console.log("A QUE COUCOU")
        var boites = $(".boiteOffre")
        var i = 0;
            while(i < boites.length) {
                boites[i].addEventListener("click", popupDealOffre)
                i++;
            }
    })
</script>