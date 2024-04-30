<?php
/*
   Le Brand REAL IT Solutions - https://xdata.gr
   CoinPal Advanced PHP SDK 
   File create_form_from_config.php
   Version #1.01
*/
  if ( session_status() != PHP_SESSION_ACTIVE ) { session_start(); }

  if (isset($_SESSION['login']) && $_SESSION['login'] === true) {

require_once('config.php');

function generateInputHtml($key, $value) {
    $label = '';
	$tooltip = '';
    switch ($key) {
        case 'debug':
            $label = 'Debug';
			$tooltip = 'Setting it to 1 writes error information to the log file';
            break;
        case 'merchantNo':
            $label = 'Merchant No';
			$tooltip = 'The merchant number assigned to you by CoinPal.  Get it <a title="Visit your Dashboard. Requires Login" href="https://portal.coinpal.io/#/admin/integration" target="_blank">HERE</a>';
            break;
        case 'version':
            $label = 'Version';
			$tooltip = 'Interface version number';
            break;
        case 'apiKey':
            $label = 'API Key';
			$tooltip = 'The API key assigned to you on the CoinPal dashboard. Get it <a title="Visit your Dashboard. Requires Login" href="https://portal.coinpal.io/#/admin/integration" target="_blank">HERE</a>';
            break;
        case 'base_url':
            $label = 'Base URL';
			$tooltip = 'Leave the value https://pay.coinpal.io unless CoinPal tells you otherwise';
            break;
        case 'accessToken':
            $label = 'Access Token';
			$tooltip = 'The Access token assigned to you on the CoinPal dashboard. Required when sign is empty. Get it <a title="Visit your Dashboard. Requires Login" href="https://portal.coinpal.io/#/admin/myAccount/Business" target="_blank">HERE</a>';
            break;
        case 'notifyURL':
            $label = 'Notify URL';
			$tooltip = 'Merchant\'s asynchronous notification URL. After completing a transaction, CoinPal will send its data to this URL as well as for any update of that transaction';
            break;
        case 'merchantName':
            $label = 'Merchant Name';
			$tooltip = 'The way you want your name to appear on Coinpal\'s payment page.';
            break;
        case 'orderCurrencyType':
            $label = 'Order Currency Type';
			$tooltip = 'Depending on the currency you offer for your sales, this value can be either "fiat" or "crypto"';
            break;
        case 'orderCurrency':
            $label = 'Order Currency';
			$tooltip = 'This is the currency you offer for your sales. Check all supported currencies <a title="Check Order Currency List" href="https://docs.coinpal.io/#/en/interface/appendix4" target="_blank">HERE</a>';
            break;
        case 'redirectURL':
            $label = 'Redirect URL';
			$tooltip = 'Callback address of the front page after successful/expired payment by the user.';
            break;
        case 'cancelURL':
            $label = 'Cancel URL';
			$tooltip = 'Callback address of the front page when the user cancels the payment. Default is the redirectURL if not provided.';
            break;
        case 'successUrl':
            $label = 'Success URL';
			$tooltip = 'Redirect URL for successful payment. If empty, redirectURL will be used by default.';
            break;
        case 'cryptoCurrency':
            $label = 'Crypto Currency';
			$tooltip = 'Specified cryptocurrency for the customer to pay with. Recommended : <b>KAS</b>';
            break;
        case 'network':
            $label = 'Network';
			$tooltip = 'Designated public chain (KAS,BITCOIN,ERC20,TRC20). Recommended : <b>KAS</b>';
            break;
        case 'orderDescription':
            $label = 'Order Description';
			$tooltip = 'Order description displayed on the cash register page.';
            break;
        case 'db_host':
            $label = 'Database Host';
			$tooltip = 'Host name or IP of your database server.';
            break;
        case 'db_name':
            $label = 'Database Name';
			$tooltip = 'The database you want to connect to.';
            break;
        case 'db_user':
            $label = 'Database User';
			$tooltip = 'The username of the database user.';
            break;
        case 'db_pass':
            $label = 'Database Password';
			$tooltip = 'The password of the database user.';
            break;
        default:
            $label = ucfirst($key); 
            break;
    }	
    return '<div class="form-group border border-success rounded-lg" style="padding:10px">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><b>' . $label . '</b></div>
                    </div>
                    <input type="text" id="' . $key . '" aria-describedby="' . $key . 'Help" name="' . $key . '" class="form-control" value="' . $value . '">
					
                </div>
				<small style="margin-top:-13px;margin-left:3px;" id="' . $key . 'Help" class="form-text text-muted">' . $tooltip . '</small>
            </div>';
}


$html = '';
	  
$html .= '<h2 class="signup-title" style="color:#7DCDBA;"><img src="/lib/coinpal/img/coinpal.png" title="CoinPal Payments Advanced PHP SDK" width="150"><br><hr>Advanced PHP SDK Settings<br><span style="font-size:65%"><a href="https://xdata.gr" title="Visit Le Brand REAL IT Solutions" target="_blank">Le Brand REAL IT Solutions</a></span></h2><hr><form class="signup-form" id="coinpalsetup" action="lib/coinpal/coinpalsetup.php" method="post">';	  
	  
foreach ($config as $key => $value) {
    $html .= generateInputHtml($key, $value);
}
	  
$html .= '<button type="button" id="checkconn" class="btn btn-warning signup-btn" style="font-weight:bold">Test DB Connectivity</button><br><br><button type="submit" class="btn btn-primary signup-btn" style="background-color:#7DCDBA;border: 2px solid #353A40;color: #353A40;font-size:160%;font-weight:bold">Submit</button></form><div class="signup-links" style="padding-top:10px">Do you need help? <a target="_blank" title="Visit GitHub official project page" href="https://github.com/lebrand2009/coinpal_advanced_php_sdk">Read me</a></div><hr><div class="lebrand-credits"><a href="https://xdata.gr" title="Visit Le Brand REAL IT Solutions" target="_blank">Le Brand REAL IT Solutions</a></div>';	  

echo $html;

  } else {
	  
	  header("Location: https://pricex.gr/coinpalsetup.php");
      exit;  
  }

?>