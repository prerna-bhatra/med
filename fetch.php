<?php

   if(!empty($_GET['q']))
{

   include 'database.php';
   include 'dbfunction.php';
   $q=$_GET['q'];
   $query="SELECT * from medicines where name like '$q%'";
   $obj=new User();
   $conn=$obj->search();
   $result=mysqli_query($conn,$query);
   while ($output=mysqli_fetch_assoc($result)) {
      echo '<a>'.$output['name'].'</a>'."<br>";
      
    } 
} 

?>