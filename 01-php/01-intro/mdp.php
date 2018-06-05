<?php
include('parts/head.php');
?>
<body>
	<?php
	include('parts/menu.php');
	?>


<?php

$mdp = "patateBienCuite";

echo '<div>' . (isset($_GET['mdp']) && ($_GET['mdp'] == $mdp) ? 'Bienvenue!' : 'Accès refusé!') . '</div>';

?>