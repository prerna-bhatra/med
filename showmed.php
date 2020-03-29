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
<?php
   include 'database.php';
   include 'dbfunction.php';
   $obj=new User();
   $conn=$obj->search();
   if(isset($_GET['id']))
   {
   $id=$_GET['id'];
	$query="SELECT * from medicines where id=$id";
	$result=mysqli_query($conn,$query);
	$output=mysqli_fetch_assoc($result);
	$stock=$output['stock'];
	
?>
<h1>Order</h1>
<?php $medid=$output['id']; ?>
Stock=<p id="stock"><?php echo $output['stock']; ?></p><br>
<p id="medname"><?php echo $output['name']; ?></p>
<p id="medname"><?php echo "Rs.".$output['price']; ?></p>

	<div id="cart">
		<button class="btn" onclick="dec()"><b>-</b></button>
		<p id="num"></p>
		<button class="btn" onclick="inc()"><b>+</b></button>
		<form method="POST" id="form-id" action="showmed.php?sub=1 ">
		<input type="hidden" name="oid" value="<?php echo $id  ?>">
		<input type="hidden" name="medid" value="<?php echo $medid ?>">
		<input type="hidden" name="total" value="0" id="total">
		<input type="hidden" name="value" id="val" value="1">
		<input type="submit" value="Add to cart" name="submit" class="btn btn-info">
			<!--<a href="" id="your-id" class="btn btn-info" onclick="this.form.submit()">Add to cart</a>-->
		</form>
		Total Price
		<div id="showprice">

		</div>
	</div>

	<div>
		<?php
			if($output['stock']==0)
			{
				?>
					<p>Out of Stock</p>
				<?php
			}
		?>
	</div>
<script type="text/javascript">
	//var num=1;
	 var num = 1;
	  //var st = '<?php echo $stock; ?>';
	  
	function dec()
	{
		if(num>1)
		{
			var price='<?php echo $output['price'] ?>'
			num=num-1;
			price=num*parseInt(price);
			document.getElementById('num').innerHTML=num;
			document.getElementById('showprice').innerHTML=price;
			document.getElementById('val').value=num;
			document.getElementById('total').value=price;
			

		}
		
			
	}
	function inc()
	{
			var price='<?php echo $output['price'] ?>'		
			num=parseInt(num)+1;
			price=num*parseInt(price);
			document.getElementById('num').innerHTML=num;
			document.getElementById('val').value=num;
			document.getElementById('showprice').innerHTML=price;
			document.getElementById('total').value=price;
			
	}
	document.getElementById('val').innerHTML=num;
	document.getElementById('total').value=price;
			
	/*var form = document.getElementById("form-id");
	document.getElementById("your-id").addEventListener("click", function () {form.submit();});*/

</script>

</div>
<?php  
}
?>
<?php
if(isset($_GET['sub']))
{
	
	$id=$_POST['oid'];
	$medid=$_POST['medid'];
	$val=$_POST['value'];
	$total=$_POST['total'];
	//echo $val;
	//echo $total;
	$insert="INSERT INTO `cart`( `uid`, `med_id`, `orders`, `total`) VALUES ('".$id."','".$medid."','".$val."','".$total."')";
	//$insert="INSERT INTO `cart` ( `uid`, `med_id`, `orders`, `total`) VALUES ('2', '3', '2', '20');";
	//echo $insert;
	$result=mysqli_query($conn,$insert);
	//echo $result;
	echo "<script>alert('Orerdred Succesful');
		window.location.href='cart.php';</script>";

	/*$query="SELECT * from medicines where id=$id";
	$result=mysqli_query($conn,$query);
	$output=mysqli_fetch_assoc($result);
	//$uid=$obj->get_session();
	$query2="INSERT into cart ";
	//echo "string";*/
}
?>
</body>
</html>





