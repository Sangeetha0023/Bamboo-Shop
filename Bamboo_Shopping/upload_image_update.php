<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$id = $_REQUEST['gid'];
$flname = $_FILES['myfile']['name'];
$fltmp = $_FILES['myfile']['tmp_name'];
$select = mysql_query("SELECT * FROM product WHERE id ='$id'") or die("query image field error".mysql_error());
$sel = mysql_query("SELECT * FROM product WHERE id ='$id'") or die("query image field error".mysql_error());
if(isset($butsub))
{
	if(empty($flname))
	{
	//$msg = "<font color='white'><strong>check upload image</strong></font>"; 
	$update = "UPDATE product SET price='$upice', quantity='$upqnt' WHERE id = '$id'";
	$upfol = mysql_query($update)or die("upadate error".mysql_error());
		if($upfol!=0)
		{
		header('Location:view_products.php');
		}
	}
	else
	{
	$update = "UPDATE product SET product_image='$flname', price='$upice', quantity='$upqnt' WHERE id = '$id'";
	$upfol = mysql_query($update)or die("upadate error".mysql_error());
		if($upfol!=0)
		{
		@move_uploaded_file($fltmp,"product/".$flname);
		header('Location:view_products.php');
		}
	}
}
?>
<?php include("include/header.php"); ?>
<div class="main">

<?php include("include/link_admin.php"); ?>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="318" height="400" border="0" cellpadding="0" cellspacing="0" align="center">
   
    <tr>
      <td>&nbsp;</td>
      <td><table width="200" border="0" align="center">
        <tr>
          <?php 
	$row = mysql_fetch_array($select);
	?>
          <td>&nbsp;</td>
          <td><img src="product/<?php echo $row['product_image']; ?>" alt="img" width="232" height="218" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>

          <td><?php echo $msg; ?></td>
        </tr>
        <tr>
          <td>upload file </td>
          <td><label>
            <input name="myfile" type="file" id="myfile"/>
          </label></td>
        </tr>
        <tr>
          <td>Update Price </td>
		  <?php		  $prow = mysql_fetch_array($sel); ?>
          <td><label>
            <input name="upice" type="text" id="upice" value="<?php echo $prow['price']; ?>"/>
          </label></td>
        </tr>
        <tr>
          <td><p>Update</p>
            <p>Quantity</p></td>
          <td><input name="upqnt" type="text" id="upqnt" value="<?php echo $prow['quantity']; ?>"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="butsub" type="submit" id="butsub" value="Update.." />
            &nbsp;&nbsp;&nbsp;
            <label>
            <input type="reset" name="Reset" value="Reset"  onclick="view_products.php"/>
            </label>
          </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><center><a href="view_products.php">Back
          <label></label>
      </a></center></td>
    </tr>
  </table>
</form>
</body>
</html>
