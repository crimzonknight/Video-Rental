<?php
session_start();
?>


<html>


	<head>
		<title>MANAGE TITLE</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/style.css">
			 <link rel="stylesheet" href="css/astud.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom navbar.css">
  <link rel="stylesheet" href="css/bck.css">
	</head>

	<body>
		
		
		
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
        <li class="active"><a href="Chome.php">Home</a></li>
        
      </ul>
      
    </div>
	
  </div>

</nav>
	
	
	
	
	<div class="container">
  <BR><BR><BR><h2>Reservation</h2><br><br>
                   
  <table class="table table-striped">
   <thead>
      <tr>
        <th>Reserve ID</th>
        <th>Customer ID</th>
		<th>Movie ID</th>
		<th>Title<th>
      </tr>
<?php
			
			require_once('conn.php');
			$query="SELECT * FROM reservation";
			$result=mysql_query($query);
			
			if($result)
			{
				while($row=mysql_fetch_array($result,MYSQL_NUM))
				{
					echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
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