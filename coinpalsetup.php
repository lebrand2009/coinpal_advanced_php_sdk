<?php
/*
   Le Brand REAL IT Solutions - https://xdata.gr
   CoinPal Advanced PHP SDK 
   File coinpalsetup.php
   Version #1.01
*/
  if ( session_status() != PHP_SESSION_ACTIVE ) { session_start(); }
  $session_id = session_id();
  $timestamp = time();
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
  $domain = $_SERVER['HTTP_HOST'];
  $fullUrl = $protocol . $domain;

   // Comment the following 2 lines when you're in production env! 
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X-Data GR - CoinPal Settings</title>
</head>
<body>	
    <div class="container">
        <div class="signup-container">
		   <script src="<?php echo $fullUrl; ?>/lib/coinpal/js/coinpal.min.js?v=<?php echo $timestamp; ?>" defer></script>			
        </div>
    </div>		
</body>
</html>