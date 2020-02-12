<?php

  require_once('connect.php');
  $id = $_GET['id'];
  $SelSql = "SELECT * FROM invoices_master WHERE id=$id";
  $res = mysqli_query($connection, $SelSql);
  $r = mysqli_fetch_assoc($res);
  if(isset($_POST) & !empty($_POST)){

      $date = mysqli_real_escape_string($connection, $_POST{'date'});
      $agency = $_POST{'agency'};
      $name = mysqli_real_escape_string($connection, $_POST{'name'});
      $postcode = mysqli_real_escape_string($connection, $_POST{'postcode'});
      $hours = mysqli_real_escape_string($connection, $_POST{'hours'});
      $gross = $_POST{'gross'};
      $tax = $_POST{'tax'};
      $ni = $_POST{'ni'};
      $total = $_POST{'total'};


     $UpdateSql = "UPDATE invoices_master SET date='$date', agency='$agency', name='$name', postcode='$postcode', hours='$hours', gross='$gross', tax= '$tax', ni= '$ni', total='$total' WHERE id=$id";
     $res = mysqli_query($connection, $UpdateSql);
     if($res){
       echo "Successfully Updated data";
     } else{
       echo "Failed to update data";
     }
 }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Invoice</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css" >
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
  </head>
  <body>

    <div class="container">
      <div class="row">
       <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
        <h2>Edit Invoice</h2>

        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Date</label>
          <div class="col-sm-10">
           <input type="text" name="date" class="form-control" id="input1" value="<?php echo $r['date'] ?>" placeholder="Date"/>
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Agency</label>
          <div class="col-sm-10">
           <label>
             <input type="radio" name="agency" id="optionsRadios1" value="Brigad" <?php if($r['agency'] == 'Brigad'){echo "checked";}?>> Brigad
           </label>
           <label>
             <input type="radio" name="agency" id="optionsRadios1" value="Syft" <?php if($r['agency'] == 'Syft'){echo "checked";}?>> Syft
           </label>
           <label>
             <input type="radio" name="agency" id="optionsRadios1" value="Buzzhire" <?php if($r['agency'] == 'Buzzhire'){echo "checked";}?>> Buzzhire
           </label>
           <label>
             <input type="radio" name="agency" id="optionsRadios1" value="Freelance" <?php if($r['agency'] == 'Freelance'){echo "checked";}?>> Freelance
           </label>
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
           <input type="text" name="name" class="form-control" id="input1" value="<?php echo $r['name'] ?>" placeholder="Name"/>
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Postcode</label>
          <div class="col-sm-10">
           <input type="text" name="postcode" class="form-control" id="input1" value="<?php echo $r['postcode'] ?>" placeholder="Postcode"/>
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Hours</label>
          <div class="col-sm-10">
           <input type="text" name="hours" class="form-control" id="input1" value="<?php echo $r['hours'] ?>" placeholder="Hours"/>
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Gross</label>
          <div class="col-sm-10">
           <input type="text" name="gross" class="form-control" id="input1" value="<?php echo $r['gross'] ?>" placeholder="Gross"/>
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Tax</label>
          <div class="col-sm-10">
           <input type="text" name="tax" class="form-control" id="input1" value="<?php echo $r['tax'] ?>" placeholder="Tax"/>
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">NI</label>
          <div class="col-sm-10">
           <input type="text" name="ni" class="form-control" id="input1" value="<?php echo $r['ni'] ?>" placeholder="NI"/>
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Total</label>
          <div class="col-sm-10">
           <input type="text" name="total" class="form-control" id="input1" value="<?php echo $r['total'] ?>" placeholder="total"/>
          </div>
        </div>


        <div class="form-group" id="button_div">



        <input type="submit"id="submit_button" class="btn btn-primary col-md-2 col-md" value="Submit" />
        <a href="view.php" id="data_link" class="btn btn-primary col-md-2 col-md">View Data</a>
        <a href="delete.php?id=<?php echo $r['id']; ?>" class="btn btn-primary col-md-2 col-md" onclick="return confirm('Are you sure you want to delete this?');" >Delete</a>


        </div>



















       </form>


     </div>
   </div>


 </body>
</html>
