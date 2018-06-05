<?php
include('parts/head.php');
echo '<body>';
include('parts/menu.php');

$credentials = [
	"login" => "root",
	"pass" => "root",
]

?>

<br>
<div class="container">
<div class="col-6 offset-3 mt-5">
<?php
	if(
		!check('pseudo') || 
		!check('login') || 
		!check('sex') || 
		!check('city') || 
		!check('agree') 
	) {
?>

	<form action="subscribe.php" method="POST">
		<!-- PSEUDO -->
		<div class="form-group row">
		<label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
			<div class="col-sm-10">
				<input type="text" id="pseudo" name="pseudo" >
			</div>
		</div>
		<!-- //PSEUDO -->

		<!-- LOGIN -->
		<div class="form-group row">
		<label for="login" class="col-sm-2 col-form-label">Login</label>
			<div class="col-sm-10">
				<input type="text" id="login" name="login" >
			</div>
		</div>
		<!-- //LOGIN -->

		<!-- SEX -->
		<div class="form-group row col-lg-6">
			<label class="col-3 col-form-label">Gender</label>
			<div class="col-9">
			<label class="custom-control custom-radio">
				<input name="sex" type="radio" value="m">
				<span class="custom-control-description">Male</span>
			</label>
			<label class="custom-control custom-radio">
				<input id="mixed0" name="sex" type="radio" value="f">
				<span class="custom-control-description">Female</span>
			</label>
			</div>
		</div>
		<!-- //SEX -->

		<!-- CITY -->
		<div class="form-group row col-lg-6">
			<div class="form-group form-inline">
			<label class="col-3 " for="city">City</label>
				<div class="col-9">
					<select id="city" class="form-control" name="city">
						<option value="1">Saint-Denis</option>
						<option value="2">La Possession</option>
						<option value="3">Le Port</option>
					</select>
				</div>
			</div>
		</div>
		<!-- //CITY -->

		<!-- AGREE -->
		<div class="form-group row col-lg-6">
			<div class="form-check">
				<label class="form-check-label">
					<input id="agree" name="agree" type="checkbox" class="form-check-input" value="1">
					I want those mails
				</label>
			</div>
		</div>
		<!-- //AGREE -->

		<!-- SUBMIT -->
		<div class="form-group row">
			<button type="reset" class="btn btn-error mb-2">Reset</button>
			<button type="submit" class="btn btn-primary mb-2 offset-2">Subscribe</button>
		</div>
		<!-- //SUBMIT -->
	</form>

	<?php
	} else {
		?>
		<div class="row">
			<pre>
				<?php 
				$res = [
					"pseudo"	=> htmlspecialchars($_POST['pseudo']),
					"login"	=> htmlspecialchars($_POST['login']),
					"sex"		=> htmlspecialchars(($_POST['sex'] == 'f' ? 'Female' : 'Male')),
					"city"	=> htmlspecialchars(getCity($_POST['city'])),
					"agree"	=> htmlspecialchars(($_POST['agree'] ? 'yes' : 'no')),
				];
				
				echo '$res = ';	
				print_r($res);
				?>
			</pre>
		</div>

		
		<div class="row">
			<a href="subscribe.php"><button class="btn btn-info">Back</button></a>
		</div>
		<?php
	}
	?>
</div>
</div>
</body>
</html>



<?php

function check($getParamName) {
	if($getParamName == 'agree') {
		if(!isset($_POST['agree'])){
			$_POST['agree'] = "0";
		}
		return true;
	}
	if(isset($_POST[$getParamName]) || !empty($_POST[$getParamName])) {
		return true;
	}
	return false;
}

function getCity($idCity) {
	$cities = array();
	$cities["1"] = "Saint-Denis";
	$cities["2"] = "La Possession";
	$cities["3"] = "Le Port";

	return $cities[$idCity];
}

?>