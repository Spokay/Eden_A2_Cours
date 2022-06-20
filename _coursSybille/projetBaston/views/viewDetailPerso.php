<table>
    <thead>
    <th>ID</th>
    <th>EquipeNom</th>
    <th>Nom</th>
    <th>PersoVie</th>
    <th>Armes</th>
    </thead>
    <tbody>

    <tr>
        <td><?= $perso->getPersoId(); ?></td>
        <td><?= $perso->getEquipe()->getNom(); ?></td>
        <td><?= $perso->getPersoNom(); ?></td>
        <td><?= $perso->getPersoVie(); ?></td>
        <td><?php
            foreach($perso->getArmes() as $arme){
                echo $arme->getArmeNom()." ";
            }
            ?></td>
        <td><a href="?id=<?= $perso->getPersoId(); ?>&action=afficherModifierPerso">Modifier</a>  <a href="?id=<?= $perso->getPersoId(); ?>&action=afficherSupprimerPerso">Supprimer</a></td>
    </tr>
    </tbody>
</table>