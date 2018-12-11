<?php
class Model_DealOffre extends CI_Model
{
    public function GetOffreVoulu()
    {
        $sql = $this->db->query('SELECT *
                                FROM offre
                                INNER JOIN service
                                    ON offre.idService=service.idService
                                WHERE idOffre='.$_GET["idOffre"]);
        return $sql->result();
    }

    public function GetMaDemande()
    {
        $sql = $this->db->query('SELECT *
                                FROM demande
                                INNER JOIN service
                                    ON service.idService=demande.idService
                                WHERE idUser='.$this->session->idUser.'
                                    AND demande.idService='.$_GET["idService"]);
        return $sql->result();
    }

    public function GetListeMesOffres()
    {
        $sql = $this->db->query('SELECT *
                                FROM offre
                                INNER JOIN service
                                    ON offre.idService=service.idService
                                WHERE idUser='.$this->session->idUser.'
                                    AND offre.idService IN (SELECT idService FROM demande WHERE idUser='.$_GET["idUser"].')');
        return $sql->result();
    }

    public function GetListeSesDemandes()
    {
        $sql = $this->db->query('SELECT *
                                FROM demande
                                INNER JOIN service
                                    ON demande.idService=service.idService
                                WHERE idUser='.$_GET["idUser"].'
                                    AND demande.idService IN (SELECT idService FROM offre WHERE idUser='.$this->session->idUser.')');
        return $sql->result();
    }
}

?>