<?php
// DB
include("connect.php");
include("parts/head.php");
echo '<body>';
include("parts/menu.php");
echo '<div class="container"><br>';


$members = findAllMembers($db);
$competitions = findAllCompetitions($db);

$msg = [
	"head" => 'Nothing changed',
	"body" => '',
	"class" => "alert alert-default",
];
?>

<?php if(
	empty($_POST['res-member']) ||
	empty($_POST['res-cpt']) ||
	!isset($_POST['res-place']) 
) { ?>
<form name="form-add-result" method="POST" action="">
	<!-- COMPETITION -->
	<div class="form-group row">
		<label for="res-cpt" class="col-sm-2 col-form-label">Competition</label>
		<div class="col-sm-10">
			<select name="res-cpt" id="res-cpt" class="form-control">
			<option value="null"></option>
				<?php
				foreach($competitions as $c) {
					echo '<option value="'.$c['comp_num'].'">';
						echo htmlspecialchars($c['comp_nom']);
					echo '</option>';
				}
				?>
			</select>
		</div>
	</div>
	<!-- //COMPETITION -->

	<!-- MEMBER -->
	<div class="form-group row">
		<label for="res-member" class="col-sm-2 col-form-label">Member</label>
		<div class="col-sm-10">
		<select name="res-member" id="res-member" class="form-control">
			<option value="null"></option>
				<?php
				foreach($members as $m) {
					echo '<option value="'.$m['mb_num'].'">';
						echo htmlspecialchars(strtoupper($m['mb_nom']) . " " . $m['mb_prenom']);
					echo '</option>';
				}
				?>
			</select>
		</div>
	</div>
	<!-- //MEMBER -->

	<!-- PLACE -->
	<div class="form-group row">
		<label for="res-place" class="col-sm-2 col-form-label">Place</label>
		<div class="col-sm-10">
			<input type="int" min="1" class="form-control" id="res-place" name="res-place" required value="1">
		</div>
	</div>
	<!-- //PLACE -->


	<!-- SUBMIT -->
	<div class="form-group row">
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
	<!-- //SUBMIT -->

</form>


<?php
} else {
	//=============  FORM-PROCESSING  =============//
	// fetch data from form
	$mbNum = $_POST['res-member'];
	$compNum = $_POST['res-cpt'];
	$place = $_POST['res-place'];

	if(canAddResult($db,$mbNum, $compNum, $place)){
		try {
			// prepare
			$stmt = $db->prepare('INSERT INTO resultat(mb_num, comp_num, res_num_place)
										VALUES(:mb, :comp, :res)');
			$stmt->bindParam(':mb', $mbNum, PDO::PARAM_INT);
			$stmt->bindParam(':comp', $compNum, PDO::PARAM_INT);
			$stmt->bindParam(':res', $place, PDO::PARAM_INT);
			// execute
			$stmt->execute();

			// set success message
			$msg["head"] = 'Success !';
			$msg["body"] = "";
			$msg["class"] = 'alert alert-success';

		} catch(Exception $ex) {
			// set error message
			$msg["head"] = 'Error !';
			$msg["body"] = $ex->getMessage();
			$msg["class"] = 'alert alert-danger';
		}

	} else {
		// set warning message - cant add
		$msg["head"] = 'Error !';
		$msg["body"] = "This member already has a place registered for this competitin or place is alreaddy taken.";
		$msg["class"] = 'alert alert-warning';
	}

	// Display info message
	echo '<div class="'. $msg["class"] .'">';
		echo "<strong>". $msg["head"] ."</strong><br>". $msg["body"];
	echo '</div>';
?>
	<!-- BACK -->
	<div class="form-group row">
		<a href="addResult.php"><button class="btn btn-secondary ">Back</button></a>
	</div>
	<!-- //BACK -->



<?php
}
?>
</div>
<!-- //CONTAINER -->
</body>
</html>

<?php

function findAllMembers($db){
	$q = $db->query('SELECT * FROM membre');
	return $q->fetchAll(PDO::FETCH_ASSOC);
}

function findAllCompetitions($db){
	$q = $db->query('SELECT * FROM competition');
	return $q->fetchAll(PDO::FETCH_ASSOC);
}

function canAddResult($db, $mbNum, $compNum, $place){
	// prepare
	$stmt = $db->prepare('SELECT COUNT(*)
							FROM resultat
							WHERE (mb_num = :mb
								AND comp_num = :comp)
								OR (comp_num = :comp
										AND res_num_place = :place)');
	// bind params
	$stmt->bindParam(':mb', $mbNum, PDO::PARAM_INT);
	$stmt->bindParam(':comp', $compNum, PDO::PARAM_INT);
	$stmt->bindParam(':place', $place, PDO::PARAM_INT);

	$stmt->execute();

	// return if can add true, else false
	return $stmt->fetchColumn() == 0;
}


?>