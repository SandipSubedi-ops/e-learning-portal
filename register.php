<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<?php include 'link/link.php'?>
	<?php include 'css/style1.php'?>

	<title></title>
</head>
<body>

<?php
  include 'register_databasecon.php';

if(isset($_POST['submit'])){
 $username=mysqli_real_escape_string($con,$_POST['username']);
 $email=mysqli_real_escape_string($con,$_POST['email']);
 $password=mysqli_real_escape_string($con,$_POST['password']);
 $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
 $pass=password_hash($password,PASSWORD_BCRYPT);
 $cpass=password_hash($cpassword,PASSWORD_BCRYPT);
 $emailquery ="select * from users where email='$email' ";
 $query=mysqli_query($con,$emailquery);
 $emailcount=mysqli_num_rows($query);
 if ($emailcount>0) {
 	 echo"email already exist";
    }else{
 	  if ($password === $cpassword) {
         		
      $insertquery = "INSERT INTO users(username,email,password,cpassword) VALUES('$username','$email','$pass','$cpass')";
      $iquery=mysqli_query($con,$insertquery);
      if ($iquery) {
          ?>
	                  <script>
		                alert("Inserted Successfully");
	               </script>
	         <?php
	
            } else{
	          ?>
	                 <script > alert("No Inserted");
                       </script>
                      <?php
                     }



 	    }
 	    else{
 		echo "password are not matching"; 
 	}
 }
}
?>
	<div class="card big_light">
		<article class="card-body mx-auto " style="max-width: 400px;">
			<h4 class="card-title mt-3 text-center">CREATE ACCOUNT</h4>
			<p class="class-center">Get Started With Your Free Fccount </p>
			<p>
				<a href="" class="btn btn-block btn-gmail"> <i class="fa fa-google"></i>       Login via Gmail</a>
				<a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-f"></i>  Login via facebook</a>
			</p>
			<p class="divider-text">
				<span class="bg-light">OR</span>
			</p>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-user"></i></span>
					</div>
					<input  name="username" class="form-control" placeholder="Full name" type="text" required>
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-envelope"></i></span>
					</div>
					<input  name="email" class="form-control" placeholder="Email addresss" type="text" required>
				</div>
			
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i></span>
					</div>
					<input  name="password" class="form-control" placeholder="Create password" type="password" required>
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-lock"></i></span>
					</div>
					<input  name="cpassword" class="form-control" placeholder="Confirm password" type="password" required>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary btn-block">Create an account</button>
				</div>
				<div>
					<p class="text-center">Have an account?<a href="login.php">Log In</a></p>
				</div>
			</form>
		</article>
	</div>

</body>
</html>