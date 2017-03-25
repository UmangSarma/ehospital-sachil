
<?php
include 'db.php';

session_start();
if(isset($_SESSION['name'])){
    session_destroy();

    
}
else
{
   
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> E hospital</title>
  
  
  
      <link rel="stylesheet" href="css1/style.css">

  
</head>

<body>
  <body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Login for E hospital</h1>
			<div>
				<input type="text" placeholder="Email"  id="username" name="email"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  id="password" name="pass"/>
			</div>
			<div>
				<input type="submit" value="Log in" name="login"/>
              <input type="submit" value="Register" name="reg"/>
				
			</div>
		</form><!-- form -->
	
	</section><!-- content -->
</div><!-- container -->
</body>
  
    <script src="js/index.js"></script>

</body>
</html>
<?php


if(isset($_POST['login'])){
   
    $con = mysql_connect("localhost","root","");
$db = mysql_select_db('crud',$con);

   $regno=$_POST['email'];
    $pass=$_POST['pass'];
    
    
    
    $query="Select * from login where email='$regno' and pass='$pass'";
    
      $run=mysql_query($query) or die(mysql_error());
    
    if(mysql_num_rows($run)==1){
        
        $_SESSION['email']=$regno;
        echo "<script>window.open('c_index.php','_self')</script>";
        
    }
    else{
        
        echo "<script>alert('username or password is incorrect')</script>";
    }
    
    
    


    
}
if(isset($_POST['reg'])){
        header("Location: reg.php");
   
}





?>
