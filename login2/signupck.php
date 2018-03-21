<?Php

include "config.php"; // database connection details stored here
// Collect the data from post method of form submission // 
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];

$todo=$_POST['todo'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$nama=$_POST['nama'];
$division=$_POST['division'];

?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Signup page for plus2net.com </title>
</head>

<body >
<?Php
if(isset($todo) and $todo=="post"){

$status = "OK";
$msg="";

// if userid is less than 3 char then status is not ok
if(!isset($username) or strlen($username) <5){
$msg=$msg."Username should be = 5 or more than 5 char length<BR>";
$status= "NOTOK";}					

if(!ctype_alnum($username)){
$msg=$msg."Username should contain alphanumeric  chars only<BR>";
$status= "NOTOK";}					


$count=$dbo->prepare("select username from plus_signup where username=:username");
$count->bindParam(":username",$username);
$count->execute();
$no=$count->rowCount();

if($no >0 ){
$msg=$msg."User Name already exists. Choose a different User Name<br>";
$status= "NOTOK";
}

$count=$dbo->prepare("select email from plus_signup where email=:email");
$count->bindParam(":email",$email);
$count->execute();
$no=$count->rowCount();
if($no >0 ){
$msg=$msg."This email address is there with us. If you forgot your password you can activate it by using forgot password link. Or Please try another one<BR>";
$status= "NOTOK";
}

if($phone >0 ){
$msg=$msg."Phone Number already exists. Choose a different User Name<br>";
$status= "NOTOK";
}

if(!isset($phone) or strlen($phone) <5){
$msg=$msg."Phone Number should be = 5 or more than 5 char length<BR>";
$status= "NOTOK";}	



if ( strlen($password) < 3 ){
$msg=$msg."Password must be more than 3 char legth<BR>";
$status= "NOTOK";}					

if ( $password <> $password2 ){
$msg=$msg."Both passwords are not matching<BR>";
$status= "NOTOK";}					


	
if($status<>"OK"){ 
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
}else{ // if all validations are passed.
$password_original = $password;
$password=md5($password); // Encrypt the password before storing
$sql=$dbo->prepare("insert into plus_signup(username,password,email,nama,division) values(:username,:password,:email,:phone,:nama,:division)");
$sql->bindParam(':username',$username,PDO::PARAM_STR, 15);
$sql->bindParam(':password',$password,PDO::PARAM_STR, 32);
$sql->bindParam(':email',$email,PDO::PARAM_STR, 75);
$sql->bindParam(':phone',$phone,PDO::PARAM_STR);
$sql->bindParam(':nama',$nama,PDO::PARAM_STR);
$sql->bindParam(':division',$division,PDO::PARAM_STR);
if($sql->execute()){
//echo " Inside ok loop ";
$mem_id=$dbo->lastInsertId(); 
/////////////////Posting confirmation mail ///////////////
$em="username@domain.com";    // Change to your email address 
$headers4=$em;
$headers="";
$headers.="Reply-to: $headers4\n";
$headers .= "From: $headers4\n"; 
$headers .= "Errors-to: $headers4\n"; 
//$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;

$content="Your login details from ******  \n\n";
$content .="UserName= $username \n";
$content .="Password = $password_original \n";

//echo $content;
$sub="Your login details";
//mail($email,"$sub",$content,$headers);
echo "<font face='Verdana' size='2' color=green>Welcome, You have successfully signed up<br><br><a href=index.php>Click here to login</a><br></font>";
//////////////// End of posting mail ////////
}// if sql executed 
else{print_r($sql->errorInfo()); }

}
} // end of todo if condition
?>
<center>
</body>
</html>
