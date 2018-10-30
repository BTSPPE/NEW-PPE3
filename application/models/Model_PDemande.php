<?php
class Model_PDemande extends CI_Model
{
    public function GetAllInfosDemande()
    {
        $sql = $this->db->query('SELECT idDemande, descriptionDemande, dateDemande, nomService
                                 FROM demande, service
                                 WHERE idUser='.$this->session->idUser.' AND demande.idService=service.idService');
        return $sql->result();
    }
}
?>