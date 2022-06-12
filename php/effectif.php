<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/effectif.css">
    <title>Document</title>
</head>

<body>
    <?php
    require('../traitement_php/classe_include.php');
    $query = $bdd->query('SELECT * from tb_eleve');
    $n = 0;
    while ($query->fetch()) {
        $n++;
    }
    $male = $bdd->query('SELECT * from tb_eleve WHERE sexe="male"');
    $m = 0;
    while ($male->fetch()) {
        $m++;
    }
    $femelle = $bdd->query('SELECT * FROM tb_eleve WHERE sexe = "female"');
    $f = 0;
    while ($femelle->fetch()) {
        $f++;
    }
    $ancien = $bdd->query('SELECT * FROM tb_eleve WHERE situation_ecole="ancien"');
    $a = 0;
    while ($ancien->fetch()) {
        $a++;
    }
    $nouveau = $bdd->query('SELECT * FROM tb_eleve WHERE situation_ecole = "nouveau"');
    $new = 0;
    while ($nouveau->fetch()) {
        $new++;
    }
    ?>
    <div class="container">

        <h2>Effectif Des Eleves de l'etablissement scolaire</h2>
        <div class="renseignement">
            <span>nombre total des eleve :</span> <span><?php echo ($n) ?></span><br><br>
            <span>nombre total des garcons :</span> <span><?php echo ($m) ?></span><br><br>
            <span>nombre total des filles :</span> <span><?php echo ($f) ?></span><br><br>
            <span>nombre total des anciens eleves :</span> <span><?php echo ($a) ?></span><br><br>
            <span>nombre total des nouveaux eleves :</span> <span><?php echo ($new) ?></span><br><br>
        </div>

    </div>
</body>

</html>