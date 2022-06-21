<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $v_number = trim($_POST["v_number"]);
  $year = trim($_POST["year"]);
  $payment_type = trim($_POST["payment_type"]);
  $amount = trim($_POST["amount"]);

$sql = "INSERT INTO tax_payment (vehicle_number, tax_year, payment_type, amount, payment_status) VALUES (?,?,?,?,?)";
if($payment_type == "Full Payment")
{
  $status = "Fully Paid";

}
else
{
  $status = "Not Fully Paid";
}

if ($stmt = mysqli_prepare($conn, $sql))
{
    mysqli_stmt_bind_param($stmt, "sssss", $v_number, $year, $payment_type, $amount,$status);
    if (mysqli_execute($stmt)) 
    {
      echo "Payment made successfully";
    }
    else
    {
      echo "An error occured";
    }

    mysqli_stmt_close($stmt);
}
mysqli_close($conn);


}



?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">Motor Vehicle Tax Compliance System</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Make  Payment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="compliance-status.php">Check Compliance</a>
                  </li>
                 
                </ul>
              </div>
            </div>
          </nav>
        

          <div class="container mt-5 form" >
            <h2 class="mt-5 text-align-center">Pay Your Tax Here</h2>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <div class="form-group mt-5">
                <label class="control-label col-sm-2" for="vehicle_number">Vehicle Number</label>
                <div class="col-sm-10 mt-2">
                  <input type="text" class="form-control" id="vehicle_number" placeholder="Enter Your Vehicle Number" name="v_number">
                </div>
              </div>
              <div class="form-group mt-2">
                <label class="control-label col-sm-2" for="year">Select Year</label>
                <div class="col-sm-10">          
                  <input type="datepicker" class="form-control" id="datepicker" placeholder="Select Year" name="year">
                </div>
              </div>
              <div class="form-group mt-2">
                <label class="control-label col-sm-2" for="year">Type of Payment</label>
                <div class="col-sm-10">          
                            
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio1" name="payment_type" value="Full Payment" checked>
                  <label class="form-check-label" for="radio1">Full Payment</label>
                </div>
                <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="payment_type" value="Partial Payment">
                <label class="form-check-label" for="radio2">Partial Payment</label>
              </div>

                </div>
              </div>

    
              <div class="form-group mt-2">
                <label class="control-label col-sm-2" for="vehicle_number">Amount</label>
                <div class="col-sm-10 mt-2">
                  <input type="text" class="form-control" id="vehicle_number" placeholder="K" name="amount">
                </div>
              </div>

              <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary my-5">Pay Now</button>
                </div>
              </div>
            </form>
          </div>
          
          
          
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></scrip
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

$(document).ready(function(){
  $("#datepicker").datepicker({
     format: "yyyy",
     viewMode: "years", 
     minViewMode: "years",
     autoclose:true
  });   
})


</script>
  </body>
</html>