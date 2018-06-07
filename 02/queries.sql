-- membres par ordre alphabétique
SELECT mb_nom, mb_prenom
FROM membre
ORDER BY mb_nom, mb_prenom_dt ASC;
-- or replace per number of parameter
-- ORDER BY 1,2 ASC;

-- plus jeune au plus vieux
SELECT mb_nom, mb_prenom, mb_dt_naiss
FROM membre
ORDER BY mb_dt_naiss DESC;

-- numero de membre ayant participé à une compet'
SELECT DISTINCT mb_num
FROM resultat;


-- membre qui pratiquent sport numero 2
SELECT *
FROM membre
WHERE sp_id = 2;

-- list des personne avec nom de famille qui commence par 'G' ou 'g'
SELECT *
FROM membre
WHERE mb_nom REGEXP '^(g|G)[[:alpha:]]*';

-- liste des compétitions au dernier trimestre 2018
SELECT *
FROM competition
WHERE MONTH(comp_date) BETWEEN '09' AND '12'
		AND YEAR(comp_date) = '2018';

-- competitions au port et à st joseph
SELECT *
FROM competition
WHERE comp_lieu = 'Saint-Joseph'
		OR comp_lieu = 'Le Port';
-- alternative :
-- WHERE comp_lieu IN ('Saint-Joseph', 'Le Port');

-- w/ jointures
SELECT mb_nom, mb_prenom, sp_libelle
FROM membre m, sport s
WHERE m.sp_id = s.sp_id
ORDER BY sp_libelle ASC;

-- resultats aux compétitions: date compet, nom prenom membre, num place
SELECT comp_date 'Date compétition', comp_nom 'Nom compétition', res_num_place 'Résultat', mb_nom 'Nom membre', mb_prenom 'Prénom membre'
FROM competition c, resultat r, membre m
WHERE c.comp_num = r.comp_num
		AND m.mb_num = r.mb_num
ORDER BY comp_nom;

-- format date
SELECT mb_nom, mb_prenom, DATE_FORMAT(mb_dt_naiss, '%d/%m/%Y') 'date de naissance'
FROM membre;


-- année naissance membres
SELECT mb_nom, mb_prenom, YEAR(mb_dt_naiss) 'Année naissance'
FROM membre;


-- age des membres
SELECT mb_nom, mb_prenom, YEAR(NOW())-YEAR(mb_dt_naiss) 'age'
FROM membre;

-- caps nom de famille
SELECT UPPER(mb_nom) 'nom', mb_prenom 'prenom'
FROM membre;


-- resultats aux compétitions: date compet, nom prenom membre, num place
-- avec inner join
SELECT comp_date 'Date compétition', comp_nom 'Nom compétition', res_num_place 'Résultat', mb_nom 'Nom membre', mb_prenom 'Prénom membre'
FROM competition c
INNER JOIN resultat r
	ON c.comp_num = r.comp_num
INNER JOIN membre m
	ON m.mb_num = r.mb_num
ORDER BY comp_nom;

-- commentaire sur la place
-- resultats aux compétitions: date compet, nom prenom membre, num place
-- avec inner join
SELECT comp_date 'Date compétition', comp_nom 'Nom compétition', res_num_place 'Résultat', mb_nom 'Nom membre', mb_prenom 'Prénom membre', 
	CASE res_num_place
		WHEN 1 THEN 'Premier! GG!'
		WHEN 2 THEN 'Deuxieme! Close!'
		WHEN 3 THEN 'Troisième! Podium! Nice!'
		ELSE 'Bien de finir tout court'
	END AS 'Commentaire'
FROM competition c
INNER JOIN resultat r
	ON c.comp_num = r.comp_num
INNER JOIN membre m
	ON m.mb_num = r.mb_num
ORDER BY comp_nom;
-- alternative w/ if
SELECT comp_date 'Date compétition', comp_nom 'Nom compétition', res_num_place 'Résultat', mb_nom 'Nom membre', mb_prenom 'Prénom membre', 
	IF(res_num_place=1, 'GG', 'Mol') AS 'Commentaire'
FROM competition c
INNER JOIN resultat r
	ON c.comp_num = r.comp_num
INNER JOIN membre m
	ON m.mb_num = r.mb_num
ORDER BY comp_nom;

-- count
SELECT COUNT(*) 'Nombre compétitions'
FROM competition;

-- nombre de memvres par sport
SELECT s.sp_id, sp_libelle, COUNT(*) 'Nombre Membre'
FROM membre m
INNER JOIN sport s
	ON s.sp_id = m.sp_id
GROUP BY s.sp_id;


-- chercher les num de membres qui ont participés plus d'une fois à un compet'
-- nombre de membres par sport + de 1fois
SELECT m.mb_num, mb_nom, COUNT(res_num_place) 'nb_particip'
FROM resultat r
INNER JOIN membre m
	ON m.mb_num = r.mb_num
GROUP BY m.mb_num
HAVING nb_particip > 1;






