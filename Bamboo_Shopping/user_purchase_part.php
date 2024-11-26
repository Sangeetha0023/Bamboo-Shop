<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$id = $_REQUEST['gid'];

$select = mysql_query("SELECT * FROM product WHERE id ='$id'") or die("query image field error".mysql_error());
$sea = mysql_query("SELECT * FROM product WHERE id ='$id'") or die("query image field error".mysql_error());
$prow = mysql_fetch_array($sea);
///////////
$cal = mysql_query("SELECT * FROM product WHERE id ='$id'")or die("".mysql_error());
$cals = mysql_fetch_array($cal);
$tot_qty=$cals['quantity'];
$pur_id=$_SESSION['purchase_id'];




$catid=$cals['catid'];
/////////////////////
if(isset($butsub)){

	if($tot_qty>0)
	{	
		if($tot_qty>=$uqut)
		{
$day1=date("d");
$month1=date("M");
$year1=date("Y");


$inspur_ord = mysql_query("INSERT INTO user_purchase(catergory,pname,author,price,uqut,uname,pid,nid,day1,month1,year1) VALUES('$catid','".$prow['product']."','".$prow['author']."',
'".$prow['price']."','$uqut','$uname',$pur_id,'".$prow['id']."',$day1,'$month1',$year1)");

/******************************************calculation work*************************************/

$total = $cals['quantity'] - $uqut;

$action  = mysql_query("UPDATE product SET quantity='$total' WHERE id='$id'")or die("update error".mysql_error());



if($inspur_ord != 0){
@header('Location:user_purch_view.php');
}
			}
			else
			{
			echo '<script language="">alert("Available only '.$tot_qty.' qunatity!")</script>';
			}
	}
	else
	{
	echo '<script language="">alert("You have could not purchase this product!")</script>';

	}

}
?>
<head>
<title><?php include("include/title.php"); ?></title>
<script language="javascript">
function validate()
{
	
	if(document.form1.uqut.value=="")
	{
	alert("Enter the Quantity");
	document.form1.uqut.focus();
	return false;
	}
	if(isNaN(document.form1.uqut.value))
	{
	alert("Invalid Value!");
	document.form1.uqut.select();
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

<?php include("include/link_user.php"); ?>
<form id="form1" name="form1" method="post" action="">
  <table width="318" height="400" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td bgcolor="#FFF1EA"><table width="200" border="0" align="center" cellpadding="10">
        <tr>
          <?php 
	$row = mysql_fetch_array($select);
	?>
          <td>&nbsp;</td>
          <td><img src="product/<?php echo $row['product_image']; ?>" alt="img" width="232" height="218" /></td>
        </tr>
        <tr>
          <td><strong>Catergory</strong></td>
          <td>
            <?php
			$cqry=mysql_query("select * from category where id=$catid");
			$crow=mysql_fetch_array($cqry);
		
			echo $crow['category'];
			?>			</td>
        </tr>
        <tr>
          <td><strong>Product Name </strong></td>
		   <td><label><?php echo $row['product']; ?></label></td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
          <td><strong>Price</strong></td>
		          <td><label><?php echo $row['price']; ?></label></td>
        </tr>
        <tr>
          <td><strong>Actual quntity </strong></td>
          <td><?php echo $row['quantity']; ?></td>
        </tr>
        <tr>
          <td><strong>quantity</strong></td>
          <td><input type="text" name="uqut" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="butsub" type="submit" id="butsub" value="Submit" onclick="return validate()" />
&nbsp;&nbsp;&nbsp;<a href="user_parchase_order.php">RETURN</a></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
