 <?php
session_start();
include("test.php");

if(isset($_POST["edit"]) && count($_POST["checkbox"])==0) {//checks if we are trying to click on edit and not selecting any mission
	header("Location: table.php");
}
if(isset($_POST["edit"]) && count($_POST["checkbox"])>0) {

    if(isset($_POST["edit"])) {
        if(empty($_POST["checkbox"][0])==false)
            header("Location: editMission.php?id=".$_POST["checkbox"][0]);     
	
	}
}

if(isset($_POST['delete'])){

 $checkbox = $_POST['checkbox']; //from name="checkbox[]"
 $countCheck = count($_POST['checkbox']);

 for($i=0;$i<$countCheck;$i++){ //it selects the exact number of arrays is the query. 
 $del_id  = $checkbox[$i];

 $query = "DELETE FROM Missions where MissionID = $del_id";
 $result = mysql_query($query) or die( "Error: " . mysql_error() );
 }
	if($result)  { 
	header("Refresh: 0; url=table.php");
    $message = 'Mission has successfully been removed.';

	echo "<SCRIPT>
	alert('$message');
	</SCRIPT>";

             } else{

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
      <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                            Missions<small><em style="color: #999; font-size: 64%;">    View, add, edit and delete all missions information here.</em></small></h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                       
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <form action = "" method = "post">
                            
                              <?php
                                    include("test.php");
								
                                   
                                    echo "<thead>
                                        <tr>
										<th>#</th>
                                       <th>Mission Name</th>
                                       <th>Employee name</th>
                                            <th>Customer_Phone</th>
                                            <th>Address</th>
                                            <th>ZipCode</th>
                                            <th>City</th>
                                            <th>Country</th>
                  
                                        </tr>
                                    	</thead>";
                                    
          
                         $query = "SELECT MissionID, Mission_Name, Employee_Name, Customer_Phone, Address, ZipCode,City, Country from Missions WHERE CompanyId ='".$_SESSION['CompanyId']."'" ;
                                    $data = mysql_query($query);
									         while($record = mysql_fetch_array($data, MYSQL_ASSOC)){
                                     echo "<tbody>";
                                     echo"<tr>";
                                     echo "<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"".$record['MissionID']."\" /></td>";
                                 echo "<td>" . $record['Mission_Name']. "</td>";
                                 echo "<td>" . $record['Employee_Name']. "</td>";
                                 echo "<td>" . $record['Customer_Phone']. "</td>";
                                 echo "<td>" . $record['Address']. "</td>";
                                 echo "<td>" . $record['ZipCode']. "</td>";
                                 echo "<td>" . $record['City']. "</td>";
                                 echo "<td>" . $record['Country']. "</td>";
								 
                                
                                        echo "</tr>";
                                    
									}
                                        
                                    echo "</tbody>";
									?>
                                    		
											<?php echo "<div class=\"form-group\"><button input type=\"submit\" value=\"edit\" name=\"edit\"class=\"btn btn-primary\" method=\"POST\">Edit  <i class=\"fa fa-edit\"></i></button>";
											?>
                                           
									<?php echo "<button input type=\"submit\" value=\"delete\" name=\"delete\"class=\"btn btn-danger\"onclick=\"return confirm('Are you sure that you want to delete mission?')\"  method=\"POST\">Delete  <i class=\"fa fa-pencil\"></i></button></form>";?>
                                    
                                    </form>
										
                                        
                                
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">New</button></div>

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                             
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add new mission</h4>
                                        </div>
                                        <div class="modal-body">
                                     
                 <form action = "mission.php" method = "post"> 
                                            <label>Mission name</label>
                                            <input class="form-control" input type="text" name = "Mission_Name" placeholder="Enter name">
                                       
                                    <form role="form">
                                    
                                    <div class="form-group">
                                  
                <label>Chose employee</label>
                                  
                       <select name='dropdown' class="form-control"> 
                        
                        
               <?php
include('test.php');
$query ="SELECT Name FROM Employee WHERE CompanyId='".$_SESSION['CompanyId']."'";
$result = mysql_query($query);
$rows = mysql_num_rows($result);
for ($i=0;$i<$rows;$i++){ //doesnt try to fetch array if there is no more left

while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ 
                           
 //this creates the dropdown select
                            ?>
<option><?php $Name = $row['Name']; echo $Name; ?></option>
              
                            <?php }
}?>
                                            </select>
                                        </div>
                                        <form>
                                        <div class="form-group">
                                            <label>Customer Phone</label>
                                            <input pattern = ".{8,14}" required title="Please enter 8 to 14 Numbers" class="form-control" input type="text" name = "Customer_Phone" placeholder="Enter phone number">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input pattern = ".{4,}" required title="Please write a valid address"  class="form-control" input type="text" name = "Address" placeholder="Enter street">
                                        </div>
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input pattern = ".{5,5}" required title="Please enter valid Zip Code" class="form-control" input type="text" name = "ZipCode" placeholder="Enter zipcode">
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" input type="text" name = "City" placeholder="Enter city">
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input pattern = ".{3,}" required title="Please enter valid Country" class="form-control" input type="text" name = "Country" placeholder="Enter country">
                                        </div>
                                        
                                           <div>
                                   
                                        <form action = "mission.php" method = "post"> 
                                <input type="submit" class="btn btn-default" name = "submit" Value = "Add">
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
                </div>
                
            </div>
            
        

    
   
</body>
</html>
