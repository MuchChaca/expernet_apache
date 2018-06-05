<?php
include('parts/head.php');
?>
<body>
	<?php
	include('parts/menu.php');
	?>
	<?php
	$days = [
		"Lundi",
		"Mardi",
		"Mercredi",
		"Jeudi",
		"Vendredi",
		"Samedi",
	];

	echo '<pre>';
		print_r($days);
	echo '</pre>';

	echo 'L\'element a l\'indice 4 est : ' . $days[4] . "<br>";

	$days[] = 'Dimanche';

	echo '<pre>';
		print_r($days);
	echo '</pre>';

	echo "Dernier élément: ". end($days) . "<br>";

	// modifie la valeur à un indice n
	$days[5] = 'Saturday night fever';
	echo '<pre>';
		print_r($days);
	echo '</pre>';


	echo 'Nous somme ' . strtolower($days[date('N')-1]) . '<br>';
	
	echo '<hr>';

	$infos = [
		"nom" => "Payet",
		"prenom" => "Super",
		"mail" => "toto@email.com",
	];

	echo '<pre>';
		print_r($infos);
	echo '</pre>';

	echo '<p>';
	foreach($infos as $key => $val) {
		echo 'Le ' . $key . ' est ' . $val . '<br>';
	}
	echo '</p>';

	echo 'Le tableau contient '. count($infos) . ' éléments<br>';

	echo 'Le mail contient ' . strlen($infos['mail']) . ' caractères <br>';


	echo '3 premiers caract du prenom: ' . substr($infos['prenom'], 0, 3) . '<br>';
	$mailLen = strlen($infos['mail']);
	echo '10 derniers caract du mail: ' . substr($infos['mail'], -10) . '<br>';

	echo str_replace('o', 'a', $infos['mail']) . '<br>';
	?>

	</body>
</html>