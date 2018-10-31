<?php
class Model_Deconnexion extends CI_Model
{
    public function Deconnexion()
    {
        $this->session->isLogged = false;
    }
}
?>