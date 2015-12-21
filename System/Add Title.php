<?php
session_start();
?>


<html>


	<head>
		<title>ADD TITLE</title>
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
		<h1>Add Title</h1>
		
		<form action="Add Title.php" method="POST">
			
			<input type="text" placeholder="Movie ID" name="mid">
			
			<input type='text' placeholder="Title" name="title" />
			
			<input type="text" placeholder="Genre" name="genre">
			
			<input type='text' placeholder="Description" name="desc" />
			
			<input type="text" placeholder="Year" name="year">
			
			

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
				
			if(strlen ($_POST ['genre'])>0)
				{
					$genre=$_POST['genre'];
				}
			else
				{
					$genre=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Genre is required.
					</div>!";
				}
				
			if(strlen ($_POST ['desc'])>0)
				{
					$desc=$_POST['desc'];
				}
			else
				{
					$desc=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Description is required.
					</div>!";
				}
			
			if(strlen ($_POST ['year'])>0)
				{
					$year=$_POST['year'];
				}
			else
				{
					$year=FALSE;
					echo"<div class='alert alert-warning'>
					<strong>Warning!</strong> Year is required.
					</div>!";
				}
			
			if($mid && $title && $genre && $desc && $year)
				{
					require_once('conn.php');
					
					$query = "INSERT INTO movie (MovieId,Title,Genre,Description,Year) values ('$mid', '$title', '$genre','$desc','$year')";
					$result=mysql_query($query);
					
					
					
					if($result)
					{
						echo"
						<div class='alert alert-success'>
						<strong>Success!</strong> Successfully added new Title.
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