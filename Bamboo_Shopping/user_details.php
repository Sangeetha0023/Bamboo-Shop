<?php
include("include/protect.php");
include("include/dbconnect.php");
$select = mysql_query("SELECT * FROM register ORDER BY id DESC")or die("user registration error </br>".mysql_error());

?>
<?php include("include/header.php"); ?>
<div class="main">

<?php include("include/link_admin.php"); ?>
<form id="form1" name="form1" method="post" action="">
  <table width="318" height="400" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <h3>Customer Information </h3>
        <table width="85%" height="58" border="0" align="center">
          <tr bgcolor="#CC66CC">
		    <th bgcolor="#882D00" scope="col"><span class="style2">
		      <label for="checkbox_row_2">Sno:</label>
	        </span></th>
		    <th bgcolor="#882D00" scope="col"><span class="style2">
		      <label for="checkbox_row_2">Name</label>
	        </span></th>
		    <th bgcolor="#882D00" scope="col"><span class="style2">
		      <label for="checkbox_row_3">Gender</label>
	        </span></th>
		    <th bgcolor="#882D00" scope="col"><span class="style2">
		      <label for="checkbox_row_4">Address</label>
	        </span></th>
		    <th bgcolor="#882D00" scope="col"><span class="style2">
		      <label for="checkbox_row_5">Pincode</label>
	        </span></th>
		    <th bgcolor="#882D00" scope="col"><span class="style2">
		      <label for="checkbox_row_6">Contact No </label>
	        </span></th>
		    <th bgcolor="#882D00" scope="col"><span class="style2">
		      <label for="checkbox_row_7">Email Id </label>
	        </span></th>
		    <th bgcolor="#882D00" scope="col"><span class="style2">
		      <label for="checkbox_row_10">Username</label>
		      <label for="checkbox_row_8"></label>
	        </span></th>
		    <th bgcolor="#882D00" scope="col"><span class="style2">Register Date </span></th>
          </tr>
		  <?php
		  $r = 0;
		  while($rrow = mysql_fetch_array($select)){
		  $r++;
		  ?>
          <tr bgcolor="#CCCCFF">
            <td align="center" bgcolor="#FFFFFF"><?php echo $r; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rrow['name']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rrow['gender']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rrow['address']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rrow['pincode']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rrow['contact']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rrow['email']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rrow['username']; ?></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rrow['rdate']; ?></td>
          </tr>
		  <?php 
		  }
		  ?>
        </table>
        <p class="style1"> <h3>&nbsp;</h3>
        <p class="style1">&nbsp;</p>
        <blockquote>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </blockquote></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>
