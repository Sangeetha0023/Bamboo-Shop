<?php
include("include/dbconnect.php");
extract($_POST);
$msg="";
if(isset($register))
{
 if(trim($name)=="") { $msg = "Enter the Name..."; }
 else if(trim($contact)=="") { $msg = "Enter the Contact No."; }
 else if(trim($email)=="") { $msg = "Enter the E-mail..."; }
 else if(trim($uname)=="") { $msg = "Enter the Username"; }
 else if(trim($pwd)=="") { $msg = "Enter the Password"; }
 else if(trim($cpass)=="") { $msg = "Enter the Confirm Password"; }
 else if($pwd!=$cpass) { $msg = "Both Password are not equal!"; }
	else
	{
	$max_qry = mysql_query("select max(id) maxid from emp_register");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	$rdate=date("Y-m-d");
$pass=md5($pwd);
		$uqry="insert into emp_register(id,name,gender,address,pincode,contact,email,bank_name,acc_no,username,password,rdate) values($id,'$name','$gender','$address','$pincode',$contact,'$email','$bank_name','$acc_no','$uname','$pass','$rdate')";
		$res=mysql_query($uqry);
		if($res)
		{
		$msg="stored!";
		}
		else
		{
		$msg="Could not be stored!";
		}
	}	
	
}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
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
<script language="javascript">
function validate()
{
	if(isNaN(document.form1.pincode.value))
	{
	alert("Invalid Pincode!");
	document.form1.pincode.select();
	return false;
	}
	if(isNaN(document.form1.contact.value))
	{
	alert("Invalid Mobile No!");
	document.form1.contact.select();
	return false;
	}
	if(isNaN(document.form1.acc_no.value))
	{
	alert("Invalid Account No!");
	document.form1.acc_no.select();
	return false;
	}
return true;	
}
</script>
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
<div class="main">

<?php include("include/link_home.php"); ?>
<form id="form1" name="form1" method="post" action="">
  <table width="318" height="400" border="0" cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="center"><p>&nbsp;</p>
        <p class="style1 style2"><?php echo $msg; ?></p>
        <table width="405" height="360" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2" align="center"><strong>Staff Registration </strong></td>
          </tr>
          <tr>
            <td width="162">Name</td>
            <td width="162"><input type="text" name="name" value="<?php echo $_POST['name']; ?>"></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td><input name="gender" type="radio" value="Male">
              Male
                <input name="gender" type="radio" value="Female">
            Female</td>
          </tr>
          <tr>
            <td>Address</td>
            <td><textarea name="address"><?php echo $_POST['address']; ?></textarea></td>
          </tr>
          <tr>
            <td>Pincode</td>
            <td><input type="text" name="pincode" value="<?php echo $_POST['pincode']; ?>"></td>
          </tr>
          <tr>
            <td>Mobile No. </td>
            <td><input type="text" name="contact" value="<?php echo $_POST['contact']; ?>"></td>
          </tr>
          <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" value="<?php echo $_POST['email']; ?>"></td>
          </tr>
          <tr>
            <td>Bank Name </td>
            <td><select name="bank_name">
              <option>SBI</option>
              <option>Indian Bank</option>
              <option>IOB</option>
              <option>KVB</option>
              <option>LVB</option>
              <option>Canera</option>
              <option>CUB</option>
            </select></td>
          </tr>
          <tr>
            <td>Account No. </td>
            <td><input type="text" name="acc_no" value="<?php echo $_POST['acc_no']; ?>"></td>
          </tr>

         
          <tr>
            <td>Username</td>
            <td><input type="text" name="uname" value="<?php echo $_POST['uname']; ?>" /></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="pwd" value="<?php echo $_POST['pwd']; ?>" /></td>
          </tr>
          <tr>
            <td>Confirm Password </td>
            <td><input type="password" name="cpass" value="<?php echo $_POST['cpass']; ?>"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="register" value="Register" onClick="return validate()" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
