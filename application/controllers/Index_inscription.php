<?php

class Index_inscription extends CI_Controller
{

    public function index()
    {
        $this->load->view('View_inscription');
    }

    public function Ajoutinscription()
    {
        $this->load->model('Model_inscription');
        $data['Inscriptions']=$this->Model_inscription->Insertinscription($_GET['nomUser'],$_GET['login'],$_GET['mdp']);
    }
}

?>