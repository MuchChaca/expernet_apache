<?php
include('parts/head.php');
?>
<body>
	<?php
	include('parts/menu.php');
	?>

<?php
$nb1 = $_GET['nb1'];
$nb2 = $_GET['nb2'];

if($nb1 == $nb2) {
	echo "Equals";
} else {
	echo min([$nb1, $nb2]);
}
?>

<hr>
<pre>
<?php

for ($i=0; $i < 50; $i++) { 
	// echo "itération n°: " . ($i+1) . "<br>";
	// echo "*" * $i;
	$bf = '';
	$end = '';
	for ($g = 0; $g < (50 - $i); $g++){
		$bf .= " ";
	}
	echo $bf;
	for ($j=0; $j < $i; $j++) { 
		echo "*";
	}
	for ($k=1; $k < $i; $k++) { 
		echo "*";
	}

	echo $end;
	echo "<br>";
}

$cpt = 50;
while( $cpt > 0) {
	$i = 0;
	while($i < $cpt) {
		echo "*";
		$i++;
	}
	echo "<br>";
	$cpt--;
}

?>
</pre>

<hr>

<div class="col-6 offset-3">
<?php
echo '<table class="table table-stripped">';
for ($i=1; $i <= 12; $i += 3) { 
	echo '<tr>';
		for ($j=0; $j < 3; $j++) { 
			echo '<td>' . ($i + $j) . '</td>';
		}
	echo '</tr>';
}
echo '</table>';
?>
</div>

<hr>

<?php
// default timezone
date_default_timezone_set('Indian/Reunion');
// print date
echo 'Nous sommes le ' . date('d/m/Y') . "<br>";
// print time
echo 'Il est ' . date('H:i') . '<br>';
// print week number
echo 'Jour n°'. date('N').'<br>';
// timestamp now
echo 'Timestamp:' . time() . '<br>';
?>