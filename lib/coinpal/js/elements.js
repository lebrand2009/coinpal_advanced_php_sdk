/*
   Le Brand REAL IT Solutions - https://xdata.gr
   CoinPal Advanced PHP SDK 
   File elements.js
   Version #1.01
*/

const navigationElement = `
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="coinpalsetup.php"><img src="/lib/coinpal/img/kaspa_h_w.png" title="Kaspa Currency" width="190"><sup><i class="fas fa-registered" style="color: #ffffff;"></i></sup></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="coinpalsetup.php"><i class="fas fa-home"></i> Home</a>
      </li>
	  <span id="resetuserinj">	
	  </span>	  
    </ul>
    <ul class="navbar-nav ml-auto">
		<li class="nav-item">
        <a class="nav-link" title="Visit Le Brand REAL IT Solutions" target="_blank" href="https://xdata.gr"><i style="color: #ffffff;" class="fas fa-file-code fa-lg"></i></a>
      </li>		
		<li class="nav-item">
        <a class="nav-link" title="Visit the project page on GitHub" target="_blank" href="https://github.com/lebrand2009/coinpal_advanced_php_sdk/"><i style="color: #ffffff;" class="fab fa-github fa-lg"></i></a>
      </li>
	  <span id="logoutinj">	
	  </span>	
	</ul>
  </div>
</nav>
`;

const logoutElement = `<li class="nav-item"><span class="nav-link"><button type="button" id="logoutbutton" class="btn btn-danger btn-sm"> <i class="fas fa-sign-out-alt"></i><span class="badge text-bg-secondary">Log Out</span></button></span></li>`;

const loginElement = `
        <div id="loginform" class="small-form-container">
		    <h2 class="signup-title" style="color:#7DCDBA;"><img src="/lib/coinpal/img/coinpal.png" title="CoinPal Payments Advanced PHP SDK" width="150"><br><hr>Advanced PHP SDK Settings<br><span style="font-size:65%"><a href="https://xdata.gr" title="Visit Le Brand REAL IT Solutions" target="_blank">Le Brand REAL IT Solutions</a></span></h2><hr>
            <h2 class="signup-title">Please Login</h2>
            <form class="signup-form" method="POST">	
			   <div class="form-group">
   			    <div class="input-group mb-3">
      			   <div class="input-group-prepend">
        			   <div class="input-group-text">Username</div>
       			  </div>
       			  <input type="text" id="username" name="username" class="form-control" required>
      			 </div>
    		   </div>	
 			    <div class="form-group">
 			      <div class="input-group mb-3">
 			        <div class="input-group-prepend">
 			          <div class="input-group-text">Password</div>
  			        </div>
  			       <input type="password" id="password" name="password" class="form-control" required>
   			      </div>
   			    </div>
                <input type="hidden" id="postaction" name="postaction" value="login">
                <button type="submit" class="btn btn-primary signup-btn">Log In</button>
            </form>
            <div class="signup-links" style="padding-top:10px">
				Do you need help?  <a target="_blank" title="Visit GitHub official project page" href="https://github.com/lebrand2009/coinpal_advanced_php_sdk">Read me</a>
            </div>
        </div>
`;

const userSetupElement = `
        <div id="usersetup" class="small-form-container">
		    <h2 class="signup-title" style="color:#7DCDBA;"><img src="/lib/coinpal/img/coinpal.png" title="CoinPal Payments Advanced PHP SDK" width="150"><br><hr>Advanced PHP SDK Settings<br><span style="font-size:65%"><a href="https://xdata.gr" title="Visit Le Brand REAL IT Solutions" target="_blank">Le Brand REAL IT Solutions</a></span></h2><hr>
            <h2 class="signup-title">User Setup</h2>
            <form class="signup-form" method="POST">	
			   <div class="form-group">
   			    <div class="input-group mb-3">
      			   <div class="input-group-prepend">
        			   <div class="input-group-text">Username</div>
       			  </div>
       			  <input type="text" id="setup_username" name="setup_username" class="form-control" required>
      			 </div>
    		   </div>	
 			    <div class="form-group">
 			      <div class="input-group mb-3">
 			        <div class="input-group-prepend">
 			          <div class="input-group-text">Password</div>
  			        </div>
  			       <input type="password" id="setup_password" name="setup_password" class="form-control" required>
   			      </div>
   			    </div>
                <input type="hidden" id="postaction" name="postaction" value="login">
                <button type="submit" class="btn btn-primary signup-btn">Submit</button>
            </form>
            <div class="signup-links" style="padding-top:10px">
				Do you need help?  <a target="_blank" title="Visit GitHub official project page" href="https://github.com/lebrand2009/coinpal_advanced_php_sdk">Read me</a>
            </div>
        </div>
`;

const resetUserElement = `<li class="nav-item"><button id="buttonresetuser" style="color:#9A9DA0" class="btn btn-default signup-btn"><i class="fas fa-user-minus"></i> Reset User</button></li>`;
