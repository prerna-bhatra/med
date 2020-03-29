<?php
include "config.php";
	class User{

		public $db,$uid;

		public function __construct(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;

			}
		}
				/*** for registration process ***/
		public function reg_user($username, $emailid,$address, $password,$mob){

			//echo "string";
			$password = md5($password);
			$sql="SELECT * FROM users WHERE email='$emailid'";
			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;
			
			//if the username is not in db then insert to the table
			echo $count_row;
			if ($count_row == 0){
				$sql1="INSERT INTO users(name, email, mob,address, password) VALUES ('".$username."','".$emailid."','".$mob."','".$address."','".$password."')";
				$result = mysqli_query($this->db,$sql1); //or die(mysqli_connect_errno()."Data cannot inserted");
        		if ($result) {
        			
        			return true;
	        		}
	        		else
	        		{
	        			return false;
	        		}
			}
			else 
			{ return false;}
		}

		/*** for login process ***/
		public function check_login($email, $password){
        	$password = md5($password);
			$sql2="SELECT id from users WHERE email='$email'  and password='".$password."'";
			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            // this login var will use for the session thing
	          
	            return true;
	    		$uid=$user_data['$id'];
	            //$uid=$_SESSION['1'];
	        }
	        else{
	        	
			    return false;
			}
    	}

    	
    	/*** starting the session ***/
	    public function get_session(){
	        //return $this->uid;
	        return $this->uid;
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }
	  public function search()
	  {
	  	return $this->db;
	  	 }
}
	?>





