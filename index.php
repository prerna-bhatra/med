<!DOCTYPE html>
<html>
<head>
    <title>Healthcrew</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script>

         function showHint(str) {
            if (str.length == 0) {
               document.getElementById("txtHint").innerHTML = "";
               return;
            }else {
               var xmlhttp = new XMLHttpRequest();
                    
               xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                     document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                  }
               }
               xmlhttp.open("GET", "fetch.php?q=" + str, true);
               xmlhttp.send();
            }
         }
      </script>
</head>
<body>
  <?php
      
   include_once('dbfunction.php'); 
   $funobj=new User(); 
  //echo "asdf";
  if(isset($_POST['signup']))
  {
        
    //echo "string";
    $username = $_POST['name'];  
        $emailid = $_POST['email'];  
        $password = $_POST['password']; 
        $address=$_POST['add']; 
        $mob=$_POST['pn'];
        $confirmPassword = $_POST['cpassword']; 
        if($password==$confirmPassword)
        {
            $register=$funobj->reg_user($username, $emailid,$address, $password,$mob);
                     if($register){  
                     echo "<script>alert('Registration Successful')</script>";  
                    }else{  
                    echo "<script>alert('Registration Not Successful')</script>";  
                    }  
        }
         else 
        {  
            //echo "string";
           echo "<script>alert('Password Not Match')</script>";  
          
        }   


        } 
       
             
  if (isset($_POST['login_account'])) {
        # code...
       // $funobj=new User();
        $uname=$_POST['email'];
        $password=$_POST['password'];
        $login=$funobj->check_login($uname, $password);
        if($login)
        {
                
                $_SESSION['sessionvar'] = 1;
                //$_SESSION['uid'] = $uname;
                //$_SESSION['uid'] = $user_data['id'];
               //echo $_SESSION['sessionvar'];
         // echo "<script>alert('Successful loggedin');window.location.href='index.php';</script>"; 
        }
        else
        {
          // echo $_SESSION['login'];
           echo "<script>alert('log in failed');window.location.href='index.php';</script>"; 
        }
        
    }
  ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Healthcrew</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
         <li><input type="text" class="form-control" name="search" placeholder="search medicine" onkeyup = "showHint(this.value)"></li>
        <!--<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>-->
        <li><a href="cart.php">Cart</a></li>
        <li><a href="#">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
        if(isset($_SESSION['sessionvar']))
        {
          //echo $_SESSION['sessionvar'];
         ?>
         <li><a href="index.php?logout=1"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li> 
         <?php
          }
          else 
          {
         ?><li><a href="signup_login.php"><span class="glyphicon glyphicon-log-in"></span>Sign Up</a></li> 
         <?php
          }
         ?>
      </ul>
    </div>
  </div>
</nav>
<div class="main-contetnt">
    <div id="txtHint">
        
    </div>
</div>
<div class="slide">
  <div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="doc1.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Ms yang</h3>
          <p>The best doctor gives least medicine.</p>
        </div>
      </div>

      
      <div class="item">
        <img src="doc1.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Ms smita</h3>
          <p>Whereever the art of medcine is loved there is also a love for hummanity.</p>
        </div>
      </div>

      <div class="item">
        <img src="doc2.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Ms prerna</h3>
          <p>Doctors are boon sent by god for us.</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
</body>
</html>
<?php
	if (isset($_GET['logout']))
  {
    $funobj->user_logout();  
  }
?>









