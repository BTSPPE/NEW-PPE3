<?php
class Model_CreationDeal extends CI_Model
{
    public function NewDeal()
    {
        $sql = $this->db->query('INSERT INTO deal (dateDeal, noteUser1, noteUser2, idOffreUser1, idOffreUser2, idCreateur, idEtat)
                                 VALUES (NOW(), 0, 0, '.$_GET["idOffre1"].', '.$_GET["idOffre2"].' ,'.$this->session->idUser.', 1)');
    }
}
?>