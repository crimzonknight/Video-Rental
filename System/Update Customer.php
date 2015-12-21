<?php
session_start();
?>


<html>


	<head>
		<title>UPDATE CUSTOMER</title>
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
		<h1>Update Customer Info</h1>
		
		<form action="Update Customer.php" method="POST">
			<input type="text" placeholder="Customer ID" name="cust">
			<input type="text" placeholder="Firstname" name="fname">
			<input type='text' placeholder="Lastname" name="lname">
			<input type='text' placeholder="Address" name="address">
			<input type='text' placeholder="Phone" name="phone">
			

			<button type="submit"  name="sign">Update</button>
			
		</form>
	</div>
	
	
	<?php
	
	if(isset($_POST['sign']))
	{
		if(strlen($_POST['cust'])>0)
		{
			$cust = $_POST['cust'];
		}
		else
		{
			$cust = FALSE;
			echo "Customer ID is required.<br>";
		}
		if(strlen($_POST['fname'])>0)
		{
			$fname = $_POST['fname'];
		}
		else
		{
			$fname = FALSE;
			echo "Firstname is required.<br>";
		}
		if(strlen ($_POST ['lname'])>0)
		{
			$lname=$_POST['lname'];
		}
		else
		{
			$lname=FALSE;
			echo"<font color='red'>Lastname is required</font><br><br>";
		}
		
		if(strlen($_POST['address'])>0)
		{
			$address = $_POST['address'];
		}
		else
		{
			$address = FALSE;
		}
		
		if(strlen($_POST['phone'])>0)
		{
			$phone = $_POST['phone'];
		}
		else
		{
			$phone = FALSE;
		}
		
		if($cust && $fname && $lname && $address && $phone)
		{
		require_once('conn.php');
		$query = "SELECT* FROM customer WHERE CustomerId='$cust'";
		$result = mysql_query($query);

		
		$num = mysql_num_rows($result);
		if($num==1)
			{
			$query1 = "UPDATE customer SET Firstname='$fname' , Lastname='$lname' , Address='$address' , Phone='$phone'  WHERE CustomerId='$cust'";
			$result1 = mysql_query($query1);
			}
		else
			{
			echo "<div class='alert alert-warning'>
				<strong>Warning!</strong> Customer does not exist.
				</div>!";
			}
		if(mysql_affected_rows()==1)
			{
			echo"<br><br><br><br><br><br>
			<div class='alert alert-success'>
			<strong>STATUS UPDATE SUCCESS!  </strong></div>
			";
			}
		else
			{
				
			echo "<br><br><br><br><br><br>
			<div class='alert alert-danger'>
			<strong>STATUS UPDATE FAILED!  </strong>Check Corresponding Inputs</div>";
			}
		}
	}
	?>


<div class="container">
  <BR><BR><BR><h2>Customer</h2><br><br>
                   
  <table class="table table-striped">
   <thead>
      <tr>
        <th>Customer ID</th>
        <th>Firstname</th>
		<th>Lastname</th>
		<th>Address<th>
		<th>Phone#</th>
      </tr>
<?php
			
			require_once('conn.php');
			$query="SELECT * FROM customer";
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