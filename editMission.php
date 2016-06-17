<?php
if(isset( $_GET['id'])==false)
    header("Location: table.php");
include("test.php");
if(isset($_POST) && count($_POST)>0) {    
    $sql = "UPDATE Missions SET Mission_Name = '".$_POST['Mission_Name']."',Employee_Name = '".$_POST['Employee_Name']."',
	Customer_Phone = '".$_POST['Customer_Phone']."',Address = '".$_POST['Address']."',ZipCode = '".$_POST['ZipCode']."',
	City = '".$_POST['City']."',Country = '".$_POST['Country']."'";// updates the database
    
    $sql.= " WHERE MissionID = '". $_GET['id']."'";
    
    //if the query has been executed it redirects to table.php
    if (mysql_query($sql) === TRUE) { 
        header("Location: table.php");
    }
}
$query = "SELECT MissionID, Mission_Name, Employee_Name, Customer_Phone, Address, ZipCode,City, Country from Missions WHERE MissionID ='" . $_GET['id'] . "'"; 
$record = mysql_fetch_array(mysql_query($query), MYSQL_ASSOC);
$MissionID = isset($record['MissionID'])?$record['MissionID']:''; // it select only the column missionID and stores it in variable $missionID
$Mission_Name = isset($record['Mission_Name'])?$record['Mission_Name']:'';// it select only the column mission_name and stores it in variable $mission_name
$Employee_Name = isset($record['Employee_Name'])?$record['Employee_Name']:'';// it select only the column employee_name and stores it in variable $employee_name
$Customer_Phone = isset($record['Customer_Phone'])?$record['Customer_Phone']:'';// it select only the column costumer_phone and stores it in variable $costumer_phone
$Address = isset($record['Address'])?$record['Address']:'';// it select only the column address and stores it in variable $address
$ZipCode = isset($record['ZipCode'])?$record['ZipCode']:'';// it select only the column zipcode and stores it in variable $zipcode
$City = isset($record['City'])?$record['City']:'';// it select only the column City and stores it in variable $City
$Country = isset($record['Country'])?$record['Country']:'';// it select only the column country and stores it in variable $Country
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Miswa</title>
        <!-- Bootstrap Styles-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FontAwesome Styles-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Morris Chart Styles-->
        <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- Custom Styles-->
        <link href="assets/css/custom-styles.css" rel="stylesheet" />
        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default top-navbar" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="maindesign.html">Miswa</a>
                    <div class="navbar-right">
                        <a class="navbar-logout" href="logout.php"><p><button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
      </p></a>
                    </div>
                </div>
            </nav>
            <!--/. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a  href="maindesign.html"><i class="fa fa-dashboard"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="driverTable.php" class ="drop-active-menu" >Manage employees<span class="fa arrow"></span></a>
                              </li>
                            <li>
                                <a href="table.php">Manage Missions</a>
                               
                            </li>
                    </ul>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                        <h1 class="page-header">
                            Edit/Update mission information <small>  Fill in all desired fields.</small>
                        </h1>
                    </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="form-group">
                               <form action = "" method = "post"> 
                                            <label>Mission name</label>
                                            <input class="form-control" input type="text" name = "Mission_Name" value = "<?=$Mission_Name?>">
                                       
                                    <form role="form">
                                    
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input class="form-control" input type="text" name = "Employee_Name" value = "<?=$Employee_Name?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Customer Phone</label>
                                            <input class="form-control" input type="text" name = "Customer_Phone" value = "<?=$Customer_Phone?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" input type="text" name = "Address" value = "<?=$Address?>">
                                        </div>
                                        <div class="form-group">
                                            <label>ZipCode</label>
                                            <input class="form-control" input type="text" name = "ZipCode" value = "<?=$ZipCode?>">
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" input type="text" name = "City" value = "<?=$City?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input class="form-control" input type="text" name = "Country" value = "<?=$Country?>">
                                        </div>
                                 
                                        <div>
                                   
                  <button class="btn btn-default" input type = "submit" name = "submit" value = "Update"><i class=" fa fa-refresh "></i> Update</button> 
                                       
                                    </form>
                                </div>
                                    
                                </div>
                                </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                    <!-- /. ROW  -->
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
    </body>
</html>
