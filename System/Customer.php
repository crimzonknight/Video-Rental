<?php
session_start();
?>


<html>


	<head>
		<title>MANAGER CUSTOMER</title>
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
	
	<form action="Add Customer.php" method="get">
				<input type="submit" value="Add Customer" name="Submit" id="frm1_submit" />				
	</form>

	<form action=" Update Customer.php" method="get">
				<input type="submit" value="Update Customer" name="Submit" id="frm1_submit" />
	</form>
	
	<form action="Delete Customer.php" method="get">
				<input type="submit" value="Delete Customer" name="Submit" id="frm1_submit" />				
	</form>
	
	<form action="Mhome.php" method="get">
				<input type="submit" value="HOME" name="Submit" id="frm1_submit" />				
	</form>
	
	
	
	

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