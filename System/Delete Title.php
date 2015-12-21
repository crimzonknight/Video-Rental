<?php
session_start();
?>


<html>


	<head>
		<title>DELETE TITLE</title>
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
        <li class="active"><a href="Mhome.php">Home</a></li>
        
      </ul>
      
    </div>
	
  </div>

</nav>


	<div class="container">
		<h1>Delete Title</h1>
		
		<form action="Delete Title.php" method="POST">
			
			<input type="text" placeholder="Movie ID" name="mid">
			
			<input type='text' placeholder="Title" name="title" />
			
			<input type="text" placeholder="Genre" name="genre">
			
			<input type='text' placeholder="Description" name="desc" />
			
			<input type="text" placeholder="Year" name="year">
			
			

			<button type="submit"  name="sign" >Delete</button>
		</form>
		
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
		$query = "SELECT* FROM movie WHERE MovieId='$mid' AND Title='$title' AND Genre='$genre' AND Description='$desc' AND Year='$year'";
		$result = mysql_query($query);
		$query2 = "INSERT INTO deletedmovie (MovieId,Title,Genre,Description,Year) values ('$mid', '$title', '$genre','$desc','$year')";
		$result2 = mysql_query($query2);
		
		
			
			
			$query1 = "DELETE FROM movie WHERE MovieId='$mid' AND Title='$title' AND Genre='$genre' AND Description='$desc' AND Year='$year'";
			$result1 = mysql_query($query1);
			
			if($result2)
					{
						echo"
						<div class='alert alert-success'>
						<strong>Success!</strong> Successfully deleted Title.
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
		else
			{
			echo "<div class='alert alert-warning'>
				<strong>Warning!</strong> Customer does not exist.
				</div>!";
			}
		
					
		
		
	}
	?>


<div class="container">
  <BR><BR><BR><h2>Title</h2><br><br>
                   
  <table class="table table-striped">
   <thead>
      <tr>
        <th>Movie ID</th>
        <th>Title</th>
		<th>Genre</th>
		<th>Description<th>
		<th>Year</th>
      </tr>
<?php
			
			require_once('conn.php');
			$query="SELECT * FROM movie";
			$result=mysql_query($query);
			
			if($result)
			{
				while($row=mysql_fetch_array($result,MYSQL_NUM))
				{
					echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
				}
			
			}
		?>
	</table>
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



		
	</body>
	
</html>