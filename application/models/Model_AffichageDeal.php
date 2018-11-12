<?php

Class Model_AffichageDeal extends CI_Model
{
    public function AfficherDeals()
    {
        $sql = $this->db->query("SELECT * FROM deal");
        return $sql->result();
    }
}

?>