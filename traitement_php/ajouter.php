<?php
    if(isset($_POST['ajouter'])){
        try{
            $query=$bdd->prepare('SELECT * FROM tb_eleve WHERE matricule=?');
            $query->execute(array($_POST['matricule']));
            if($reponse=$query->fetch()){
                $somme= floatval($reponse['montantPaye']) + floatval($_POST['montant']) ;
                $query=$bdd->prepare('UPDATE tb_eleve SET montantPaye=? WHERE matricule=?;');
                $query->execute(array($somme,$_POST['matricule']));
                $query=$bdd->prepare('INSERT INTO `tbhistoriquepaie` (`id`, `matricule`, `datePaie`, `montant`) VALUES (NULL, ?, current_timestamp(),?);');
                $query->execute(array($_POST['matricule'], $_POST['montant']));
                header('Location: ../php/inscription.php?etat=3&search='.$_POST['matricule']);
            }
            else{
                header('Location: ../php/inscription.php?etat=4');
            }
        }
        catch(Exception $e){
            header('Location: ../php/inscription.php?etat=7');            
        }
    }
?>