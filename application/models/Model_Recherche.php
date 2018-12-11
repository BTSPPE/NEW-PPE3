<?php
    class Model_Recherche extends CI_Model
    {
        public function GetAllOffresbyidService($idService)
        {
            $sql = $this->db->query('SELECT *
                                    FROM offre
                                    INNER JOIN user
                                        ON offre.idUser=user.idUser
                                    INNER JOIN service
                                        ON offre.idService=service.idService
                                    WHERE offre.idService='.$idService.'
                                        AND user.idUser !="'.$this->session->idUser.'"');
            return $sql->result();
        }

        public function GetAllDemandesbyidService($idService)
        {
            $sql = $this->db->query('SELECT *
                                    FROM demande
                                    INNER JOIN user
                                        ON demande.idUser=user.idUser
                                    INNER JOIN service
                                        ON demande.idService=service.idService
                                    WHERE demande.idService='.$idService.'
                                        AND user.idUser !="'.$this->session->idUser.'"');
            return $sql->result();
        }
    }
?>