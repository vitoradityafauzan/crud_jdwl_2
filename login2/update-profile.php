<?Php

include "include/session.php";
include "config.php";



?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Update profile at plus signup script at plus2net.com</title>

</head>

<body >
<?Php
// check the login details of the user and stop execution if not logged in
require "check.php";

// If member has logged in then below script will be execuated. 
// let us collect all data of the member 
$count=$dbo->prepare("select * from plus_signup where username='$_SESSION[username]'");
if(!($count->execute())){
echo "Database Problem ";
exit;
}else{
$row = $count->fetch(PDO::FETCH_OBJ);
}


// One form with a hidden field is prepared with default values taken from field. 
echo "<form action='update-profileck.php' method=post>
<input type=hidden name=todo value=update-profile>

<table border='0' cellspacing='0' cellpadding='0' align=center width='30%'>
 <tr bgcolor='#ffffff' > <td colspan='2' align='center'>
<font face='verdana, arial, helvetica' size='3' align='center'>&nbsp;<b>Update Profile</b> 
</font></td> </tr>

<tr bgcolor='#f1f1f1'><td ><font face='Verdana' size='3' >&nbsp;Email</td>
<td  ><input type=text name=email value='$row->email'></td></tr>

<tr ><td >&nbsp;<font face='Verdana' size='3' >Nama</td>
<td ><font face='Verdana' size='2'><input type=text name=nama value='$row->nama'></td></tr>

<tr ><td >&nbsp;<font face='Verdana' size='3' >Phone Number</td>
<td ><font face='Verdana' size='2'><input type=text name=phone value='$row->phone'></td></tr>

<tr bgcolor='#f1f1f1'><td >&nbsp;<font face='Verdana' size='2' >Division</td>
	<td>
		<select class='form-control' name='division'><font face='Verdana' size='2'>
			<option>IT Support</option>
			<option>IT Infrastruktur</option>
			<option>IT Electronic Data Processing</option>
			<option>IT Solution</option>
		</select>
	</td>
</tr>

<tr bgcolor='#ffffff'><td align=center colspan=2><input type=submit value=Update></td></tr>


";


echo "</table>
		<center><h4>If you want to update your data but it did not show here, contact Administrator!</h4></center>";
?>

</body>

</html>