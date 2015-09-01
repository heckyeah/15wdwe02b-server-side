<?php

class CheckoutPage extends Page {

	private $grandTotal = 0;

	public function __construct($model) {
		parent::__construct($model);

		// Tally up the cart
		foreach( $_SESSION['cart'] as $cartItem ) {
			$this->grandTotal += $cartItem['discounted-price'];
		}

		// Process the "submit" form
		if( isset($_POST['go-pay']) ) {

			// Validate

			// Enter order into database BEFORE!!!! asking for payment
			$this->model->insertOrder();

			// Redirect the user (if successful)
			require 'vendor/PxPay_Curl.inc.php';

			// Create instance of the library
			$pxpay = new PxPay_Curl('https://sec.paymentexpress.com/pxpay/pxaccess.aspx', PXPAY_USER, PXPAY_KEY);

			// Create a new request object
			$request = new PxPayRequest();

			// Prepare a URL to come back to once payment has been completed
			$http_host = getenv('HTTP_HOST'); // "localhost"
			$folders = getenv('SCRIPT_NAME');

			$urlToComeBackTo = 'http://'.$http_host.$folders;
			// http://trademe.co.nz/index.php
			// http://localhost/~ben.abbott/projects/something/index.php

			// Prepare data for PxPay
			$request->setAmountInput( $this->grandTotal );
			$request->setTxnType('Purchase'); // Transaction type
			$request->setCurrencyInput('NZD');
			$request->setUrlFail( $urlToComeBackTo );
			$request->setUrlSuccess( $urlToComeBackTo );
			$request->setTxnData1( $_POST['name'] );
			$request->setTxnData2( $_POST['postal'] );
			//$request->setTxnData3('Something else');

			// Prepare the request string out of the request data
			$requestString = $pxpay->makeRequest($request);

			// Send the request to be processed
			$response = new MifMessage($requestString);

			// Extract the URL so we can redirect the user
			$urlToGoTo = $response->get_element_text('URI');

			// Redirect the user
			header('Location: '.$urlToGoTo);

		}


		

	}

	public function contentHTML() {

		// echo 'Checkout page. Checkout form. Total of purchase';
		include 'templates/checkout.php';


	}


}