
<div class="modal fade" id="popupdemande" tabindex="-1" role="dialog" aria-labelledby="popupdemande" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupdemande">Ajoutez votre demande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="numdemande">Numéro de la demande</label>
    <input type="textarea" name="numDemande"class="form-control" id="numdemande" value="<?php echo $idDemande[0]->maxdemande + 1?>" placeholder="<?php echo $idDemande[0]->maxdemande + 1?>">
  </div>
  <div class="form-group">
    <label for="selectdemande">De quoi avez-vous besoin ?</label>
    <select class="form-control" id="selectdemande">
        <?php
            foreach ($lesOptions as $uneOption)
            {
        ?>
                <option name="nomDemande" value="<?php echo $uneOption->idService ?>" ><?php echo $uneOption->nomService ; ?></option>
        <?php
            }
        ?>

    </select>
  </div>
  <div class="form-group">
    <label for="descriptiondemande">Description</label>
    <textarea class="form-control" id="descriptiondemande" rows="3"></textarea>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="ajoutDemande(event)" class="btn btn-primary">Enregistrer votre demande</button>
      </div>
    </div>
  </div>
</div>