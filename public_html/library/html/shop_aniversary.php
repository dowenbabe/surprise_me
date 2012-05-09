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

$count = 1;
if($_POST['parse_var'] == "next"){

	// Get the new count
	$count = $_POST['count'];
}
else if($_POST['parse_var'] == "previous"){

	// Get the new count
	$count = $_POST['count'];
	$count = $count - 6;
}
else if($_POST['parse_var'] == "addToCart"){

	// Get the current count
	$count = $_POST['count'] - 3;
}

/* Retrieve items to be added to the database */
$items_to_cart = $_POST["items"];
$size = count($items_to_cart);

for($i = 0; $i < $size; $i ++){

	/* Get the price of the item */
	$sql_item_price = mysql_query("SELECT * FROM Items WHERE pic_name='$items_to_cart[$i]'");		// To get the price of the item
	
	$row_item_price = mysql_fetch_array($sql_item_price);
	$item_price = $row_item_price["Price"];
	$item_name = $row_item_price["Name"];

	/* Get the number of items in the cart */
	$sql_cart = mysql_query("SELECT * FROM cart_$username WHERE pic_name='$items_to_cart[$i]'");
	
	$row_cart = mysql_fetch_array($sql_cart);
	$num_results = mysql_num_rows($sql_cart);
	
	// If the item has already been added to the cart
	if ($num_results > 0){
		$item_count = $row_cart["item_count"];
		$item_count = $item_count + 1;
		
		// Update the count in the users cart database
		mysql_query("UPDATE cart_$username SET item_count='$item_count' WHERE pic_name='$items_to_cart[$i]'");
	}
	// Else, the is the first time it is being added
	else{
		$item_count = 1;
		
		// Insert the item into the users cart
		mysql_query("INSERT INTO cart_$username (pic_name, item_count, price, name) VALUES('$items_to_cart[$i]', '$item_count', '$item_price', '$item_name') ");
	}
}

/* Get first item to be displayed */
$sql1 = mysql_query("SELECT * FROM Items WHERE id='$count'");
while($row1 = mysql_fetch_array($sql1)){
	$item1_name = $row1["Name"];
	$item1_price = $row1["Price"];
	$item1_pic_name = $row1["pic_name"];
}
$image1_dir = "../images/site images/gifts_section/gift_items/$item1_pic_name";
$image1 = "<img src=\"$image1_dir\" />";

// Get the count of the item in the users cart
$sql1_cart = mysql_query("SELECT * FROM cart_$username WHERE pic_name='$item1_pic_name'");
$row1_cart = mysql_fetch_array($sql1_cart);
$num1_results = mysql_num_rows($sql1_cart);
	
// If the item has already been added to the cart
if ($num1_results > 0){
	$item1_count = $row1_cart["item_count"];
}
// Else, it has not been added to the database
else{
	$item1_count = 0;
}

/* Get second item to be displayed */
$count = $count + 1;					// Increment the count to get the next item
$sql2 = mysql_query("SELECT * FROM Items WHERE id='$count'");
while($row2 = mysql_fetch_array($sql2)){
	$item2_name = $row2["Name"];
	$item2_price = $row2["Price"];
	$item2_pic_name = $row2["pic_name"];
}
$image2_dir = "../images/site images/gifts_section/gift_items/$item2_pic_name";
$image2 = "<img src=\"$image2_dir\" />";

// Get the count of the item in the users cart
$sql2_cart = mysql_query("SELECT * FROM cart_$username WHERE pic_name='$item2_pic_name'");
$row2_cart = mysql_fetch_array($sql2_cart);
$num2_results = mysql_num_rows($sql2_cart);
	
// If the item has already been added to the cart
if ($num2_results > 0){
	$item2_count = $row2_cart["item_count"];
}
// Else, it has not been added to the database
else{
	$item2_count = 0;
}

/* Get first item to be displayed */
$count = $count + 1;					// Increment the count to get the next item
$sql3 = mysql_query("SELECT * FROM Items WHERE id='$count'");
while($row3 = mysql_fetch_array($sql3)){
	$item3_name = $row3["Name"];
	$item3_price = $row3["Price"];
	$item3_pic_name = $row3["pic_name"];
}
$image3_dir = "../images/site images/gifts_section/gift_items/$item3_pic_name";
$image3 = "<img src=\"$image3_dir\" />";

// Get the count of the item in the users cart
$sql3_cart = mysql_query("SELECT * FROM cart_$username WHERE pic_name='$item3_pic_name'");
$row3_cart = mysql_fetch_array($sql3_cart);
$num3_results = mysql_num_rows($sql3_cart);
	
// If the item has already been added to the cart
if ($num3_results > 0){
	$item3_count = $row3_cart["item_count"];
}
// Else, it has not been added to the database
else{
	$item3_count = 0;
}

$count = $count + 1;					// Increment the count to get the next item
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Wedding & Anniversary</title>
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
<p class="textPurple"><strong>Wedding & Anniversary</strong></p>
<table width="1300" height="478" border="0" align="center">
  <tr>
    <td width="852" height="88"><table width="1290" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="215" height="82" bgcolor="#FFFFFF"><div align="center">
		<a href="shop_valentines.php"><img src="../images/site images/gifts_section/gift_icons/valentines_icon.png" width="80" height="80" alt="valentines_day" /></a>
		</div></td>
        <td width="215" bgcolor="#CCCCCC"><div align="center">
		<a href="shop_aniversary.php"><img src="../images/site images/gifts_section/gift_icons/wedding_icon.png" width="108" height="51" alt="wedding" /></a>
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
    <td><table width="1290" border="0" align="center" cellspacing="3">
	<form action="shop_aniversary.php" enctype="multipart/form-data" method="post" name="addToCart" id="addToCart">
      <tr>
        <td width="422" height="350"><div align="center">
          <table width="400" height="274" border="0" cellspacing="6">
            <tr>
              <td height="20"><?php print"$item1_name"; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Price: <?php print"$item1_price"; ?></strong></td>
              </tr>
            <tr>
              <td height="144"><?php print"$image1"; ?></td>
              </tr>
            <tr>
              <td height="22">
			  <strong>In cart: <?php print"$item1_count"; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Add: </strong><input type="checkbox" name="items[]" value="<?php print"$item1_pic_name"; ?>" />
			  </td>
              </tr>
          </table>
        </div></td>
        <td width="421"><div align="center">
          <table width="400" height="274" border="0" cellspacing="6">
            <tr>
              <td height="20"><?php print"$item2_name"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Price: <?php print"$item2_price"; ?></strong></td>
            </tr>
            <tr>
              <td height="144"><?php print"$image2"; ?></td>
            </tr>
            <tr>
              <td height="22">
			  <strong>In cart: <?php print"$item2_count"; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Add: </strong><input type="checkbox" name="items[]" value="<?php print"$item2_pic_name"; ?>" />
			  </td>
            </tr>
          </table>
        </div></td>
        <td width="421"><div align="center">
          <table width="400" height="274" border="0" cellspacing="6">
            <tr>
              <td height="20"><?php print"$item3_name"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Price: <?php print"$item3_price"; ?></strong></td>
            </tr>
            <tr>
              <td height="144"><?php print"$image3"; ?></td>
            </tr>
            <tr>
              <td height="22">
			  <strong>In cart: <?php print"$item3_count"; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <strong>Add: </strong><input type="checkbox" name="items[]" value="<?php print"$item3_pic_name"; ?>" />
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <input name="parse_var" type="hidden" value="addToCart">	<!-- Let the page know what action is bein taken -->
			  </td>
            </tr>
			<input name="count" type="hidden" value="<?php print "$count"; ?>" />
			</form>
          </table>
        </div></td>
      </tr>
    </table>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<td>
	</td>
  </tr>
</table>
<p>&nbsp;</p>

<!-- Draw the avatar over the generated table -->
<div id="avatar_animation" style="position: absolute; top: 405px; left: 960px; width: 0px;">
	<img src="../images/avatar/default/avatar_facing_forward.gif" id="avatar" width="396" height="236" alt="">
</div>

<div id="buttons" style="position: absolute; top: 305px; left: 1300px; width: 0px;">
	<form action="shop_aniversary.php" enctype="multipart/form-data" method="post" name="next" id="previous">
	<input type="image" src="../images/site images/next.png" width="40" height="40" alt="next" />
	<input name="count" type="hidden" value="<?php print "$count"; ?>" />
	<input name="parse_var" type="hidden" value="next">	<!-- Let the page know what action is bein taken -->
	</form>
	
	<form action="shop_aniversary.php" enctype="multipart/form-data" method="post" name="next" id="previous">
    <input type="image" src="../images/site images/previous.png" width="40" height="40" alt="previous" />
	<input name="count" type="hidden" value="<?php print "$count"; ?>" />
	<input name="parse_var" type="hidden" value="previous">	<!-- Let the page know what action is bein taken -->
	</form>
</div>

<div id="buttons" style="position: absolute; top: 540px; left: 1175px; width: 0px;">
<input type="submit" onclick="document.addToCart.submit()" value="Add To Cart" />
</div>
<div style="position:absolute;bottom:0;">
<?php include_once "footer_template.php"; ?>
</div>

</body>
</html>