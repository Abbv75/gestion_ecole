<div class="form desibled">
              <div class="inputfield">
                <label>Matricule</label>
                <input type="text" name="matricule" value="<?php echo($search['matricule'])?>" class="input">
              </div>  
              <div class="inputfield">
                <label>Nom</label>
                <input type="text"  disabled name="nom" value="<?php echo($search['nom'])?>" class="input">
              </div>  
              <div class="inputfield">
                <label>Prenom</label>
                <input type="text" disabled name="prenom" value="<?php echo($search['prenom'])?>" class="input">
              </div>
              <div class="inputfield">
                <label>Sexe</label>
                <div class="custom_select">
                  <select name="sexe" disabled>
                    <?php
                      if($search['sexe']=='male'){
                    ?>
                        <option value="male" selected>homme</option>
                        <option value="female">Femme</option>
                    <?php
                      }
                      elseif($search['sexe']=='female'){
                    ?>
                        <option value="male">homme</option>
                        <option value="female" selected>Femme</option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div> 
              <div class="inputfield">
                <label>Date de naissance</label>
                <input type="date" disabled name="date_de_naissance" value="<?php echo($search['dateNaissance'])?>" class="input">
              </div> 
           
              <div class="inputfield">
                <label>Classe</label>
                <div class="custom_select">
                  <select name="classe" disabled>
                    <option value="<?php echo($search['classe'])?>"><?php echo($search['classe'])?></option>
                  </select>
                </div>
              </div>
              <div class="inputfield">
                <label>Quartier</label>
                <input type="text" disabled name="quartier" value="<?php echo($search['quartier'])?>" class="input">
              </div> 
              <div class="inputfield">
                <label>Contact du tuteur</label>
                <input type="text" disabled name="contact_du_tuteur" value="<?php echo($search['contacTuteur'])?>" class="input">
              </div> 
              <div class="inputfield">
                <label>Situation en classe</label>
                <div class="custom_select">
                  <select name="situation_classe" disabled>
                    <?php
                      if($search['situation_classe']=='nouveau'){
                    ?>
                        <option value="nouveau" selected>nouveau</option>
                        <option value="redoublant">redoublant</option>
                    <?php
                      }
                      elseif($search['situation_classe']=='redoublant'){
                    ?>
                        <option value="nouveau">nouveau</option>
                        <option value="redoublant" selected>redoublant</option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div> 
              <div class="inputfield">
                <label>Situation a l'ecole</label>
                <div class="custom_select">
                  <select name="situation_ecole" disabled>
                    <?php
                      if($search['situation_ecole']=='nouveau'){
                    ?>
                        <option value="nouveau" selected>nouveau</option>
                        <option value="ancien">ancien</option>
                    <?php
                      }
                      elseif($search['situation_ecole']=='redoublant'){
                    ?>
                        <option value="nouveau">nouveau</option>
                        <option value="ancien" selected>ancien</option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div> 