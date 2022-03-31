SELECT e.equipeNom, p.persoNom FROM equipe e, personnage p WHERE p.EQUIPEID = e.EQUIPEID AND e.EQUIPEID = p.EQUIPEID;

SELECT persoNom FROM personnage WHERE EQUIPEID IN(SELECT EQUIPEID FROM equipe WHERE equipeNom = 'XMEN');

SELECT a.armeNom, eq.equipeNom FROM equipe eq JOIN personnage pe ON eq.EQUIPEID = pe.EQUIPEID JOIN persoarme pa ON pe.PERSOID = pa.PERSOID JOIN arme a ON pa.ARMEID = a.ARMEID;

SELECT (SELECT pers.persoNom FROM personnage perso, partie part WHERE pers.persoNom IN(part.PERDANTID)) AS perdant, (SELECT pers.persoNom FROM personnage perso, partie part WHERE pers.persoNom IN(part.GAGNANTID)) AS gagnant FROM personnage pe JOIN partie pa ON pe.PERSOID = pa.PERDANTID;