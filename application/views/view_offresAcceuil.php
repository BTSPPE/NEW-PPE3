<?php 
                foreach ($lesOffres as $uneOffre)
                {
?>
    <div class="boite">
<?php   
                      echo $uneOffre->nomService .'<br>'. $uneOffre->descriptionOffre.'<br>'. $uneOffre->dateOffre. "</div><br>";
                }
?>
