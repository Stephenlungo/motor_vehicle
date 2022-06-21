<?php
include('config.php');

if (isset($_GET['tax_year'])) 
{

	$tax_year = $_GET['tax_year'];
	$result = mysqli_query(
	$conn,
	"SELECT payment_status FROM `tax_payment` WHERE tax_year = $tax_year");
	if(mysqli_num_rows($result)>0)
    {
	$row = mysqli_fetch_array($result);
	$payment_status = $row['$payment_status'];
	
	response($payment_status);
	mysqli_close($conn);
	}
    else
    {
		response(NULL, NULL, 200,"No Record Found");
	}
}
else
{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($payment_status)
{
	$response['payment_status'] = $payment_status;

	
	$json_response = json_encode($response);
	echo $json_response;
}
?>