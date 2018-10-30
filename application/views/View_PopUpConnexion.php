<div class="modal fade" id="popupconnexion" tabindex="-1" role="dialog" aria-labelledby="popupconnexion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupconnexion">Connectez-vous</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="index.php/indexAcceuilArthur/Connexion" method="post">
        <div class="form-group">
    <label for="login">Login</label>
    <input name="login" type="text" class="form-control" id="login" aria-describedby="pseudo" placeholder="Entrer votre nom d'utilisateur">
  </div>
  <div class="form-group">
    <label for="mdp1">Mot de passe</label>
    <input name="mdp" type="password" class="form-control" id="mdp1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </div>
    </div>
  </div>
</div>