<?php
session_start();

//it checks for the id of the checkbox
if(isset( $_GET['id'])==false) 
    header("Location: driverTable.php");
include("test.php");
if(isset($_POST) && count($_POST)>0) { 
    $sql = "UPDATE Employee SET Name = '".$_POST['name']."',Username = '".$_POST['username']."',Phone = '".$_POST['phone']."'";
    if(empty($_POST['password'])==false)
        $sql.= ", Password = '". $_POST['password']."'";
    $sql.= " WHERE Employee_Id = '". $_GET['id']."'";
    //echo $sql; 
    
    if (mysql_query($sql) === TRUE) {
        header("Location: driverTable.php");
    }
}
//gets all information on the selected employee
$query = "SELECT Employee_Id,Name, Phone, Username, Password from Employee WHERE Employee_Id ='" . $_GET['id'] . "'";
$record = mysql_fetch_array(mysql_query($query), MYSQL_ASSOC);
//after the employee information are stored in the variable $record, we can now store them in each colum. 
$employee_id = isset($record['Employee_Id'])?$record['Employee_Id']:'';
$name = isset($record['Name'])?$record['Name']:'';
$phone = isset($record['Phone'])?$record['Phone']:'';
$username = isset($record['Username'])?$record['Username']:'';
$password = isset($record['Password'])?$record['Password']:'';
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
                        <a class="navbar-logout" href="logout.php"><p><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-log-out"></span> Log out
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
                            Edit/Update employee information <small>  Fill in all desired fields.</small>
                        </h1>
                    </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="form-group">
                               <form action = "" method = "post"> 
                                            <label>Employee name</label>
                                            <input pattern = ".{2,}" required title="Please enter a valid name" class="form-control" input type="text" name = "name" value = "<?=$name?>">
                                       
                                    <form role="form">
                                    
                                      
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input pattern = ".{8,14}" required title="Please enter a valid phonenumber" class="form-control" input type="text" name = "phone" value = "<?=$phone?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input  pattern = ".{4,}" required title="Please enter a username"class="form-control" input type="text" name = "username" value = "<?=$username?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password, leave blank to remain unchanged</label>
                                            <input required title="Enter the username as password" class="form-control"input type="password" name = "password" value = "">
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
