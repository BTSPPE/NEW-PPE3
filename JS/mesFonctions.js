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
            alert("Succès de l'ajout de votre demande");
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
                alert("Succès de l'ajout de votre offre");
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
            if(objs.nodeName === "P")
                objs = objs.parentNode;
            var ObjetFiltrer = new Array();
            // var ObjetFiltrer = []; fait la même chose
            objs.childNodes.forEach(function(voulu){
                if (voulu.nodeName === "P")
                    ObjetFiltrer.push(voulu.innerHTML);
            })
            $("#descriptiondemande").val(ObjetFiltrer[1]);
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
                if (voulu.nodeName === "P")
                    ObjetFiltrer.push(voulu.innerHTML);
            })
            $("#descriptionoffre").val(ObjetFiltrer[1]);
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
            alert("Succès de la modification");
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
            alert("Succès de la modification");
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