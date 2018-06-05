<?php
include('parts/head.php');
?>
<body>
	<?php
	include('parts/menu.php');
	?>

	<?php
	$nbVerres = $_GET['verres'];
	$msg = '';
	if (isset($_GET['verres']) && $nbVerres >= 3){
		$msg = '<div class="alert alert-danger" role="alert">Dors la meme</div>';
	} else {
		$msg = '<div class="alert alert-success" role="alert">ça roule!</div>';
	}
	echo $msg;
	?>
</body>
</html>