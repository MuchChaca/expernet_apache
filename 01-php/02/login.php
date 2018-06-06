<?php

include('parts/head.php');
echo '<body>';
include('parts/menu.php');

$credentials = [
	"login" => "root",
	"pass" => "root",
];

?>

<br>
<div class="container">
<?php
	if(!check('login') || !check('pass')) {
?>

	<form action="login.php" method="POST">
		<!-- LOGIN -->
		<div class="form-group row">
		<label for="login" class="col-sm-2 col-form-label">Login</label>
			<div class="col-sm-10">
				<input type="text" id="login" name="login" >
			</div>
		</div>
		<!-- //LOGIN -->

		<!-- PASS -->
		<div class="form-group row">
		<label for="pass" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="password" id="pass" name="pass" >
			</div>
		</div>
		<!-- //PASS -->

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
			<?php print_r($_POST) ?>
			</pre>
		</div>

		<div class="row">
			<?php
			$checked = checkCredentials($credentials, $_POST);
			if ($checked['login'] && $checked['pass']) {
				$login = $credentials['login'];
				$pass = $credentials['pass'];
				// GOOD
				//* Create a coookie
				setcookie('login', $login, time()+3600);
				setcookie('pass', $pass, time()+(7*24*3600), "/", "example.com", false, true);
				$_SESSION['login'] = $login;
				?>
				<div class="alert alert-success" role="alert">
					<strong>Well done!</strong> Success.
				</div>
				<?php
			} else {
				// BAD
				?>
				<div class="alert alert-error" role="alert">
					<strong>Failed</strong>
				</div>
				<em>
					<?php
					foreach($checked as $k => $v){
						if(!$v) {
							echo '<span style="color:red;">Wrong '. $k . '</span><br>';
						}
					}
					?>
				</em>
				<?php
			}
			?>
		</div>
		<div class="row">
			<div class="col-3">
				<a href="login.php"><button class="btn btn-info">Back</button></a>
			</div>
			<div class="col-3 offset-6">
				<a href="index.php"><button class="btn btn-primary">Home</button></a>
			</div>
		</div>
		<?php
	}
	?>

</div>
</body>
</html>



<?php

function check($getParamName) {
	if(isset($_POST[$getParamName]) || !empty($_POST[$getParamName])) {
		return true;
	}
	return false;
}

/**
 * checkCredentials
 * @param array the right credentials
 * @param array the input credientials
 * @return array mapping true to correct credentials, false for wrong ones.
 */
function checkCredentials($credentials, $array) {
	// TODO - hashing
	$status = [
		"login" => true,
		"pass" => true,
	];

	foreach($array as $k => $v){
		if ($v != $credentials[$k]) {
			$status[$k] = false;
		}
	}

	return $status;
}


?>