<?php

if(isset($_POST['first_name'])){
	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$password = $_POST['password'];
	
	// Connect to the database
	include_once "connect_to_database.php";
	
	// Ensure that this user doesn't already exisit
	$sql_username_check = ("SELECT username FROM myMembers WHERE username='$username'");
	$username_check = mysql_num_rows($sql_username_check);
	
	// Ensure that all necessary information has been entered
	if((!$first_name) || (!$last_name) || (!$username) || (!$password)){
		$errorMsg = "ERROR: Please provide your - ";
		
		if(!$first_name){
			$errorMsg .= " first name &nbsp &nbsp &nbsp";
		}
		if(!$last_name){
			$errorMsg .= ' last name &nbsp &nbsp &nbsp';
		}
		if(!$username){
			$errorMsg .= ' username &nbsp &nbsp &nbsp';
		}
		if(!$password){
			$errorMsg .= ' password &nbsp &nbsp &nbsp';
		}
		if(!$gender){
			$errorMsg .= ' gender &nbsp &nbsp &nbsp';
		}
	}
	else if($username_check > 0){
		$errorMsg = "<u>ERROR:</u> <br/>This user already exists. Please use a different username.";
	}
	else{ // Else, if everything works fine
	
		/* Create cart for the user
		$sql_cart = "CREATE TABLE member_$username(
			ID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			pic_name text,
			count int(11),
			)";

		// Execute query
		mysql_query($sql_cart); */
	
		/* Add the user to the myMembers database */
		$sql = mysql_query("INSERT INTO myMembers(firstname, lastname, username, birthday, email, gender, password)
		VALUES('$first_name', '$last_name', '$username', '$birthday', '$email', '$gender', '$password')")
		or die (mysql_error());
		
		// Grad the id that was assigned to the user
		$id = mysql_insert_id();
		
		// Create a new folder to hold that users files
		mkdir("../members/$id", 0777);
		
		// Now, tell the user to log in
		$msgToUser = "Thank you $first_name! Your account was successfully created";
		
		// Now, sink the thank you file into the registration form. i.e. the url will remain the same
		include_once "msgToUser.php";
		exit();
	}
}
else{ // Put in the default variables
	$errorMsg = "";
	$first_name = "";
	$last_name = "";
	$username = "";
	$birthday = "";
	$email = "";
	$gender = "";
	$password = "";
}

/* Put in the coded password characters */

// Create arrays containing numbers and letters	
$alphabets = array("a", "b", "c", "d", "e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26");
	
// Shuffle the arrays
shuffle($alphabets);
shuffle($numbers);

echo ("<font size=\"3\" color=\"red\">");

// Put in the coded numbers (using alphabets)
echo (" <div style=\"position: absolute; top: 260; left: 100; width: 0px;\"> " . $alphabets[0] . "</div>" );
echo (" <div style=\"position: absolute; top: 260; left: 195; width: 0px;\"> " . $alphabets[1] . "</div>" );
echo (" <div style=\"position: absolute; top: 260; left: 290; width: 0px;\"> " . $alphabets[2] . "</div>" );

echo (" <div style=\"position: absolute; top: 324; left: 100; width: 0px;\"> " . $alphabets[3] . "</div>" );
echo (" <div style=\"position: absolute; top: 324; left: 195; width: 0px;\"> " . $alphabets[4] . "</div>" );
echo (" <div style=\"position: absolute; top: 324; left: 290; width: 0px;\"> " . $alphabets[5] . "</div>" );

echo (" <div style=\"position: absolute; top: 388; left: 100; width: 0px;\"> " . $alphabets[6] . "</div>" );
echo (" <div style=\"position: absolute; top: 388; left: 195; width: 0px;\"> " . $alphabets[7] . "</div>" );
echo (" <div style=\"position: absolute; top: 388; left: 290; width: 0px;\"> " . $alphabets[8] . "</div>" );

echo (" <div style=\"position: absolute; top: 452; left: 195; width: 0px;\"> " . $alphabets[9] . "</div>" );

// Put in the coded alphabets (using numbers)
echo (" <div style=\"position: absolute; top: 261; left: 700; width: 0px;\"> " . $numbers[0] . "</div>" );
echo (" <div style=\"position: absolute; top: 261; left: 795; width: 0px;\"> " . $numbers[1] . "</div>" );
echo (" <div style=\"position: absolute; top: 261; left: 890; width: 0px;\"> " . $numbers[2] . "</div>" );
echo (" <div style=\"position: absolute; top: 261; left: 985; width: 0px;\"> " . $numbers[3] . "</div>" );
echo (" <div style=\"position: absolute; top: 261; left: 1080; width: 0px;\"> " . $numbers[4] . "</div>" );
echo (" <div style=\"position: absolute; top: 261; left: 1175; width: 0px;\"> " . $numbers[5] . "</div>" );

echo (" <div style=\"position: absolute; top: 325; left: 700; width: 0px;\"> " . $numbers[6] . "</div>" );
echo (" <div style=\"position: absolute; top: 325; left: 795; width: 0px;\"> " . $numbers[7] . "</div>" );
echo (" <div style=\"position: absolute; top: 325; left: 890; width: 0px;\"> " . $numbers[8] . "</div>" );
echo (" <div style=\"position: absolute; top: 325; left: 985; width: 0px;\"> " . $numbers[9] . "</div>" );
echo (" <div style=\"position: absolute; top: 325; left: 1080; width: 0px;\"> " . $numbers[10] . "</div>" );
echo (" <div style=\"position: absolute; top: 325; left: 1175; width: 0px;\"> " . $numbers[11] . "</div>" );

echo (" <div style=\"position: absolute; top: 389; left: 700; width: 0px;\"> " . $numbers[12] . "</div>" );
echo (" <div style=\"position: absolute; top: 389; left: 795; width: 0px;\"> " . $numbers[13] . "</div>" );
echo (" <div style=\"position: absolute; top: 389; left: 890; width: 0px;\"> " . $numbers[14] . "</div>" );
echo (" <div style=\"position: absolute; top: 389; left: 985; width: 0px;\"> " . $numbers[15] . "</div>" );
echo (" <div style=\"position: absolute; top: 389; left: 1080; width: 0px;\"> " . $numbers[16] . "</div>" );
echo (" <div style=\"position: absolute; top: 389; left: 1175; width: 0px;\"> " . $numbers[17] . "</div>" );

echo (" <div style=\"position: absolute; top: 453; left: 700; width: 0px;\"> " . $numbers[18] . "</div>" );
echo (" <div style=\"position: absolute; top: 453; left: 795; width: 0px;\"> " . $numbers[19] . "</div>" );
echo (" <div style=\"position: absolute; top: 453; left: 890; width: 0px;\"> " . $numbers[20] . "</div>" );
echo (" <div style=\"position: absolute; top: 453; left: 985; width: 0px;\"> " . $numbers[21] . "</div>" );
echo (" <div style=\"position: absolute; top: 453; left: 1080; width: 0px;\"> " . $numbers[22] . "</div>" );
echo (" <div style=\"position: absolute; top: 453; left: 1175; width: 0px;\"> " . $numbers[23] . "</div>" );

echo (" <div style=\"position: absolute; top: 517; left: 890; width: 0px;\"> " . $numbers[24] . "</div>" );
echo (" <div style=\"position: absolute; top: 517; left: 985; width: 0px;\"> " . $numbers[25] . "</div>" );
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Surprise Me - Registration</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../style/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.colorWhite {
	color: #FFF;
}
</style>
</head>
<body>
<?php include_once "header_template.php"; ?>
<table width="1330" align="center">
<tr>
<td height="560" bgcolor="#FFFFFF"><p class="textPurple"><strong>Create Account</strong></p>
  <form action="registration.php" method="post" enctype="multipart/form-data" id="registration_form">
    <table width="1000" align="center" cellpadding="5">
      <tr>
        <td bgcolor="#666666" class="colorWhite"><div align="right">First Name:</div></td>
        <td bgcolor="#CCCCCC"><input name="first_name" type="text" id="first_name" value="<?php print "$first_name"; ?>" size="40" /></td>
        <td bgcolor="#666666" class="colorWhite"><div align="right">Last Name:</div></td>
        <td bgcolor="#CCCCCC"><input name="last_name" type="text" id="last_name" value="<?php print "$last_name"; ?>" size="40" /></td>
      </tr>
      <tr>
        <td bgcolor="#666666" class="colorWhite"><div align="right">Username:</div></td>
        <td bgcolor="#CCCCCC"><input name="username" type="text" id="username" value="<?php print "$username"; ?>" size="40" /></td>
        <td bgcolor="#666666" class="colorWhite"><div align="right">Birthday:</div></td>
        <td bgcolor="#CCCCCC"><input name="birthday" type="text" id="birthday" value="<?php print "$birthday"; ?>" size="40" /></td>
      </tr>
      <tr>
        <td bgcolor="#666666" class="colorWhite"><div align="right">Email: </div></td>
        <td bgcolor="#CCCCCC"><input name="email" type="text" id="email" value="<?php print "$email"; ?>" size="40" /></td>
        <td bgcolor="#666666" class="colorWhite"><div align="right">Gender:</div></td>
        <td bgcolor="#CCCCCC"><input type="radio" name="gender" id="gender" value="m" />
          <label for="gender"></label>
male
 <input name="gender" type="radio" id="gender" value="f" />
<label for="female"></label>
female</td>
      </tr>
      <tr>
        <td bgcolor="#666666" class="colorWhite"><div align="right">Password:</div></td>
        <td bgcolor="#CCCCCC"><input name="password" type="text" id="password" value="<?php print "$password"; ?>" size="40" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
  </table>
    <table width="700" align="center">
      <tr>
        <td><font size="3" color="#FF0000"><?php print "$errorMsg"; ?> </font></td>
      </tr>
    </table>
    <table width="89%" height="322" align="center" class="button_text">
      <tr>
        <td width="8%"><div align="center">
          <input name="0" type="button" class="button_text" id="0" style="height: 60px; width: 90px" value="1" />
        </div></td>
        <td width="8%"><div align="center">
          <input name="04" type="button" class="button_text" id="04" style="height: 60px; width: 90px" value="2" />
        </div></td>
        <td width="8%"><div align="center">
          <input name="08" type="button" class="button_text" id="08" style="height: 60px; width: 90px" value="3" />
        </div></td>
        <td width="10%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
        <td width="16%">&nbsp;</td>
        <td width="8%"><div align="center">
          <input name="072" type="button" class="button_text" id="072" style="height: 60px; width: 90px" value="a" />
        </div></td>
        <td width="8%"><div align="center">
          <input name="073" type="button" class="button_text" id="073" style="height: 60px; width: 90px" value="b" />
        </div></td>
        <td width="8%"><div align="center">
          <input name="074" type="button" class="button_text" id="074" style="height: 60px; width: 90px" value="c" />
        </div></td>
        <td width="8%"><div align="center">
          <input name="075" type="button" class="button_text" id="075" style="height: 60px; width: 90px" value="d" />
        </div></td>
        <td width="8%"><div align="center">
          <input name="076" type="button" class="button_text" id="076" style="height: 60px; width: 90px" value="e" />
        </div></td>
        <td width="9%"><div align="center">
          <input name="077" type="button" class="button_text" id="077" style="height: 60px; width: 90px" value="f" />
        </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <input name="02" type="button" class="button_text" id="02" style="height: 60px; width: 90px" value="4" />
        </div></td>
        <td><div align="center">
          <input name="05" type="button" class="button_text" id="05" style="height: 60px; width: 90px" value="5" />
        </div></td>
        <td><div align="center">
          <input name="09" type="button" class="button_text" id="09" style="height: 60px; width: 90px" value="6" />
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center">
          <input name="078" type="button" class="button_text" id="078" style="height: 60px; width: 90px" value="g" />
        </div></td>
        <td><div align="center">
          <input name="0710" type="button" class="button_text" id="0710" style="height: 60px; width: 90px" value="h" />
        </div></td>
        <td><div align="center">
          <input name="079" type="button" class="button_text" id="079" style="height: 60px; width: 90px" value="i" />
        </div></td>
        <td><div align="center">
          <input name="0711" type="button" class="button_text" id="0711" style="height: 60px; width: 90px" value="j" />
        </div></td>
        <td><div align="center">
          <input name="0712" type="button" class="button_text" id="0712" style="height: 60px; width: 90px" value="k" />
        </div></td>
        <td><div align="center">
          <input name="0713" type="button" class="button_text" id="0713" style="height: 60px; width: 90px" value="l" />
        </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <input name="03" type="button" class="button_text" id="03" style="height: 60px; width: 90px" value="7" />
        </div></td>
        <td><div align="center">
          <input name="06" type="button" class="button_text" id="06" style="height: 60px; width: 90px" value="8" />
        </div></td>
        <td><div align="center">
          <input name="010" type="button" class="button_text" id="010" style="height: 60px; width: 90px" value="9" />
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center">
          <input name="0714" type="button" class="button_text" id="0714" style="height: 60px; width: 90px" value="m" />
        </div></td>
        <td><div align="center">
          <input name="0715" type="button" class="button_text" id="0715" style="height: 60px; width: 90px" value="n" />
        </div></td>
        <td><div align="center">
          <input name="0716" type="button" class="button_text" id="0716" style="height: 60px; width: 90px" value="o" />
        </div></td>
        <td><div align="center">
          <input name="0717" type="button" class="button_text" id="0717" style="height: 60px; width: 90px" value="p" />
        </div></td>
        <td><div align="center">
          <input name="0718" type="button" class="button_text" id="0718" style="height: 60px; width: 90px" value="q" />
        </div></td>
        <td><div align="center">
          <input name="0719" type="button" class="button_text" id="0719" style="height: 60px; width: 90px" value="r" />
        </div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
        <td><div align="center">
          <input name="07" type="button" class="button_text" id="07" style="height: 60px; width: 90px" value="0" />
        </div></td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center">
          <input name="0720" type="button" class="button_text" id="0720" style="height: 60px; width: 90px" value="s" />
        </div></td>
        <td><div align="center">
          <input name="0721" type="button" class="button_text" id="0721" style="height: 60px; width: 90px" value="t" />
        </div></td>
        <td><div align="center">
          <input name="0722" type="button" class="button_text" id="0722" style="height: 60px; width: 90px" value="u" />
        </div></td>
        <td><div align="center">
          <input name="0723" type="button" class="button_text" id="0723" style="height: 60px; width: 90px" value="v" />
        </div></td>
        <td><div align="center">
          <input name="0724" type="button" class="button_text" id="0724" style="height: 60px; width: 90px" value="w" />
        </div></td>
        <td><div align="center">
          <input name="0725" type="button" class="button_text" id="0725" style="height: 60px; width: 90px" value="x" />
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center">
          <input name="0726" type="button" class="button_text" id="0726" style="height: 60px; width: 90px" value="y" />
        </div></td>
        <td><div align="center">
          <input name="0727" type="button" class="button_text" id="0727" style="height: 60px; width: 90px" value="z" />
        </div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
      </tr>
  </table>
    <table width="250" align="center">
      <tr>
        <td><input type="submit" name="submit_button" id="submit_button" value="Create" /></td>
        <td><input type="reset" name="reset_button" id="reset_button" value="Reset" /></td>
      </tr>
</table>
  </form></td>
</tr>
</table>
<?php include_once "footer_template.php"; ?>
</body>
</html>
