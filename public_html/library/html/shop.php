<?php

session_start();

// connect to the database
include_once "connect_to_database.php";

/* Get the users id */
// If coming from login page
if($_GET['id']){

	$id = $_GET['id'];
}
else if(isset ($_SESSION['id'])){

	$id = $_SESSION['id'];
}
else {
	print "Important data to render this page is missing";
	exit();
}

/* Get the users information from the database */
$sql = mysql_query("SELECT * FROM myMembers WHERE id='$id'");

while($row = mysql_fetch_array($sql)){

	$username = $row["username"];
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$gender = $row["gender"];
	$birthday = $row["birthday"];
	$birthday = strftime("%b, %d, %Y", strtotime($birthday));
	$email = $row["email"];
	$bio_body = $row["bio_body"];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title><?php print "$firstname $lastname"; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../style/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.shop_header {
	color: #9000CE;
}

-->
</style>
</head>
<body>
<p>
  <?php include_once "header_template.php"; ?>
</p>
<p class="textPurple"><strong>uTalk, iShop</strong></p>
<table width="1300" height="478" border="0" align="center">
  <tr>
    <td width="852" height="88"><table width="1290" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="215" height="82" bgcolor="#FFFFFF"><div align="center">
		<a href="shop_valentines.php"><img src="../images/site images/gifts_section/gift_icons/valentines_icon.png" width="80" height="80" alt="valentines_day" /></a>
		</div></td>
        <td width="215" bgcolor="#FFFFFF"><div align="center">
		<a id="wedding" href="shop_aniversary.php"><img src="../images/site images/gifts_section/gift_icons/wedding_icon.png" width="108" height="51" alt="wedding" /></a>
		</div></td>
        <td width="215" bgcolor="#FFFFFF"><div align="center">
		<a href="shop_christmas.php"><img src="../images/site images/gifts_section/gift_icons/christmas_icon.png" width="56" height="80" alt="christmas" /></a>
		</div></td>
        <td width="215" bgcolor="#FFFFFF"><div align="center">
		<a href="shop_birthday.php"><img src="../images/site images/gifts_section/gift_icons/birthday_icon.png" width="44" height="80" alt="birthday" />
		</a></div></td>
        <td width="215" bgcolor="#FFFFFF"><div align="center">
		<a href="shop_baby_shower.php"><img src="../images/site images/gifts_section/gift_icons/baby_shower_icon.png" width="65" height="80" alt="baby_shower" /></a>
		</div></td>
                <td width="201" bgcolor="#FFFFFF"><div align="center">
		<a href="cart.php"><img src="../images/site images/sCart.png" width="99" height="76" alt="cart" /></a>
		</div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><div align="center"><p class="textPurple"><strong>Please select a department</strong></p></div></td>
  </tr>
</table>
<p>&nbsp;</p>

<!-- Draw the avatar over the generated table -->
<div id="avatar_animation" style="position: absolute; top: 405px; left: 960px; width: 0px;">
	<img src="../images/avatar/default/avatar_facing_forward.gif" id="avatar" width="396" height="236" alt="">
</div>

<div style="position:absolute;bottom:0;">
<?php include_once "footer_template.php"; ?>
</div>

<script type="text/javascript">
/* =========================== Avatar Animation =========================== */

var done = 0;

function wedding_animation(){
	d = document.getElementById('avatar_animation');
	d.style.left="5px";
	d.style.top="137px";
	document.getElementById('avatar').width="1380";
	document.getElementById('avatar').height="500";
	document.getElementById('avatar').src="../images/avatar/default/avatar_wedding.gif";
}

function simulate_wedding(){

	// Click on the wedding and anniversary link
	document.getElementById('wedding').click();
}

/* This is used to read in the file containing the shoppers account details */
function readFile(){
	
	var txtFile = new XMLHttpRequest();
	txtFile.open("GET", "http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/communication.txt", true);

	txtFile.onreadystatechange = function() {
		
		if (txtFile.readyState === 4) {  				// Makes sure the document is ready to parse.
			if (txtFile.status === 200) {  				// Makes sure it's found the file.
				allText = txtFile.responseText;
				lines = txtFile.responseText.split(" "); 	// Will separate word into an array
			
				for(i=0; i<lines.length; i++){
			
					if(lines[i] == "wedding"){
					
						// Animate the avatar
						wedding_animation();
						setTimeout('simulate_wedding()', 13000);
						done = 1;
						break;
					}
				}
				if(done == 0){
					readFile();
				}
			}
		}
	}
	txtFile.send(null);
}

// Run the function
readFile();
</script>
</body>
</html>