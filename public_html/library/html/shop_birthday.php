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
    <title>Birthday Wishes</title>
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
<p class="textPurple"><strong>Birthday Wishes</strong></p>
<table width="1300" height="478" border="0" align="center">
  <tr>
    <td width="852" height="88"><table width="1290" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="215" height="82" bgcolor="#FFFFFF"><div align="center">
		<a href="shop_valentines.php"><img src="../images/site images/gifts_section/gift_icons/valentines_icon.png" width="80" height="80" alt="valentines_day" /></a>
		</div></td>
        <td width="215" bgcolor="#FFFFFF"><div align="center">
		<a href="shop_aniversary.php"><img src="../images/site images/gifts_section/gift_icons/wedding_icon.png" width="108" height="51" alt="wedding" /></a>
		</div></td>
        <td width="215" bgcolor="#FFFFFF"><div align="center">
		<a href="shop_christmas.php"><img src="../images/site images/gifts_section/gift_icons/christmas_icon.png" width="56" height="80" alt="christmas" /></a>
		</div></td>
        <td width="215" bgcolor="#CCCCCC"><div align="center">
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

<div style="position:absolute;bottom:0;">
<?php include_once "footer_template.php"; ?>
</div>

</body>
</html>