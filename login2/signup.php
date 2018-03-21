<?

include "config.php"; // database connection details stored here

?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>signup form </title>

</head>

<body>

<table border='0' width='50%' cellspacing='0' cellpadding='0' align=center><form name=form1 method=post action=signupck.php onsubmit='return validate(this)'><input type=hidden name=todo value=post>

<tr bgcolor='#f1f1f1'>
	<td align=center colspan=2><font face='Verdana' size='2' ><b>Signup</b></td>
</tr>

<tr >
	<td >&nbsp;<font face='Verdana' size='2' >UserName</td><td ><font face='Verdana' size='2'><input type=text name=username></td>
</tr>

<tr bgcolor='#f1f1f1'>
	<td >&nbsp;<font face='Verdana' size='2' >Password</td>
	<td ><font face='Verdana' size='2'><input type=password name=password></td>
</tr>

<tr >
	<td >&nbsp;<font face='Verdana' size='2' >Re-enter Password</td>
	<td ><font face='Verdana' size='2'><input type=password name=password2></td>
</tr>


<tr bgcolor='#f1f1f1'>
	<td ><font face='Verdana' size='2' >&nbsp;Email</td>
	<td  ><input type=text name=email></td>
</tr>

<tr >
	<td >&nbsp;<font face='Verdana' size='2' >Nama</td>
	<td ><font face='Verdana' size='2'><input type=text name=nama></td>
</tr>

<tr bgcolor='#f1f1f1'>
	<td >&nbsp;<font face='Verdana' size='2' >Phone Number</td>
	<td ><font face='Verdana' size='2'><input type=phone name=phone></td>
</tr>

<tr bgcolor='#f1f1f1'>
	<td>
		<label for="di1"> <font face='Verdana' size='2' >Select Divison : </label>
	</td>
	<td>
		<select class="form-control" name="division" id="di1"><font face='Verdana' size='2'>
			<option>IT Support</option>
			<option>IT Infrastruktur</option>
			<option>IT Electronic Data Processing</option>
			<option>IT Solution</option>
		</select>
	</td>
</tr>

<tr bgcolor='#f1f1f1'><td align=center colspan=2><a href=index.php>Login</a> <input type=submit value=Signup></td></tr>
</table>


<center>
</body>

</html>
