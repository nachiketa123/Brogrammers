<?php
 if(!require('constants.php'))
 {
	 echo('error.. constants.php not found');
	 exit();
 }
 class Connection
 {
	 public $con;
	 
	 function connect_db()
	 {
		 $con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		  if(!$con)
		 {
			 echo('database connection error');
			 exit();
		 }
		 return $con;
	 }
 }

?>