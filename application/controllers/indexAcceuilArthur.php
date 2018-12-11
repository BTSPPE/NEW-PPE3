<?php
    
    class indexAcceuilArthur extends CI_controller
{
    public function index(){
        $this->load->library("session");
        $this->load->model("model_demandesAcceuil");
        $data['lesDemandes']=$this->model_demandesAcceuil->GetAllDemande(); // récupère demande pour la page d'acceuil
        $this->load->view("view_AcceuilArthur", $data); //page d'acceuil
    }

    public function GetAllOffres(){
        $this->load->library("session");
        $this->load->model("model_offresAcceuil");
        $data['lesOffres']=$this->model_offresAcceuil->GetAllOffres(); // récupère les offres pour la page d'acceuil
        $this->load->view("view_offresAcceuil", $data); //page d'acceuil
    }

    public function BoutonDemande(){
        $this->load->library("session");
        $this->load->model("Model_PopUp");
        $data['lesOptions']= $this->Model_PopUp->GetPopUp(); //récupère les services pour le popup
        $this->load->model("Model_idDemande");
        $data['idDemande']=$this->Model_idDemande->GetDemandes();
        $this->load->view("View_PopUpDemande", $data); //ouvre le popup
    }

    public function BoutonOffre(){
        $this->load->library("session");
        $this->load->model("Model_PopUp");
        $data['lesOptions']= $this->Model_PopUp->GetPopUp(); //récupère les services pour le popup
        $this->load->model("Model_idOffre");
        $data['idOffre']=$this->Model_idOffre->GetOffres();
        $this->load->view("View_PopUpOffre", $data); //ouvre le popup
    }

    public function BoutonConnexion(){
        $this->load->library("session");
        $this->load->view("View_PopUpConnexion"); //ouvre le popup de connexion
    }

    public function Connexion(){
        $this->load->library("session");
        $this->load->model("Model_Connexion");
        $this->Model_Connexion->Connexion(); //fait la connexion
        redirect(base_url()); //redirection vers index
    }

    public function Deconnexion(){
        $this->load->library("session");
        $this->load->model("Model_Deconnexion");
        $this->Model_Deconnexion->Deconnexion(); //permet la deconnexion
        redirect(base_url()); //redirection vers index
    }

    public function profil(){
        $this->load->library("session");
        $this->load->model("Model_PDemande");
        $data['lesDemandes']=$this->Model_PDemande->GetAllInfosDemande(); //récupère les demandes de l'utilisateurs
        $this->load->model("Model_POffres");
        $data['lesOffres']=$this->Model_POffres->GetAllInfosOffre(); //récupère les offres de l'utilisateurs
        $this->load->view("view_Profil", $data); //envoie sur la page de profil
    }

    public function retouracceuil(){
        $this->load->library("session");
        redirect(base_url()); //redirection vers index
    }

    public function AjoutDemande(){
        $this->load->library("session");
        $this->load->model("Model_AjoutDemande"); //ajoute une demande dans la base de donnée avec les données du popup
        $data['lesAjouts']=$this->Model_AjoutDemande->AjoutDemande();
    }

    public function AjoutOffre(){
        $this->load->library("session");
        $this->load->model("Model_AjoutOffre");//ajoute une offre dans la base de donnée avec les données du popup
        $data['lesAjouts']=$this->Model_AjoutOffre->AjoutOffre();
    }

    public function PopUpDModification(){
        $this->load->library("session");
        $this->load->model("Model_PopUp");
        $data['lesOptions']= $this->Model_PopUp->GetPopUp();//récupère les services pour le popup
        $this->load->model("Model_idDemande");
        $data['idDemande']=$this->Model_idDemande->GetDemandes();//récupère l'id nécéssaire pour la demande
        $this->load->view("View_PopUpDModif", $data);
    }

    public function PopUpOModification() {
        $this->load->library("session");
        $this->load->model("Model_PopUp");
        $data['lesOptions']= $this->Model_PopUp->GetPopUp();//récupère les services pour le popup
        $this->load->model("Model_idOffre");
        $data['idOffre']=$this->Model_idOffre->GetOffres();//récupère l'id nécéssaire pour l'offre
        $this->load->view("View_PopUpOModif", $data);
    }

    public function ModifDemande(){
        $this->load->library("session");
        $this->load->model("Model_ModifDemande");
        $data['lesModifs']=$this->Model_ModifDemande->ModifierDemande();//modifie la demande de l'utilisateur
    }

    public function ModifOffre(){
        $this->load->library("session");
        $this->load->model("Model_ModifOffre");
        $data['lesModifs']=$this->Model_ModifOffre->ModifierOffre();//modifie l'offre de l'utilisateur
    }

    public function GetAllDeals(){
        $this->load->library("session");
        $this->load->model("Model_Deal");//affiche les deals de l'utilisateur connecté
        $data['lesDealsCrea']=$this->Model_Deal->GetAllDealsCreateur(); // récupère les deals en cours pour la page de profil
        $data['lesDeals']=$this->Model_Deal->GetAllDeals(); // récupère les deals en cours pour la page de profil
        $this->load->view("View_Deals", $data); //page de profil
    }

    public function CreateDeal(){ //envoie sur la page de recherche pour créer un deal
        $this->load->library("session");
        $this->load->model("Model_Service");
        $data['lesServices']=$this->Model_Service->GetAllServices();
        $this->load->view("View_Create_Deal", $data);
    }

    public function RechercheOffre(){ //affiche les offres selon la recherche
        $idService=$_GET['idService'];
        $this->load->library("session");
        $this->load->model("Model_Recherche");
        $data['lesRecherchesOffres'] = $this->Model_Recherche->GetAllOffresbyidService($idService);
        $this->load->view('View_Offre_Recherche', $data);
    }

    public function RechercheDemande(){ //affiche les demandes selon la recherche
        $idService=$_GET['idService'];
        $this->load->library("session");
        $this->load->model("Model_Recherche");
        $data['lesRecherchesDemandes'] = $this->Model_Recherche->GetAllDemandesbyidService($idService);
        $this->load->view('View_Demande_Recherche', $data);
    }

    public function PopUpDealOffre(){
        $this->load->library("session");
        $this->load->model("Model_DealOffre");//récupère les infos des offres et demandes des deux utilisateurs
        $data['offreVoulu'] = $this->Model_DealOffre->GetOffreVoulu();
        $data['maDemande'] = $this->Model_DealOffre->GetMaDemande();
        $data['listeMesOffres'] = $this->Model_DealOffre->GetListeMesOffres();
        $data['listeSesDemandes'] = $this->Model_DealOffre->GetListeSesDemandes();
        $this->load->view('View_PopUpDealOffre', $data);
    }

    public function PopUpDealDemande(){
        $this->load->library("session");
        $this->load->model("Model_DealDemande");//récupère les infos des et demandes des deux utilisateurs
        $data['demandeVoulu'] = $this->Model_DealDemande->GetDemandeVoulu();
        $data['monOffre'] = $this->Model_DealDemande->GetMonOffre();
        $data['listeMesDemandes'] = $this->Model_DealDemande->GetListeMesDemandes();
        $data['listeSesOffres'] = $this->Model_DealDemande->GetListeSesOffres();
        $this->load->view('View_PopUpDealDemande', $data);
    }

    public function creationDeal(){//avec les infos récupérés envoie le tout sur la base de données
        $this->load->library("session");
        $this->load->model("Model_CreationDeal");
        $this->Model_CreationDeal->NewDeal();//créer le nouveau dans la base de données
    }

    public function NoteDeal(){//envoie la note sur la base données
        $this->load->library("session");
        $this->load->model("Model_NoteDeal");
        $this->Model_NoteDeal->NoteDeal();
    }
}?>
