<?php
      include('loginscript.php'); 
     require("header.php");
     
    //  require("dislpaydata.php");
     if(!isset($_SESSION['email']) /*== TRUE*/)
      {
        // header("location:login.php");
        echo '<script>window.location.href="login.php";</script>';             
       }
      else 
      { 
        $set_email =$_SESSION['email'];
       // echo "Success"; 
        //to display fields from db 
        $sql = "select * from profile where email = '".$_SESSION['email']."'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            // if(mysqli_num_rows($result)>0)
            // {
            //     $fname ='fname';
            // }
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $fname = $row["fname"];
                $lname = $row["lname"];
                $gender = $row["gender"];
                $dept = $row["dept"];
                $profession = $row["profession"];
                $extension = $row["extension"];
                $picture = $row["picture"];

            }
                

        }
      }     
?>
          
<!DOCTYPE html>
    <html>

    <head>
       
        <title>Home</title>

    </head>

    <body>
     <div class="container-fluid" id="main">
            <div class=" bg-info row clearfix">
                <div class="col-md-12 column">
                    <div>
                        <br>
                        <div class="panel-group white" id="panel-profile">
                            <div class="panel panel-default white">
                                <div class="panel-heading white">
                                    <center>
                                        <a class="panel-title">Details</a>
                                    </center>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-3" id="right-col" > 
                                            <div class="card card-body" height="30%">
                                               <div id="change_head" > 
                                               <h4 class="card-title"><hr>Profile photo</hr></h4><br>
                                                
                                                <?php
                                                // to display pic corrections to be made 
                                                    $files = glob("images/*.*");

                                                    for ($i=0; $i<count($files); $i++) {
                                                        $image = $files[$i];
                                                        
                                                        }
                                                        if($image = $picture)
                                                        {
                                                            // print $image ."<br />";?>
                                                        <img class="img-fluid" src="images/<?php echo $image;?>" alt="Random image" /><br /><br />
                                                 <?php }?>
                                                 </div>
                                                <!-- <img class="img-fluid" src="images/1.jpg"> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-9" id="right-col" ><p></p>
                                            <div class="card card-body">
                                                <h4 class="card-title">General Information</h4>
                                                <p class="card-text">First Name: <?php echo $fname; ?></p>
                                                <p class="card-text">Last Name: <?php echo $lname; ?></p>
                                                <p class="card-text">Gender: <?php echo $gender;?></p>
                                                <p class="card-text">Email: <?php echo $set_email; ?></p>
                                                <p class="card-text">Department: <?php echo $dept;?></p>
                                                <p class="card-text">Profession: <?php echo $profession;?></p>
                                                <p class="card-text">Extension Number: <?php echo $extension?></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php require("footer.php");?>
    