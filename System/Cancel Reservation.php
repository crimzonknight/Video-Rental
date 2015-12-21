<?php
session_start();
?>


<html>


	<head>
		<title>CANCEL RESERVATION</title>
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
		<h1>Cancel Reservation</h1>
		
		<form action="Cancel Reservation.php" method="POST">
			
			<input type="text" placeholder="Reservation ID" name="res">
			
			<input type='text' placeholder="Customer ID" name="cust" />
			
			<input type="text" placeholder="Movie ID" name="mid">
			
			<input type='text' placeholder="Title" name="title" />
			
			

			<button type="submit"  name="sign" >Delete</button>
		</form>
		
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
		
			
			$query1 = "DELETE FROM reservation WHERE ReserveId='$res' AND CustomerId='$cust' AND MovieId='$mid' AND Title='$title' ";
			$result1 = mysql_query($query1);
			
			if($result1)
					{
						echo"
						<div class='alert alert-success'>
						<strong>Success!</strong> Successfully Cancelled Reservation.
						</div>
						";
						
						
					}
					else
					{
						echo"
						<div class='alert alert-danger'>
						<strong>ERROR!</strong> Error in Canceling.
						</div>
						";
						
					}
		}
		else
			{
			echo "<div class='alert alert-warning'>
				<strong>Warning!</strong> Reservation does not exist.
				</div>!";
			}
		
					
		
		
	}
	?>


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