<?php
require('classe_include.php');
if (isset($_POST['modifier_classe'])) {
    try {
        $query = $bdd->prepare('SELECT * FROM tb_frais WHERE classe=?');
        $query->execute(array($_POST['classe_frais']));
        if ($reponse = $query->fetch()) {
            if (isset($_POST['montant_frais'])) {
                $montant = $_POST['montant_frais'];
            } else {
                $montant = $reponse['montant_frais'];
            }
            $query = $bdd->prepare('UPDATE tb_frais SET montant=? WHERE classe=?');
            $query->execute(array($montant, $_POST['classe_frais']));
            header('Location: ../php/frais_scolaires.php');
        }
    } catch (Exception $e) {
        echo ($e->getMessage());
    }
}
