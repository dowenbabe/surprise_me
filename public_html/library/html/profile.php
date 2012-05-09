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
	$status = $row["status"];
	
	/* Display the users image */
	$check_pic = "../members/$id/image01.jpg";
	
	// Place default picture based on uses gender
	if($gender == "m"){
		$default_pic = "../members/0/male.png";
	}
	else {
		$default_pic = "../members/0/female.png";
	}
	
	// Check if the user has uploaded a picture
	if(file_exists($check_pic)){
		$user_pic = "<img src=\"$check_pic\" width=\"100px\" />";
	}
	else{
		$user_pic = "<img src=\"$default_pic\" />";
	}
}

$msg = "";
$table_height = "160px";

/* Update the users picture */
if($_POST['parse_var'] == "pic"){
	$msg = "found";
	$table_height = "125px";
	
	if (!$_FILES['fileField']['tmp_name']) {
		$msg = '<font color="#FF0000">ERROR: Please select an image first before you press okay.</font>';
	}
	else{
		$maxfilesize = 51200; // 51200 bytes equals 50kb
		if($_FILES['fileField']['size'] > $maxfilesize ) {
		
			$msg = '<font color="#FF0000">ERROR: Your image is too large. Please try again.</font>';
			unlink($_FILES['fileField']['tmp_name']);
		}
		else if(!preg_match("/\.(gif|jpg|png)$/i", $_FILES['fileField']['name'] ) ) {
			$msg = '<font color="#FF0000">ERROR: Your image format cannot be accepted. Please try again.</font>';
			unlink($_FILES['fileField']['tmp_name']);
		}
		else{
			$newname = "image01.jpg";
            $place_file = move_uploaded_file( $_FILES['fileField']['tmp_name'], "../members/$id/".$newname);
			$msg = '<font color="#009900">Your image has been updated. It may take a few minutes for changes to be made.</font>';
		}
	
	}
}
else if($_POST['parse_var'] == "status"){

	// Get the new status
	$status = $_POST['status'];
	$update_status = mysql_query("UPDATE myMembers SET status='$status' WHERE id='$id'");
}
else if($_POST['parse_var'] == "about_me"){

	// Get the new status
	$bio_body = $_POST['new_about_me'];
	$update_bio_body = mysql_query("UPDATE myMembers SET bio_body='$bio_body' WHERE id='$id'");
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title><?php print "$firstname $lastname"; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../style/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include_once "header_template.php"; ?>

<table width="1330" align="center">
  <tr>
    <td><div align="center"><?php print "$welcome_msg"; ?></div></td>
  </tr>
<tr>
<td bgcolor="#FFFFFF"><p class="textPurple"><strong>Profile</strong></p>
  <p class="colorRed">
  <?php print "$msg"; ?>
  <table width="1300" align="center">
    <tr>
      <td width="203" height="148"><table width="203" height="98" cellpadding="12" align="left">
          <tr>
            <td height="24"><div align="center"><strong><?php print "$firstname $lastname"; ?></strong></div></td>
          </tr>
          <tr>
            <td height="31"><div align="center"><?php print "$user_pic"; ?></div></td>
          </tr>
          <tr>
		  
		  <!-- Put in a form to change the users picture -->
		  <form action="profile.php" enctype="multipart/form-data" method="post" name="pic1_form" id="pic1_form">
		  
            <td><div align="center">change picture &nbsp;
			<input type="image" src="../images/site images/yes.gif" width="20" height="17" alt="submit" />
			<input name="fileField" id="fileField" type="file" class="formFields" /> 50 kb max</div></td>
			<input name="parse_var" type="hidden" value="pic">	<!-- Let the page know what action is bein taken -->
			
			</form>
          </tr>
        </table></td>
      <td width="496">
	  <div style="width:1100px; height:215px; border:1px solid #C0C0C0;">
	  <table width="900" cellpadding="5" align="center">
          <tr>
		  
			<!-- Put in a form to change the users status -->
			<form action="profile.php" enctype="multipart/form-data" method="post" name="status_form" id="status_form">
		  
            <td width="1000"><tr><div style="width:1092px; height:50px; border:1px solid #C0C0C0; padding:3px;">
			  What are you thinking? &nbsp;&nbsp;
              <label>
                <input name="status" type="text" size="50" id="status" value="<?php print "$status"; ?>" /> &nbsp;
                <input type="image" src="../images/site images/update status.png" width="22" height="17" alt="update" /></label>
				<input name="parse_var" type="hidden" value="status">	<!-- Let the page know what action is bein taken -->
				
			</form>
				
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<a href="http://savannah.cs.gwu.edu/~osukpoma/library/html/cart.php">
				<img src="../images/site images/sCart.png" alt="cart" width="52" height="39" align="absmiddle" />
				</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="http://savannah.cs.gwu.edu/~osukpoma/library/html/notifications.php">
				<img src="../images/site images/notifications.png" alt="notifications" width="44" height="43" align="absbottom" />
				</a>
				</div></tr></td>
          </tr>
          <tr>
            <strong><p>&nbsp;&nbsp;&nbsp;About</p></strong>
              <p>&nbsp;&nbsp;&nbsp; <input type="image" src="../images/site images/edit.png" width="17" height="14" alt="edit" /> Birthday: <?php print "$birthday"; ?></p>
              <p>&nbsp;&nbsp;&nbsp; <input type="image" src="../images/site images/edit.png" width="17" height="14" alt="edit" /> Email: <?php print "$email"; ?></p>

			  <form action="profile.php" enctype="multipart/form-data" method="post" name="about_user" id="about_user">
              <p>&nbsp;&nbsp;&nbsp; 
			  <a href="#" onClick="javascript:opendialogbox();">
			  <img src="../images/site images/edit.png" width="17" height="14" alt="edit"/></a>
			  About: <input type="text" name="about_me" value="<?php print "$bio_body"; ?>" readonly="readonly" size="150" style="border: none"/></p>
			  <input name="parse_var" type="hidden" value="about_me">
			  <input name="new_about_me" type="hidden" value="">
			</form>
          </tr>
        </table></td></div>
    </tr>
  </table>
  <p></p>
  <div style="width:1317px; height:<?php print "$table_height"; ?>; border:1px solid #C0C0C0;">
  <table width="1320" align="center">
    <tr>
      <td><strong>Recent Activities</strong></td>
    </tr>
    <tr>
      <td><p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  </td>
    </tr>
  </table>
  </div>
  <p class="textPurple">&nbsp;</p>
  </td>
</tr>
</table>

<!-- Draw the avatar over the generated table -->
<div id="avatar_animation" style="position: absolute; top: 405px; left: 960px; width: 0px;">
	<img src="../images/avatar/default/avatar_facing_forward.gif" id="avatar" width="396" height="236" alt="">
</div>

<div style="position:absolute;bottom:0;">
<?php include_once "footer_template.php"; ?>
</div>
<script type="text/javascript">

function opendialogbox(){

	var original_str = document.about_user.about_me.value;
	var about=window.prompt("Write a quick note about yourself","");
	
	// If the user updated the string
	if(about){
		document.about_user.about_me.value = about;
		document.about_user.new_about_me.value = about;
	}
	// Else if the string is empty
	else{
		document.about_user.about_me.value = original_str;
		document.about_user.new_about_me.value = original_str;
	}
	document.forms["about_user"].submit();
}

</script>
</body>
</html>