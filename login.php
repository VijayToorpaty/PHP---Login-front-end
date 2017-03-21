<?php

  include("connect.php");
  include("functions.php");
  
  
  
  $error = "";

  
  
  if(isset($_POST['login']))
	  
	{
	      		  
		  $email = mysql_real_escape_string ($_POST['email']);
		  $password = mysql_real_escape_string ($_POST['password']);
		 
		  
		  $date = date("F, d y");
		  
		  if(email_exists($email, $con))
		  {
			  $result = mysqli_query($con, "SELECT password FROM users WHERE email = '$email'");
			  $retrievepassword = mysql_fetch_assoc($result);
			  
			  if(md5($password) !== $retrievepassword['password'])
			  {
				  $error = "Password is incorrect";
			  }
			  
			  else
			  {
				  $_SESSION['email'] = $email;
				  header("location: profile.php");
			  }
			    
		  }
		  
		  else
		  {
			  $error = "Email does not exist";
		  }
		  
	}

?>

<!doctype html>

<html>

<head>
     <title>Login Page</title>
	 <link rel="stylesheet" href="css/styles.css" />
</head>


<body>
    
	<div id="error"><?php echo $error; ?></div>
    
	<div id="wrapper"/> 
	
	  <div id ="menu">
	      <a href = "index.php">Sign Up</a>
		  <a href = "login.php">Login</a>
	  </div>
	 
	 <div id="formDiv">
	  
	     <form method="POST" action="login.php">
		     
			 <label>Email:</label><br/>
			 <input type="text" name="email" /><br/><br/>
			 
			 <label>Password:</label><br/>
			 <input type="password" name="password" /><br/><br/>
			 
			 <input type="checkbox" name="checkbox" />
			 <label>Keep me logged in:</label><br/><br/>
			 
			 
			 
			 <input type="submit" name="submit" value="login"/>
		 
		 
		 </form>
	  
	</div>

</body>

</html>