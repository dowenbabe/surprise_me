<?php

// Only run this script if the sendRequest is from our flash application
if ($_POST['sendRequest'] == "parse") {
	
	// Begin by starting the session
	session_start();

	// Check if the user has logged in
	if(isset($_SESSION['id'])){
		
		$username = $_SESSION['username'];
		$first_name = $_SESSION['first_name'];
		$last_name = $_SESSION['last_name'];
		print "var1=yes";					// Tell flash that the user is logged in
		print "&username=$username";		// Pass in the user's username
		print "&first_name=$first_name";	// Pass in the user's username
		print "&last_name=$last_name";		// Pass in the user's username
	}
	else{
		print "var1=no";					// Tell flash that the user not is logged in
	}
	exit();
}
?>