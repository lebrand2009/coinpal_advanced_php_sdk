<?php
/*
   Le Brand REAL IT Solutions - https://xdata.gr
   CoinPal Advanced PHP SDK 
   File coinpalsetup.php
   Version #1.01
*/
  // No need to use the following 3 lines when you're calling your own domain
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Allow-Headers: Content-Type");

  header('Content-Type: application/json');

  if ( session_status() != PHP_SESSION_ACTIVE ) { session_start(); }

  if (isset($_SESSION['login']) && $_SESSION['login'] === true) {

  $session_id = session_id();
  $timestamp = time();

  // Comment the following 2 lines when you're in production env! 
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $configArray = $_POST; 
      $configFilePath = "config.php";
      $configContent = "<?php\n\$config = " . var_export($configArray, true) . ";\n?>";
      file_put_contents($configFilePath, $configContent);	

      $response = array(
          "status" => 1,
		  "text"   => "Settings processed successfully"
      );
		
      echo json_encode($response);
	  exit;
	  
  } else {
	
      $response = array(
          "status" => 2,
          "text"   => "Error: Invalid request method"
      );

      echo json_encode($response);
	  exit;
  }
	  
  } else {
	  
          $response = array(
              "status"    => 5,
              "text"      => "Please login",
		      "loginflag" => 0
          );	  
      echo json_encode($response);
	  exit;	  
  }	  
?>