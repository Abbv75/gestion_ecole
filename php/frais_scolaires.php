<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="css/style1.css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/frais_scolaires.css">

</head>

<body>
    <?php
    require('../traitement_php/classe_include.php');
    ?>
    <button class="retour"><a href="../php/inscription.php">Retour</a></button>
    <form action="../traitement_php/traitement.php" method="POST">
        <h2>Formulaire de mise à jour des frais de scolarité</h2>
        <div class="contenue">
            <div class="inputfield">
                <label for="">
                    <strong>Classe:</strong>
                </label>
                <input type="text" name="classe_frais" placeholder="entrez une classe" id="">
            </div>
            <div class="inputfield">
                <label for="">
                    <strong> Montant payé (cfa):</strong>
                </label>
                <input type="number" name="montant_frais">
            </div>
            <div class="inputbtn">
                <input type="submit" value="Enregister" name="enregistrer_classe">
                <input type="submit" value="Modifier" name="modifier_classe">
            </div>
        </div>

    </form>
    <?php
        $query_liste_classe = $bdd->query('SELECT * FROM tb_frais');
        if ($ans = $query_liste_classe->fetch()) {
    ?>
            <div class="table_zone">
                <table>
                    <tr>
                        <th>classe</th>
                        <th>Montant annuelle</th>
                    </tr>
                    <?php
                        do {
                    ?>
                            <tr>
                                <td><?php echo ($ans['classe']) ?></td>
                                <td><?php echo ($ans['montant']) ?></td>

                            </tr>
                    <?php
                        } while ($ans = $query_liste_classe->fetch());
                    ?>
                </table>
            </div>
    <?php
        }
    ?>

    <br><br><br>
    <form method="get">
        <h2>Recherche de l'historique  des paiements d'un eleve </h2>
        <div class="contenue">
            <div class="inputfield">
                <label for="">
                    <strong>Matricule:</strong>
                </label>
                <input type="text" name="matricule" placeholder="Recherchez l'eleve" id="" required>
            </div>
            <div class="inputbtn">
                <input type="submit" value="Rechercher" name="search">
            </div>
        </div>
    </form>
    <?php
        if(isset($_GET['search']) && isset($_GET['search'])){
            $query_liste_classe = $bdd->prepare('SELECT * FROM `tb_eleve`, `tbhistoriquepaie` WHERE `tbhistoriquepaie`.`matricule`=? AND `tb_eleve`.`matricule`=?');
            $query_liste_classe->execute(array($_GET['matricule'],$_GET['matricule']));
            if ($ans = $query_liste_classe->fetch()) {
    ?>
                <div class="table_zone">
                    <table>
                        <tr>
                            <th>matricule</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>classe</th>
                        </tr>
                        <?php
                            do {
                        ?>
                                <tr>
                                    <td><?php echo ($ans['matricule']) ?></td>
                                    <td><?php echo ($ans['datePaie']) ?></td>
                                    <td><?php echo ($ans['montant']) ?></td>
                                    <td><?php echo ($ans['nom']) ?></td>
                                    <td><?php echo ($ans['prenom']) ?></td>
                                    <td><?php echo ($ans['classe']) ?></td>
                                </tr>
                        <?php
                            } while ($ans = $query_liste_classe->fetch());
                        ?>
                    </table>
                </div>
    <?php
            }
        }
    ?>

    
    <br><br><br>
    <h1 style="color:white; text-align:center;">Historique des paiements effectues</h1>
    <?php
        $query_liste_classe = $bdd->query('SELECT * FROM `tb_eleve`, `tbhistoriquepaie` WHERE `tbhistoriquepaie`.`matricule`=`tb_eleve`.`matricule`');
        if ($ans = $query_liste_classe->fetch()) {
    ?>
            <div class="table_zone">
                <table>
                    <tr>
                        <th>matricule</th>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>classe</th>
                    </tr>
                    <?php
                        do {
                    ?>
                            <tr>
                                <td><?php echo ($ans['matricule']) ?></td>
                                <td><?php echo ($ans['datePaie']) ?></td>
                                <td><?php echo ($ans['montant']) ?></td>
                                <td><?php echo ($ans['nom']) ?></td>
                                <td><?php echo ($ans['prenom']) ?></td>
                                <td><?php echo ($ans['classe']) ?></td>
                            </tr>
                    <?php
                        } while ($ans = $query_liste_classe->fetch());
                    ?>
                </table>
            </div>
    <?php
        }
    ?>

</body>

</html>