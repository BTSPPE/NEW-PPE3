<div class="modal fade" id="popupdealdemande" tabindex="-1" role="dialog" aria-labelledby="popupdealdemande" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupdealdemande">Creez un échange</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
            <h3>Ce que vous échangez</h3>
            <?php
            $i=true;
            echo "Ce que vous souhaitez";
            foreach($demandeVoulu as $uneDemande){
              echo "<div class='flex'>";
              echo  "<div class='boitedeal'>".$uneDemande->nomService .'<br>'. $uneDemande->descriptionDemande.'<br>'. $uneDemande->dateDemande.'</div><br><br>';
            }
            echo "</div>";
            if(count($monOffre)!=0){
              echo "Contre ce que ce vous proposez";
              echo "<div class='flex'>";
              foreach($monOffre as $lOffre){
                echo "<div offreUser1=".$lOffre->idOffre." id='Monoffre' class='boitedeal'>".$lOffre->nomService.'<br>'.$lOffre->descriptionOffre.'<br>'.$lOffre->dateOffre."</div><br>";
              }
              echo "</div>";
            }
            else{
              echo "Vous n'avez pas d'offre qui correspond à cette demande <br>";
              $i=false;
            }
            ?>
            <h3>Ce que vous pouvez échanger</h3>
            <?php
            if($i==true){
              if(count($listeMesDemandes)!=0 && count($listeSesOffres)!=0){
                echo "Vos demandes actuelles <br>";
                echo "<div class='flex'>";
                foreach($listeMesDemandes as $uneChose){
                  echo "<div value=".$uneChose->idService." class='boitedeal'>".$uneChose->nomService.'<br>'.$uneChose->descriptionDemande.'<br>'.$uneChose->dateDemande."</div><br><br>";
                }
                echo "</div>";
                echo "Ses offres actuelles <br>";
                echo "Cliquez sur une offre pour la sélectionner";
                echo "<div class='flex'>";
                foreach($listeSesOffres as $unTruc){
                  echo "<div offreUser2=".$unTruc->idOffre." value=".$unTruc->idService." class='boitedeal sesOffres' >".$unTruc->nomService.'<br>'.$unTruc->descriptionOffre.'<br>'.$unTruc->dateOffre.'</div><br><br>';
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
              echo "<button type='submit' id='create_deal' class='btn btn-primary'>Créer l'échange</button>";
            }?>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
    </div>
    </div>
  </div>
</div>
<script>
    var boites = $(".sesOffres")
    var i = 0;
    while(i < boites.length) {
        boites[i].addEventListener("click", setidOffrepDemande)
        i++;
    }
    $("#create_deal")[0].addEventListener("click",creationDealDemande);
</script>