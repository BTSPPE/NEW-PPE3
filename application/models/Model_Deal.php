<?php
class Model_Deal extends CI_Model
{
    public function GetAllDealsCreateur()
    {
      $sql = $this->db->query('SELECT service.nomService
                                 FROM deal
                                 INNER JOIN offre
                                    ON offre.idOffre = deal.idOffreUser1
                                 INNER JOIN user
                                    ON user.idUser = offre.idUser
                                 INNER JOIN service
                                    ON service.idService = offre.idService
                                 WHERE deal.idCreateur ='.$this->session->idUser.'');

      $sql2 = $this->db->query('SELECT service.nomService
                                 FROM deal
                                 INNER JOIN offre
                                    ON offre.idOffre = deal.idOffreUser2
                                 INNER JOIN user
                                    ON user.idUser = offre.idUser
                                 INNER JOIN service
                                    ON service.idService = offre.idService
                                 WHERE deal.idDeal IN (SELECT idDeal from deal INNER JOIN offre ON offre.idOffre = deal.idOffreUser2 INNER JOIN user ON user.idUser = offre.idUser WHERE user.idUser='.$this->session->idUser.')');
      return array_merge($sql->result(),$sql2->result());
    }

    public function GetAllDeals()
    {
         $sql3 = $this->db->query('SELECT deal.idCreateur, deal.idDeal, deal.dateDeal,deal.noteUser1, deal.noteUser2, deal.idCreateur, user.idUser, user.nomUser, user.photoUser, service.nomService
                                 FROM deal
                                 INNER JOIN offre
                                    ON offre.idOffre = deal.idOffreUser2
                                 INNER JOIN user
                                    ON user.idUser = offre.idUser
                                 INNER JOIN service
                                    ON service.idService = offre.idService
                                 WHERE deal.idCreateur ='.$this->session->idUser.'');
         
         $sql4 = $this->db->query('SELECT deal.idCreateur, deal.idDeal, deal.dateDeal,deal.noteUser1, deal.noteUser2, deal.idCreateur, user.idUser, user.nomUser, user.photoUser, service.nomService
                                 FROM deal
                                 INNER JOIN offre
                                    ON offre.idOffre = deal.idOffreUser1
                                 INNER JOIN user
                                    ON user.idUser = offre.idUser
                                 INNER JOIN service
                                    ON service.idService = offre.idService
                                 WHERE deal.idDeal IN (SELECT idDeal from deal INNER JOIN offre ON offre.idOffre = deal.idOffreUser2 INNER JOIN user ON user.idUser = offre.idUser WHERE user.idUser='.$this->session->idUser.')');
        return array_merge($sql3->result(),$sql4->result());
    }
}
?>