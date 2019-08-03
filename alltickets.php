<!DOCTYPE html>
<html>

<head>
<?php
      include('session.php');
      include('loginscript.php'); 
      require("header.php"); 
      
     
      //to check if session isset
      if(!isset($_SESSION['email']) /*== TRUE*/)
      {      
        echo '<script>window.location.href="login.php";</script>';             
        }
      else 
      {
        
       
        //to display fields from db services table
        $sql_services = "select * from services";
        $result_services = mysqli_query($conn, $sql_services);
        while ($row_services = mysqli_fetch_assoc($result_services)) 
        {
          $uid = $row_services['uid'];
        }
        
        // items from db services
          $sql = "select services.id,services.tos,services.description,services.attachment,services.priority,services.reportdate,services.solution ,profile.fname, profile.extension
          FROM services INNER JOIN profile  ON profile.id=services.uid";
          $result = mysqli_query($conn, $sql);

        //   //inner join
        // $sql_join ="SELECT profile.fname, profile.extension
        // FROM profile 
        // INNER JOIN services  ON profile.id=services.uid";   
        // $result_join =mysqli_query($conn, $sql_join);
        // if(!$result_join)
        // {
        //     echo"uploaded";
        // }
      }
      //for solution
      if(isset($_POST['solution']))
      {
        $solution = $_POST['solution'];
        echo $solution;
        $id = $_POST['labelid'];
        $sql_solve ="update services set solution='$solution' where id='$id' ";
        $result_solve = mysqli_query($conn,$sql_solve);
        if($result_solve)
        {
            // echo"uploaded";
            echo '<script>window.location.href="alltickets.php";</script>'; 
        }
        else
        {
          echo mysqli_error($conn);
        }
      }
     
   
 ?>
   
</head>

<body>
<div class="container-fluid">
  <form class="form-horizontal" role="form" id="frminput">
    <fieldset>
    <center>
      <legend>All Tickets</legend></center>
      <!--Table-->
      <div class="card mb-3">
        <div class="card-header"> <i class="fa fa-table"></i> All Tickets Submitted </div>         
        <div class="card-body"> 
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Solve</th>
                  <th>Ticket Number</th>
                  <th> First Name
                  <th> Extension Number
                  <th>Date</th>
                  <th>Attachment</th>
                  <th>Type Of Service</th>
                  <th>Description </th>
                  <th>Priority</th>
                  <th>Solution</th>
                </tr>
              </thead>             
              <tbody>
                 
              <?php
                  //  $last_id = mysqli_insert_id($conn);
                    
                  // //to display fields from db profile table
                  // $sql_profile = "select * from profile where id='$uid'";
                  // $result_profile = mysqli_query($conn,$sql_profile); 
                  //   while ($row_profile = mysqli_fetch_assoc($result_profile)) 
                  //   {
                  //       $fname = $row_profile["fname"];
                  //       $extension = $row_profile["extension"];
                  //       $id = $row_profile["id"];
                
                  //   }
                  // while ($row_join = mysqli_fetch_assoc($result_join )) 
                  // {
                  //   $fname = $row_join['fname'];
                  //   $ext =$row_join['extension'];
                    
                    
                   while ($row = mysqli_fetch_assoc($result)) {
                    $id=  $row["id"];  
                    $fname=   $row['fname'] ;   
                    $ext=   $row['extension'];  
                    $rdate= $row["reportdate"];  
                    $picture= $row["attachment"];
                    //$x;
                    // for ($x = 0; $x <= 10; $x++) {
                      // to display pic corrections to be made 
											$files = glob("images/*.*");
											for ($i=0; $i<count($files); $i++) 
													{
															$image = $files[$i];
													}
													if($image = $picture)
													{
                     
                     
                       ?>
                <tr>
                    <td> <a class="quote btn btn-md btn-primary" href="#quote_modal_<?php echo $row['id']; ?>" title="">Solve</a>
                          <!--Quote Popup Window like Modal-->
                            <div id="quote_modal_<?php echo $id; ?>" class="QuoteModal">
                              <div class="popup_modal">
                                <div>
                                  <a href="#close" title="Close" class="fclose">X</a>
                                  <h3>Type your solution here</h3>
                                </div>
                                <div>
                                  <form role="form" class="text-center" method="post" action="alltickets.php">
                                    <div class="form-group">
                                      <input type="text"  class="form-control"  name=" labelid"  readonly value="<?php echo $row['id']; ?>">
                                    </div>
                                    <!-- <div class="form-group">
                                      <input type="email" required class="form-control" placeholder="Email" tabindex="2">
                                    </div> -->
                                    <div class="form-group">
                                      <textarea rows="10" required class="form-control" placeholder="Message"   name="solution"></textarea>
                                    </div>
                                </div>
                                <div>

                                  <button type="submit" id="solve_<?php echo $row['id']; ?>"class="btn btn-warning"name="solve">Post Solution</button>
                                </div>
                                </form> 
                              </div>
                            </div>
                    
        
                    <td><?php echo $id; ?>
                    <td><?php echo $fname;  ?>
                    <td> <?php echo $ext; ?>
                    <td><?php echo $rdate; ?>
                    <td><a href=" images/<?php echo $image;?>" data-toggle="modal" data-target="#myModal_<?php echo $id?>"><?php echo $image;?>
                        
                    
								
                        <!-- Modal -->
                        <div class="modal fade" id="myModal_<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Attachment</h4>
                                <h4 class="modal-title" id="myModalLabel"><?php echo $uid?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                                <img  src=" images/<?php echo$image?>" class="img-fluid" alt="picture " > 
                                 <?php //echo '<img src="images/'.$image.'" alt="random image">'."&nbsp;&nbsp;";?>  
                              </div>
                              <div class="modal-footer">
                                
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                              </div>
                            </div>
                          </div>
                        </div>
                    <td><?php echo $row["tos"]; ?>
                    <td><?php echo $row["description"]; ?>
                    <td><?php echo $row["priority"]; ?>
                    <td> <textarea disabled name="solution" style="width:400px; height:30px;" required id="solutions"><?php echo $row['solution']; ?></textarea>                    
              </tbody>
              <?php
                      //  }
                   }}?>
              <tfoot>
                <tr>
                  <th>Solve</th>
                  <th>Ticket Number</th>
                  <th> First Name
                  <th> Extension Number
                  <th>Date</th>
                  <th>Attachment</th>
                  <th>Type Of Service</th>
                  <th>Description </th>
                  <th>Priority</th>
                  <th>Sloution</th>
                </tr>
                 
                 
              </tfoot>
              
                
            </table>
          </div>
        </div>
    </div> 
     
  </fieldset>
  </form>
</div>
<?php require("footer.php"); ?>
</body>

</html>