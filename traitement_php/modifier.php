<?php
    
    if(isset($_POST['modifier'])){
        try{
            $query=$bdd->prepare('SELECT * FROM tb_eleve WHERE matricule=?');
            $query->execute(array($_POST['matricule']));
            if($reponse=$query->fetch()){
                if(isset($_POST['nom'])){
                    $nom=$_POST['nom'];
                }
                else{
                    $nom=$reponse['nom'];
                }
                if(isset($_POST['prenom'])){
                    $prenom=$_POST['prenom'];
                }
                else{
                    $prenom=$reponse['prenom'];
                }
                if(isset($_POST['sexe'])){
                    $sexe=$_POST['sexe'];
                }
                else{
                    $sexe=$reponse['sexe'];
                }if(isset($_POST['date_de_naissance'])){
                    $date_de_naissance=$_POST['date_de_naissance'];
                }
                else{
                    $date_de_naissance=$reponse['dateNaissance'];
                }if(isset($_POST['classe'])){
                    $classe=$_POST['classe'];
                }
                else{
                    $classe=$reponse['classe'];
                }if(isset($_POST['quartier'])){
                    $quartier=$_POST['quartier'];
                }
                else{
                    $quartier=$reponse['quartier'];
                }if(isset($_POST['contact_du_tuteur'])){
                    $contact_du_tuteur=$_POST['contact_du_tuteur'];
                }
                else{
                    $contact_du_tuteur=$reponse['contacTuteur'];
                }if(isset($_POST['situation_classe'])){
                    $situation_classe=$_POST['situation_classe'];
                }
                else{
                    $situation_classe=$reponse['situation_classe'];
                }if(isset($_POST['situation_ecole'])){
                    $situation_ecole=$_POST['situation_ecole'];
                }
                else{
                    $situation_ecole=$reponse['situation_ecole'];
                }
                $query=$bdd->prepare('UPDATE tb_eleve SET prenom=?, nom=?, sexe=?, dateNaissance=?, classe=?, quartier=?, contacTuteur=?, situation_classe=?, situation_ecole=? WHERE matricule=? ');
                $query->execute(array($prenom,$nom,$sexe,$date_de_naissance,$classe,$quartier,$contact_du_tuteur,$situation_classe,$situation_ecole,$_POST['matricule']));
                header('Location: ../php/inscription.php?etat=6');
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