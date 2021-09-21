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

if(isset($_POST['submit']))
{
$first_name = $_POST['f_name'];
$last_name = $_POST['l_name'];
$email_id = $_POST['email'];
$contact = $_POST['contact'];
$addhar = $_POST['addhar'];
$age = $_POST['age'];
$city = $_POST['city'];
$password = $_POST['password'];	
$drving_no = $_POST['driving_lic'];		
$sql2 = "insert into user (first_name,last_name,email,contact,addhar,age,city,password,drvng_lic_no) values ('$first_name','$last_name','$email_id','$contact','".$addhar."','$age','$city','$password','$drving_no')";			

if(!mysqli_query($conn,$sql2))
{
	echo 'Not Inserted';
	
	echo("Error description: " . mysqli_error($conn));
	//echo "<script type='text/javascript'>alert(Error description: " . mysqli_error($conn))"</script>";
}
else
{
	//echo "<script type='text/javascript'>alert(".mysqli_error($conn)");</script>";
	//echo("Error description: " . mysqli_error($conn));
	$message = "Data Submitted Successfully !";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header('location:index.php');
}	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Registration Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src = "jquery.js"></script>	
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<?php
if(isset($_post['submit']))
{}

?>
<?php include 'header.php';?>

<div class="signup-form" style="margin-top:70px">
    <form action="reg.php" method="post">
		<h2>Register</h2>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="f_name" placeholder="First Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="l_name" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
             <div class="form-group">
            <input type="text" class="form-control" name="age" placeholder="Age" required="required">
        </div> 
             <div class="form-group">
            <input type="text" class="form-control" name="contact" placeholder="Contact-No" required="required">
        </div> 
             <div class="form-group">
            <input type="text" class="form-control" name="addhar" placeholder="Addhar Card-No" required="required">
        </div>
            <div class="form-group">
            <input type="text" class="form-control" name="city" placeholder="City" required="required">
        </div>		
             <div class="form-group">
            <input type="driving licence" class="form-control" name="driving_lic" placeholder="Driving Licence-No" required="required">
        </div>                         
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" id = "txtPassword" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" id = "txtConfirmPassword" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>      
		<div class="form-group">
            <button type="submit" onclick = "return Validate();" name="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div align="center"><a href="login.php" align="center">Already have an account??</a></div>
</div>

<script>
  function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
  </script>
  
</body>
</html>