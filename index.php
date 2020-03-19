
<!DOCTYPE html>
<html>
<head>
    <title>Healthcrew</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
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
         <li><input type="search" class="form-control" name="search" placeholder="search medicine" onkeyup=""></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
        if(!isset($_SESSION['login']))
        {
        ?>
        <li><a href="signup_login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
        <?php
         }
             if(isset($_SESSION['login']))
            {
                ?>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
                <?php
            }
        ?>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>

<?php
    

	include_once('dbfunction.php');  
	
	//echo "asdf";
	if(isset($_POST['signup']))
	{
        $funobj=new User();
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
        $funobj=new User();
        $uname=$_POST['email'];
        $password=$_POST['password'];
        $login=$funobj->check_login($uname, $password);
        if($login)
        {
            //echo $_SESSION['login'];
          echo "<script>alert('Successful loggedin');window.location.href='index.php';</script>"; 
        }
        else
        {
            //echo $_SESSION['login'];
            echo "<script>alert('log in failed');window.location.href='index.php';</script>"; 
        }
        
    }

?>









