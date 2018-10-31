function GetAllOffres()
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

function boutondemande()
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

function boutonoffre()
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

function boutonconnexion()
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

function ajoutDemande(event) {
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

    function ajoutoffre(event) {
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

function popupmodificationdemande(event)
{
    $.ajax
(
    {
        type:"get",
        url:"/ingetis/PPE3-1/index.php/indexAcceuilArthur/PopUpDModification",
        success:function(data)
        {
            $("#popDmodification").empty();
            $("#popDmodification").append(data);
            $("#titremodifdemande").modal();
            var objs = event.target;
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

function popupmodificationoffre(event)
{
    $.ajax
(
    {
        type:"get",
        url: "/ingetis/PPE3-1/index.php/indexAcceuilArthur/PopUpOModification",
        success:function(data)
        {
            $("#popOmodification").empty();
            $("#popOmodification").append(data);
            $("#popupoffre").modal();
            var objs = event.target;
            if(objs.nodeName === "P")
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

function modifdemande(event) {
    var typeDemande = $("#selectdemande")[0].value;
    var descDemande = $("#descriptiondemande")[0].value;
    $.ajax({
        type: "post",
        url: "/ingetis/PPE3-1/index.php/indexAcceuilArthur/ModifDemande",
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

function modifoffre(event) {
    var typeOffre = $("#selectoffre")[0].value;
    var descOffre = $("#descriptionoffre")[0].value;
    $.ajax({
        type: "post",
        url: "/ingetis/PPE3-1/index.php/indexAcceuilArthur/ModifOffre",
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

function Ajoutinscription()
{
    $.ajax
    (
        {
            type:"get",
            url:"index.php/Index_Inscription/Ajoutinscription",
            data:"nomUser="+$('#txtNom').val()+"&login="+$('#txtLogin').val()+"&mdp="+$('#txtMdp').val(),
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