<?php
// DB
include("connect.php");
include("parts/head.php");
echo '<body>';
include("parts/menu.php");
echo '<div class="container"><br>';


$sports = findAllSports($db);
// DEBUG
// echo '<pre>';
// print_r($sports);
// echo '</pre>';
?>
<?php if(
		!isset($_POST['mb-lname']) ||
		!isset($_POST['mb-fname']) ||
		!isset($_POST['mb-b-date']) ||
		(!isset($_POST['mb-sports']) && $_POST['mb-sports'] != "null")
	) { ?>
<form name="form-add-member" method="POST" action="">
	<!-- LAST-NAME -->
	<div class="form-group row">
		<label for="mb-lname" class="col-sm-2 col-form-label">Last Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="mb-lname" name="mb-lname" placeholder="Last Name" required>
		</div>
	</div>
	<!-- //LAST-NAME -->

	<!-- FIRST-NAME -->
	<div class="form-group row">
		<label for="mb-fname" class="col-sm-2 col-form-label">First Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="mb-fname" name="mb-fname" placeholder="First Name" required>
		</div>
	</div>
	<!-- //FIRST-NAME -->

	<!-- BIRTH-DATE -->
	<div class="form-group row">
		<label for="mb-b-date" class="col-sm-2 col-form-label">Birth Date</label>
		<div class="col-sm-10">
			<input type="date" class="form-control" id="mb-b-date" name="mb-b-date" required>
		</div>
	</div>
	<!-- //BIRTH-DATE -->

	<!-- SPORTS -->
	<div class="form-group row">
		<label for="mb-sports" class="col-sm-2 col-form-label">Sports</label>
		<div class="col-sm-10">
			<select name="mb-sports" id="mb-sports" class="form-control">
				<?php
				foreach($sports as $sport) {
					echo '<option value="'.$sport['sp_id'].'">';
						echo htmlspecialchars($sport['sp_libelle']);
					echo '</option>';
				}
				?>
			</select>
		</div>
	</div>
	<!-- //SPORTS -->

	<!-- SUBMIT -->
	<div class="form-group row">
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
	<!-- //SUBMIT -->

</form>


<?php
} else {
	//==========  FORM PROCESSING  ==========//
	// DEBUG
	// echo '<pre>';
	// 	print_r($_POST);
	// echo '<//pre>';

	$msg = [
		"head" => 'Nothing changed',
		"body" => '',
		"class" => "alert alert-default",
	];

	// retrieve data sent
	$lname = $_POST['mb-lname'];
	$fname = $_POST['mb-fname'];
	$bday = $_POST['mb-b-date'];
	$sport = $_POST['mb-sports'];

	try {
		// query to add
		$stmt = $db->prepare('INSERT INTO membre(mb_nom, mb_prenom, mb_dt_naiss, sp_id)
									VALUES(:lname, :fname, :bday, :sport)');
		$stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
		$stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
		$stmt->bindParam(":bday", $bday, PDO::PARAM_STR);
		$stmt->bindParam(":sport", $sport, PDO::PARAM_INT);
		// execute query -- adding
		$stmt->execute();

		// set success message
		$msg["head"] = 'Success !';
		$msg["body"] = htmlspecialchars(strtoupper($lname). " " . $fname). " has been added.";
		$msg["class"] = 'alert alert-success';

	} catch(Exception $ex) {
		// set error message
		$msg["head"] = 'Error !';
		$msg["body"] = $ex->getMessage();
		$msg["class"] = 'alert alert-danger';
	}

	// Display info message
	echo '<div class="'. $msg["class"] .'">';
		echo "<strong>". $msg["head"] ."</strong><br>". $msg["body"];
	echo '</div>';
	
	?>
	<!-- BACK -->
	<div class="form-group row">
		<a href="addMember.php"><button class="btn btn-secondary ">Back</button></a>
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

function findAllSports($db){
	$q = $db->query('SELECT * FROM sport');
	return $q->fetchAll(PDO::FETCH_ASSOC);
}

?>