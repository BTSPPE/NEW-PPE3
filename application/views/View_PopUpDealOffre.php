<div class="modal fade" id="popupdealoffre" tabindex="-1" role="dialog" aria-labelledby="popupdealoffre" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupdealoffre">Creez un échange</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
            <h3>Ce que vous échangez</h3>
            <?php
            $i=true;
            echo "Ce qui vous est proposé";
            foreach($offreVoulu as $uneOffre){
              echo "<div class='flex'>";
              echo  "<div id='offreVoulu' idoffre=".$uneOffre->idOffre." class='boitedeal'>".$uneOffre->nomService .'<br>'. $uneOffre->descriptionOffre.'<br>'. $uneOffre->dateOffre.'</div><br><br>';
            }
            echo "</div>";
            if(count($maDemande)!=0){
              echo "Contre ce que ce vous souhaitez";
              echo "<div class='flex'>";
              foreach($maDemande as $laDemande){
                echo "<div id='demandeVoulu' iddemande=".$laDemande->idDemande." class='boitedeal'>".$laDemande->nomService.'<br>'.$laDemande->descriptionDemande.'<br>'.$laDemande->dateDemande."</div><br>";
              }
              echo "</div>";
            }
            else{
              echo "Vous n'avez pas d'offre qui correspond à cette demande <br>";
              $i=false;
            }
            ?>
            <h3>Ce que vous pouvez échanger</h3>
            Sélectionner l'offre que vous souhaitez proposer<br>
            <?php
            if($i==true){
              if(count($listeMesOffres)!=0 && count($listeSesDemandes)!=0){
                echo "Vos offres actuelles <br>";
                echo "Cliquez sur une offre pour la sélectionner";
                echo "<div class='flex'>";
                foreach($listeMesOffres as $uneChose){
                  echo "<div offreUser1=".$uneChose->idOffre." class='boitedeal mesOffres'>".$uneChose->nomService.'<br>'.$uneChose->descriptionOffre.'<br>'.$uneChose->dateOffre."</div><br><br>";
                }
                echo "</div>";
                echo "Ses demandes actuelles <br>";
                echo "<div class='flex'>";
                foreach($listeSesDemandes as $unTruc){
                  echo "<div iddemande2=".$unTruc->idDemande." class='boitedeal sesDemandes' >".$unTruc->nomService.'<br>'.$unTruc->descriptionDemande.'<br>'.$unTruc->dateDemande.'</div><br><br>';
                }
                echo "</div>";
              }
              else{
                echo "Vous n'avez pas de quoi échanger avec cette personne";
                $i=false;
              }
            }
            ?>
            <?php
            if($i==true){
              echo "<button id='create_deal' type='submit' class='btn btn-primary'>Créer l'échange</button>";
            }?>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
    </div>
    </div>
  </div>
</div>
<script>
    var boites = $(".mesOffres")
    var i = 0;
    while(i < boites.length) {
        boites[i].addEventListener("click", setidOffrepOffre)
        i++;
    }
    // console.log("#create_Deal");
    $("#create_deal")[0].addEventListener("click",creationDealOffre);
</script>