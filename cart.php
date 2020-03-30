<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//if(isset($_SESSION['uid']))
//{
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
	<label>Enter your id to check orders</label>
<input type="number" name="id" value="">
<input type="submit" name="submitsession">
</form>
<?php
//}
	include 'database.php';
	include 'dbfunction.php';
   $obj=new User();
   $conn=$obj->search();
  // $u=$obj->get_session();
  // echo $GLOBALS['u'];
   //echo $u;
	//echo $GLOBALS['uid'];
   //echo "string";
	//echo $uid;
if(isset($_POST['submitsession']))
{
	//echo "string";
	$id=$_POST['id'];
	$select="SELECT * FROM cart where uid='$id'";
	$res=mysqli_query($conn,$select);
	?>
	<div class="row">
		<div class="col-md-6">
	<table class="table table-hover">
		<tr>
			<td>Order Id</td>
			<td>Med Name</td>
			<td>Total Price</td>
		</tr>
	<?php

	 while($row=mysqli_fetch_array($res))
	 {
	 	//echo $row['id'];

	 	?>
	 	<tr>
	 		<td><?php echo $row['id'] ?></td>
	 		<td><?php 
	 			$medid=$row['id'];
	 			$med="SELECT * FROM `medicines` WHERE id=$medid";
	 			$result=mysqli_query($conn,$med);
				$output=mysqli_fetch_assoc($result);
				echo $output['name'];
	 		 ?></td>
	 		<td><?php echo $row['total'] ?></td>
	 	</tr>
	 	<?php
	 }
}
?>
</table>
</div>
</div>
</body>
</html>
