<?php
function autoLoad($class) {
	require('m/'.ucfirst($class).'.php');
}
spl_autoload_register('autoLoad');


// DB
include("connect.php");


include("parts/head.php");
echo '<body>';
include("parts/menu.php");
echo '<div class="container"><br>';
?>

<?php

$q = $db->query("SELECT mb_num, mb_nom, mb_prenom, mb_dt_naiss, sp_id 
						FROM membre 
						ORDER BY 1");

$arr = array();
while($r = $q->fetch(PDO::FETCH_ASSOC)) {

	$res['mbNum'] = $r['mb_num'];
	$res['mbNom'] = $r['mb_nom'];
	$res['mbPrenom'] = $r['mb_prenom'];
	$res['mbSpId'] = $r['sp_id'];
	$res['mbDtNaiss'] = $r['mb_dt_naiss'];

	$arr[] = $res;
}
print_r($arr);

// show all members
echo '<table class="table table-bordered">';
	echo '<thead class="thead-dark">
		<tr>
			<th>Numero</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Date Naissance</th>
			<th>Sport</th>
		</tr>
	</thead>';
	echo '<tbody class="table-striped">';
	foreach($arr as $k => $v) {
			$m = new Membre($v);

			echo '<tr>';
				echo '<td>' . $m->mbNum() . '</td>';
				echo '<td>' . $m->mbNom() . '</td>';
				echo '<td>' . $m->mbPrenom() . '</td>';
				echo '<td>' . date_format(date_create($m->mbDtNaiss()),"d/m/Y") . '</td>';
				echo '<td>' . $m->mbSpId() . '</td>';
			echo '</tr>';
	}
		echo '</tbody>';
	echo '<table>';

$mMB = new MembreManager($db);

$mb = new Membre([
	'mbNom' => 'test',
	'mbPrenom' => 'tested',
	'mbDtNaiss' => '2018-02-01',
	'MbSpId' => 3,
]);

$mMB->add($mb);
?>

</div>
<!-- //CONTAINER -->
</body>
</html>