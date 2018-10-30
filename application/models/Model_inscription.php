<?php

Class Model_inscription extends CI_Model
{
    public function Insertinscription($nomUser,$login,$mdp)
    {
        $sql = $this->db->query("INSERT INTO user (nomUser,login,mdp) 
                                 VALUES ('".$nomUser."','".$login."','".$mdp."')");
    }
}

?>