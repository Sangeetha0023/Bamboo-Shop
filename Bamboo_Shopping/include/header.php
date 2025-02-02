<!DOCTYPE html>
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
  height:50%

}
.ban_img img {
  width: 100%;
  height:50%
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
