<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/inscription.css">
  <script src="../js/jquery-3.6.0.min.js"></script>
  <title>Document</title>

</head>

<form action="../traitement_php/traitement.php" method="post">

  <body>

    <?php
    require('../traitement_php/classe_include.php');
    ?>
    <div class="search-box">
      <input class="search-txt" type="text" placeholder="entrer le Matricule">
      <a href="#" class="search-btn">
        <i class="fas fa-search"></i>
      </a>
    </div>
    <div class="liens">
      <a href="../php/frais_scolaires.php" class="frais">Frais Scolaire</a><br><br>
      <a href="../php/effectif.php" class="categorie">Effectif par categorie</a>
    </div>

    <div class="wrapper">
      <div class="title">
        Formulaire d'inscription
      </div>
      <?php
      if (isset($_GET['search'])) {
        $query1 = $bdd->prepare('SELECT * FROM tb_eleve WHERE matricule=?');
        $query1->execute(array($_GET['search']));
        if ($search = $query1->fetch()) {
          require('../traitement_php/search_file.php');
          $ok = 1;
        } else {
          // pour dire que l'eleve n'existe pas
          header('Location: inscription.php?etat=4');
        }
      } else {
        $ok = 0;
      ?>
        <div class="form">
          <div class="inputfield">
            <label>Matricule</label>
            <input type="text" name="matricule" class="input">
          </div>
          <div class="inputfield">
            <label>Nom</label>
            <input type="text" name="nom" class="input">
          </div>
          <div class="inputfield">
            <label>Prenom</label>
            <input type="text" name="prenom" class="input">
          </div>
          <div class="inputfield">
            <label>Sexe</label>
            <div class="custom_select">
              <select name="sexe">
                <option value="male">homme</option>
                <option value="female">Femme</option>
              </select>
            </div>
          </div>
          <div class="inputfield">
            <label>Date de naissance</label>
            <input type="date" name="date_de_naissance" class="input">
          </div>

          <div class="inputfield">
            <label>Classe</label>
            <div class="custom_select">
              <select name="classe">
                <?php
                while ($answer = $query->fetch()) {
                ?>
                  <option value="<?php echo ($answer['classe']) ?>"><?php echo ($answer['classe']) ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="inputfield">
            <label>Quartier</label>
            <input type="text" name="quartier" class="input">
          </div>
          <div class="inputfield">
            <label>Contact du tuteur</label>
            <input type="text" name="contact_du_tuteur" class="input">
          </div>
          <div class="inputfield">
            <label>Situation en classe</label>
            <div class="custom_select">
              <select name="situation_classe">
                <option value="nouveau">nouveau</option>
                <option value="redoublant">redoublant</option>
              </select>
            </div>
          </div>
          <div class="inputfield">
            <label>Situation a l'ecole</label>
            <div class="custom_select">
              <select name="situation_ecole">
                <option value="ancien">ancien</option>
                <option value="nouveau">nouveau</option>
              </select>
            </div>
          </div>
        <?php
      }
        ?>
        <div class="montant">
          <div class="inputfield">
            <label>Montant</label>
            <input type="number" name="montant" step="500" class="input">
          </div>
          <div class="inputfield">
            <input type="submit" name="ajouter" value="Ajouter" class="btn">
          </div>
        </div>
        <?php
          if(isset($_GET['search'])){
        ?>
            <div class="montants">
              <div>
                <h5>Montant payé:</h5>
                <h3><?php echo($search['montantPaye']); ?></h3>
              </div>
              <div>
                <h5>Montant a payé:</h5>
                <?php
                  $classe=$bdd->prepare('SELECT * FROM tb_frais WHERE classe=?');
                  $classe->execute(array($search['classe']));
                  $classe=$classe->fetch();
                  $reste_a_paye=$classe['montant']-$search['montantPaye'];
                ?>
                <h3><?php echo($reste_a_paye); ?></h3>
              </div><div>
                <h5>Montant total:</h5>
                <h3><?php echo($classe['montant']); ?></h3>
              </div>
            </div>
        <?php
          }
        ?>
        
        </div>
    </div>
    <div class="buttons">
      <button type="submit" <?php if ($ok == 1) {
                              echo ("disabled");
                            } ?> name="enregistrer">Enregistrer</button>
      <button type="submit" <?php if ($ok == 1) {
                              echo ("disabled");
                            } ?> name="modifier">Modifier</button>
      <button type="submit" name="supprime">Supprimer</button>
    </div>
    <div class="effectif">
      <div class="inputfield">
        <input type="submit" name="liste_classe_button" value="liste des eleves d'une classe" class="btn">
      </div>
      <div class="inputfield">
        <div class="custom_select">
          <select name="liste_classe">
            <?php
            require('../traitement_php/classe_include.php');
            while ($answer = $query->fetch()) {
            ?>
              <option value="<?php echo ($answer['classe']) ?>"><?php echo ($answer['classe']) ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>

    </div>
    <script src="../js/inscription.js"></script>
    <?php
    if (isset($_GET['etat'])) {
      if ($_GET['etat'] == 1) {
    ?>
        <h1>Eleve enregistrer avec succes</h1>
      <?php
      }
      if ($_GET['etat'] == 2) {
      ?>
        <h1>Cet eleve existe deja</h1>
      <?php
      }
      if ($_GET['etat'] == 3) {
      ?>
        <h1>Montant Payer</h1>
      <?php
      }
      if ($_GET['etat'] == 4) {
      ?>
        <h1>Cet eleve n'axiste pas</h1>
      <?php
      }
      if ($_GET['etat'] == 5) {
      ?>
        <h1>Supprimer</h1>
      <?php
      }
      if ($_GET['etat'] == 6) {
      ?>
        <h1>Modifier</h1>
      <?php
      }
      if ($_GET['etat'] == 7) {
      ?>
        <h1>Une erreur est survenue</h1>
    <?php
      }
    }
    ?>
    <?php
    if (isset($_GET['liste_classe'])) {
      $query_liste_classe = $bdd->prepare('SELECT * FROM tb_eleve WHERE classe=?;');
      $query_liste_classe->execute(array($_GET['liste_classe']));
      if ($ans = $query_liste_classe->fetch()) {
    ?>
        <h1 align="center">Liste de la <?php echo ($_GET['liste_classe']) ?> annee</h1>
        <div class="table_zone">
          <table>
            <tr>
              <th>Matricule</th>
              <th>Nom</th>
              <th>Prenom</th>
            </tr>
            <?php
            do {
            ?>

              <tr>
                <td><?php echo ($ans['matricule']) ?></td>
                <td><?php echo ($ans['nom']) ?></td>
                <td><?php echo ($ans['prenom']) ?></td>
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

  </body>
</form>

</html>