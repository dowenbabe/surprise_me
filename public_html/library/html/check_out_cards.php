<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Check Out</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../style/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.colorBlack {
	color: #000;
}
-->
</style>
</head>
<body>
<?php include_once "header_template.php"; ?>
<p class="textPurple"><strong>Check Out</strong></p>
<table width="1330" align="center">
<tr>
<td bgcolor="#FFFFFF"><table width="400" border="0" cellspacing="3">
  <tr>
      <td height="229"><table width="400" border="0" cellspacing="0">
        <tr>
          <td bgcolor="#CCCCCC"><strong>Credit or Debit Cards</strong></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC">
		  <a href="http://savannah.cs.gwu.edu/~osukpoma/library/html/check_out_cards.php"><img src="../images/site images/cards.gif" width="96" height="97" alt="cards"></a>
		  </td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC" class="colorGray"><span class="colorBlack">Surprise Me accepts all major credit or debit cards</span></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="292"><table width="400" border="0" cellspacing="5">
        <tr>
          <td><strong>PayPal</strong></td>
        </tr>
        <tr>
          <td>
		  <a href="https://www.paypal.com" target="_blank"><img src="../images/site images/paypal.gif" width="156" height="36" alt="paypal"></a>
		  </td>
        </tr>
        <tr>
          <td class="colorGray">You can use PayPal to check out</td>
        </tr>
      </table></td>
    </tr>
  </table></td>
</tr>
</table>

<div style="position:absolute;bottom:400px;right:200px;">
  <table width="400" border="0" cellspacing="3">
    <tr>
      <td>Card Number</td>
      <td>Name on Card</td>
      <td>Expiration Date</td>
    </tr>
    <tr>
      <td><input type="text" name="card_number" /></td>
      <td><input type="text" name="name" /></td>
      <td><input type="text" name="exp_date" /></td>
    </tr>
  </table>
 </div>

 <div style="position:absolute;bottom:370px;right:200px;">
<button type="button">Enter</button>
</div>
 
<div style="position:absolute; bottom:280px; width: 988px; height: 6px; left: -240px;">
<hr width="50%" size="3">
</div>

<!-- Draw the avatar over the generated table -->
<div id="avatar_animation" style="position: absolute; top: 405px; left: 960px; width: 0px;">
	<img src="../images/avatar/default/avatar_facing_forward.gif" id="avatar" width="396" height="236" alt="">
</div>

<div style="position:absolute;bottom:0;">
<?php include_once "footer_template.php"; ?>
</div>

</body>
</html>
