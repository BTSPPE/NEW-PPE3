<?php
class Model_DealDemande extends CI_Model
{
    public function GetDemandeVoulu()
    {
        $sql = $this->db->query('SELECT *
                                FROM demande
                                INNER JOIN service
                                    ON demande.idService=service.idService
                                WHERE idDemande='.$_GET["idDemande"]);
        return $sql->result();
    }

    public function GetMonOffre()
    {
        $sql = $this->db->query('SELECT *
                                FROM offre
                                INNER JOIN service
                                    ON service.idService=offre.idService
                                WHERE idUser='.$this->session->idUser.'
                                    AND offre.idService='.$_GET["idService"]);
        return $sql->result();
    }

    public function GetListeMesDemandes()
    {
        $sql = $this->db->query('SELECT *
                                FROM demande
                                INNER JOIN service
                                    ON demande.idService=service.idService
                                WHERE idUser='.$this->session->idUser.'
                                    AND demande.idService IN (SELECT idService FROM offre WHERE idUser='.$_GET["idUser"].')');
        return $sql->result();
    }

    public function GetListeSesOffres()
    {
        $sql = $this->db->query('SELECT *
                                FROM offre
                                INNER JOIN service
                                    ON offre.idService=service.idService
                                WHERE idUser='.$_GET["idUser"].'
                                    AND offre.idService IN (SELECT idService FROM demande WHERE idUser='.$this->session->idUser.')');
        return $sql->result();
    }
}

?>