<?php
session_start();
include_once("../vendor/autoload.php");
define("USERNAME", "changeme");
define("TOKEN", "changeme");
define("TEST_MODE", true);

try {
	$gateway = new FatZebra\Gateway(USERNAME, TOKEN, TEST_MODE);
	$response = $gateway->purchase($_POST['amount'], $_POST['reference'], $_POST['name'], $_POST['card_number'], $_POST['card_expiry_month'] . "/" . $_POST['card_expiry_year'], $_POST['card_cvv']);
	$_SESSION['response'] = $response;
	header("Location: index.php");
} catch (Exception $ex) {
	print "Error: " . $ex->getMessage();
}
