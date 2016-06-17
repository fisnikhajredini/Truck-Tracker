<?php
include("test.php");
if(isset($_POST["edit"]) && count($_POST["employees"])==0) { //checks if we are trying to click on edit and not selecting any employee
	header("Location: driverTable.php");
}
if(isset($_POST["edit"]) && count($_POST["employees"])>0) { 
    if(isset($_POST["edit"])) {
        if(empty($_POST["employees"][0])==false)    
            header("Location: driveredit.php?id=".$_POST["employees"][0]);     
	}
	
}
  if (isset($_POST['delete'])){
  $checkbox = $_POST['employees']; //from name="checkbox[]"
  $countCheck = count($_POST['employees']);
  
  for($i=0;$i<$countCheck;$i++) { //it selects the exact number of arrays is the query. 
  $del_id  = $checkbox[$i];

 $query = "DELETE FROM Employee where Employee_Id = $del_id";
 $result = mysql_query($query) or die( "Error: " . mysql_error() );

  }
	if($result){ // if the $result exists
	header("Refresh: 0; url=driverTable.php");
    $message = 'Employee has successfully been removed.';

	echo "<SCRIPT>
	alert('$message');
	</SCRIPT>";
	
	} else {
 	echo "Error: ".mysql_error();

    }
     }
if (isset($_POST['resetpw'])){
     $sec = "Are you sure that u want to reset the password?";
      
  $checkbox = $_POST['employees']; //from name="checkbox[]"
  $countCheck = count($_POST['employees']);
  
    for($i=0;$i<$countCheck;$i++) {
    $del_id  = $checkbox[$i];

      
  $query = "UPDATE Employee SET Password = Username";
      
 $result = mysql_query($query) or die( "Error: " . mysql_error() );

  }
	if($result){ 
	header("Refresh: 0; url=driverTable.php");
    $message = 'Employee password has been reseted.';
        
        
// checks for the confirmation in a popup box with Yes or No.
	echo "<SCRIPT>
	function confirmPass(){
		var answer = confirm('are u sure u want to reset?');
		if(answer == TRUE){
			alert($message);
		}
	}
	</SCRIPT>";
	
	} else {
 	echo "Error: ".mysql_error();

    }
      
      
  }

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
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>
<body>
   <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="maindesign.html">Miswa</a>
            <div class = "navbar-right">
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
                        <a class="active-menu" href="maindesign.html"><i class="fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    

                    <li>
                        <a href="driverTable.php">Manage employees</a>
                        </li>
                        
                         
					<li>
                        <a href="table.php">Manage Missions</a>
                               
							
                    </li>
                   
                </ul>

            </div>

        </nav>
        
       
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Employees <small>  <em style="color: #999; font-size: 64%;"> View, add, edit and delete all employee information here.</em></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
            <div class="col-md-12">
            <div id="page-inner">
                
                    <div>
                    
                    </div>
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                        
                       
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        
                            <form action= "" method = "post">
                              <?php
			
                                    include("test.php");
									session_start();
                                   
                                    echo "<thead>
                                        <tr>
										
                                       <th>#</th>
									   <th>Name</th>
                                 			<th>Phone</th>
                                            <th>Username</th>
                                           
                                            
                                        </tr>
                                    	</thead>";
                                  
                         $query = "SELECT Employee_Id,Name, Phone, Username from Employee WHERE CompanyId ='".$_SESSION['CompanyId']."'" ; //It selects every employee for the company id that is logged in.
                                    $data = mysql_query($query);
									         while($record = mysql_fetch_array($data, MYSQL_ASSOC)){  
                                     echo "<tbody>"; //it prints in the table
                                     echo"<tr>";
									 
					$ss= $record['Employee_Id'];
				    $_SESSION['Username1']=$record['Username'];
					echo "<td><input type=\"checkbox\" name=\"employees[]\" value=\"".$record['Employee_Id']."\" /></td>"; //it stores the ID on checkboxes.
					echo "<td>" . $record['Name']. "</td>"; //it prints only the names of the employees
                    echo "<td>" . $record['Phone']. "</td>"; //it prints only the phone of the employees
                    echo "<td>" . $record['Username']. "</td>";//it prints only the usernames of the employees
                    
   				  
				   ?>
                   
                   <?php
				
            		                               
                                        echo "</tr>";
                                    
									}
                                        
                                    echo "</tbody>";
									
					
											echo "<div class =\"form-group\"><button input type=\"submit\" value=\"edit\" name=\"edit\"class=\"btn btn-primary\" method=\"POST\">Edit  <i class=\"fa fa-edit\"></i></button>&nbsp;";
											
									echo "<button input type=\"submit\" value=\"delete\" name=\"delete\"class=\"btn btn-danger\"onclick=\"return confirm('Are you sure that you want to delete employee?')\" method=\"POST\">Delete  <i class=\"fa fa-pencil\"></i></button>&nbsp;";  
									
									 echo "<button input type=\"submit\" value=\"resetpw\" name=\"resetpw\"class=\"btn btn-default\" onclick=\"return confirm('Are you sure that you want to reset Password?')\" method=\"POST\">Reset Password  <i class=\"fa fa-refresh\"></i></button> </form>";  
                         ?>       
                         </form>   
                      
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"> New </button></div>


                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add new employee</h4>
                                        </div>
                                        <div class="modal-body">
                                      
                               <form action = "add.php" method = "post"> 
                                            <label>Employee name</label>
                                            <input pattern = ".{2,}" required title="Please enter a valid name" class="form-control" input type="text" name = "name" placeholder="Enter name">
                                       
                                    <form role="form">
                                    
                                      
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input pattern = ".{8,14}" required title="Please enter a valid phonenumber" class="form-control" input type="text" name = "phone" placeholder="Enter phone number">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input  pattern = ".{4,}" required title="Please enter a username"class="form-control" input type="text" name = "username" placeholder="Enter username">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input  pattern = ".{6,14}" required title="Enter a password the same as the username" class="form-control"input type="password" name = "password" placeholder="Enter username as password">
                                        </div>
                                       
                                     
                                        <div>
                                   
                                     
                                        <button type="submit" class="btn btn-default" name = "submit">Add</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                       
                                    </form>
                                </div>
                                    
                                </div>
                                </table>
                                        </div>
                                       
                                    </div>
                                    </div>
                                    </div>
                    </div>
                    
                    <!--End Advanced Tables -->
                     <!--  Modals-->
                    
            
                <!-- /. ROW  -->
            
                       
                            <div class="table-responsive">
      
                    </div>
                      
                <!-- /. ROW  -->
           
            </div>
                <!-- /. ROW  -->
       
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->

   
</body>
</html>
