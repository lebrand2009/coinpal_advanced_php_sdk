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
   5. Ready for user login
   
*/
  include('user.php');
  header('Content-Type: application/json');

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    $session_id = session_id();
    $timestamp = time();


    if (isset($_SESSION['login']) && $_SESSION['login'] === true && !isset($_POST['logout']) && !isset($_POST['userreset'])) {
		
            $response = array(
                "status"    => 3,
                "text"      => "Logged In Successfully",
				"loginflag" => 1
            );
			
			echo json_encode($response);
			exit;		
    }


    if (isset($_POST['setup_username']) && isset($_POST['setup_password'])) {
		
            $user['username'] = $_POST['setup_username'];
            $user['password'] = password_hash($_POST['setup_password'], PASSWORD_ARGON2ID);
        
		    $userFilePath = "user.php";
            $userContent = "<?php\n\$user = " . var_export($user, true) . ";\n?>";
		
            file_put_contents($userFilePath, $userContent);
		
            $_SESSION['login'] = true;
		
            $response = array(
                "status"    => 1,
                "text"      => 'Initial user setup is done!<br><br>Username : '.$_POST['setup_username'].'<br>Password : '.substr($_POST['setup_password'], 0, 2).'...<br><br>Logged In Successfully!',
			    "loginflag" => 1
            );

            echo json_encode($response);
		    exit;
    }
	

    if (isset($_POST['logout']) && $_POST['logout'] == 1) {
		
        $_SESSION = array();
        session_destroy();
		
        $response = array(
            "status"    => 2,
            "text"      => "Logged Out Successfully",
			"loginflag" => 0
        );
		
		echo json_encode($response);
		exit;
    }


    if (isset($_POST['userreset']) && $_POST['userreset'] == 1) {
		
        $user['username'] = '';
        $user['password'] = '';
        
	    $userFilePath = "user.php";
        $userContent = "<?php\n\$user = " . var_export($user, true) . ";\n?>";
		
        file_put_contents($userFilePath, $userContent);
		
        $_SESSION = array();
        session_destroy();
		
        $response = array(
             "status"    => 0,
             "text"      => "Ready for initial user setup.<br><br>Please provide Username and Password!",
		     "loginflag" => 0
         );

         echo json_encode($response);
	     exit;
    }


    if (isset($_POST['username']) && isset($_POST['password'])) {
		
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === $user['username'] && password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;

            $response = array(
                "status"    => 3,
                "text"      => "Logged In Successfully!",
				"loginflag" => 1
            );
			
			echo json_encode($response);
			exit;
			
        } else {
			
            $response = array(
                "status"    => 4,
                "text"      => "Invalid username or password!",
				"loginflag" => 1
            );
			
			echo json_encode($response);
			exit;
        }
    }


    if ($user['username'] === '' || $user['password'] === '') {

          $response = array(
              "status"    => 0,
              "text"      => "Ready for initial user setup",
		      "loginflag" => 0
          );

          echo json_encode($response);
	      exit;		
	}


    if ($user['username'] != '' || $user['password'] != '') {

          $response = array(
              "status"    => 5,
              "text"      => "Ready for user login",
		      "loginflag" => 0
          );

          echo json_encode($response);
	      exit;		
	}


?>