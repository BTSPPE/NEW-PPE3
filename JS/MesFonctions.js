function Ajoutinscription()
{
    $.ajax
    (
        {
            type:"get",
            url:"index.php/Index_Inscription/Ajoutinscription",
            data:"nomUser="+$('#txtNom').val()+"&login="+$('#txtLogin').val()+"&mdp="+$('#txtMdp').val(),
            success:function()
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