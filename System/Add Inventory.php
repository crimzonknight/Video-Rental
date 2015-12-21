<?php
session_start();
?>


<html>


	<head>
		<title>ADD INVENTORY</title>
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
			
			$manager=$_SESSION['manager'];
			
			require_once('conn.php');
			
				
			
			if(!isset($_SESSION['manager']))
			{
				header("Location: manager.php");
			}
			
			
		?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      
	  <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"></span></a>
	  <a class="navbar-brand" href="#"><?php echo"Manager $manager"?></a>
    </div>
	
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="MHome.php">Home</a></li>
        
      </ul>
      
    </div>
	
  </div>

</nav>





<div class="container">
		<h1>Add Inventory</h1>
		
		<form action="Add Inventory.php" method="POST">
			
			<input type="text" placeholder="Inventory ID" name="inv">
			
			<input type='text' placeholder="Movie ID" name="mid" />
			
			<input type="text" placeholder="Copies" name="copy">
			
			<input type='text' placeholder="Damaged" name="dam" />
			

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
				
			if(strlen ($_POST ['inv'])>0)
				{
					$inv=$_POST['inv'];
				}
			else
				{
					$inv=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Inventory ID is required.
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
					<strong>Warning!</strong>  Movie ID is required.
					</div>!";
				}
				
			if(strlen ($_POST ['copy'])>0)
				{
					$copy=$_POST['copy'];
				}
			else
				{
					$copy=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Copy is required.
					</div>!";
				}
				
			if(strlen ($_POST ['dam'])>0)
				{
					$dam=$_POST['dam'];
				}
			else
				{
					$dam=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Damage is required.
					</div>!";
				}
			
					
			if($inv && $mid && $copy && $dam)
				{
					require_once('conn.php');
					
					$query = "INSERT INTO inventory (InventoryId,MovieId,Copy,Damage) values ('$inv', '$mid', '$copy','$dam')";
					$result=mysql_query($query);
					
					
					
					if($result)
					{
						echo"
						<div class='alert alert-success'>
						<strong>Success!</strong> Successfully added new Inventory.
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