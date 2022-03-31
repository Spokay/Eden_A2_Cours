
/*EXO 1*/
SELECT service FROM employes WHERE id_employes = 547;
/*EXO 2*/
SELECT prenom,date_embauche FROM employes WHERE prenom = 'Amandine';
/*EXO 3*/
SELECT service,COUNT(*) AS nombre FROM employes GROUP BY service HAVING service = 'commercial';
/*EXO 4*/
SELECT (SUM(salaire)*12) FROM employes WHERE service = 'commercial';
/*EXO 5*/
SELECT service,ROUND(AVG(salaire)) FROM employes GROUP BY service;
/*EXO 6*/
SELECT COUNT(*) AS nbofemployes FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2011-01-01';
SELECT COUNT(*) AS nbofemployes FROM employes WHERE date_embauche LIKE '2010%';
/*EXO 7*/
UPDATE employes SET salaire = salaire + 100;
/*EXO 8*/
SELECT COUNT(DISTINCT service) FROM employes;
SELECT COUNT(DISTINCT(service)) FROM employes;
/*EXO 9*/
SELECT * FROM employes WHERE service = 'commercial' AND salaire = (SELECT MAX(salaire) FROM employes WHERE service = 'commercial');
/*EXO 10*/
SELECT * FROM employes WHERE date_embauche =(SELECT MAX(date_embauche) FROM employes);
/*EXO 11*/
SELECT titre FROM livre WHERE id_livre IN((SELECT id_livre FROM emprunt WHERE date_rendu IS NULL));
/*EXO 12*/
SELECT prenom FROM abonne WHERE id_abonne IN((SELECT id_abonne FROM emprunt WHERE date_sortie = '2014-12-19'));
/*EXO 13*/
SELECT prenom FROM abonne WHERE id_abonne IN((SELECT id_abonne FROM emprunt WHERE id_livre IN((SELECT id_livre FROM livre WHERE auteur ='ALPHONSE DAUDET'))));
/*EXO 14*/
SELECT titre FROM livre WHERE id_livre IN(SELECT id_livre FROM emprunt WHERE id_abonne IN(SELECT id_abonne FROM abonne WHERE prenom = 'Chloe'));
/*EXO 15*/
SELECT COUNT(*) AS nbempruntGuillaume FROM emprunt WHERE id_abonne IN(SELECT id_abonne FROM abonne WHERE prenom = 'Guillaume');
/*EXO 16*/
SELECT a.prenom, e.date_sortie, e.date_rendu FROM abonne a, emprunt e WHERE a.id_abonne = e.id_abonne AND a.prenom = 'Guillaume';
-- methode jointure interne
SELECT date_sortie, date_rendu FROM emprunt WHERE id_abonne IN(SELECT id_abonne FROM abonne WHERE prenom = 'Guillaume');
/*EXO 17*/
SELECT prenom FROM abonne WHERE id_abonne IN(SELECT id_abonne FROM emprunt WHERE id_livre IN(SELECT id_livre FROM livre WHERE titre = 'Une vie') AND date_sortie LIKE '2014%');
-- methode jointure interne
SELECT a.prenom FROM abonne a, emprunt e, livre l WHERE l.id_livre = e.id_livre AND e.id_abonne = a.id_abonne AND l.titre = 'Une vie' AND e.date_sortie LIKE '2014%';
/*EXO 18*/
SELECT a.prenom, COUNT(e.id_livre) AS nbofbooks FROM abonne a, emprunt e WHERE a.id_abonne = e.id_abonne GROUP BY a.prenom;
/*EXO 19*/
SELECT a.prenom, l.titre, e.date_sortie FROM abonne a, livre l, emprunt e WHERE a.id_abonne = e.id_abonne AND l.id_livre = e.id_livre;
/*EXO 20*/
SELECT a.prenom, l.id_livre FROM abonne a, livre l, emprunt e WHERE a.id_abonne = e.id_abonne AND l.id_livre = e.id_livre;
-- méthode de jointure externe
SELECT abonne.prenom, emprunt.id_livre FROM abonne LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne;