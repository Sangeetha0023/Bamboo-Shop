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
		if($uname=="admin")
		{
			$qry = "select * from admin where username='$uname' && password='".md5($pwd)."'";
			$exe=mysql_query($qry);
			$row=mysql_fetch_array($exe);
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				$pur_qry=mysql_query("select max(pid) from user_purchase where uname='$uname'");
				$pur_max=mysql_fetch_array($pur_qry);
				$pm_row=$pur_max['max(pid)']+1;
				$_SESSION['purchase_id']=$pm_row;
				$_SESSION['uname']=$uname;
				header("location:admin.php");
				}
				else
				{
				$msg="Login Incorrect!";
				}
		}
		else
		{
			$qry = "select * from register where username='$uname' && password='".md5($pwd)."'";
			$exe=mysql_query($qry);
			$row=mysql_fetch_array($exe);
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				$pur_qry=mysql_query("select max(pid) from user_purchase where uname='$uname'");
				$pur_max=mysql_fetch_array($pur_qry);
				$pm_row=$pur_max['max(pid)']+1;
				$_SESSION['purchase_id']=$pm_row;
				
				$_SESSION['uname']=$uname;
				header("location:user_parchase_order.php");
				}
				else
				{
				$msg="Login Incorrect!";
				}	
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
            <td colspan="2" align="center" class="txt1"><strong>Login</strong></td>
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
                <input type="reset" name="Reset" value="Clear">
            </td>
        </tr>
    </table>
</div>


</body>
</html>
