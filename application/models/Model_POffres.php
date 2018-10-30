<?php
class Model_POffres extends CI_Model
{
    public function GetAllInfosOffre()
    {
        $sql = $this->db->query('SELECT idOffre, descriptionOffre, dateOffre, nomService
                                 FROM offre, service
                                 WHERE idUser='.$this->session->idUser.' AND offre.idService=service.idService');
        return $sql->result();
    }
}
?>