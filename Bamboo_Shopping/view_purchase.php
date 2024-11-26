<?php
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
if(isset($btn))
{
$select = mysql_query("SELECT * FROM user_purchase where uname='$uname' && status>=1 && day1=$day1 && month1='$month1' && year1=$year1 ORDER BY id DESC");
$num=mysql_num_rows($select);
}
?>

<?php include("include/header.php"); ?>
<div class="main">

<?php include("include/link_user.php"); ?>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <p class="txt1"><strong>Purchase Details </strong></p>
        <p class="txt1"><strong>Search by</strong>
          <select name="day1">
		  <option value="0">-DAY1-</option>
		  <?php
		  $dq=mysql_query("select distinct(day1) from user_purchase where uname='$uname'");
		  while($dr=mysql_fetch_array($dq))
		  {
		  ?>
		  <option <?php if($day1==$dr['day1']) echo "selected"; ?>><?php echo $dr['day1']; ?></option>
		  <?php
		  }
		  ?>
          </select>
          &nbsp;
          <select name="month1">
		   <option value="0">-MONTH1-</option>
		  <?php
		  $mq=mysql_query("select distinct(month1) from user_purchase where uname='$uname'");
		  while($mr=mysql_fetch_array($mq))
		  {
		  ?>
		  <option <?php if($month1==$mr['month1']) echo "selected"; ?>><?php echo $mr['month1']; ?></option>
		  <?php
		  }
		  ?>
          </select>
          &nbsp;
          <select name="year1">
		   <option value="0">-YEAR1-</option>
		  <?php
		  $yq=mysql_query("select distinct(year1) from user_purchase where uname='$uname'");
		  while($yr=mysql_fetch_array($yq))
		  {
		  ?>
		  <option <?php if($year1==$yr['year1']) echo "selected"; ?>><?php echo $yr['year1']; ?></option>
		  <?php
		  }
		  ?>
          </select>
          &nbsp;
          <input type="submit" name="btn" value="Submit">
        </p>
        <p class="txt1">
          <?php
	  if($num!=0)
	  {
	  ?>
        </p>
        <table width="70%" height="78" border="0" align="center">
          <tr align="center" bgcolor="#999999">
            <th scope="col">Sno:</th>
            <th scope="col"><LABEL for="checkbox_row_2">Catergory</LABEL></th>
            <th scope="col">Book Name </th>
            <th scope="col">Price</th>
            <th scope="col">quantity</th>
            <th scope="col">Amount</th>
            <th scope="col">Date / Time</th>
            <th scope="col">Delivery</th>
          </tr>
		  <?php
		  $p = 0;
		  while($row = mysql_fetch_array($select)){
		  $p++;
		  ?>
          <tr align="center" bgcolor="#CCCCFF">
            <td bgcolor="#FFFCFB"><?php echo $p; ?></td>
            <td bgcolor="#FFFCFB"><?php echo $row['catergory']; ?></td>
            <td bgcolor="#FFFCFB"><?php echo $row['pname']; ?></td>
            <td bgcolor="#FFFCFB"><?php echo $row['price']; ?></td>
            <td bgcolor="#FFFCFB"><?php echo $row['uqut']; ?></td>
            <td bgcolor="#FFFCFB"><?php  
			$total = $row['price'] * $row['uqut']; 
			echo $total;
			$tot[]=$total;
			?></td>
            <td bgcolor="#FFFCFB"><?php echo $row['rdate']; ?></td>
            <td bgcolor="#FFFCFB"><?php
			if($row['status']=="2")
			{
			echo "Delivered";
			}
			else
			{
			echo "Not Delivered";
			}
			?></td>
          </tr>
		  <?php
		  }
		  ?>
        </table>
		<?php
		}
		else
		{
		echo '<p class="style1">No data Found!</p>';
		}
		?>
        <p>&nbsp;</p>
		<p>&nbsp;</p>
      <p>&nbsp;</p>
      <p></p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>