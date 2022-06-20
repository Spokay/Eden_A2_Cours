<?php

if ((!empty($_POST))){
    var_dump($_POST);
    if(isset($_POST['choix'])){
        $id = 1;
        switch ($_POST['choix']){
            case "afficherListePersos":
                $gestion->getListPerso();
                break;
            case "afficherPerso":
                $gestion->voirDetailPerso($id);
                break;
            case "modifierPerso":
                $gestion->voirModifierPerso($id);
                break;
            case "supprimerPerso":
                break;
        }
        if (isset($_POST['modifierConfirm'])){
            $gestion->traitementModifierPersonnage($id);
        }
    }


}
