
<?php 

session_start();
include 'db.php';

function validateName($name){
	// echo $name;
	if($name==''){
		echo(json_encode(array('status'=>'failure','message'=>' user name required')));
		return 0;
	}

	if(!preg_match("/^[a-zA-Z ]+$/", $name)){
	echo(json_encode(array('status'=>'failure','message'=>'user name should contain letters and spaces only')));
	return  0;
	}	
	return 1;
}


function validateEmail($email) {

	if ($email == '') {

		echo(json_encode(array('status' => 'failure', 'message' => 'Email is required')));
	} else {

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			echo(json_encode(array('status' => 'failure', 'message' => 'Valid email is required')));
		} else {
				return 1;
			 }
		}
		return 0;
	}

function validatePassword($password) {
	if ($password == '') {

		echo(json_encode(array('status' => 'failure', 'message' => 'Password is required')));
		return 0;
	}

	if (strlen($password) < 8) {

		echo (json_encode(array('status' => 'failure', 'message' => 'Password needs to have 8-32 characters')));
		return 0;
	}
	else
		return 1;
}
function validatePhone($phoneno) {
	if ($phoneno == '') {

		echo(json_encode(array('status' => 'failure', 'message' => 'Phone number is required')));
		return 0;
	}
	if (!preg_match('/^[6-9][0-9]{9}$/', $phoneno)) {

		echo(json_encode(array('status' => 'failure', 'message' => 'Phone number should have 10 digits and should start with 6,7,8, or 9')));
		return 0;
	}
	return 1;
}

function validateAddress($address){
	if($address==""){
		echo(json_encode(array('status'=>'failure','message'=>'adress ,city and state are required')));
	return 0;

	}
	return 1;
}

function validateGender($gender){
	if($gender==""){
		echo(json_encode(array('status'=>'failure','message'=>'Gender is required')));
	return 0;

	}
	if(!preg_match("/^[a-zA-Z]+$/", $gender)){
		echo(json_encode(array('status'=>'failure','message'=>'gender should contain letters only')));
		return  0;
		}	
		return 1;
}

function validateLanguage($language){
	if($language==""){
		echo(json_encode(array('status'=>'failure','message'=>'language preference is required')));
	return 0;

	}
	if(!preg_match("/^[a-zA-Z]+$/", $language)){
		echo(json_encode(array('status'=>'failure','message'=>' language should contain letters and spaces only')));
		return  0;
		}	
		return 1;
}
if($_SERVER["REQUEST_METHOD"] === "POST" )
	{
        $name      = $_POST["name"];          $email           = $_POST["email"];
        $gender    = $_POST["gender"];        $language1       = $_POST["language1"];
        $language2 = $_POST["language2"];     $language3       = $_POST["language3"];
		$phoneno   = $_POST["phoneno"];		  $address          = $_POST["address"];
		$password  = $_POST["password"];      $confirmPassword = $_POST["cpass"];
        
	

        //echo $name.' '.$rollno.' '.$phoneno.' '. $adress.' '.$email.' '.$password.' '.$confirPassword;
        
		if (isset($name) && isset( $phoneno) && isset($address) && isset($email) && isset($language1) && isset($language2) && isset($language3) && isset($password) && isset($confirmPassword)) 
		{
			if($password==$confirmPassword){
    
				$query1=mysqli_query($con,"SELECT * from users where email='$email'");
				$count=mysqli_num_rows($query1);
			
				if(mysqli_num_rows($query1)==0){
                  if( validateName($name) && validateEmail($email) && validateGender($gender) && validateLanguage($language1)  
                   && validateLanguage($language2) && validateLanguage($language3) && validatePhone($phoneno)   
                   && validateAddress($address) && validatePassword($password))
	              {            
                    $name = mysqli_real_escape_string($con, $name);
                    $email = mysqli_real_escape_string($con, $email);
                    $gender = mysqli_real_escape_string($con, $gender);
                    $language1 = mysqli_real_escape_string($con, $language1);
                    $language2 = mysqli_real_escape_string($con, $language2);
                    $language3 = mysqli_real_escape_string($con, $language3);
                    $phoneno = mysqli_real_escape_string($con, $phoneno);
                    $address = mysqli_real_escape_string($con, $address);
	        	    $password = mysqli_real_escape_string($con, hash('sha512', $password) );
					
				$q = "INSERT INTO users(username, email, gender, language1, language2, language3, phoneno, address, password) VALUES
                            ('$name','$email','$gender','$language1','$language2','$language3','$phoneno ','$address ','$password' )";
				
				$query = mysqli_query($con, $q);
				  if ($query) {
					$query = mysqli_query($con, 'SELECT email FROM users WHERE email="'.$email.'"');
					$email = mysqli_fetch_array($query)["email"];
					echo(json_encode(array('status'=>'success','message'=>$email)));
					
				  }
				}
		}
		else
		 {
		 	echo(json_encode(array('status'=>'failure','message' => 'Email is already registered')));
		 }
		}
		else
		 {
		 	echo(json_encode(array('status'=>'failure','message' => 'Passwords are not matching')));
		 }
		}
		 else
		 {
		 	echo(json_encode(array('status'=>'failure','message' => 'Fill all fields')));
		 }
	}
	else{
		echo(json_encode(array('status'=>'failure','message' => 'not a post request')));
	}

?>
