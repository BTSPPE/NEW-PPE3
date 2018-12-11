<?php 
    $i=0;
    foreach($lesDeals as $unDeal)
    {
        $maNote = $unDeal->idCreateur == $this->session->idUser ? $unDeal->noteUser1 : $unDeal->noteUser2;
        $saNote = $unDeal->idCreateur != $this->session->idUser ? $unDeal->noteUser1 : $unDeal->noteUser2;
        if ($maNote!=0 && $saNote!=0){
            echo "<div class='boiteDealsValide' idCreateur=".$unDeal->idCreateur." idDeal=".$unDeal->idDeal."><p><img src=".$unDeal->photoUser."><br>".$unDeal->nomUser."<br>".$unDeal->nomService."<br>vs<br>".$lesDealsCrea[$i]->nomService."<br>Votre note<br>".$maNote."<br>-<br>Sa note<br>".$saNote."<br>".$unDeal->dateDeal."</div>";
        }
        else{    
            echo "<div class='boiteDeals' idCreateur=".$unDeal->idCreateur." idDeal=".$unDeal->idDeal."><p><img src=".$unDeal->photoUser."><br>".$unDeal->nomUser."<br>".$unDeal->nomService."<br>vs<br>".$lesDealsCrea[$i]->nomService."<br>";
            if ($maNote !=0){
                echo "Votre note<br>".$maNote."<br>-<br>Sa note<br>".$saNote."<br>".$unDeal->dateDeal."</div>";
            }
            else{
                echo "Votre note<br><select onchange='NoteDeal(event)'>";
                for($j=0;$j<11;$j++){echo("<option value=".$j.">".$j."</option>");}
                echo "</select><br>-<br>Sa note<br>".$saNote."<br>".$unDeal->dateDeal."</div>";
            }
        }
        $i++;
    }
?>
<script>
</script>