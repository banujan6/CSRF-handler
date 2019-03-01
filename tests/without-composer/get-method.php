<?php
	//importing csrf handler
	require_once('lib\csrfhandler.php');
	use csrfhandler\csrf as csrf;
	
	//check for only get requests
	$isValid = csrf::get();
	
	if($isValid) {
		
		echo "Valid Token"; //show text when valid
		
	} else {
		
		echo "Invalid Token"; //show text when invalid
		
	}
?>

<div>
	<!-- Simple form to make GET requests -->
	<form method="get">
			yourname : <input type="text">
			<!-- inserting csrf token field -->
			<p>
				Refrest or Use developer tool to change the token in hidden field and test.
			</p>
			<input type="hidden" name="_token" value="<?php echo csrf::token()?>">
			<input type="submit" value="Submit">
	</form>
	
</div>

