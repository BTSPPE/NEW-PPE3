<?php
class Model_ModifOffre extends CI_Model
{
    public function ModifierOffre()
    {
        $sql = $this->db->query('UPDATE offre
                                 SET descriptionOffre="'.$_POST["descOffre"].'",
                                     idService='.$_POST["idService"].'
                                 WHERE idOffre='.$_POST["idOffre"].' AND idUser='.$this->session->idUser);
    }
}
?>