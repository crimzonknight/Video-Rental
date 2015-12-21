<?php
session_start();
?>


<html>


	<head>
		<title>ADD RESERVATION</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
          <link rel="stylesheet" href="css/style.css">
			 <link rel="stylesheet" href="css/astud.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom navbar.css">
  <link rel="stylesheet" href="css/bck.css">
	</head>

	<body>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>
		 
		
		
		<?php
			
			$clerk=$_SESSION['clerk'];
			
			require_once('conn.php');
			
				
			
			if(!isset($_SESSION['clerk']))
			{
				header("Location: clerk.php");
			}
			
			
		?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      
	  <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"></span></a>
	  <a class="navbar-brand" href="#"><?php echo"Clerk $clerk"?></a>
    </div>
	
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="CHome.php">Home</a></li>
        
      </ul>
      
    </div>
	
  </div>

</nav>





<div class="container">
		<h1>Add Reservation</h1>
		
		<form action="Add Reservation.php" method="POST">
			
			<input type="text" placeholder="Reservation ID" name="res">
			
			<input type='text' placeholder="Customer ID" name="cust" />
			
			<input type="text" placeholder="Movie ID" name="mid">
			
			<input type='text' placeholder="Title" name="title" />
			

			<button type="submit"  name="sign" >Add</button>
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
				
			if(strlen ($_POST ['res'])>0)
				{
					$res=$_POST['res'];
				}
			else
				{
					$res=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Reservation ID is required.
					</div>!";
				}
				
			if(strlen ($_POST ['cust'])>0)
				{
					$cust=$_POST['cust'];
				}
			else
				{
					$cust=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Customer ID is required.
					</div>!";
				}
				
			if(strlen ($_POST ['mid'])>0)
				{
					$mid=$_POST['mid'];
				}
			else
				{
					$mid=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Movie ID is required.
					</div>!";
				}
				
			if(strlen ($_POST ['title'])>0)
				{
					$title=$_POST['title'];
				}
			else
				{
					$title=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Title is required.
					</div>!";
				}
			
					
			if($res && $cust && $mid && $title)
				{
					require_once('conn.php');
					
					$query = "INSERT INTO reservation (ReserveId,CustomerId,MovieId,Title) values ('$res', '$cust', '$mid','$title')";
					$result=mysql_query($query);
					
					
					
					if($result)
					{
						echo"
						<div class='alert alert-success'>
						<strong>Success!</strong> Successfully added new Reservation.
						</div>
						";
						
						
					}
					else
					{
						echo"
						<div class='alert alert-danger'>
						<strong>ERROR!</strong> Error in saving.
						</div>
						";
						
					}
					
				}
				
				
	}			
	
	
	
?>





</body>
</html>