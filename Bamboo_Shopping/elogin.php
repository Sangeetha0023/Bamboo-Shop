<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
if(isset($login))
{
 if(trim($uname=="")) { $msg = "Enter the Username"; }
 else if(trim($pwd=="")) { $msg = "Enter the Password"; }
	else
	{
		
		
			$qry = "select * from emp_register where username='$uname' && password='".md5($pwd)."'";
			$exe=mysql_query($qry);
			$row=mysql_fetch_array($exe);
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				
				$_SESSION['uname']=$uname;
				header("location:employee_view_product.php");
				}
				else
				{
				$msg="Login Incorrect!";
				}	
		
	}	
	
}//login


?>

<?php include("include/header.php"); ?>
<div class="main">

<?php include("include/link_home.php"); ?>
<form id="form1" name="form1" method="post" action="">

    <table width="318" height="400" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td colspan="2" align="center" class="txt1"><strong>Staff Login</strong></td>
        </tr>
        <tr>
            <td width="94" class="txt1">Username</td>
            <td width="90" class="txt1"><input type="text" name="uname" /></td>
        </tr>
        <tr>
            <td class="txt1">Password</td>
            <td class="txt1"><input type="password" name="pwd" /></td>
        </tr>
        <tr>
            <td width="94" class="txt1">&nbsp;</td>
            <td width="90" class="txt1">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="center" class="txt1">
                <input type="submit" name="login" value="Login" onClick="sendNumber()" />
                &nbsp;
                New Staff!<a href="empregister.php"> Register</a> Here,
            </td>
        </tr>
    </table>
</div>


</body>
</html>
