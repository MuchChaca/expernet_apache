<?php
// DB
include("connect.php");
include("parts/head.php");
echo '<body>';
include("parts/menu.php");
echo '<div class="container"><br>';
?>

<?php
$qMB = $db->query('SELECT *
						FROM membre');

// for each member
while($resMB = $qMB->fetch()){
	// info whom
	echo "<h3>".strtoupper($resMB['mb_nom'])." ".$resMB['mb_prenom']."</h3>";

	$qRS = $db->query('SELECT comp_date, comp_nom, comp_lieu, res_num_place, mb_nom, mb_prenom
	FROM competition c, resultat r, membre m
	WHERE c.comp_num = r.comp_num
			AND m.mb_num = r.mb_num
			AND m.mb_num = ' . $resMB['mb_num'] . '
			ORDER BY comp_date;');

	// show results for the given member
	// while($resRS = $qRS->fetch()){
	echo '<table class="table table-bordered">';
		echo '<thead class="thead-dark">
			<tr>
				<th>Compétition</th>
				<th>Date</th>
				<th>Lieu</th>
				<th>Place</th>
			</tr>
		</thead>';
		echo '<tbody class="table-striped">';
			while($resRS = $qRS->fetch()){
				echo '<tr>';
					echo '<td>' . $resRS['comp_nom'] . '</td>';
					echo '<td>' . date_format(date_create($resRS['comp_date']),"d/m/Y") . '</td>';
					echo '<td>' . $resRS['comp_lieu'] . '</td>';
					echo '<td>' . $resRS['res_num_place'] . '</td>';
				echo '</tr>';
			}
		echo '</tbody>';
	echo '<table>';
	echo '<br><hr><br>';
}








?>

</div>
<!-- //CONTAINER -->
</body>
</html>