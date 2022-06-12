<?php
    if(isset($_POST['liste_classe_button'])){
        header('Location: ../php/inscription.php?liste_classe='.$_POST['liste_classe']);
    }
?>