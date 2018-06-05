<?php
include('parts/head.php');
echo '<body>';
include('parts/menu.php');

?>

<br>

<div class="container">

<?php
	if(!check('year')) {
?>

	<form action="year.php" method="GET">
		<!-- YEAR -->
		<div class="form-group row">
		<label for="year" class="col-sm-2 col-form-label">Année</label>
			<div class="col-sm-10">
				<input type="text" id="year" name="year" >
			</div>
		</div>
		<!-- //YEAR -->

		<!-- SUBMIT -->
		<div class="form-group row">
			<button type="reset" class="btn btn-error mb-2">Annuler</button>
			<button type="submit" class="btn btn-primary mb-2 offset-2">Valider</button>
		</div>
		<!-- //SUBMIT -->
	</form>

	<?php
	} else {
		?>
		<div class="row">
			<pre>
			<?php print_r($_GET) ?>
			</pre>
		</div>

		<div class="row">
			<p>
			<?php
			$msg = is_numeric($_GET['year']) ? " est un nombre." : " n'est pas un nombre.";
			?>
				<b><?= htmlspecialchars($_GET['year']) . $msg ?></b> <br>
			</p>
		</div>
		<div class="row">
		<a href="year.php"><button class="btn btn-info">Retour</button></a>
		</div>
		<?php
	}
	?>

</div>
</body>
</html>



<?php

function check($getParamName) {
	if(isset($_GET[$getParamName]) || !empty($_GET[$getParamName])) {
		return true;
	}
	return false;
}



?>