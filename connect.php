<?php

   $connect = mysqli_connect("localhost","root", "", "Registration");
   
   if(mysqli_connect_errno())
   {
	   echo "Error occured while connecting to the database".mysqli_connect_errno();
   }
   
   
?>