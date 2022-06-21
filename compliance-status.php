<?php

include 'config.php';?>
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
                    <a class="nav-link" href="index.php">Make  Payment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="check-compliance.php">Check Compliance</a>
                  </li>
                 
                </ul>
              </div>
            </div>
          </nav>
        

          <div class="container mt-5">
            <h2>Check Your Tax Compliance History</h2>
                        
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Year</th>
                    <th>Vehicle Number</th>
                    <th>payment Type</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include 'config.php';

                $sql = "SELECT * FROM tax_payment";

                if ($stmt = mysqli_prepare($conn, $sql))
                {
                    mysqli_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) > 0) 
                    {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) 
                        {?>
                            <tr>
                            <td><?php echo $row['tax_year'] ;?> </td>
                            <td><?php echo $row['vehicle_number'] ;?> </td>
                           
                            <td><?php echo $row['payment_type'] ;?> </td>
                            <td><?php echo $row['amount'] ;?> </td>
                            <td><?php echo $row['payment_status'] ;?> </td>
                            </tr>
                       <?php 
                       }
                       ?>
                            
                       
                 
                    
              
                 
                    <?php
                    }
                mysqli_stmt_close($stmt);    
                }

?>
    
                
                </tbody>
            </table>
            </div>
                    
          
          
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></scrip
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>




</script>
  </body>
</html>