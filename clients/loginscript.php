<?php  
    
    // session_start();
	// include "dbconnect.php";
    // if(isset($_POST['login']))
    // {    
    //  $email = stripslashes($_POST['email']);
    // // $email = $email);
    //  $pass = stripslashes(md5($_POST['pass']));
    //   //check if the email exists
    //   $sql_email = "select * from profile  where email = '$email' AND pass = '$pass'";
    //   $result_email = mysqli_query($conn,$sql_email);
    //   if($result_email)
    //   {    
    //     if(mysqli_num_rows($result_email)>0){
    //         //echo"welcome".$email;
    //         $message = "Welcome".$email;
    //         echo "<script type='text/javascript'>alert('$message');</script>";
                    
    //         $_SESSION['email'] = $email;
    //         if(isset($_SESSION['email']))
    //     {
    //         echo $_SESSION['email']."welcome";
    //         header("location:index.php?email=$email&request=login&status=success");   
    //     }
    //     else
    //     { 
    //         //echo"not set";
    //         header("location:login.php");
    //     }
            
    //     }
        
    //     else
    //     {
    //         $message = "Username and/or Password incorrect.\\nTry again.";
    //         echo "<script type='text/javascript'>alert('$message');</script>";
            
    //     }
    //  }
    // }
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	include "dbconnect.php";
    if(isset($_POST['login']))
    {    
     $email = stripslashes($_POST['email']);
    // $email = $email);
     $pass = stripslashes(md5($_POST['pass']));
      //authentication
      $sql_email = "select * from profile  where email = '$email' AND pass = '$pass'";
      $result_email = mysqli_query($conn,$sql_email);
      if($result_email)
      {    
        if(mysqli_num_rows($result_email)>0){
            echo"welcome".$email;
            $message = "Welcome".$email;
            echo "<script type='text/javascript'>alert('$message');</script>";
                    
            $_SESSION['email'] = $email;
            if(isset($_SESSION['email']))
                {
                     //echo $_SESSION['email']."welcome";
                    header("location:index.php");   
                }
                else
                { 
                    //echo"not set";
                    //header("location:login.php");
                    echo '<script>window.location.href="login.php";</script>';
                 }
            
            }
        
            else
            {
                $message = "Username and/or Password incorrect.\\nTry again.";
                echo "<script type='text/javascript'>alert('$message');</script>";
            
            }
        }
    }
   