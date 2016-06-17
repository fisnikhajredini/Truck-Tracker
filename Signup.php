<?php
session_start();
include("test.php");
$companyname = $_POST['companyname'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];

//it checks if the username is taken
if(isset($_POST['submit'])){
	$sql = "SELECT Username from Company where Username = '".$username."'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0){
		header("Refresh: 0; url=companysignup.php");
        $message = 'Username is allready taken.';

		echo "<SCRIPT>
		alert('$message');
		</SCRIPT>";


	}
else{
//it inserts the new company to database
mysql_query("INSERT INTO Company SET Companyname='".$companyname."',name='".$name."', Company_Phone='".$phone."', Username='".$username."', 
            Password='".$password."'") or die(mysql_error());
   header("Refresh: 0; url=index.html");
                 $message = 'You have succesfully signed up!';

echo "<SCRIPT>
alert('$message');
</SCRIPT>";


}
}

?>