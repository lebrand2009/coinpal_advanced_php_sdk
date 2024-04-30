<?php
/*
   Le Brand REAL IT Solutions - https://xdata.gr
   CoinPal Advanced PHP SDK 
   File test_db_connectivity.php
   Version #1.01
*/

$dbHost = $_POST['host'];
$dbName = $_POST['name'];
$dbUser = $_POST['user'];
$dbPass = $_POST['pass'];
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $pdo->query("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$dbName'");
    $tableCount = $stmt->fetchColumn();
	
    $stmt = $pdo->query("SELECT VERSION()");
    $serverVersion = $stmt->fetchColumn();
	
    $pdoVersion = $pdo->getAttribute(PDO::ATTR_CLIENT_VERSION);
	
    $stmt = $pdo->query("SHOW VARIABLES LIKE 'max_allowed_packet'");
    $maxPacketSize = $stmt->fetch(PDO::FETCH_ASSOC)['Value'];
		
    $stmt = $pdo->query("SELECT DEFAULT_COLLATION_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = '$dbName'");
    $collation = $stmt->fetchColumn();	
	
    $stmt = $pdo->query("SELECT DEFAULT_CHARACTER_SET_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = '$dbName'");
    $charset = $stmt->fetchColumn();

    $stmt = $pdo->query("SELECT ENGINE FROM information_schema.ENGINES WHERE SUPPORT = 'DEFAULT'");
    $engine = $stmt->fetchColumn();
	
    //$stmt = $pdo->query("SELECT @@hostname");
    //$hostInfo = $stmt->fetchColumn();
	
	
    echo 'Database connection successful!<br><br>
	      Total number of tables : '.$tableCount.'<br>
		  Database collation : '.$collation.'<br>
		  MySQL Server Version : '.$serverVersion.'<br>
		  PDO MySQL Driver Version : '.$pdoVersion.'<br>
		  Maximum allowed packet size : '.(($maxPacketSize/1024)/1024).' MB<br>
		  Database character set : '.$charset.'<br>
		  Database engine : '.$engine.'<br>
		  ';
	
} catch (PDOException $e) {
    echo 'Database connection failed!<br><br>' . $e->getMessage();
}
?>
