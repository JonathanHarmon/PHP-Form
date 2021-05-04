<!DOCTYPE>

<html>
	<head>
		<title>Form Validation Project</title>
	</head>
	<style type="text/css">
input[type="text"],input[type="email"],textarea{
	border:  1px solid dashed;
	background-color: rgb(221,216,212);
	width: 600px;
	padding: .5em;
	font-size: 1.0em;
}
.Error{
	color: red;
}
</style>
	<body>

<?php 
$NameError="";
$EmailError="";
$GenderError="";
$WebsiteError="";

if(isset($_POST['Submit'])) {
	if(empty($_POST["Name"])) {
		$NameError="Name is required.";
	}
	else {
		$Name=Test_User_Input($_POST["Name"]);
		if(!preg_match("/^[A-Za-z. ]*$/", $Name)) {
		$NameError="Only letters, white spaces, and periods allowed.";	
		}
	}
	if(empty($_POST["Email"])) {
		$EmailError="Email is required.";
	}
	else {
		$Email=Test_User_Input($_POST["Email"]);
		if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $Email)) {
		$EmailError="Invalid email format.";
		}
	}
	if(empty($_POST["Gender"])) {
		$GenderError="Gender is required.";
	}
	else {
		$Gender=Test_User_Input($_POST["Gender"]);
	}
	if(empty($_POST["Website"])) {
		$WebsiteError="Website is required.";
	}
	else {
		$Website=Test_User_Input($_POST["Website"]);
		if(!preg_match("/(https:|http:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $Website)) {
			$WebsiteError="Invalid website address format.";
			}
	}
if(!empty($_POST["Name"]) && !empty($_POST["Email"]) && !empty($_POST["Gender"]) && !empty($_POST["Website"])) {
if((preg_match("/^[A-Za-z. ]*$/", $Name)==true) && (preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $Email)==true)
&& (preg_match("/(https:|http:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $Website)==true))
{
echo "<h2>Your Submitted Information</h2> <br>";
echo "Name: {$_POST["Name"]}<br>";
echo "Email: {$_POST["Email"]}<br>";
echo "Gender: {$_POST["Gender"]}<br>";
echo "Website: {$_POST["Website"]}<br>";
echo "Comments: {$_POST["Comment"]}<br>";
}else{
	echo '<span class="Error">* Please correct errors and submit your form again. *</span>';
}
}
}
function Test_User_Input($Data) {
	return $Data;
}

?>

<h2>Form Validation with PHP.</h2>

<form  action="FormValidationProject.php" method="post"> 
<legend>* Please Fill Out the following Fields.</legend>			
<fieldset>
Name:<br>
<input class="input" type="text" Name="Name" value="">
<span class="Error">*<?php echo $NameError; ?></span><br>	 
E-mail:<br>
<input class="input" type="text" Name="Email" value="">
<span class="Error">*<?php echo $EmailError; ?></span><br>
Gender:<br>
<input class="radio" type="radio" Name="Gender" value="Female">Female
<input class="radio" type="radio" Name="Gender" value="Male">Male
<span class="Error">*<?php echo $GenderError; ?></span><br>		   
Website:<br>
<input class="input" type="text" Name="Website" value="">
<span class="Error">*<?php echo $WebsiteError; ?></span><br>
Comment:<br>
<textarea Name="Comment" rows="5" cols="25"></textarea>
<br>
<br>
<input type="Submit" Name="Submit" value="Submit Your Information">
   </fieldset>
</form>

	    
	</body>
</html>
