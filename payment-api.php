<?php
include('config.php');

if (isset($_POST['submit'])) 
{

	$v_number = $_POST['vehicle_number'];
    $year = $_POST['year'];
      $payment_type = trim($_POST["payment_type"]);
    $amount = $_POST['amount'];
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
        $resp ="Payment made successfully";
        response ($resp);
    }
    else
    {
        $resp ="Failed to make payment";
        response ($resp);
    }

    mysqli_stmt_close($stmt);
    }
mysqli_close($conn);
}

function response($resp)
{
	$response['resp'] = $resp;

	
	$json_response = json_encode($response);
	echo $json_response;
}
?>