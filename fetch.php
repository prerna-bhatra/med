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
   ?>
   <ul>
      <?php
         while ($output=mysqli_fetch_assoc($result)) {
            ?>
            <li><p id="medname"><?php echo $output['name'];?></p><p id="medprice"><?php echo 'Rs.'.$output['price'] ; ?></p><a href="showmed.php?id=<?php echo $output['id']; ?>" ><span class="glyphicon glyphicon-shopping-cart"></span> </a></li>
          <?php
         }

      ?>
   </ul>
   <?php
} 
?>