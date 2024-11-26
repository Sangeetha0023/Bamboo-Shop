<?php

include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
?>

<?php include("include/header.php"); ?>
<div class="main">

<?php include("include/link_admin.php"); ?>
<table width="318" height="400" border="0" cellpadding="0" cellspacing="0" align="center">

    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p class="style1"><form id="form1" name="form1" method="post" action="">
          <select name="day1">
            <option value="">-All-</option>
            <?php
			$dq3=mysql_query("select distinct(day1) from user_purchase where day1!=0");
			while($dr3=mysql_fetch_array($dq3))
			{
			?>
            <option <?php if($dr3['day1']==$day1) echo "selected"; ?>><?php echo $dr3['day1']; ?></option>
            <?php
			}
			?>
          </select>
&nbsp;
<select name="month1">
  <option value="">-All-</option>
  <?php
			$dq1=mysql_query("select distinct(month1) from user_purchase ");
			while($dr1=mysql_fetch_array($dq1))
			{
			?>
  <option <?php if($dr1['month1']==$month1) echo "selected"; ?>><?php echo $dr1['month1']; ?></option>
  <?php
			}
			?>
</select>
&nbsp;
<select name="year1">
  <option value="">-All-</option>
  <?php
			$dq2=mysql_query("select distinct(year1) from user_purchase where year1!=0");
			while($dr2=mysql_fetch_array($dq2))
			{
			?>
  <option <?php if($dr2['year1']==$year1) echo "selected"; ?>><?php echo $dr2['year1']; ?></option>
  <?php
			}
			?>
</select>
&nbsp;
<input type="submit" name="btn" value="Submit" />
</form>
        </p>
        <p class="style1">&nbsp;</p>
        <p class="style1"><?php echo $msg; ?></p>
        <table width="646" height="99" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <th height="39" colspan="5" scope="col"><span class="style3">Total Sales Report </span></th>
          </tr>
          <tr>
            <th width="150" height="29" scope="col">Product Name </th>
            <th width="162" scope="col">No. of quantity </th>
            <th width="162" scope="col">Price</th>
            <th width="162" scope="col">Total Price</th>
          </tr>
		
		<?php
		  if(isset($btn))
		  {
		  				if($day1!="" && $month1!="" && $year1!="")
						{
$qry="select * from user_purchase where day1='$day1' && month1='$month1' && year1='$year1' order by id desc";
						}
						else if($month1!="" && $year1!="")
						{
$qry="select * from user_purchase where month1='$month1' && year1='$year1' order by id desc";						
						}
						else
						{
						$qry="select * from user_purchase where year1='$year1' order by id desc";	
						}
     $result=mysql_query($qry);
	 
	 

while($row=mysql_fetch_array($result))
{
$tot=$row['uqut']*$row['price'];

?>
       
          <tr>
            <td height="29"><?php echo $row['pname']; ?></td>
            <td align="center"><?php echo $row['uqut']; ?></td>
            <td align="center"><?php echo $row['price']; ?></td>
            <td align="center"><?php echo $tot; ?></td>
          </tr>
		  <?php
		
		}}
		
		?>
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


</body>
</html>










