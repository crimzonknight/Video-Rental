<?php
session_start();
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Add Clerk</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/astud.css">
		
    
    
  </head>

  <body>

    <div class="wrapper">
	<div class="container">
		<h1>ADD CLERK</h1>
		
		<form action="Add CLERK.php" method="POST">
			<input type="text" placeholder="Clerk ID" name="clerk">
			<input type="text" placeholder="Firstname" name="fname">
			<input type="text" placeholder="Lastname" name="lname">
			<input type="text" placeholder="Password" name="pswd">
			<input type="text" placeholder="Confirm Password" name="cpswd">

			<button type="submit"  name="sign">Add</button>
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
			if(strlen ($_POST ['clerk'])>0)
				{
					$clerk=$_POST['clerk'];
				}
			else
				{
					$clerk=FALSE;
					echo"<font color='red'>CLERK ID is required</font><br><br>";
				}
				
				
			if(strlen ($_POST ['fname'])>0)
				{
					$fname=$_POST['fname'];
				}
			else
				{
					$fname=FALSE;
					echo"<font color='red'>FIRST NAME is required</font><br><br>";
				}
				
			if(strlen ($_POST ['lname'])>0)
				{
					$lname=$_POST['lname'];
				}
			else
				{
					$lname=FALSE;
					echo"<font color='red'>LAST NAME is required</font><br><br>";
				}
				
			if(strlen ($_POST['pswd'])>0 && $_POST['pswd'] == $_POST['cpswd'])
				{
					$pswd=$_POST['pswd'];
				}
			else
				{
					$pswd=FALSE;
					echo"<font color='red'>PASSWORD & CONFIRM PASSWORD does not matched</font><br><br>";
				}
				
				
			if($clerk && $fname && $lname && $pswd)
				{
					require_once('conn.php');
					
					$query="insert into clerk (ClerkId,Firstname,Lastname,Password) values ('$clerk','$fname', '$lname', encode('$pswd','secret_word'))";
					$result=mysql_query($query);
					
					if($result)
					{
						header("Location: clerk.php");
						
					}
					else
					{
						echo"<font color='red'>error in saving</font>";
						
					}
					
				}
		}	
				
				
	?>



    <script src='js/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
