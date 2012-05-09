<?php

/* Get the command */
$command = $_GET[command];

// If it contains a value, then update the textfile
if(isset ($command) == true){

	/* If user said log in, then the avatar should move to the username text field.
	   Write 'username' to the text file for animation
	 */
	 
	if($command == 'wedding')
	{
		$myFile = "communication.txt";
		$fh = fopen('communication.txt', 'w');
		fputs($fh, "wedding a 0 b 0 c 0 next 0 prev 0");
		fclose($fh);
	} 
	else {
	
		/* Read the text file */
		$handle = @fopen("communication.txt", "r");
		if ($handle) {
			while (!feof($handle)) {
				$buffer = fgets($handle);
				$exploded_data = explode(" ",$buffer);
			}
		fclose($handle);
		}
	
		/* Update the count */
		$myFile = "communication.txt";
		$fh = fopen('communication.txt', 'w');
	
		if($command == '1'){
	
			$str_count = $exploded_data[2];				// Get the current count
			$int_count = intval($str_count, 0);			// Convert to integer
			$int_count = $int_count + 1;
		
			fputs($fh, $exploded_data[0]. " " . $exploded_data[1] . " " . $int_count . " " . $exploded_data[3] . " " . $exploded_data[4]. " " .
			$exploded_data[5] . " " .  $exploded_data[6]. " " . $exploded_data[7] . " " .  $exploded_data[8]. " " . $exploded_data[9] . " " .
			$exploded_data[10]);
		}
		if($command == '2'){
	
			$str_count = $exploded_data[4];				// Get the current count
			$int_count = intval($str_count, 0);			// Convert to integer
			$int_count = $int_count + 1;
		
			fputs($fh, $exploded_data[0]. " " . $exploded_data[1] . " " . $exploded_data[2] . " " . $exploded_data[3] . " " . $int_count . " " .
			$exploded_data[5] . " " .  $exploded_data[6]. " " . $exploded_data[7] . " " .  $exploded_data[8]. " " . $exploded_data[9] . " " .
			$exploded_data[10]);
		}
		if($command == '3'){
	
			$str_count = $exploded_data[6];				// Get the current count
			$int_count = intval($str_count, 0);			// Convert to integer
			$int_count = $int_count + 1;
		
			fputs($fh, $exploded_data[0]. " " . $exploded_data[1] . " " . $exploded_data[2] . " " . $exploded_data[3] . " " . $exploded_data[4]. " " .
			$exploded_data[5] . " " .  $int_count . " " . $exploded_data[7] . " " .  $exploded_data[8]. " " . $exploded_data[9] . " " .
			$exploded_data[10]);
		}
		if($command == 'next'){
	
			$str_count = $exploded_data[8];				// Get the current count
			$int_count = intval($str_count, 0);			// Convert to integer
			$int_count = $int_count + 1;
		
			fputs($fh, $exploded_data[0]. " " . $exploded_data[1] . " " . $exploded_data[2] . " " . $exploded_data[3] . " " . $exploded_data[4]. " " .
			$exploded_data[5] . " " .  $exploded_data[6]. " " . $exploded_data[7] . " " .  $int_count . " " . $exploded_data[9] . " " .
			$exploded_data[10]);
		}
		if($command == 'previous'){
	
			$str_count = $exploded_data[10];			// Get the current count
			$int_count = intval($str_count, 0);			// Convert to integer
			$int_count = $int_count + 1;
		
			fputs($fh, $exploded_data[0]. " " . $exploded_data[1] . " " . $exploded_data[2] . " " . $exploded_data[3] . " " . $exploded_data[4]. " " .
			$exploded_data[5] . " " .  $exploded_data[6]. " " . $exploded_data[7] . " " .  $exploded_data[8]. " " . $exploded_data[9] . " " .
			$int_count);
		}
		fclose($fh);
	}
}

// =============================================================
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
				Hello. Welcome to you talk i shop. What department would you like to visit today? You can say help for more information.
			</voice>
      </prompt>
	
	<!-- Define the grammar understood by this form -->
	<grammar type="text/gsl"> 
	  [
	  wedding cart
	  ]
	</grammar>
	
	<noinput>
	  <voice gender="male"> I did not hear anything.  WHat department would you like to visit? </voice>
	</noinput>
	
	<nomatch>
	  <voice gender="male"> I do not understand you. Please repeat yourself. </voice>
	</nomatch>
      </field>
	
	<!-- Check for what the user said -->
	<filled namelist="command">
	  <if cond="command == 'wedding'">
	  
	    <prompt> <voice gender="male"> Okay, Let me take you to the wedding and anniversary department. </voice> </prompt>
		
		<submit namelist="command" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/shop_vxml.php#weddingOne"/>
		
		<elseif cond="command == 'cart'"/>
		
			<prompt> <voice gender="male"> Alright. Lets head on on over to your cart. </voice> </prompt>
			<!--<submit namelist="command" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/index_vxml.php#usernameOne"/>-->
		
	    <else/>
	    <prompt>
	      <voice gender="male"> Sorry. I can't handle your request. </voice>
	    </prompt>

	  </if>
	</filled>
  </form>

    <!-- Introduction to wedding page -->
   <form id="weddingOne">
		<block>
		<break time="15s"/>  
		<voice gender="male"> What item would you like to add to your cart? You can say next to go to the next page. </voice>	
		
		<!-- Go to form to listen to input -->
		<submit next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/shop_vxml.php#weddingTwo"/>
		</block>
	</form>
	
   <!-- Wedding & Anniversary -->
   <form id="weddingTwo">
    
    <field name="command">
	
		<!-- Define the grammar understood by this form -->
		<grammar type="text/gsl"> 
			[
			1 2 3 next previous exit
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
	</field>
	
	<!-- Update text file -->
	<filled namelist="command">
	
		<if cond="command == '1'">

			<prompt> <voice gender="male"> Okay, I'll add the first item to your cart. </voice> </prompt>
			<submit namelist="command" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/shop_vxml.php#weddingTwo"/>
		<elseif cond="command == '2'"/>

			<prompt> <voice gender="male"> Sure, I'll add the second item. </voice> </prompt>
			<submit namelist="command" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/shop_vxml.php#weddingTwo"/>
		<elseif cond="command == '3'"/>

			<prompt> <voice gender="male"> No problem! I'll add the third item for you. </voice> </prompt>
			<submit namelist="command" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/shop_vxml.php#weddingTwo"/>
		<elseif cond="command == 'previous'"/>

			<prompt> <voice gender="male"> Sure, lets go to the previous page. </voice> </prompt>
			<submit namelist="command" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/shop_vxml.php#weddingTwo"/>
		<elseif cond="command == 'next'"/>

			<prompt> <voice gender="male"> Okay, let me take you to the next page. </voice> </prompt>
			<submit namelist="command" next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/shop_vxml.php#weddingTwo"/>
			
		<!-- End program -->
		<elseif cond="command == 'exit'"/>
			
			<prompt> <voice gender="male"> Goodbye. </voice> </prompt>
			
			<!-- Now, cleat the text files used -->
			<submit next="http://savannah.cs.gwu.edu/~osukpoma/library/voicexml/clear_files_vxml.php"/>
			
		</if>
	</filled>
  </form>
	
</vxml>