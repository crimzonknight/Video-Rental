<?php
session_start();
?>


<html>


	<head>
		<title>HOME</title>
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
	
   
	
  </div>

</nav>
	
	<form action="CRental.php" method="get">
				<input type="submit" value="Rental" name="Submit" id="frm1_submit" />				
	</form>

	<form action="CCustomer.php" method="get">
				<input type="submit" value="Manage Customer" name="Submit" id="frm1_submit" />
	</form>
	
	<form action="CInquire Title.php" method="get">
				<input type="submit" value="Inquire Title" name="Submit" id="frm1_submit" />				
	</form>
	
	<form action="CManage Reservation.php" method="get">
				<input type="submit" value="Manage Reservation" name="Submit" id="frm1_submit" />				
	</form>
	
	<form action="log out.php" method="get">
				<input type="submit" value="Log out" name="Submit" id="frm1_submit" />				
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