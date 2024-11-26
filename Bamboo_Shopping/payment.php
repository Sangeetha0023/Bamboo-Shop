<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$sess_user=$_SESSION['uname'];
$admin_qry=mysql_query("select * from admin where username='admin'");
$admin_row=mysql_fetch_array($admin_qry);
$admin_acc=$admin_row['acc_no'];

$pur_id=$_REQUEST['pur_id'];
$uname=$_REQUEST['user'];
$uq=mysql_query("select * from register where username='$uname'");
$ur=mysql_fetch_array($uq);
$accno=$ur['acc_no'];
$otp1=$ur['otp'];
$mob=$ur['contact'];
//$mess="OTP=".$otp1;
/*if($_SESSION['sotp']=="1")
{

echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$mess.'&number=91'.$mob.'" style="display:block"></iframe>';
$_SESSION['sotp']="2";
}*/
if($sess_user==$_REQUEST['user'])
{
$pq=mysql_query("select * from user_purchase where uname='$uname' && pid=$pur_id && status=0");
	while($pr=mysql_fetch_array($pq))
	{	
	$total = $pr['price'] * $pr['uqut']; 
	$tot[]=$total;
	}
$amount=@array_sum($tot);	
}
if(isset($btnBuy))
{
$ukey=$_POST['ukey'];
/*	if($otp==$otp1)
	{*/
if($_POST['accno']==$accno)
	{
		$aq=mysql_query("select * from register where username='$uname'");
		$ar=mysql_fetch_array($aq);
		$bal_amt=$ar['amount'];
		$email=$ar['email'];
		$mobile=$ar['contact'];
		$accno1 = $ar['acc_no'];
		$message="Rs. $amount has received from your Account for Book Purchase";
		if($accno1!=$accno)
		{
		$msg = "Invalid Card No..";
		}else{
		
		$bal=$bal_amt-$amount;
		/*echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:block"></iframe>';*/
	
							
		//$up=mysql_query("update register set amount=$bal	 where username='$uname'");
		$up=mysql_query("update user_purchase set status=1 where pid=$pur_id");
		
		
		?>
		<script language="javascript">
		alert("You have paid successfully...");
		window.location.href="user_purch_view.php";
		</script>
		<?php
		
		}
		}
	else
	{
	?>
		<script language="javascript">
		alert("Invalid Account!");
		</script>
		<?php
	}
	
	
	}
	else
	{
?>
		
		<?php	
	}


?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<script language="javascript">
function validate()
{
	if(document.form1.bank.value=="")
	{
	alert("Enter the Bank Name...");
	document.form1.bank.focus();
	return false;
	}
	if(document.form1.accno.value=="")
	{
	alert("Enter the Account No.");
	document.form1.accno.focus();
	return false;
	}
	if(isNaN(document.form1.accno.value))
	{
	alert("Invalid Account No!");
	document.form1.accno.select();
	return false;
	}
	if(document.form1.creditno.value=="")
	{
	alert("Enter the Credi Card No.");
	document.form1.creditno.focus();
	return false;
	}
return true;	
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="26%" align="center" bgcolor="#E6EEFB" class="heading"><br />
      Online Payment </td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><p>&nbsp;</p>
        <p class="txt1">Registration</p>
        <p class="txt1"><?php echo $msg; ?></p>
        <table width="460" height="377" border="0" cellpadding="10" cellspacing="0">
          <tr>
            <td width="149">Bank Name </td>
            <td width="176"><select name="bank">
              <option>SBI</option>
              <option>Indian Bank</option>
              <option>IOB</option>
              <option>KVB</option>
              <option>LVB</option>
              <option>Canera</option>
              <option>CUB</option>
            </select>            </td>
          </tr>
          <tr>
            <td>Card No. </td>
            <td><input type="text" name="accno" /></td>
          </tr>
          <tr>
            <td>Month &amp; Year </td>
            <td><select name="month">
			<option>Jan</option>
			<option>Feb</option>
			<option>Mar</option>
			<option>Apr</option>
			<option>May</option>
			<option>Jun</option>
			<option>Jul</option>
			<option>Aug</option>
			<option>Sep</option>
			<option>Oct</option>
			<option>Nov</option>
			<option>Dec</option>
            </select>
            <input type="text" name="year" placeholder="Year" /></td>
          </tr>
          <tr>
            <td>CVV No. </td>
            <td><input type="text" name="creditno" /></td>
          </tr>
          <tr></tr>
          
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btnBuy" value="Buy Online" onClick="return validate()" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      <p><a href="<?php echo 'user_purch_view.php?user='.$uname; ?>">Go to Shopping</a></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
