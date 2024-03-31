<?php
session_start();

include('components/header.inc.php');  //load header content for public users
include('components/navbar.inc.php'); 
include("connection.php"); // connection to database
?>
			
<?php
if(isset($_POST['btn-signup'])) {

$id=mysqli_real_escape_string($connection,$_POST['id']); 
$name=mysqli_real_escape_string($connection,$_POST['name']); 
$username=mysqli_real_escape_string($connection,$_POST['username']);
$email=mysqli_real_escape_string($connection,$_POST['email']);  
$password=mysqli_real_escape_string($connection,$_POST['password']); 
$password=md5($password); // Encrypted Password
$level 	 = "Member";

$check_id = $connection->query("SELECT id FROM users_list WHERE id='$id'");
$countid = $check_id->num_rows;

$check_username = $connection->query("SELECT username FROM users_list WHERE username='$username'");
$countun = $check_username->num_rows;
 
if (($countid==0) && ($countun==0)){
	$query  = "INSERT INTO users_list(id, name, username, email, password) VALUES ('$id','$name','$username','$email','$password')";
	if ($connection->query($query)) {
	$msg = "<div class='alert alert-success'>
	<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered - Admin !
		</div>";
	} else {
	$msg = "<div class='alert alert-danger'>
	<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering !
		</div>";
	} 
	} else {
		$msg = "<div class='alert alert-danger'>
		<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Alert! Username or Staff ID already exist!
			</div>";
	}
 
 $connection->close();
}

?>

<!-- Form for collecting member data during signup -->
<form class="form-horizontal" action="" method="post">
<?php
	if (isset($msg)) {
		echo $msg;
	}
?>
<hr>
<link rel="stylesheet" href="css/templatemo-style.css">
<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Welcome, new admin!</h2>
              </div>
            </div>

           
            <div class="row mt-2">
              <div class="col-12">
                
                  <div class="form-group">
                    <label for="id">Staff ID</label>
                    <input
                      name="id"
                      type="text"
                      class="form-control "
                      placeholder="Staff ID"
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="name">Name</label>
                    <input
                      name="name"
                      type="text"
                      class="form-control "
                      placeholder="name"
                      required
                    />
                  </div>
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
				  <div class="form-group">
                    <label for="email">Email</label>
                    <input
                      name="email"
                      type="email"
                      class="form-control "
                      placeholder="email"
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
                    
					
				  <button type="submit" class="btn btn-sm btn-primary" name="btn-signup">
				<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button>
                  </div>
                </form>
				<br>
                   <label> <p> Already have an account? </p> </label>
			<p><a href="login.php" class="btn btn-default btn-primary btn-block text-uppercase">Login Here</a></p>
                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>