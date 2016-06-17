<?php
session_start();
include 'test.php';
// the connection to database
$name = $_POST['name'];
$phnumber = $_POST['phone'];
$driverusername = $_POST['username'];
$password = $_POST['password'];
//taking variables from driverTable.php

	





	if(isset($_POST['username'])){
		$result = mysql_query("SELECT username from Employee where Username = '".$driverusername."'"); //it checks if the username is already on the database
		$row = mysql_fetch_row($result);
		if($row > 0){
				header("Refresh: 0; url=driverTable.php");
$message = 'Username is allready taken.';

echo "<SCRIPT>
alert('$message');
</SCRIPT>";
            // a popup message using javascript
		}
	
if($row == 0){
	if($driverusername != $password){ // they should be the same so when the driver logs in to the app he changes it.
		header("Refresh: 0; url=driverTable.php");
		$message = 'Password and username are not equal! Enter the same value for username and password please.';

echo "<SCRIPT>
alert('$message');
</SCRIPT>";

	}
	else{
	
	mysql_query ("INSERT INTO Employee SET  CompanyId='".$_SESSION['CompanyId']."',name='".$name."', Phone='".$phnumber."', Username='".$driverusername."', Password='".$password."'") or die(mysql_error()); //after checking other cases, we are finally inserting the employee to the database.
	$r =mysql_affected_rows ();// see if the database has been affected
if($r > 0) {
	header("Refresh: 0; url=driverTable.php");
$message = 'Employee added.';

echo "<SCRIPT>
alert('$message');
</SCRIPT>";
}
}
}

}


?>