<?php
// auto class loader
function autoLoad($class) {
	require('m/'.ucfirst($class).'.php');
}
spl_autoload_register('autoLoad');


// DB
include("connect.php");

include("parts/head.php");
echo '<body>';
include("parts/menu.php");
echo '<div class="container"><br>';
?>

<?php

?>






</div>
<!-- //CONTAINER -->
</body>
</html>