<?php
session_start();
?>


<html>


	<head>
		<title>INQUIRE TITLE</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/style.css">
			 <link rel="stylesheet" href="css/astud.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom navbar.css">
  <link rel="stylesheet" href="css/bck.css">
	</head>

	<body>
		
		
		
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
  <h2>Inventory</h2><br><br>    
                   
  <table class="table table-striped">
   <thead>
      <tr>
        <th>Movie code#</th>
		<th>Title</th>
		<th>Genre</th>
		<th>Description</th>
        <th>Year</th>
		<th>Copies</th>
      </tr>
	<?php
			require_once('conn.php');
			$query="SELECT * FROM movie";
			$result=mysql_query($query);
			
			if($result)
			{
				while($row=mysql_fetch_array($result,MYSQL_NUM))
				{
					echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
				}
			
			}
		?>
	</table>
	
	
	
	

<div class="container">		

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