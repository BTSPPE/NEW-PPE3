<?php
class Model_PopUp extends CI_Model
{
    public function GetPopUp()
    {
        $sql = $this->db->query('SELECT DISTINCT idService, nomService
                                 FROM service');
        return $sql->result();
    }
}
?>