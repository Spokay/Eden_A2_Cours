<?php


// AS permet de créer une variable associée au paramètre d'avant
//SELECT service,COUNT(*) AS nombre FROM employes GROUP BY service HAVING nombre < 2;
// HAVING est utilisé pour faire une condition dans des contexte de calcul

// INSERT est utilisé pour insérer dans une base de donnée
// INSERT INTO `employes`(`id_employes`, `prenom`, `nom`, `sexe`, `service`, `date_embauche`, `salaire`) VALUES ('','alexis','richy','m','informatique','2011-12-28',1800);

// on peux juste mettre INSERT INTO employes VALUES(...); pour exiter de perdre du temps

// UPDATE peut modifier des informations de la table
// SET change la colomne selectionnée avec la condition d'après
// UPDATE employes SET salaire = 2000 WHERE id_employes = 415;
// pour supprimer on utlise DELETE FROM employes WHERE id_employes = 350

// les fonctions d'Aggrégat :
// SUM() - COUNT() - AVG() - MIN() - MAX()