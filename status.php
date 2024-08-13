<?php 
error_reporting(0);
include("./header&footer.php");

// Include the header function to output the header section
getHeader();

    include "connection.php";

	$payment_id = $statusMsg = ''; 
	$ordStatus = 'error';
	$id = '';

	// Check whether stripe token is not empty

	if(!empty($_POST['stripeToken'])){

		// Get Token, Card and User Info from Form
		$token = $_POST['stripeToken'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$course = $_POST['course'];
		$number = $_POST['number'];
		$book = $_POST['book'];
		$vehiclename = $_POST['vehiclename'];
		$card_no = $_POST['card_number'];
		$card_cvc = $_POST['card_cvc'];
		$card_exp_month = $_POST['card_exp_month'];
		$card_exp_year = $_POST['card_exp_year'];
		$numeric_amount = preg_replace('/[^0-9]/', '', $_POST['amount']);

		$insert_query = "INSERT INTO book (fullname, email, phone, number, vehiclename, book) 
                         VALUES ('$name', '$email', '$course', '$number', '$vehiclename', '$book')";
		
		mysqli_query($conn,$insert_query );


// Convert the numeric string to an integer
$price = intval($numeric_amount);

		

		// Include STRIPE PHP Library
		require_once('stripe-php/init.php');

		// set API Key
		$stripe = array(
		"SecretKey"=>"sk_test_51PW7qjKqsYDTgoiXskhKOTOuLdHniUta9ZQq1GOMapdX7hlG9gPRXSUURh7vhfuv3l0Rz9acyjj1ka1rGCdhr6pu00kizsy39r",
		"PublishableKey"=>"pk_test_51PW7qjKqsYDTgoiXe9prox9B1rS9N4JpgENWfFkoG7tHCEl19gLNU3qwNm5bfEvvrnGFIxieouFuxAOvyou1JOHa00fdKy459e"
		);

		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey($stripe['SecretKey']);

		// Add customer to stripe 
	    $customer = \Stripe\Customer::create(array( 
	        'email' => $email, 
	        'source'  => $token,
	        'name' => $name,
	        'description'=>$course
	    ));

	    // Generate Unique order ID 
	    $orderID = strtoupper(str_replace('.','',uniqid('', true)));
	     
	    // Convert price to cents 
	    $itemPrice = ($price*100);
	    $currency = "usd";
	   

	    // Charge a credit or a debit card 
	    $charge = \Stripe\Charge::create(array( 
	        'customer' => $customer->id, 
	        'amount'   => $itemPrice, 
	        'currency' => $currency, 
	        'description' => $course, 
	        'metadata' => array( 
	            'order_id' => $orderID 
	        ) 
	    ));

	    // Retrieve charge details 
    	$chargeJson = $charge->jsonSerialize();

    	// Check whether the charge is successful 
    	if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 

	        // Order details 
	        $transactionID = $chargeJson['id']; 
	        $paidAmount = $chargeJson['amount']; 
	        $paidCurrency = $chargeJson['currency']; 
	        $payment_status = $chargeJson['status'];
	        $payment_date = date("Y-m-d H:i:s");
	        $dt_tm = date('Y-m-d H:i:s');

	        // Insert tansaction data into the database

	        $sql = "insert into registration (name,email,coursename,fees,card_number,card_expirymonth,card_expiryyear,status,paymentid,added_date) values ('".$name."','".$email."','".$course."','".$price."','".$card_no."','".$card_exp_month."','".$card_exp_year."','".$payment_status."','".$transactionID."','".$dt_tm."')";
			
			
	        mysqli_query($conn,$sql) or die("Mysql Error Stripe-Charge(SQL)".mysqli_error($conn));

    		

	        // If the order is successful 
	        if($payment_status == 'succeeded'){ 
	            $ordStatus = 'success'; 
	            $statusMsg = 'Your Payment has been Successful!'; 


	    	} else{ 
	            $statusMsg = "Your Payment has Failed!"; 
	        } 
	    } else{ 
	        //print '<pre>';print_r($chargeJson); 
	        $statusMsg = "Transaction has been failed!"; 
	    } 
	} else{ 
	    $statusMsg = "Error on form submission."; 
	} 
	
?>

<!DOCTYPE html>
<html>
	<head>
        <title> Stripe Payment Gateway Integration in PHP </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/stripe.css">
    </head>

    <div class="container" style="padding:50px 0;">
        <h2 style="text-align: center; color: blue;">Stripe Payment Gateway Integration in PHP </h2>
        <h4 style="text-align: center;">This is - Stripe Payment Success URL </h4>
        <br>
        <div class="row">
	        <div class="col-lg-12">
				<div class="status">
					<h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
				
					<h4 class="heading">Payment Information - </h4>
					<br>
					<p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
					<p><b>Paid Amount:</b> ($<?php echo $price;?>.00)</p>
					<p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
					<h4 class="heading">Product Information - </h4>
					<br>
					<p><b>Name:</b> <?php echo $name; ?></p>
					<p><b>Price:</b> <?php echo $price.' '.$currency; ?> ($<?php echo $price;?>.00)</p>
				</div>
				<a href="index.php" class="btn-continue">Back to Home</a>
			</div>
		</div>
	</div>
</html>

<?php
getFooter();
?>