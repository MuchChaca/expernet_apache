<?php
// call the class we need
require_once('m/Pokemon.php');


// instanciation
$rondoudou = new Pokemon();

// call method attack()
$rondoudou->attack();

// print value of ``_lvl`` with getter
echo "<p>level : ".$rondoudou->lvl()."</p>";

// level up
$rondoudou->levelUp();
// print new level
echo "<p>level : ".$rondoudou->lvl()."</p>";



?>