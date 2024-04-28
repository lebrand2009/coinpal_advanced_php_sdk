<?php
/*
   Le Brand REAL IT Solutions - https://xdata.gr
   CoinPal Advanced PHP SDK 
   File coinpalsetup.php
   Version #1.01
   
   Statuses Appendix :
   =============================================
   0. Ready for initial user setup
   1. Initial user setup is done
   2. Logged Out Successfully
   3. Logged In Successfully
   4. Invalid username or password
   
*/
  include('user.php');
  header('Content-Type: application/json');

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    $session_id = session_id();
    $timestamp = time();

    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                //echo "<a href='?logout=1'>Logout</a>";
		$loginFlag = 1;
    } else {
		$loginFlag = 0;
    }


if ($user['username'] === '' || $user['password'] === '') {

    /*
    echo "<h2>Setup</h2>";
    echo "<form method='post'>";
    echo "Username: <input type='text' name='setup_username'><br>";
    echo "Password: <input type='password' name='setup_password'><br>";
    echo "<input type='submit' value='Set'>";
    echo "</form>";
    */

      $response = array(
          "status"    => 0,
          "text"      => "Ready for initial user setup",
	  "loginflag" => 0
      );

      echo json_encode($response);	
	

    if (isset($_POST['setup_username']) && isset($_POST['setup_password'])) {

        $user['username'] = $_POST['setup_username'];
        $user['password'] = password_hash($_POST['setup_password'], PASSWORD_ARGON2ID);
        
	$userFilePath = "user.php";
        $userContent = "<?php\n\$user = " . var_export($user, true) . ";\n?>";

        file_put_contents($userFilePath, $userContent);
		
        $_SESSION['login'] = true;
		
        $response = array(
            "status"    => 1,
            "text"      => "Initial setup is done",
	    "loginflag" => 1
        );

        echo json_encode($response);

	/*
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
        */
    }
	
} else {
		
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {

        $_SESSION = array();
        session_destroy();
		
        $response = array(
            "status"    => 2,
            "text"      => "Logged Out Successfully",
	    "loginflag" => 0
        );
	
        /*
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
        */
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === $user['username'] && password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;

            $response = array(
                "status"    => 3,
                "text"      => "Logged In Successfully",
	        "loginflag" => 1
            );
	
	    /*
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
	    */

        } else {
			
            $response = array(
                "status"    => 4,
                "text"      => "Invalid username or password",
	        "loginflag" => 1
            );			
        }
    }

    /*
    echo "<h2>Login</h2>";
    echo "<form method='post'>";
    echo "Username: <input type='text' name='username'><br>";
    echo "Password: <input type='password' name='password'><br>";
    echo "<input type='submit' value='Login'>";
    echo "</form>";
    */
}
?>
