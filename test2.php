<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include 'test.php';
//checks if the username has been posted
if (isset($_POST['username'] )) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql ="Select * FROM Company WHERE username='".$username."'AND password = '".$password."'LIMIT 1"; //selects the given username and password if they match with each other
	$sqlid = "Select CompanyId FROM Company WHERE username='".$username."'"; //it selects the ID of the company
    
	
	$result = mysql_query($sql);
	$resultid= mysql_query($sqlid) or die('Query failed: '. mysql_error());
	while ($row =mysql_fetch_array($resultid,MYSQL_ASSOC) ) {
		echo "<tr>\n";
		foreach ($row as $col_value){
		
		$company = mysql_free_result($resultid);
	$_SESSION['CompanyId'] = $col_value; //it stores the companyID in a global variable
		}
		
	}
	
	}
	//if the password matches with the given username, it redirects to maindesign.html
	if ( mysql_num_rows ($result)==1){
	
	header ("Location: maindesign.html");
	exit();	
	
	}
//if the password doesnt match it redirects to the login page and gives u a popup message.
	else {

		       header("Refresh: 0; url=index.html");
                 $message = 'Wrong username/password, please try again.';

echo "<SCRIPT>
alert('$message');
</SCRIPT>";
		
	exit();	
		
	}
	

?>
