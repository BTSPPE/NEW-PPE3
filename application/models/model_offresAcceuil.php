<?php
class model_offresAcceuil extends CI_Model
{
    public function GetAllOffres()
    {
        $sql = $this->db->query('SELECT service.nomService, offre.descriptionOffre, offre.dateOffre
                                 FROM offre, service
                                 WHERE service.idService = offre.idService');
        return $sql->result();
    }
}
?>