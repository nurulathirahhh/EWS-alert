<?php
session_start();
$error=''; 
include('components/header.inc.php'); 
include('components/navbar.inc.php');
include "connection.php";
?>

<?php

require 'config.php';
if(isset($_POST['btn-login']))
{
	$username = mysqli_real_escape_string($connection,$_POST['username']); 
	$password = mysqli_real_escape_string($connection,$_POST['password']); 
	$passcode = md5($password); // Encrypted Password
	$sql = "SELECT * FROM users_list WHERE username='$username' and password ='$passcode'";
	$query = mysqli_query($connection,$sql);
	$row = $query->fetch_array();
	$count = $query->num_rows; // if email/password are correct returns must be 1 row

	if ($count == 1)
	{
		header("Location: index.php");
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
		<span class='glyphicon glyphicon-info-sign'></span> &nbsp; 
		Username or Password is invalid !
		</div>";
	}
	$connection->close();
}

?>
	<!-- Form for collecting member data during login -->
	<form class="form-horizontal" action="" method="post">
	<?php
		if (isset($msg)) 
		{
			echo $msg;
		}
?>
<link rel="stylesheet" href="css/templatemo-style.css">
<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
              </div>
            </div>
            
           
            <div class="row mt-2">
              <div class="col-12">
                
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      name="username"
                      type="text"
                      class="form-control "
                      placeholder="username"
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="password"
                      type="password"
                      class="form-control "
                      placeholder="password"
                      required
                    />
                  </div>
                  <div class="form-group mt-4">
                    
					
					<button type="submit" class="btn btn-default btn-primary btn-block text-uppercase" name="btn-login">
				<span class="glyphicon glyphicon-log-in"></span>
				Login
			</button>
                  </div>
                </form>
                   <label> <p> Don't have an account? </p> </label>
			<p><a href="signup.php" class="btn btn-default btn-primary btn-block text-uppercase">Sign Up Here</a></p>
                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>