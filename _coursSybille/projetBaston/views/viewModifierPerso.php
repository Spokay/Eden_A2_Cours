<form action="" method="post">
    <input type="hidden" name="modifierConfirm" value="1">
    <label for="persoNom">Nom du personnage</label>
    <input type="text" name="persoNom" id="persoNom" value="<?php echo $perso->getPersoNom(); ?>">
    <label for="persoArmes">Armes du personnage</label>
    <select name="persoArmes[]" id="persoArmes" multiple="multiple">
        <?php
            foreach ($armes as $arme){
                $idArmes = array();
                foreach($perso->getArmes() as $armesPerso){
                    $idArmes[] = $armesPerso->getArmeId();
                }
                if (in_array($arme->getArmeId(), $idArmes)){
                    echo "<option value='".$arme->getArmeId()."' selected>".$arme->getArmeNom()."</option>";
                }else{
                    echo "<option value='".$arme->getArmeId()."'>".$arme->getArmeNom()."</option>";
                }
            }
        ?>
    </select>
    <label for="persoEquipe">Equipe du personnage</label>
    <select name="persoEquipe" id="persoEquipe">
        <?php
            foreach ($equipes as $equipe){
                if ($equipe->getEquipeId() == $perso->getEquipe()->getEquipeId()){
                    echo "<option value='".$equipe->getEquipeId()."' selected>".$equipe->getNom()."</option>";
                }else{
                    echo "<option value='".$equipe->getEquipeId()."'>".$equipe->getNom()."</option>";
                }
            }
        ?>
    </select>

    <input type="submit" value="Valider les modifications">
</form>