<?php  
    //session_start();
    include "dbconnect.php";
    require("login.php");
    if(isset($_SESSION['email']) == TRUE)
    {
         $set_email =$_SESSION['email'];
         //echo "Success";    
     }
    else
    { 
         //echo"not set";
       // header("location:login.php");
    }
    $sql = "select * from profile where email = '$set_email'";
    $result = mysqli_query($conn,$sql);
    if($result)
    {    
      if(mysqli_num_rows($result)>0)
      {
          while($row = $result->fetch_assoc()) 
          {
             // $fnames ['fname'];
          }
      }
  }