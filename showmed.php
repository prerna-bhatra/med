
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
<div class="container">
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

	<div id="cart">
		<button class="btn" onclick="dec()"><b>-</b></button>
		<p id="num"></p>
		<button class="btn" onclick="inc()"><b>+</b></button>
	</div>



<script type="text/javascript">
	var num=1;
	function dec()
	{
		if(num>1)
		{
			num=num-1;
			document.getElementById('num').innerHTML=num;
		}		
	}
	function inc()
	{
		num=num+1;
			document.getElementById('num').innerHTML=num;
	}
	document.getElementById('num').innerHTML=num;
</script>
</div>
</body>
</html>







