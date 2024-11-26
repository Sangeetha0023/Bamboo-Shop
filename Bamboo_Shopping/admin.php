<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
if(isset($btnSubmit))
{
	if(trim($category)=="")
	{
	$msg="Enter the Category";
	}
	else
	{
$max_qry = mysql_query("select max(id) maxid from category");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	$rdate=date("Y-m-d");
	$pass=md5($pwd);
		$uqry="insert into category(id,category) values($id,'$category')";
		$res=mysql_query($uqry);
		if($res)
		{
		$msg="Added Successfully...";
		}
		else
		{
		$msg="Could not be stored!";
		}
	}

}
?>
<?php include("include/header.php"); ?>
<div class="main">

<?php include("include/link_admin.php"); ?>
<form id="form1" name="form1" method="post" action="">
  <table width="318" height="400" border="0" cellpadding="0" cellspacing="0" align="center">
    

    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p class="style1"><?php echo $msg; ?></p>
        <table width="292" height="124" border="0">
          <tr>
            <th colspan="2" bgcolor="#FFCC99">Add Category </th>
          </tr>
          <tr>
            <td width="132" bgcolor="#ECE9D8">Category Name </td>
            <td width="144" bgcolor="#ECE9D8"><input type="text" name="category" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#ECE9D8"><input type="submit" name="btnSubmit" value="Submit" /></td>
          </tr>
        </table>
        <blockquote>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
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
