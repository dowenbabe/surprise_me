<?php

// Start the session
session_start();

if($_POST['post_code'] == "log_out"){
	
	// Destroy thr users session
	session_destroy();
}

/* Return the status of the logout script */
if(!session_is_registered('id')){
	print "replyMsg=success";
	exit();
} else{
	print "replyMsg=success";
	exit();
}
?>