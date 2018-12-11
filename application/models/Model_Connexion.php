<?php
class Model_Connexion extends CI_Model
{
    public function Connexion()
    {
        $sql = $this->db->query('SELECT mdp FROM user
                                WHERE login ="'.$_POST["login"].'"');
        if (count($sql->result())!=0 && $sql->result()[0]->mdp == $_POST["mdp"]) { //vérifie si le mot de passe est bon ainsi que le login 
            $this->session->isLogged = true;
            $this->session->username = $_POST["login"];
        $sql = $this->db->query('SELECT nomUser, photoUser, idUser
                                FROM user
                                WHERE login ="'.$_POST["login"].'"');
        $this->session->nomUser = $sql->result()[0]->nomUser;
        $this->session->photoUser = $sql->result()[0]->photoUser;
        $this->session->idUser = $sql->result()[0]->idUser;
        return $sql->result();
        }
        else
            $this->session->isLogged = false;
    }
}
//connecte à la base de donnée
?>