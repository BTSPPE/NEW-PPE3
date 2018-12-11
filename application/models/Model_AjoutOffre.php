<?php
class Model_AjoutOffre extends CI_Model
{
    public function AjoutOffre()
    {
        $sql = $this->db->query('INSERT INTO offre (descriptionoffre, dateoffre, idService, idUser)
                                 VALUES ("'.$_POST["descOffre"].'", NOW(),'.$_POST["idService"].' ,'.$this->session->idUser.' )');
        //ajoute l'offre dans la base de données
    }
}
?>