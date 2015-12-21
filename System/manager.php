<?php
session_start();
?>


<html>
<head>
		<title>Login Manager</title>
          <link rel="stylesheet" href="css/style.css">
			 <link rel="stylesheet" href="css/log.css">

	
  
</head>
<body>
	<div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		
		<form action="manager.php" method="POST">
			<input type="text" placeholder="Manager ID" name="manager">
			<input type="text" placeholder="Password" name="pswd">

			<button type="submit"  name="sign">Login</button>
			
			
		</form>
			<a href="clerk.php">Login as Clerk</a>
			<form action="Add Manager.php" method="get">
				<input type="submit" value="Sign up" name="Submit" id="frm1_submit" />
			</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>


	<?php
	
	
		if(isset($_POST['sign']))
		{
			if(strlen ($_POST ['manager'])>0)
				{
					$manager=$_POST['manager'];
				}
			else
				{
					$manager=FALSE;
					echo"<font color='red'>Manager ID is required</font><br><br>";
				}
				
				
			if(strlen ($_POST ['pswd'])>0)
				{
					$pswd=$_POST['pswd'];
				}
			else
				{
					$pswd=FALSE;
					echo"<font color='red'>PASSWORD is required</font><br><br>";
				}
				
				
			if($manager && $pswd)
				{
					require_once('conn.php');
					
					$query = "SELECT* FROM manager WHERE ManagerId='$manager' AND Password=encode('$pswd','secret_word')";
					$result=mysql_query($query);
					
					$num = mysql_num_rows($result);
					if($num==1)
					{
						echo"Successfully Log in";
						
						$_SESSION['manager']=$_POST['manager'];
						header("Location: Mhome.php");
					}
					else
					{
						echo "Does not exist!";
					}
					
				}
				
		}
		
		
		
		
		
	?>
<script src='js/jquery.min.js'></script>

        <script src="js/index.js"></script>

	
	
</body>
</html>