<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
if(isset($btnSubmit))
{
	if(trim($product)=="") { $msg="Enter the Product Name.."; }
	else if(trim($price)=="") { $msg="Enter the Price.."; }
	else if(trim($quantity)=="") { $msg="Enter the Qunatity.."; }
	else
	{
$max_qry = mysql_query("select max(id) maxid from product");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
		$uqry="insert into product(id,catid,product,price,quantity) values('$id','$catid','$product',$price,$quantity)";
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
<head>
<title><?php include("include/title.php"); ?></title>
<script language="javascript">
function validate()
{
	if(isNaN(document.form1.price.value))
	{
	alert("Invalid value!");
	document.form1.price.select();
	return false;
	}
	if(isNaN(document.form1.quantity.value))
	{
	alert("Invalid value!");
	document.form1.quantity.select();
	return false;
	}
return true;	
}

</script>
<style>

		
.ban_sec {
  width: 100%;
}
.ban_img {
  width: 100%;
  position: relative;
}
.ban_img img {
  width: 100%;
}
.ban_text {
  position: absolute;
  top: 50%;
  left: 6%;
  -ms-transform: translateY(-50%);
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
}
.ban_text strong {
  font: 800 62.22px/70px "Montserrat", sans-serif;
  color: #fff;
  text-transform: uppercase;
}
.ban_text strong span {
  font: 400 44.44px/52px "Montserrat", sans-serif;
  letter-spacing: 3px;
}
.ban_text p {
  font: 400 25px/30px "Montserrat", sans-serif;
  color: #fff;
  margin: 7px 0 25px;
}
.ban_text a {
  display: inline-block;
  font: 800 19.39px/24px "Montserrat", sans-serif;
  background: #282828;
  border-radius: 26px;
  color: #fff;
  padding: 12px 28px;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  text-decoration:none;
}
.ban_text a:hover {
  background: #50af47;
}

@media (min-width: 1200px) and (max-width: 1399px) {
  .ban_text p {
    font-size: 21px;
  }
}

@media (min-width: 992px) and (max-width: 1199px) {
  .ban_text p {
    font-size: 17px;
  }
  .ban_text strong {
    font-size: 50px;
    line-height: 60px;
  }
  .ban_text strong span {
    font-size: 37px;
  }
  .ban_text a {
    font-size: 16px;
    line-height: 19px;
  }
}

@media only screen and (max-width: 991px) {
  .ban_text strong {
    font-size: 35px;
    line-height: 40px;
  }
  .ban_text strong span {
    font-size: 28px;
    line-height: 35px;
    letter-spacing: 2px;
  }
  .ban_text p {
    font-size: 14px;
    line-height: 20px;
  }
  .ban_text a {
    font-size: 13.39px;
    line-height: 15px;
  }
}
@media only screen and (max-width: 767px) {
  .ban_img img {
    min-height: 290px;
    object-fit: cover;
  }
}
@media only screen and (max-width: 575px) {
  .ban_text strong {
    background: rgba(0, 0, 0, 0.8);
    padding: 10px;
    width: 100%;
    display: block;
  }
}
@media only screen and (max-width: 480px) {
  .ban_text strong span {
    font-size: 22px;
    line-height: 31px;
    letter-spacing: 1px;
  }
  .ban_text {
    left: 2%;
  }
}

       
</style>
</head>

<body>
<section class="ban_sec">
		<div class="container">
			<div class="ban_img">
      <img src="sea1.jpg" alt="banner" border="0" style="height: 200px;">
				<div class="ban_text">
					<strong>
						<span></span><br> <?php include("include/title.php");?>
					</strong>
					
				</div>
			</div>
		</div>
	</section>
  <style type="text/css">
<!--
.style1 {
	font-family: "Times New Roman", Times, serif;
	background-color: #87CEEB;
}
.jack {
	background-color: #87CEEB;
}

.heading {
	text-align: center; /* Center-align the content */
}
-->
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="style1">
    <?php
	if($uname!="")
	{
	?>
	<tr>
      <td align="left">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="right"><strong>Welcome <?php echo $uname; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a></strong></td>
    </tr>
	<?php
	}
	?>
    <tr>
      <td>&nbsp;</td>
     
      <td align="right">&nbsp;</td>
    </tr>
</table>
<div class="main">

<?php include("include/link_admin.php"); ?>
<form id="form1" name="form1" method="post" action="">
  <table width="318" height="400" border="0" cellpadding="0" cellspacing="0" align="center">
    
    
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p class="style1"><?php echo $msg; ?></p>
        <table width="368" height="271" border="0">
          <tr>
            <th colspan="2" bgcolor="#FFCC99">Add Products </th>
          </tr>
          <tr>
            <td align="left" bgcolor="#ECE9D8">Category</td>
            <td align="left" bgcolor="#ECE9D8"><select>
			<?php
			$cqry=mysql_query("select * from category");
			while($crow=mysql_fetch_array($cqry))
			{
			?>
			<option value="<?php echo $crow['id']; ?>"><?php echo $crow['category']; ?></option>
			<?php
			}
			?>
            </select>            </td>
          </tr>
          <tr>
            <td width="132" align="left" bgcolor="#ECE9D8">Product Name </td>
            <td width="144" align="left" bgcolor="#ECE9D8"><input type="text" name="product" /></td>
          </tr>
          <tr></tr>
          <tr>
            <td align="left" bgcolor="#ECE9D8">Price</td>
            <td align="left" bgcolor="#ECE9D8"><input type="text" name="price" /></td>
          </tr>
          <tr>
            <td align="left" bgcolor="#ECE9D8">Quantity</td>
            <td align="left" bgcolor="#ECE9D8"><input type="text" name="quantity" /></td>
          </tr>
          <tr></tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#ECE9D8"><input type="submit" name="btnSubmit" value="Submit" onClick="return validate()" /></td>
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
