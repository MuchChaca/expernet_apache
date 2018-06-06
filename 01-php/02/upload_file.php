<?php

include('parts/head.php');
echo '<body>';
include('parts/menu.php');

?>
<br>
<div class="container">
<?php
	if(!isset($_FILES['file-input'])){
?>

<form name="form-file" action="upload_file.php" method="POST" enctype="multipart/form-data">
		<label class="control-label" for="file-input">Select a file
			<input class="form-control" type="file" id="file-input" name="file-input" >
		</label>
		<button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
	} else {
		//========  Form is filled then ``$_FILES['file-input']``  ========//
		//=> Check for errors of upload
		// $fIn = $_FILES['file-input'];
		// print_r($_FILES); // DEBUG
		if(!$_FILES["file-input"]['error']){
			// check for size
			if($_FILES['file-input']["size"] <= 5000000) {
				// file info fetching
				$infos = pathinfo($_FILES['file-input']['name']);
				// fetch file ext
				$ext = $infos['extension'];
				// check for right etx
				if ($ext == "jpg") { //=> we want this one
					$dir = "img";
					// check dir
					if (!is_dir($dir)) {
						// create if doesn't exists
						mkdir($dir, 0777, true);
					}
					// upload file
					if(move_uploaded_file($_FILES['file-input']['tmp_name'], ($dir.'/img_'.time().'.jpg'))){
						// Success !!
						echo '<div class="alert alert-success" role="alert">';
							echo '<strong>File successfuly uploaded !</strong> ';
						echo '</div>';
					} else {
						//! Error handling for global errors
						echo '<div class="alert alert-danger" role="alert">';
							echo '<strong>[ERROR] Something went wrong</strong> ';
						echo '</div>';
					}
				}
			} else {
				//! Error handling for heavy files
				echo '<div class="alert alert-danger" role="alert">';
					echo '<strong>[ERROR] File too big (5MB max)</strong> ';
				echo '</div>';
			}
		} else {
			//! Error handling for global errors
			echo '<div class="alert alert-danger" role="alert">';
				echo '<strong>[ERROR] Could not find the file</strong> ';
			echo '</div>';
		}
		?>

		<?php
	}
?>

</div>
</body>
</html>


