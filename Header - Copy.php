<?php
$conn=mysqli_connect('localhost','root','');
if(!$conn)
{
	echo 'Not Connected To Server';
}
if(!mysqli_select_db($conn , 'bikerental'))
{
	echo 'Database Not Selected';
}
session_start(); 
if(isset($_POST['submit']))
{
	 $email = $_POST['lemail'];
	 $pass = $_POST['lpsw'];
	 $sql=mysqli_query($conn,"select * from user where email='$email' and password='$pass'");
	 $r=mysqli_num_rows($sql);
	 $result = mysqli_fetch_assoc($sql);		
			$_SESSION['lemail']=$email;
			 echo $_SESSION['lemail'];
			header('location:Home_Page.php');
	 ob_end_flush();
}
else
    {
        echo mysqli_error($conn);
    }
	
?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
	
    <meta charset="utf-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
 <link rel="stylesheet" type="text/css" href="css/stylelogin1.css">

</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="#"> 
      <img src="images/logo2.jpg" alt="" width="40" height="35" class="d-inline-block align-top">
      VEHICLE RENTAL
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="Home_Page.php">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="Bike.php">Vehicle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="About_Us.php">About Us</a>
        </li>
		<li class="nav-item" align="right">
          <meta name="viewport" content="width=device-width, initial-scale=1">
		</li>
</div>
</ul>
</div>
<div>
		  
<!-- login button -->
<?php   
if(isset($_SESSION['lemail'])==0)
	{	
?>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;align:right;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="Home_Page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/Login.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email Id</b></label>
      <input type="text" placeholder="Enter Email Id" name="lemail" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="submit"> Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw"><a href="Reg_Page.php">New user Login?</a></span>
    </div>
  </form>
</div>
<!--/Login -->
<?php }
else{ ?>
<button class="button" style="width:auto;"><a href="logout.php">Logout</a></button>
<?php 
 } ?>
		
		<?php   
if(isset($_SESSION['lemail'])==0)
	{	
?>
<label></label>
<?php }
else{ ?>
<label style="float:left;color:white"><?php echo $_SESSION['lemail'];?></label>
<?php
 } ?>

    
 </div>
</nav>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
		integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
</body>
</html>
