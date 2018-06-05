<?php
include('parts/head.php');
echo '<body>';
include('parts/menu.php');

?>

<br>

<div class="container">

<?php
	if(!check('nom') || !check('prenom')) {
?>

	<form action="index.php" method="GET">
		<!-- PRENOM -->
		<div class="form-group row">
		<label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
			<div class="col-sm-10">
				<input type="text" id="prenom" name="prenom" >
			</div>
		</div>
		<!-- //PRENOM -->

		<!-- NOM -->
		<div class="form-group row">
			<label for="nom" class="col-sm-2 col-form-label">Nom</label>
			<div class="col-sm-10">
				<input type="text" id="nom" name="nom" >
			</div>
		</div>
		<!-- //NOM -->

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
				<b class="col-sm-2">Nom:</b> <span class="mb-2" ><?= htmlspecialchars($_GET['nom']) ?> </span><br>
				<b class="col-sm-2">Prenom:</b> <span class="mb-2" ><?= htmlspecialchars($_GET['prenom']) ?> </span><br>
			</p>
		</div>
		<div class="row">
		<a href="index.php"><button class="btn btn-info">Retour</button></a>
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