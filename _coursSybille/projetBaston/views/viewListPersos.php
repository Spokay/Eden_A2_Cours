<table>
    <thead>
    <th>Nom</th>
    </thead>
    <tbody>
    <?php
    foreach($listPersos as $personnage){
        ?>
        <tr>
            <td><?= $personnage->getPersoNom() ?></td>
            <td>
                <form action="" method="post" class="formPersoActions">
                    <input type="hidden" name="choix" value="" class="hidden-input">
                    <input type="submit" value="AFFICHER" name="afficherPerso" class="input">
                    <input type="submit" value="MODIFIER" name="modifierPerso" class="input">
                    <input type="submit" value="SUPPRIMER" name="supprimerPerso" class="input">

                </form>
                <!--<a href="" type="submit" value=""  class="input">bonjour</a>-->
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>