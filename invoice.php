<?php
  require_once('connect.php');
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


     $CreateSql = "INSERT INTO invoices_master (date, agency, name, postcode, hours, gross, tax, ni, total) VALUES ('$date', '$agency', '$name', '$postcode', '$hours', '$gross', '$tax', '$ni', '$total')";
     $res = mysqli_query($connection, $CreateSql);
     if($res){
       echo "Successfully inserted data";
     } else{
       echo "Failed to insert data";
     }
 }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Invoice</title>
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
       <h2>New Invoice</h2>
      <form method="post" class="form-horizontal col-md-6 col-md-offset-3">







       <div class="form-group">
         <label for="input1" class="col-sm-2 control-label">Date</label>
         <div class="col-sm-10">
          <input type="text" name="date" class="form-control" id="input1" placeholder="Date"/>
         </div>
       </div>





       <div class="form-group">
         <label for="input1" class="col-sm-2 control-label">Agency</label>
         <div class="col-sm-10">
          <label>
            <input type="radio" name="agency" id="optionsRadios1" value="Brigad" checked> Brigad
          </label>
          <label>
            <input type="radio" name="agency" id="optionsRadios1" value="Syft" > Syft
          </label>
          <label>
            <input type="radio" name="agency" id="optionsRadios1" value="Buzzhire" > Buzzhire
          </label>
          <label>
            <input type="radio" name="agency" id="optionsRadios1" value="Freelance" > Freelance
          </label>
         </div>
       </div>



       <div class="form-group">
         <label for="input1" class="col-sm-2 control-label">Name</label>
         <div class="col-sm-10">
          <input type="text" name="name" class="form-control" id="input1" placeholder="Name"/>
         </div>
       </div>

       <div class="form-group">
         <label for="input1" class="col-sm-2 control-label">Postcode</label>
         <div class="col-sm-10">
          <input type="text" name="postcode" class="form-control" id="input1" placeholder="Postcode"/>
         </div>
       </div>

       <div class="form-group">
         <label for="input1" class="col-sm-2 control-label">Hours</label>
         <div class="col-sm-10">
          <input type="text" name="hours" class="form-control" id="input1" placeholder="Hours"/>
         </div>
       </div>

       <div class="form-group">
         <label for="input1" class="col-sm-2 control-label">Gross</label>
         <div class="col-sm-10">
          <input type="text" name="gross" class="form-control" id="input1" placeholder="Gross"/>
         </div>
       </div>

       <div class="form-group">
         <label for="input1" class="col-sm-2 control-label">Tax</label>
         <div class="col-sm-10">
          <input type="text" name="tax" class="form-control" id="input1" placeholder="Tax"/>
         </div>
       </div>

       <div class="form-group">
         <label for="input1" class="col-sm-2 control-label">NI</label>
         <div class="col-sm-10">
          <input type="text" name="ni" class="form-control" id="input1" placeholder="NI"/>
         </div>
       </div>

       <div class="form-group">
         <label for="input1" class="col-sm-2 control-label">Total</label>
         <div class="col-sm-10">
          <input type="text" name="total" class="form-control" id="input1" placeholder="Total"/>
         </div>
       </div>

       <div class="form-group" id="button_div">





         <input type="submit"id="submit_button" class="btn btn-primary" value="Submit" />


         <a href="view.php"  class="btn btn-primary">View Data</a>


       </div>















     </form>
    </div>
  </div>




 </body>
</html>
