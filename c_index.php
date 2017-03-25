<?php
//including the database connection file
include("c_config.php");
session_start();
if(isset($_SESSION['email'])){
    $user=$_SESSION['email'];
//fetching data in descending order (lastest entry first)
$result = mysql_query("SELECT * FROM user where email='$user'");


    
}
else
{       
        echo "<script>window.open('login.php','_self')</script>";
     
    
}

?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body style="background-color:pink;">
     <h1>Welcome <?php echo $_SESSION['email']; ?> <a href="logout.php">logout</a></h1>
<a href="c_add.php">Add New Data</a><br/><br/>
    <div align="center">
    <form action "c_index.php" method="get">
        <input type="text" name="search" placeholder="search Appointment by name" size="40">
        <input type="submit" name="search1" value="search now"></form></div>
    
    <?php 
include("c_config.php");
if(isset($_GET['search1']))
{
    
    $search = $_GET['search'];
    $que = "SELECT * FROM `user` where `email` ='$search' OR `name`='$search'";
  
    
    $run = mysql_query($que);
    while($row = mysql_fetch_array($run)){
           $value1 = $row['name'];
        $value2 = $row['age'];
        $value3 = $row['doctor']; 
         $value4 = $row['time']; 
    }
    ?>
    
        <table width="600" align="center" border="0" bgcolor="orange">
             <tr><td>Name</td>
        <td>Age</td>
        <td>Doctor Name</td>
             <td>Appointment date</td></tr>
    <tr>
        
        <td><?php echo $value1 ?></td>
        <td><?php echo $value2 ?></td>
        <td><?php echo $value3 ?></td>
            <td><?php echo $value4 ?></td></tr>
    
    
    </table>
<?php } ?>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>Doctor name</td>
        <td>Appointment date</td>
		<td>Delete Appointment</td>
	</tr>
	<?php 
        
	while($res = mysql_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['doctor']."</td>";	
        echo "<td>".$res['time']."</td>";	
		echo "<td><a href=\"c_delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>

