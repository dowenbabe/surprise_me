<?php

/* Get the command */
$command = $_GET[command];

// If it contains a value, then update the textfile
if(isset ($command) == true){

	/* If user said log in, then the avatar should move to the username text field.
	   Write 'username' to the text file for animation
	 */
	if($command == 'log in')
	{
		$myFile = "communication.txt";
		$fh = fopen('communication.txt', 'w');
		fputs($fh, "username");
		fclose($fh);
	}
	/* Write 'password' to the text file for animation */
	else if($command == 'password'){
		$myFile = "communication.txt";
		$fh = fopen('communication.txt', 'w');
		fputs($fh, "password");
		fclose($fh);
	}
}

/* Get the username */
$username = $_GET[character];

// If it contains a value, then update the textfile
if(isset ($username) == true){

	/* Read the text file */
	$handle = @fopen("username.txt", "r");
	if ($handle) {
		while (!feof($handle)) {
			$buffer = fgets($handle);
			$exploded_data = explode(" ",$buffer);
		}
	fclose($handle);
	}

	if($username == 'remove')
	{
		$myFile = "username.txt";
		$fh = fopen('username.txt', 'w');
		
		$str = substr($exploded_data[1], 0, -1); 
		fputs($fh, "username ".$str);
		
		fclose($fh);
	
	}
	else if($username == 'enter')
	{
		/* Let avatar know user is done with his/her username */
		$myFile = "username.txt";
		$fh = fopen('username.txt', 'w');
		fputs($fh, "username ".$exploded_data[1]. " " .$username);
		fclose($fh);
	
	}
	else{

		/* Now, write back to the file */
		$myFile = "username.txt";
		$fh = fopen('username.txt', 'w');
		fputs($fh, "username ".$exploded_data[1].$username);
		fclose($fh);
	}
}

/* Get the password */
$password = $_GET[characterTwo];

// If it contains a value, then update the textfile
if(isset ($password) == true){

	/* Read the text file */
	$handle = @fopen("password.txt", "r");
	if ($handle) {
		while (!feof($handle)) {
			$buffer = fgets($handle);
			$exploded_data = explode(" ",$buffer);
		}
	fclose($handle);
	}

	if($password == 'remove')
	{
		$myFile = "password.txt";
		$fh = fopen('password.txt', 'w');
		
		$str = substr($exploded_data[1], 0, -1); 
		fputs($fh, "password ".$str);
		
		fclose($fh);
	
	}
	else if($password == 'enter')
	{
		/* Let avatar know user is done with his/her password */
		$myFile = "password.txt";
		$fh = fopen('password.txt', 'w');
		fputs($fh, "password ".$exploded_data[1]. " " .$password);
		fclose($fh);
	
	}
	else{

		/* Now, write back to the file */
		$myFile = "password.txt";
		$fh = fopen('password.txt', 'w');
		fputs($fh, "password ".$exploded_data[1].$password);
		fclose($fh);
	}
}
?>

<?xml version="1.0" encoding="UTF-8"?>
<vxml version = "2.1">

  <meta name="maintainer" content="YOUREMAILADDRESS@HERE.com"/>
  
  <form id="MainMenu">

    <!-- Ensure that the sales host cannot be interrupted until it is done speaking -->
    <property name="bargein" value="false"/>
    
    <field name="command">
	
		<prompt>
			<voice gender="male">
				Do you want to log in or create an account?
			</voice>
      </prompt>
	
	<!-- Define the grammar understood by this form -->
	<grammar type="text/gsl"> 
	  [
	  (create account) (log in)
	  ]
	</grammar>
	
	<noinput>
	  <voice gender="male"> I did not hear anything.  Do you want to log in or create an account? </voice>
	</noinput>
	
	<nomatch>
	  <voice gender="male"> I do not understand you. Please repeat yourself. </voice>
	</nomatch>
      </field>
	
	<!-- Check for what the user said -->
	<filled namelist="command">
	  <if cond="command == 'create account'">
	  
	    <prompt> <voice gender="male"> Sure, I'll take you to the create account page right away. </voice> </prompt>
		
		<!-- <submit namelist="command" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/welcome_writer.php"/> -->
		
		<elseif cond="command == 'log in'"/>
		
			<prompt> <voice gender="male"> Okay, let me help you log in. </voice> </prompt>
			<submit namelist="command" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#usernameOne"/>
		
	    <else/>
	    <prompt>
	      <voice gender="male"> Sorry. I can't handle your request. </voice>
	    </prompt>

	  </if>
	</filled>
  </form>

  <!-- Ask for users username -->
   <form id="usernameOne">
		<block>
		<break time="5s"/>  
		<voice gender="male"> Please spell your user name. </voice>	
		
		<!-- Go to form to listen to input -->
		<submit next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#usernameTwo"/>
		</block>
		
	</form>
  
  <!-- Get the username -->
   <form id="usernameTwo">
    
    <field name="character">
	
		<!-- Define the grammar understood by this form -->
		<grammar type="text/gsl"> 
			[
			a b c d e f g h i j k l m n o p q r s t u v w x y z enter remove exit
			]
		</grammar>
	
		<!-- If no input was heard -->
		<noinput>
			<voice gender="male"> I did not hear anything.  Please spell your user name. </voice>
		</noinput>
	
		<!-- If avatar doesn't understand what the user said -->
		<nomatch>
			<voice gender="male"> I do not understand you. What did you say? </voice>
		</nomatch>
	
	<!-- Update text file -->
	<filled namelist="character">
	
		<if cond="character == 'enter'">

			<prompt> <voice gender="male"> Okay, lets move on. </voice> </prompt>
			<submit namelist="character" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#passwordOne"/>
	
		<!-- Remove most recent character -->
		<elseif cond="character == 'remove'"/>
			
			<!-- Tell the program user wants to remove the last character he said -->
			<submit namelist="character" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#usernameTwo"/>
			
		<!-- End program -->
		<elseif cond="character == 'exit'"/>
			
			<prompt> <voice gender="male"> Goodbye. </voice> </prompt>
			
			<!-- Now, cleat the text files used -->
			<submit next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/clear_files_vxml.php"/>
			
		<else/>
			
			<!-- Go and write the letter said -->
			<submit namelist="character" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#usernameTwo"/>
		
		</if>
	</filled>
	</field>
  </form>
  
  <!-- Ask for users password -->
   <form id="passwordOne">
		<block>
		<voice gender="male"> Use the keypads below to communicate your password to me. Say help for more information. </voice>	
		
		<!-- Go to form to listen to input -->
		<submit next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#passwordTwo"/>
		</block>
		
	</form>
  
  <!-- Get the password -->
   <form id="passwordTwo">
    
    <field name="characterTwo">
	
		<!-- Define the grammar understood by this form -->
		<grammar type="text/gsl"> 
			[
			a b c d e f g h i j	
			0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25
			enter remove
			]
		</grammar>
	
		<!-- If no input was heard -->
		<noinput>
			<voice gender="male"> I did not hear anything.  What is your password? </voice>
		</noinput>
	
		<!-- If avatar doesn't understand what the user said -->
		<nomatch>
			<voice gender="male"> I do not understand you. What did you say? </voice>
		</nomatch>
	
	<!-- Update text file -->
	<filled namelist="characterTwo">
	
		<if cond="characterTwo == 'enter'">

			<prompt> <voice gender="male"> Please wait while I log you in. </voice> </prompt>
			
			<!-- Now, cleat the text files used -->
			<submit namelist="characterTwo" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#clearFiles"/>
	
		<!-- Remove most recent character -->
		<elseif cond="characterTwo == 'remove'"/>
			
			<!-- Tell the program user wants to remove the last character he said -->
			<submit namelist="characterTwo" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#passwordTwo"/>
			
		<else/>
			
			<!-- Go and write the letter said -->
			<submit namelist="characterTwo" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#passwordTwo"/>
		
		</if>
	</filled>
	</field>
  </form>
  
  <!-- Get the password -->
   <form id="clearFiles">
   
	<block>
		<break time="5s"/>
		<submit next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/clear_files_vxml.php"/>
	</block>
   
   </form>
</vxml>