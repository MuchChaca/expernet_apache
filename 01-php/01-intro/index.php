<?php
include('parts/head.php');
?>
<body>
	<?php
	include('parts/menu.php');
	?>

	<?php
	$name = 'Moi';
	$nb1 = date('Y');
	$nb2 = 1990;
	echo 'PHP working. <br>Bienvenue '. $name . "<br>";
	echo "Vous avez " . ($nb1 - $nb2) . " ans, vous êtes né en " . $nb2 . " <br>";
	?>
</body>
</html>