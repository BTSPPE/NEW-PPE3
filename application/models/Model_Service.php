<?php
    class Model_Service extends CI_Model
    {
        public function GetAllServices()
        {
            $sql = $this->db->query('SELECT idService, nomService
                                    FROM service');
            return $sql->result();
        }
    }
?>