<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center" bgcolor="#E6EEFB" class="heading"><br />
          <img src="images/COD.jpg" width="704" height="227" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><p>&nbsp;</p>
          <p class="txt1">Cash on Delivery</p>
          <p class="txt1">Check your Details Below  </p>
          <p class="txt1"><?php echo $msg; ?></p>
        <table width="460" height="377" border="0" cellpadding="10" cellspacing="0">
            <tr>
              <td width="149">Name</td>
              <td width="176"><input type="text" name="name"/>
              </td>
            </tr>
            <tr>
              <td>Email Address </td>
              <td><input type="text" name="email"/></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><textarea name="address"></textarea></td>
            </tr>
            <tr>
              <td>Mobile Number </td>
              <td><input type="text" name="mobno" /></td>
            </tr>
            <tr>
              <td>Pin code </td>
              <td><input type="text" name="pin" /></td>
            </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" name="btnBuy" value="Order it!" onclick="return validate()" /></td>
            </tr>
          </table>
        <p>&nbsp;</p>
        <p><a href="<?php echo 'user_purch_view.php?user='.$uname; ?>">Go to Shopping</a></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  <h3>&nbsp;</h3>
  <p>&nbsp;</p>
  <p class="style1">&nbsp;</p>
</div>
</body>
</html>
