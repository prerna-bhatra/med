
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Add to cart</h1>
<?php
	include 'database.php';
   include 'dbfunction.php';
   $obj=new User();
   $conn=$obj->search();
   $id=$_GET['id'];
	$query="SELECT * from medicines where id=$id";
	$result=mysqli_query($conn,$query);
	$output=mysqli_fetch_assoc($result);
	echo $num=1;
?>
<div class="container">
<p id="medname"><?php echo $output['name']; ?></p>
<p id="medname"><?php echo "Rs.".$output['price']; ?></p>
<div>
<div id="cart">
<button class="btn" ><b>-</b></button>
<?php echo $num ?>
<button class="btn"><b>+</b></button>
</div>

</div>
</body>
</html>


