<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$gqry=mysql_query("select * from product");
?>
<?php include("include/header.php"); ?>
<div class="main">

<?php include("include/link_user.php"); ?>
<form id="form1" name="form1" method="post" action="">
  <table width="50%" height="400" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p><strong>Full Product Details </strong></p>
        <p class="style1"><?php echo $msg; ?></p>
        <table width="76%" border="0">
          <tr bgcolor="#999999">
            <th width="9%">Sno</th>
            <th width="15%">Product</th>
            <th width="11%">Price</th>
            <th width="17%">Quantity</th>
            <th width="19%">Product Image </th>
            <th width="29%">Add to Cart </th>
		  </tr>
		  <?php $i=0;
		  while($grow=mysql_fetch_array($gqry))
		  { $i++;
		  ?>
          <tr bgcolor="#99CCCC">
            <td align="center" bgcolor="#FFF8F0"><?php echo $i; ?></td>
            <td align="center" bgcolor="#FFF8F0"><?php echo $grow['product']; ?></td>
            <td align="center" bgcolor="#FFF8F0"><?php echo $grow['price']; ?></td>
            <td align="center" bgcolor="#FFF8F0"><?php echo $grow['quantity']; ?></td>
            <td align="center" bgcolor="#FFF8F0"><img src="product/<?php echo $grow['product_image']; ?>" alt="img" width="42" height="42" /></td>
            <td align="center" bgcolor="#FFF8F0"><a href="user_purchase_part.php?gid=<?php echo $grow['id']; ?>">Add to Cart</a></td>
		  </tr>
		  <?php
		  }
		  ?>
		  <tr>
		  <td colspan="6" align="center">&nbsp;</td>
		  </tr>
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
