function GetAllOffres() // permet de récupérer les offres et de les afficher sur la page d'acceuil)
{

$.ajax
(
    {
        type:"get",
        url:"index.php/indexAcceuilArthur/GetAllOffres",
        success:function(data)
        {
            $("#offres").empty();
            $("#offres").append(data);
        },
        error:function()
        {
            alert("Ereur d'affichage sur les offres");
        }
    }
);
}

function boutondemande() //permet de récupérer le popup et de le faire afficher
{
    $.ajax
(
    {
        type:"get",
        url:"index.php/indexAcceuilArthur/BoutonDemande",
        success:function(data)
        {
            $("#ajoutdemande").empty();
            $("#ajoutdemande").append(data);
            $("#popupdemande").modal();
        },
        error:function()
        {
            alert("Erreur d'affichage sur le popup d'ajout de demande");
        }
    }
);

}

function boutonoffre() //permet de récupérer le popup et de le faire afficher
{
    $.ajax
(
    {
        type:"get",
        url:"index.php/indexAcceuilArthur/BoutonOffre",
        success:function(data)
        {
            $("#ajoutoffre").empty();
            $("#ajoutoffre").append(data);
            $("#popupoffre").modal();
        },
        error:function()
        {
            alert("Erreur d'affichage sur le popup d'ajout d'offre");
        }
    }
);

}

function boutonconnexion() //permet de récupérer le popup et de le faire afficher
{
    $.ajax
(
    {
        type:"get",
        url:"index.php/indexAcceuilArthur/BoutonConnexion",
        success:function(data)
        {
            $("#popconnexion").empty();
            $("#popconnexion").append(data);
            $("#popupconnexion").modal();
        },
        error:function()
        {
            alert("Erreur d'affichage sur le popup de connexion");
        }
    }
);
}

function ajoutDemande(event) //ajoute une demande dans la base de donnée avec les données du popup
{
    var typeDemande = $("#selectdemande")[0].value;
    var descDemande = $("#descriptiondemande")[0].value;
    $.ajax({
        type: "post",
        url: "index.php/indexAcceuilArthur/AjoutDemande",
        data: {
            idService: typeDemande,
            descDemande: descDemande
        },
        success:function(alertdemande){
            location.reload();
        },
        error:function(){
            alert("erreur sur l'ajout de demande");
        }
    })
}

function ajoutoffre(event) //ajoute une offre dans la base de donnée avec les données du popup
{
    var typeOffre = $("#selectoffre")[0].value;
    var descOffre = $("#descriptionoffre")[0].value;
    $.ajax({
        type: "post",
        url: "index.php/indexAcceuilArthur/AjoutOffre",
        data: {
            idService: typeOffre,
                descOffre: descOffre
        },
        success:function(alertoffre){
            location.reload();
        },
        error:function(){
            alert("Erreur sur l'ajout d'offre");
        }
    })
}

function popupmodificationdemande(event) //ouvre le popup de modification avec les infos de la demande sélectionnée
{
    $.ajax
(
    {
        type:"get",
        url:"PopUpDModification",
        success:function(data)
        {
            $("#popDmodification").empty();
            $("#popDmodification").append(data);
            $("#titremodifdemande").modal();
            var objs = event.target; //demande selectionnée
            if(objs.nodeName === "P")//si clique sur un élément de la boite ça renvoie à la boite, parent de cet élément
                objs = objs.parentNode;
            var ObjetFiltrer = new Array();
            // var ObjetFiltrer = []; fait la même chose
            objs.childNodes.forEach(function(voulu){
                if (voulu.nodeName === "P")//filtrage des P qui contiennent les informations
                    ObjetFiltrer.push(voulu.innerHTML);
            })
            $("#descriptiondemande").val(ObjetFiltrer[1]);//remplissage du popup par les infos filtré
            var index = -1;
            $("option").filter(function(i, element) {
                if (element.innerHTML.trim() === ObjetFiltrer[0]) {
                    index = i;
                    return true;
                }
                return false;
            });
            $("#selectdemande")[0].selectedIndex = index;
            idcliquerD=ObjetFiltrer[3];
        },
        error:function()
        {
            alert("Erreur d'affichage sur le popup de modification de demande");
        }
    }
);
}

function popupmodificationoffre(event)//ouvre le popup de modification avec les infos de l'offre sélectionnée
{
    $.ajax
(
    {
        type:"get",
        url: "PopUpOModification",
        success:function(data)
        {
            $("#popOmodification").empty();
            $("#popOmodification").append(data);
            $("#popupoffre").modal();
            var objs = event.target; //offre selectionnée
            if(objs.nodeName === "P")//si le nom de l'objet ciblé (dans son nodeName) est P alors on créé le tableau objetfiltrer
                objs = objs.parentNode;
            var ObjetFiltrer = new Array();
            // var ObjetFiltrer = []; fait la même chose
            objs.childNodes.forEach(function(voulu){
                if (voulu.nodeName === "P")//filtrage des P qui contiennent les informations
                    ObjetFiltrer.push(voulu.innerHTML);
            })
            $("#descriptionoffre").val(ObjetFiltrer[1]);//remplissage du popup par les infos filtré
            var index = -1;
            $("option").filter(function(i, element) {
                if (element.innerHTML.trim() === ObjetFiltrer[0]) {
                    index = i;
                    return true;
                }
                return false;
            });
            $("#selectoffre")[0].selectedIndex = index;
            idcliquerO=ObjetFiltrer[3];
        },
        error:function()
        {
            alert("Erreur d'affichage sur le popup de modification d'offre");
        }
    }
);
}

var idcliquerO;
var idcliquerD;

function modifdemande(event) //change la demande 
{
    var typeDemande = $("#selectdemande")[0].value;
    var descDemande = $("#descriptiondemande")[0].value;
    $.ajax({
        type: "post",
        url: "ModifDemande",
        data: {
            idService: typeDemande,
            descDemande: descDemande,
            idDemande: idcliquerD
        },
        success:function(alertdemande){
            location.reload();
        },
        error:function(){
            alert("Erreur sur la modification de la demande");
        }
    })
}

function modifoffre(event) //change l'offre
{
    var typeOffre = $("#selectoffre")[0].value;
    var descOffre = $("#descriptionoffre")[0].value;
    $.ajax({
        type: "post",
        url: "ModifOffre",
        data: {
            idService: typeOffre,
            descOffre: descOffre,
            idOffre: idcliquerO
        },
        success:function(alertoffre){
            location.reload();
        },
        error:function(){
            alert("Erreur sur la modification de l'offre");
        }
    })
}

function Ajoutinscription() //inscript l'utilisateur dans la base de donnée.
{
    $.ajax
    (
        {
            type:"get",
            url:"Ajoutinscription",
            data:"nomUser="+$('#txtNom').val()+"&login="+$('#txtLogin').val()+"&mdp="+$('#txtMdp').val(), //fait passer toutes les valeurs pour inscrire l'utilisateur
            success:function(data)
            {
                alert("L'inscription a été prise en compte.");
                AjoutInscription();
            },
            error:function()
            {
                alert("L'un des champs n'as pas été rempli.");
            }
            
        }
    );
}

function GetAllDeals() // permet de récupérer les échanges de l'utilisateur
{

    $.ajax
    (
        {
            type:"get",
            url:"GetAllDeals",
            success:function(data)
            {
                $("#deal").empty();
                $("#deal").append(data);
            },
            error:function()
            {
                alert("Ereur d'affichage sur les deals");
            }
        }
    );
}

function Recherche(idService)
{
    $.ajax(
    {
        type:"get",
        url:"RechercheOffre",
        data:"idService="+idService,
        success:function(data)
        {
            $('#divoffre').empty();
            $('#divoffre').append(data);
            
        },
        error:function()
        {
            alert('Erreur SQL');
        }
    }
    );

    $.ajax({
        type:"get",
        url:"RechercheDemande",
        data:"idService="+idService,
        success:function(data)
        {
            $('#divdemande').empty();
            $('#divdemande').append(data);
            
        },
        error:function()
        {
            alert('Erreur SQL');
        }
    });
}
function popupDealOffre(event){//récupère l'id du créateur de l'offre sélectionnée pour l'envoyer dans le model afin d'afficher le popup contenant l'offre et les demandes du créateur
    var idCreateur = event.target.attributes.idCreateur.nodeValue;
    var idOffre = event.target.attributes.idOffre.nodeValue;
    var idService = event.target.attributes.idService.nodeValue;
    $.ajax(
        {
            type:"get",
            url:"PopUpDealOffre",
            data:{
                idUser: idCreateur,
                idOffre: idOffre,
                idService: idService
            },
            success:function(data)
            {
                $("#popdealoffre").empty();
                $("#popdealoffre").append(data);
                $("#popupdealoffre").modal(); 
            },
            error:function()
            {
                alert('erreur')
            }
        }
    );
}

function popupDealDemande(event){//récupère l'id du créateur de la demande sélectionnée pour l'envoyer dans le model afin d'afficher le popup contenant la demande et les offres du créateur
    var idCreateur = event.target.attributes.idCreateur.nodeValue;
    var idDemande = event.target.attributes.idDemande.nodeValue;
    var idService = event.target.attributes.idService.nodeValue;
    $.ajax(
        {
            type:"get",
            url:"PopUpDealDemande",
            data:{
                idUser: idCreateur,
                idDemande: idDemande,
                idService: idService
            },
            success:function(data)
            {
                $("#popdealdemande").empty();
                $("#popdealdemande").append(data);
                $("#popupdealdemande").modal();
            },
            error:function()
            {
                alert('erreur')
            }
        }
    );
}
var idOffre=-1;

function setidOffrepOffre(event){//garde en mémoire l'id de l'offre pour le deal
    idOffre = event.target.attributes.offreUser1.nodeValue;
    console.log(event.target.attributes.offreUser1.nodeValue);
}

function setidOffrepDemande(event){//garde en mémoire l'id de l'offre pour le deal
    idOffre = event.target.attributes.offreUser2.nodeValue;
    console.log(event.target.attributes.offreUser2.nodeValue);
}

function creationDealOffre(event){
    if(idOffre!=-1){//vérifie si l'offre et a bien été sélectionnées
        var boiteOffre=$("#offreVoulu")[0];
        var offreUser2 = boiteOffre.attributes.idoffre.nodeValue;
    
        $.ajax({
            type:"get",
            url:'creationDeal',
            data:{
                idOffre1: idOffre,
                idOffre2: offreUser2,
            },
            success:function(){
                alert("Votre deal à été pris en compte. Vous pouvez le voir sur votre page de profil");
            },
            error:function(){
                alert("Erreur sur la création du Deal")
            },
    
        });
    }
    else{
        alert("Veuillez sélectionner les offres et demandes concernés");
    }
}

function creationDealDemande(event){
    if(idOffre!=-1 ){//vérifie si l'offre a bien été sélectionnées
        var boiteOffre=$("#Monoffre")[0];
        var offreUser1 = Monoffre.attributes.offreUser1.nodeValue;
    
        $.ajax({
            type:"get",
            url:"creationDeal",
            data:{
                idOffre1: offreUser1,
                idOffre2: idOffre,
            },
            success:function(){
                alert("Votre deal à été pris en compte. Vous pouvez le voir sur votre page de profil");
            },
            error:function(){
                alert("Erreur sur la création du Deal")
            },
    
        });
    }
    else{
        alert("Veuillez sélectionner les offres et demandes concernés");
    }
}

function NoteDeal(event){
    var note = event.target.value;
    var idDeal = event.target.parentNode.parentNode.attributes.iddeal.nodeValue;
    var idCreateur = event.target.parentNode.parentNode.attributes.idCreateur.nodeValue;
    $.ajax({
        type:"post",
        url:"NoteDeal",
        data:{
            "note": note,
            "idDeal": idDeal,
            "idCreateur": idCreateur,
        },
    success:function(){
        alert("La note à été prise en compte");
        location.reload();
    },
    error:function(){
        alert("Erreur sur la note");
    },
    });
}