<?php

include('parts/head.php');
echo '<body>';
include('parts/menu.php');

?>

<br>

<div class="container">

	

<?php
	if(isset($_SESSION['login'])){
		echo '<div class="row">';
			echo '<div class="col-9 alert alert-info" role="alert">';
				echo '<strong>LOGIN EXISTS : </strong> '. htmlspecialchars($_SESSION['login']);
			echo '</div>';

			echo '<div class="col-3">';
				echo '<a href="logout.php"><button class="btn btn-warning">Log out</button></a>';
			echo '</div>';
		echo '</div>';
	} else {
		echo '<div class="alert alert-warning" role="alert">';
		echo '<strong>LOGIN DOES NOT EXIST ! </strong> ';
		echo '</div>';
	}

	if(!check('nom') || !check('prenom') || !isset($_COOKIE['login'])) {
?>
	<div class="row">
		<h2>Bienvenue <?= htmlspecialchars($_COOKIE['login']) ?></h2>
	</div>

	<div class="row">
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
				<button type="reset" class="btn btn-error mb-2">Cancel</button>
				<button type="submit" class="btn btn-primary mb-2 offset-2">Submit</button>
			</div>
			<!-- //SUBMIT -->
		</form>
	</div>
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