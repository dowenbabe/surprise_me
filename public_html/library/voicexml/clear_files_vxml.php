<?php

/* Clear current contents of the text files */
$myFile = "communication.txt";
$fh = fopen( $myFile, 'w' );
fclose($fh);

$myFile = "username.txt";
$fh = fopen( $myFile, 'w' );
fclose($fh);

$myFile = "password.txt";
$fh = fopen( $myFile, 'w' );
fclose($fh);
?>

<?xml version="1.0" encoding="UTF-8"?>
<vxml version = "2.1">

  <meta name="maintainer" content="YOUREMAILADDRESS@HERE.com"/>
 </vxml>