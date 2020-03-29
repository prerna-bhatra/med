<form method="post" action=>
	<label>Enter your id to check orders</label>
<input type="number" name="id" value="">
<input type="submit" name="">
</form>
<?php

	include 'database.php';
	include 'dbfunction.php';
   $obj=new User();
   $conn=$obj->search();
   $u=$obj->get_session();
   echo $u;
   //echo "string";
	//echo $uid;


?>