<?php
// DB
include("connect.php");
include("parts/head.php");
echo '<body>';
include("parts/menu.php");
echo '<div class="container"><br>';

// query list members
$q = $db->query('SELECT *
						FROM membre m, sport s
						WHERE m.sp_id = s.sp_id');

echo '<table class="table table-bordered">';
	echo '<thead class="thead-dark">
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Sport</th>
		</tr>
	</thead>';
	echo '<tbody class="table-striped">';
		while($res = $q->fetch()) {
			echo '<tr>';
				echo '<td>' . $res['mb_nom'] . '</td>';
				echo '<td>' . $res['mb_prenom'] . '</td>';
				echo '<td>' . $res['sp_libelle'] . '</td>';
			echo '</tr>';
		}
	echo '</tbody>';
echo '<table>';
?>



</div>
<!-- //CONTAINER -->
</body>
</html>