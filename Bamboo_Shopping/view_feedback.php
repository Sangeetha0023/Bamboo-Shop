<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$gqry=mysql_query("select * from feedback");



?>
<?php include("include/header.php"); ?>
<div class="main">

<?php include("include/link_admin.php"); ?>
<form id="form1" name="form1" method="post" action="">
  <table width="318" height="400" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p><strong>Customer Requirement </strong></p>
        <p class="style1"><?php echo $msg; ?></p>
        <table width="76%" border="1">
          <tr>
            <th width="7%" class="subhead2">Sno</th>
            <th width="9%" class="subhead2">Customer Name </th>
            <th width="13%" class="subhead2">Requirement</th>
          </tr>
		  <?php $i=0;
		  while($grow=mysql_fetch_array($gqry))
		  { $i++;
		  ?>
          <tr>
            <td align="center" bgcolor="#FFF4EA"><?php echo $i; ?></td>
            <td align="center" bgcolor="#FFF4EA"><?php echo $grow['uname']; ?></td>
            <td align="center" bgcolor="#FFF4EA"><?php echo $grow['requirement']; ?></td>
          </tr>
		  <?php
		  }
		  ?>
        </table>
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
