<?php
class Model_AjoutDemande extends CI_Model
{
    public function AjoutDemande()
    {
        $sql = $this->db->query('INSERT INTO demande (descriptionDemande, dateDemande, idService, idUser)
                                 VALUES ("'.$_POST["descDemande"].'", NOW(), '.$_POST["idService"].', '.$this->session->idUser.')');
        //ajoute la demande dans la base de donnée
    }
}
?>