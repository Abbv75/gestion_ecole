<?php
if (isset($_POST['supprime'])) {
    try {
        $query = $bdd->prepare('SELECT * FROM tb_eleve WHERE matricule=?');
        $query->execute(array($_POST['matricule']));
        if ($reponse = $query->fetch()) {
            $query = $bdd->prepare('DELETE FROM tb_eleve WHERE matricule=?;');
            $query->execute(array($_POST['matricule']));
            header('Location: ../php/inscription.php?etat=5');
        } else {
            header('Location: ../php/inscription.php?etat=4');
        }
    } catch (Exception $e) {
        header('Location: ../php/inscription.php?etat=7');
    }
}
?>