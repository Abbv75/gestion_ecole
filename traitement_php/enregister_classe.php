<?php
require("classe_include.php");
if (isset($_POST['enregistrer_classe'])) {
    echo('okok');
    try {
        $query = $bdd->prepare('SELECT * FROM tb_frais WHERE classe=?');
        $query->execute(array($_POST['classe_frais']));
        if ($reponse = $query->fetch()) {
            echo ('cette classe existe');
        } else {
            $query = $bdd->prepare('INSERT INTO tb_frais(classe,montant) VALUES (?,?);');
            $query->execute(array($_POST['classe_frais'], $_POST['montant_frais']));
            header('Location: ../php/frais_scolaires.php');
        }
    } catch (Exception $e) {
    }
}
