<?php
error_reporting(E_ERROR | E_PARSE); //enables showing all 
session_start();
include("test.php");//database connection
//stores the post from users into variables
$Mission_Name = $_POST['Mission_Name'];
$CompanyID = $_SESSION['CompanyId'];
$name = $_POST["dropdown"];
$Customer_Phone = $_POST['Customer_Phone'];
$Address = $_POST['Address'];
$ZipCode = $_POST['ZipCode'];
$City = $_POST['City'];
$Country = $_POST['Country'];


if(!$_POST['submit']){
	echo "Fill in everything";
}else{
    //this is to get the employee id and store it in a global variable
$getID = ("Select Employee_Id from Employee where Name = '".$name."'");
$results = mysql_query($getID) or die('Query faild: '. mysql_error());
	//$row =mysql_fetch_array($results,MYSQL_ASSOC);
	while ($row =mysql_fetch_array($results,MYSQL_ASSOC)){
		echo "<tr>\n";
		foreach ($row as $col_value){
    $id = mysql_free_result($results);
	$_SESSION['Employee_ID'] = $col_value;
	}
    }

    // this is where the mission gets added
	mysql_query("INSERT INTO Missions SET Mission_Name='".$Mission_Name."',Employee_Name = '".$name."',CompanyID='".$_SESSION['CompanyId']."', Employee_ID='".$_SESSION['Employee_ID']."', Customer_Phone='".$Customer_Phone."', 
            Address='".$Address."',ZipCode='".$ZipCode."', City='".$City."',Country='".$Country."'");
		
	$r=mysql_affected_rows();
	if($r>0){
		 header("Refresh: 0; url=table.php");
$message = 'Mission added successfully!';

echo "<SCRIPT>
alert('$message');
</SCRIPT>";	
	}else {
			 header("Refresh: 0; url=table.php");
$message2 = 'Mission has NOT been added, please try again!';

echo "<SCRIPT>
alert('$message2');
</SCRIPT>";	
	}
}

?>