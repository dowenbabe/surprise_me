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
}

$count = 0;
if($_POST['parse_var'] == "next"){

	// Get the new count
	$count = $_POST['count'];
}
else if($_POST['parse_var'] == "previous"){

	// Get the new count
	$count = $_POST['count'];
	$count = $count - 6;
}
else if($_POST['parse_var'] == "removeFromCart"){

	// Get the current count
	$count = $_POST['count'] - 3;
	
	/* Retrieve items to be removed from the database */
	$items_to_cart = $_POST["items"];
	$size = count($items_to_cart);

	for($i = 0; $i < $size; $i ++){
	
		/* Get the count of the item in the database */
		$sql_remove = mysql_query("SELECT * FROM cart_$username WHERE pic_name='$items_to_cart[$i]'");
		while($row_remove = mysql_fetch_array($sql_remove)){
			$item_remove_count = $row_remove["item_count"];
		}
		
		/* Determine how many of the item to remove from the database */
		if($item_remove_count > 1){
			$new_count = $item_remove_count - 1;
			mysql_query("UPDATE cart_$username SET item_count='$new_count' WHERE pic_name='$items_to_cart[$i]'");
		} 
		// Else there is only one item in the database
		else{
		
		// Remove the item from the database
		mysql_query("DELETE FROM cart_$username WHERE pic_name='$items_to_cart[$i]'") ;
		}
	}
}

$var = $_POST['parse_var'];

/* Get array of ID in the cart */
$sql_id = mysql_query("SELECT * FROM cart_$username");
$ids = array();			// Array to store the ID's
while ($the_id = mysql_fetch_array($sql_id)) {
    $ids[] = $the_id["ID"];
}


/* Get first item to be displayed */
$sql1 = mysql_query("SELECT * FROM cart_$username WHERE id='$ids[$count]'");
while($row1 = mysql_fetch_array($sql1)){
	$item1_price = $row1["price"];
	$item1_name = $row1["name"];
	$item1_pic_name = $row1["pic_name"];
	$item1_count = $row1["item_count"];
}
$image1_dir = "../images/site images/gifts_section/gift_items/$item1_pic_name";
$image1 = "<img src=\"$image1_dir\" />";
$count = $count + 1;					// Increment the count to get the next item


/* Get second item to be displayed */
$sql2 = mysql_query("SELECT * FROM cart_$username WHERE id='$ids[$count]'");
while($row2 = mysql_fetch_array($sql2)){
	$item2_price = $row2["price"];
	$item2_name = $row2["name"];
	$item2_pic_name = $row2["pic_name"];
	$item2_count = $row2["item_count"];
}
$image2_dir = "../images/site images/gifts_section/gift_items/$item2_pic_name";
$image2 = "<img src=\"$image2_dir\" />";
$count = $count + 1;					// Increment the count to get the next item

/* Get third item to be displayed */
$sql3 = mysql_query("SELECT * FROM cart_$username WHERE id='$ids[$count]'");
while($row3 = mysql_fetch_array($sql3)){
	$item3_price = $row3["price"];
	$item3_name = $row3["name"];
	$item3_pic_name = $row3["pic_name"];
	$item3_count = $row3["item_count"];
}
$image3_dir = "../images/site images/gifts_section/gift_items/$item3_pic_name";
$image3 = "<img src=\"$image3_dir\" />";
$count = $count + 1;					// Increment the count to get the next item
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title><?php print"$firstname"; ?>'s Cart</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../style/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include_once "header_template.php"; ?>
<p class="textPurple"><strong><?php print"$firstname"; ?>'s Cart</strong></p>
<table width="1330" align="center">
<tr>
<td bgcolor="#FFFFFF">
<table width="1290" border="0" align="center" cellspacing="3">
<form action="cart.php" enctype="multipart/form-data" method="post" name="displayCart" id="displayCart">
	<p>&nbsp;</p>
      <tr>
        <td width="422" height="350"><div align="center">
          <table width="400" height="274" border="0" cellspacing="6">
		  <?php if(isset($item1_name)){ ?>
            <tr>
              <td height="20"><?php print"$item1_name"; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Price: <?php print"$item1_price"; ?></strong></td>
              </tr>
            <tr>
              <td height="144"><?php print"$image1"; ?></td>
              </tr>
            <tr>
              <td height="22">
			  <strong>Quantity: <?php print"$item1_count"; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Remove: </strong><input type="checkbox" name="items[]" value="<?php print"$item1_pic_name"; ?>" />
			  </td>
              </tr>
			  <?php } ?>
          </table>
        </div></td>
        <td width="421"><div align="center">
          <table width="400" height="274" border="0" cellspacing="6">
		  <?php if(isset($item2_name)){ ?>
            <tr>
              <td height="20"><?php print"$item2_name"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Price: <?php print"$item2_price"; ?></strong></td>
            </tr>
            <tr>
              <td height="144"><?php print"$image2"; ?></td>
            </tr>
            <tr>
              <td height="22">
			  <strong>Quantity: <?php print"$item2_count"; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Remove: </strong><input type="checkbox" name="items[]" value="<?php print"$item2_pic_name"; ?>" />
			  </td>
            </tr>
			<?php } ?>
          </table>
        </div></td>
        <td width="421"><div align="center">
          <table width="400" height="274" border="0" cellspacing="6">
		  <?php if(isset($item3_name)){ ?>
            <tr>
              <td height="20"><?php print"$item3_name"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Price: <?php print"$item3_price"; ?></strong></td>
            </tr>
            <tr>
              <td height="144"><?php print"$image3"; ?></td>
            </tr>
            <tr>
              <td height="22">
			  <strong>Quantity: <?php print"$item3_count"; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Remove: </strong><input type="checkbox" name="items[]" value="<?php print"$item3_pic_name"; ?>" />
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  </td>
            </tr>
			<?php } ?>
			<input name="parse_var" type="hidden" value="removeFromCart">	<!-- Let the page know what action is bein taken -->
			<input name="count" type="hidden" value="<?php print "$count"; ?>" />
			</form>
          </table>
        </div></td>
			<td>
				<form action="cart.php" enctype="multipart/form-data" method="post" name="next" id="previous">
				<input type="image" src="../images/site images/next.png" width="40" height="40" alt="next" />
				<input name="count" type="hidden" value="<?php print "$count"; ?>" />
				<input name="parse_var" type="hidden" value="next">	<!-- Let the page know what action is bein taken -->
				</form>
				
				<form action="cart.php" enctype="multipart/form-data" method="post" name="next" id="previous">
				<input type="image" src="../images/site images/previous.png" width="40" height="40" alt="previous" />
				<input name="count" type="hidden" value="<?php print "$count"; ?>" />
				<input name="parse_var" type="hidden" value="previous">	<!-- Let the page know what action is bein taken -->
				</form>
			</td>
      </tr>
    </table>
</td>
</tr>
</table>

<div style="position:absolute;bottom:400px;right:45px;">
<input type="submit" onclick="document.displayCart.submit()" value="Go" />
</div>

<div style="position:absolute;bottom:520px;right:45px;">
	<input type="image" src="../images/site images/check_out.png" alt="check_out" onclick="parent.location='check_out.php'" />
</div>

<!-- Draw the avatar over the generated table -->
<div id="avatar_animation" style="position: absolute; top: 405px; left: 960px; width: 0px;">
	<img src="../images/avatar/default/avatar_facing_forward.gif" id="avatar" width="396" height="236" alt="">
</div>

<div style="position:absolute;bottom:0;">
<?php include_once "footer_template.php"; ?>
</div>

</form>

</body>
</html>
