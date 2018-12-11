<?php
class Model_NoteDeal extends CI_Model
{
    public function NoteDeal()
    {
        if($_POST["idCreateur"]==$this->session->idUser){
            $this->db->query('UPDATE deal
                            SET noteUser1='.$_POST["note"].'
                            WHERE deal.idDeal='.$_POST["idDeal"].'');
        }
        else{
            $this->db->query('UPDATE deal
                            SET noteUser2='.$_POST["note"].'
                            WHERE deal.idDeal='.$_POST["idDeal"].'');
        }

        $note = $this->db->query('SELECT noteUser1, noteUser2
                                FROM deal
                                WHERE idDeal='.$_POST["idDeal"].'');
        $vrainote=$note->result();
        if ($vrainote[0]->noteUser1!=0 && $vrainote[0]->noteUser2!=0){
            $this->db->query('UPDATE deal
                            SET idEtat=2
                            WHERE idDeal='.$_POST["idDeal"].'');
        }
    }

}
?>