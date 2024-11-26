<?php
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
$msg="";

if(isset($btn))
{
$gqry=mysql_query("select * from product where product like '%$prd%' || Author like '%$prd%'");
$num=mysql_num_rows($gqry);
}

if(isset($submit))
{
$ins = mysql_query("insert into feedback(uname,requirement) values('$uname','$require')");
if($ins==1)
{
$msg = "Your requirement is successfully submitted..";
}

}

?>

<?php include("include/header.php"); ?>
<div class="main">

<?php include("include/link_user.php"); ?>
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <p class="txt1"><strong>Welcome <?php echo $uname; ?></strong></p>
        <p class="style1"><?php echo $msg; ?>
		<form name="form1" method="post" action="">
		  <table width="200" border="1">
		  <tr><td align="center" class="subhead">REQUIREMENT</td>
		  </tr>
            <tr>
              <td align="center"><textarea name="require" rows="4" cols="20"></textarea></td>
            </tr>
            <tr>
              <td align="center"><input type="submit" name="submit" value="Submit"></td>
            </tr>
          </table>
		
		</form></p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p></p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>

</body>
</html>
