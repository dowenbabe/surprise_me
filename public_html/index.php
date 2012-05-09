<?php

// Start their session
session_start();

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// connect to the database
	include_once "library/html/connect_to_database.php";
	
	// If the username and/or password wasn't provided
	if((!$username) || (!$password)){
		
		if(!$username){
		$errorMsg .= " Please provide your username.";
		}
		if(!$password){
		$errorMsg .= " Please provide your password.";
		}
	}
	else{
		
		// Check to see if the user exists and the password matches
		$username_check = mysql_query("SELECT * FROM myMembers WHERE username='$username'");
		$num_rows = mysql_num_rows($username_check);
		
		// if the user exists
		if($num_rows != 0){
			
			// Get the database's username and password
			while ($row = mysql_fetch_assoc($username_check)){
				$dbid = $row['id'];
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				$dbfirstname = $row['firstname'];
				$dblastname = $row['lastname'];
				
			}

			// If the username and password matched
			if(($username === $dbusername) && ($password == $dbpassword)){
				
				// Store their information is session variables
				$_SESSION['id'] = $dbid;
				$_SESSION['username'] = $dbusername;
				$_SESSION['password'] = $dbpassword;
				$_SESSION['first_name'] = $dbfirstname;
				$_SESSION['last_name'] = $dblastname;
				
				// Transfer user to the profile page
				header("location: library/html/profile.php?id=$dbid");
				exit();
			}
			else{
				// Invalid password
				$errorMsg .= " The password you provided is invalid. Please try again.";
			}
		}
		else{
			// The user doesn't exist
			$errorMsg .= " This user does not exist. Please try again.";
		}
	}
}
else{ // Put in the default variables
	$errorMsg = "";
	$username = "";
	$password = "";
}

/* Put in the coded password characters */

// Create arrays containing numbers and letters	
$alphabets = array("a", "b", "c", "d", "e","f","g","h","i","j");
$numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26");
	
// Shuffle the arrays
shuffle($alphabets);
shuffle($numbers);

echo ("<font size=\"3\" color=\"red\">");

// Put in the coded numbers (using alphabets)
echo (" <div style=\"position: absolute; top: 235; left: 100; width: 0px;\"> " . $alphabets[0] . "</div>" );
echo (" <div style=\"position: absolute; top: 235; left: 195; width: 0px;\"> " . $alphabets[1] . "</div>" );
echo (" <div style=\"position: absolute; top: 235; left: 290; width: 0px;\"> " . $alphabets[2] . "</div>" );

echo (" <div style=\"position: absolute; top: 299; left: 100; width: 0px;\"> " . $alphabets[3] . "</div>" );
echo (" <div style=\"position: absolute; top: 299; left: 195; width: 0px;\"> " . $alphabets[4] . "</div>" );
echo (" <div style=\"position: absolute; top: 299; left: 290; width: 0px;\"> " . $alphabets[5] . "</div>" );

echo (" <div style=\"position: absolute; top: 363; left: 100; width: 0px;\"> " . $alphabets[6] . "</div>" );
echo (" <div style=\"position: absolute; top: 363; left: 195; width: 0px;\"> " . $alphabets[7] . "</div>" );
echo (" <div style=\"position: absolute; top: 363; left: 290; width: 0px;\"> " . $alphabets[8] . "</div>" );

echo (" <div style=\"position: absolute; top: 427; left: 195; width: 0px;\"> " . $alphabets[9] . "</div>" );

// Put in the coded alphabets (using numbers)
echo (" <div style=\"position: absolute; top: 236; left: 711; width: 0px;\"> " . $numbers[0] . "</div>" );
echo (" <div style=\"position: absolute; top: 236; left: 806; width: 0px;\"> " . $numbers[1] . "</div>" );
echo (" <div style=\"position: absolute; top: 236; left: 901; width: 0px;\"> " . $numbers[2] . "</div>" );
echo (" <div style=\"position: absolute; top: 236; left: 996; width: 0px;\"> " . $numbers[3] . "</div>" );
echo (" <div style=\"position: absolute; top: 236; left: 1091; width: 0px;\"> " . $numbers[4] . "</div>" );
echo (" <div style=\"position: absolute; top: 236; left: 1186; width: 0px;\"> " . $numbers[5] . "</div>" );

echo (" <div style=\"position: absolute; top: 300; left: 711; width: 0px;\"> " . $numbers[6] . "</div>" );
echo (" <div style=\"position: absolute; top: 300; left: 806; width: 0px;\"> " . $numbers[7] . "</div>" );
echo (" <div style=\"position: absolute; top: 300; left: 901; width: 0px;\"> " . $numbers[8] . "</div>" );
echo (" <div style=\"position: absolute; top: 300; left: 996; width: 0px;\"> " . $numbers[9] . "</div>" );
echo (" <div style=\"position: absolute; top: 300; left: 1091; width: 0px;\"> " . $numbers[10] . "</div>" );
echo (" <div style=\"position: absolute; top: 300; left: 1186; width: 0px;\"> " . $numbers[11] . "</div>" );

echo (" <div style=\"position: absolute; top: 364; left: 711; width: 0px;\"> " . $numbers[12] . "</div>" );
echo (" <div style=\"position: absolute; top: 364; left: 806; width: 0px;\"> " . $numbers[13] . "</div>" );
echo (" <div style=\"position: absolute; top: 364; left: 901; width: 0px;\"> " . $numbers[14] . "</div>" );
echo (" <div style=\"position: absolute; top: 364; left: 996; width: 0px;\"> " . $numbers[15] . "</div>" );
echo (" <div style=\"position: absolute; top: 364; left: 1091; width: 0px;\"> " . $numbers[16] . "</div>" );
echo (" <div style=\"position: absolute; top: 364; left: 1186; width: 0px;\"> " . $numbers[17] . "</div>" );

echo (" <div style=\"position: absolute; top: 428; left: 711; width: 0px;\"> " . $numbers[18] . "</div>" );
echo (" <div style=\"position: absolute; top: 428; left: 806; width: 0px;\"> " . $numbers[19] . "</div>" );
echo (" <div style=\"position: absolute; top: 428; left: 901; width: 0px;\"> " . $numbers[20] . "</div>" );
echo (" <div style=\"position: absolute; top: 428; left: 996; width: 0px;\"> " . $numbers[21] . "</div>" );
echo (" <div style=\"position: absolute; top: 428; left: 1091; width: 0px;\"> " . $numbers[22] . "</div>" );
echo (" <div style=\"position: absolute; top: 428; left: 1186; width: 0px;\"> " . $numbers[23] . "</div>" );

echo (" <div style=\"position: absolute; top: 492; left: 901; width: 0px;\"> " . $numbers[24] . "</div>" );
echo (" <div style=\"position: absolute; top: 492; left: 996; width: 0px;\"> " . $numbers[25] . "</div>" );
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Surprise Me</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="library/style/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include_once "library/html/header_template.php"; ?>
<table width="1330" align="center">
<tr>
<td height="560" bgcolor="#FFFFFF"><p><span class="textPurple"><strong>Login</strong></span></p>
  <form name="login_user" action="index.php" method="post" enctype="multipart/form-data" id="login_form">
    <table width="1000" align="center" cellpadding="5">
      <tr>
        <td width="160" bgcolor="#666666" class="colorWhite"><div align="right">Username:</div></td>
        <td width="314" bgcolor="#CCCCCC"><input name="username" type="text" id="username" size="40" /></td>
        <td width="160" bgcolor="#666666" class="colorWhite"><div align="right">Password:</div></td>
        <td width="314" bgcolor="#CCCCCC"><input name="password" type="text" id="password" size="40" /></td>
      </tr>
    </table>
    <table width="700" align="center">
      <tr>
        <td><div align="center"><font size="3" color="#FF0000"><?php print "$errorMsg"; ?> </font></div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="89%" height="322" align="center" class="button_text">
      <tr>
        <td width="8%"><div align="center">
          
          <span class="button_text">
          <input name="0" type="button" class="button_text" id="0" style="height: 60px; width: 90px" value="1" />
          </span></div></td>
        <td width="8%"><div align="center">
          
          <span class="button_text">
          <input name="04" type="button" class="button_text" id="04" style="height: 60px; width: 90px" value="2" />
          </span></div></td>
        <td width="8%"><div align="center">
          
          <span class="button_text">
          <input name="08" type="button" class="button_text" id="08" style="height: 60px; width: 90px" value="3" />
          </span></div></td>
        <td width="8%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
        <td width="19%">&nbsp;</td>
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
        <td width="8%"><div align="center">
          <input name="077" type="button" class="button_text" id="077" style="height: 60px; width: 90px" value="f" />
        </div></td>
      </tr>
      <tr>
        <td><div align="center">
          
          <span class="button_text">
          <input name="02" type="button" class="button_text" id="02" style="height: 60px; width: 90px" value="4" />
          </span></div></td>
        <td><div align="center">
          
          <span class="button_text">
          <input name="05" type="button" class="button_text" id="05" style="height: 60px; width: 90px" value="5" />
          </span></div></td>
        <td><div align="center">
          
          <span class="button_text">
          <input name="09" type="button" class="button_text" id="09" style="height: 60px; width: 90px" value="6" />
          </span></div></td>
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
          
          <span class="button_text">
          <input name="03" type="button" class="button_text" id="03" style="height: 60px; width: 90px" value="7" />
          </span></div></td>
        <td><div align="center">
          
          <span class="button_text">
          <input name="06" type="button" class="button_text" id="06" style="height: 60px; width: 90px" value="8" />
          </span></div></td>
        <td><div align="center">
          
          <span class="button_text">
          <input name="010" type="button" class="button_text" id="010" style="height: 60px; width: 90px" value="9" />
          </span></div></td>
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
          
          <span class="button_text">
          <input name="07" type="button" class="button_text" id="07" style="height: 60px; width: 90px" value="0" />
          </span></div></td>
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
    <div align="center">
      <table width="218">
        <tr>
          <td width="68"><input type="submit" name="submit_button" id="submit_button" value="Login" /></td>
          <td width="138"><input type="reset" name="reset_button" id="reset_button" value="Reset" /></td>
          </tr>
    </table>
</div>
  </form></td>
</tr>
</table>

<!-- Draw the avatar over the generated table -->
<div id="avatar_animation" style="position: absolute; top: 405; left: 960; width: 0px;">
	<img src="library/images/avatar/default/avatar_facing_forward.gif" id="avatar" width="396" height="236" alt="">
</div>

<?php include_once "library/html/footer_template.php"; ?>

<script type="text/javascript">

/* Global variables */
var done = 0;
var doneU = 0;
var doneP = 0;
var prevChars = 0;
var currChars = 0;

/* Get the arrays */
numbers = <?php echo json_encode($numbers); ?>;
alphabets = <?php echo json_encode($alphabets); ?>;
var alphabets_keypad = new Array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
	
/* This will animate the avatar to point to the username textbox */
function username_animation(){
	
	d = document.getElementById('avatar_animation');
	d.style.left="-10";
	d.style.top="395";
	document.getElementById('avatar').width="1380";
	document.getElementById('avatar').height="245";
	document.getElementById('avatar').src="library/images/avatar/default/avatar_username.gif";
}

/* This will animate the avatar to point to the password textbox */
function password_animation(){
	
	d = document.getElementById('avatar_animation');
	document.getElementById('avatar').src="library/images/avatar/default/avatar_password.gif";
}

/* This will animate the avatar to log the user in */
function login_animation(){
	
	d = document.getElementById('avatar_animation');
	document.getElementById('avatar').src="library/images/avatar/default/avatar_click_login.gif";
}

function simulate_login(){
	document.login_user.submit();
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
			
					// Animate avatar to point to username textbox
					if((lines[i] == "username") && (done == 0)){
						username_animation();
						done = 1;
						break;
					}
				}
				if(done == 0){
					readFile();
				}
				else if(done == 1){
					readU();
				}
			}
		}
	}
	txtFile.send(null);
}


/* This is used to read in the file containing the shoppers password */
function readU(){

	var txtFile = new XMLHttpRequest();
	txtFile.open("GET", "http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/username.txt", true);

	txtFile.onreadystatechange = function() {

		if (txtFile.readyState === 4) {  				// Makes sure the document is ready to parse.
			if (txtFile.status === 200) {  				// Makes sure it's found the file.
				allText = txtFile.responseText;
				lines = txtFile.responseText.split(" "); 	// Will separate word into an array
			
				for(i=0; i<lines.length; i++){
			
					// Record the username
					if((lines[i] == "username") && (doneU == 0)){
						// Update the username textbox
						document.forms["login_user"].elements["username"].value = lines[i+1];
					}
					
					// Check if user is done
					else if((lines[i] == "enter") && (doneU == 0)){
						// Animate the avatar to point to the password textbox
						password_animation();
						doneU = 1;
						break;
					}
				}
				if(doneU == 0){
					readU();
				}
				else if(doneU == 1){
					readP();
				}
			}
		}
	}
	txtFile.send(null);
}

/* This is used to read in the file containing the shoppers password */
function readP(){

	var ValidChars = "0123456789";

	var txtFile = new XMLHttpRequest();
	txtFile.open("GET", "http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/password.txt", true);
	
	txtFile.onreadystatechange = function() {
	
		
	
		if (txtFile.readyState === 4) {  				// Makes sure the document is ready to parse.
			if (txtFile.status === 200) {  				// Makes sure it's found the file.
				allText = txtFile.responseText;
				lines = txtFile.responseText.split(" "); 	// Will separate word into an array
				
				for(i=0; i<lines.length; i++){
				
					//alert(lines.length);
						
					// Record the password
					if((lines[i] == "password") && (doneP == 0)){
					
						// Clear the textbox
						document.forms["login_user"].elements["password"].value = "";
					
						/* Update the counts */
						currChars = lines[i+1].length;
					
						for(j=0; j<lines[i+1].length; j++){
							
							var str = lines[i+1].charAt(j);
							
							// If the character is not a number
							if (ValidChars.indexOf(str) == -1) {
							
								/* Should be a function */
								// Loop through the enter alphabet array to find its position
								for(k=0; k<alphabets.length; k++){
							
									// Read in the value in the text box
									var astr = document.getElementById('password').value;
			
									if(alphabets[k] == lines[i+1].charAt(j)){
										k = k+1;
										if (k == 10)
											k = 0;		// Reset it to 0
											
										// Place that value in the text box
										document.forms["login_user"].elements["password"].value = astr.concat(k);
										prevChars++;										// Update the count
									}
								}
								/* End of function */
							}
							
							/* It must be a number */
							else {
							
								// Get at least the first number
								var theNum = lines[i+1].charAt(j);
								var theLetter = "";											// To store the corresponding letter
								
								// If it's a two digit number added
								if ((currChars - prevChars) == 2){
								
									// Get both numbers added
									theNum = lines[i+1].substr(-2);
								}
								
								/* Now get the position of the number the user said */
								// Loop through the enter numbers array to find its position
								for(m=0; m<numbers.length; m++){
								
									if(numbers[m] == theNum){
									
										// Then the number is at position m
										theLetter = alphabets_keypad[m];
										prevChars = currChars;								// Update the count
										break;												// Break out of the for-loop
									}
								}
								
								/* Update the password textbox */
								var astr = document.getElementById('password').value;		// Get the current value in the textbox
								document.forms["login_user"].elements["password"].value = astr.concat(theLetter);
							}
						}
					}
					else if((lines[i] == "enter") && (doneP == 0)){
						login_animation();
						setTimeout('simulate_login()', 4000);
						doneP = 1;
						break;
					}
				}
				if(doneP == 0)
					readP();
			}
		}
	}
	txtFile.send(null);
}

if(done == 0)
	readFile();			// Read the file containing the users initial command

</script>

</body>
</html>