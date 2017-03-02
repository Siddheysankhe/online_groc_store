<?php
session_start();
if(isset($_GET['logout']))
{
	$_SESSION = array();		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
<title>Online Shop - Admin Portal</title>
<link rel="stylesheet" href="../styles/adminstyles.css" media="all"></link>
<div style="background: #36c5d8; color: white; border-radius: 5px; width: 250px;position:absolute;left: 40%;top:20%;">
    <div style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: rgba(255,255,255,0.4); padding: 5px; font-weight: bold; text-align: center; color: black;">Login</div>
    <div style="padding: 5px;">
      <form action="adminLogin.php" method="post">
        <table>
          <tr> <td>Email</td> <td><input type="text" id="email" name="email" style="border: 0px; border-radius: 2px; outline: none; padding-left: 2px;"/></td> </tr>
          <tr> <td>Password</td> <td><input type="password" id="password" name="password" style="border: 0px; border-radius: 2px; outline: none; padding-left: 2px;"/></td> </tr>
          <tr>
	     <td colspan=2 style="border-top: 1px solid white; text-align: center; padding-top: 5px;">
		<input type="submit" value="Login" style="border: 0px; border-radius: 5px; padding: 5px 20px 5px 20px; font-weight: bold; cursor: pointer;"/>
	     </td>
	   </tr>
        </table>
      </form>
    </div>
  </div>
  </head>
  </html>