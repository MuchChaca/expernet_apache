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










