<?php
    if(isset($_POST['enregistrer'])){
        try{
            $query=$bdd->prepare('SELECT * FROM tb_eleve WHERE matricule=?');
            $query->execute(array($_POST['matricule']));
            if($reponse=$query->fetch()){
                header('Location: ../php/inscription.php?etat=2');
            }
            else{
                if(isset($_POST['montant'])){
                    $montant=$_POST['montant'];
                }
                else{
                    $montant=0;
                }

                $query=$bdd->prepare('INSERT INTO tb_eleve(matricule, prenom, nom, sexe, dateNaissance, classe, quartier, contacTuteur, situation_classe, situation_ecole, montantPaye) VALUES (?,?,?,?,?,?,?,?,?,?,?);');
                $query->execute(array($_POST['matricule'], $_POST['prenom'], $_POST['nom'], $_POST['sexe'], $_POST['date_de_naissance'], $_POST['classe'], $_POST['quartier'], $_POST['contact_du_tuteur'], $_POST['situation_classe'], $_POST['situation_ecole'], $montant));
                header('Location: ../php/inscription.php?etat=1');
            }
        }
        catch(Exception $e){
            header('Location: ../php/inscription.php?etat=7');
        }
    }
?>