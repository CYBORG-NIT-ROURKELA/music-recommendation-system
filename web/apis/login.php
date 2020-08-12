<?php
session_start();
include 'db.php';
if($_SERVER["REQUEST_METHOD"] === "POST" ){

    $loginEmail=$_POST['loginEmail'];
    $loginPassword=$_POST['loginPassword'];

  	  if(!empty($loginEmail) && !empty($loginPassword))
   	 {
		  $loginPassword=hash('sha512', $loginPassword);

       		 $query ="SELECT * FROM users WHERE email='$loginEmail' AND password='$loginPassword'";
       		 $query_run=mysqli_query($con,$query);
		        if(mysqli_num_rows($query_run)==1)
       		 { 
                  $query_row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                  $_SESSION['logged_in'] = 1;
				  $_SESSION['name'] = $query_row['username'];
				  $_SESSION['user_id']=$query_row['id'];
                  $_SESSION['email']=$query_row['email'];
                  echo(json_encode(array('status'=>'success')));

                  
            }
       		   else
       		   {
       	 	      echo(json_encode(array('status'=>'failure','message' => 'Wrong password  or unregistered email')));
     	 	    }
     	  } 
	    else
	    {
	    
         echo(json_encode(array('status'=>'failure','message' => 'Please fill out all the fields')));
   	 	   
             }
        
      }
      else
      {
      echo(json_encode(array('status'=>'failure','message' => 'Not a post request')));
      }

	mysqli_close($con);
	?>
