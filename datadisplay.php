<?php  
  include('loginscript.php'); 
   if(!isset($_SESSION['email']) /*== TRUE*/)
   {      
     echo '<script>window.location.href="login.php";</script>';             
   }
   else 
   { 
     $set_email =$_SESSION['email'];
     
     //to display fields from db 
     $sql = "select * from services  where email = '".$_SESSION['email']."'";
     $result = mysqli_query($conn,$sql);
     if($result)
     {
         while ($row = mysqli_fetch_assoc($result)) 
         {
             $fname = $row["fname"];              
             $dept = $row["dept"];
             $uid = $row["id"];
             $avatar_image["attachment"];

         }
     }
    }
    echo $avatar_image;
        echo $fname;
    $files = glob("images/*.*");
    if( $avatar_image=  $files)
      {
        echo $_SESSION['email'];
        
        for ($i=1; $i<count($files); $i++)
        {      
          $num = $files[$i];
          echo '<img src="'.$num.'" alt="random image" width=25% height=30%>'."&nbsp;&nbsp;";
         }      
      }