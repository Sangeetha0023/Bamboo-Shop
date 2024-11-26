<?php
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
$del = $_REQUEST['did'];
$qua =$_REQUEST['qua'];
$pid = $_REQUEST['id'];
extract($_POST);
$delet = mysql_query("DELETE FROM user_purchase WHERE id='$del'")or die("".mysql_error());
$update = mysql_query("update product set quantity=quantity+$qua where id='$pid'");
if($delet != 0)
{
@header('Location:user_purch_view.php');
}
?>