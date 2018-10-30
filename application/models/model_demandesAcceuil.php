<?php
class model_demandesAcceuil extends CI_Model
{
    public function GetAllDemande()
    {
        $sql = $this->db->query('SELECT service.nomService, demande.descriptionDemande, demande.dateDemande
                                 FROM demande, service
                                 WHERE service.idService = demande.idService');
        return $sql->result();
    }
}
?>