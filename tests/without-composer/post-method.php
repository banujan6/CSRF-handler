<?php
	//importing csrf handler
	require_once('lib\csrfhandler.php');
	use csrfhandler\csrf as csrf;
	
	//check for only post requests
	$isValid = csrf::post();
	
	if($isValid) {
		
		echo "Valid Token"; //show text when valid
		
	} else {
		
		echo "Invalid Token"; //show text when invalid
		
	}
?>

<div>
	<!-- Simple form to make POST requests -->
	<form method="post">
			yourname : <input type="text">
			<p>
				Refrest or Use developer tool to change the token in hidden field and test.
			</p>
			<!-- inserting csrf token field -->
			<input type="hidden" name="_token" value="<?php echo csrf::token()?>">
			<input type="submit" value="Submit">
	</form>
	
</div>

