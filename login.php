<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","hello");
?>
<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body>
	<div class="main_menu">
		<div class="sub_one">
			<h1>WATER ON REQUEST</h1>
		</div>
		<div class="sub_two">
			<ul>
				<li><a href="homepage.php" class="sign_up">home</a></li>
				<li>services</li>
				<li>About</li>
			</ul>
			
		</div>
		<div class="sub_three">
			
			
			<div>
				<img src="tanker.jpg">
			</div>
			<div class="login">
				
				<form method="post" class="myform">

					<h1 class="header"><b>Login Form<b></h1>
					
				
				<br><label>email : </label><br>
				<input type="text" name="email" class="input" placeholder="Username" required><br>
				<label>Password : </label><br>
				<input type="password" name="password" class="input" placeholder="password" 	required><br>
				<input type="submit" name="login" id="sign_btn" value="Sign in"><br>
				<p>
					Not yet a member?  <a href="register.php" class="sign_up">Sign up</a>
				</p>
				</form>
				<?php
			if(isset($_POST['login']))
			{
				$email=$_POST['email'];
				$password=$_POST['password'];
				$query="SELECT * FROM user WHERE email='$email' AND password='$password'";

				$query_run=mysqli_query($conn,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					
					$query="SELECT * FROM user WHERE email='$email'";
					$query_run=mysqli_query($conn,$query);
					$row=mysqli_fetch_assoc($query_run);
					$type= $row['type'];
					if($type==1)
						header('location:manager.php');
					else		
					{	$_SESSION['email']=$email;	
						header('location:homepage.php');
					}
				}
				else
				{
					echo '<script type="text/javascript"> alert(" invalid username and password") </script>';
				}
			}
		?>
			</div>
			
		
			
		</div>
	</div>

</body>
</html>