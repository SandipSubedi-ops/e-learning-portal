<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
  <?php include 'link/link.php'?>
  <?php include 'css/style1.php'?>


</head>
<body>
  <?php

  include 'register_databasecon.php';

  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = " SELECT * from users where email='$email' ";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
      $email_pass = mysqli_fetch_assoc($query);
      $db_pass = $email_pass['password'];

      $_SESSION['username'] = $email_pass['username']; //22:16

      $pass_decode = password_verify($password, $db_pass);
     if($pass_decode){
        echo "login successful";
        ?>
        <script>
          location.replace("index.php");
        </script>
        <?php
      }
      else{
        echo "password Incorrect";
      }
    }
    else{
      echo "Invalid Email";
    }
  }

  ?>
  <div class="card big_light">
    <article class="card-body mx-auto " style="max-width: 400px;">
      <h4 class="card-title mt-3 text-center">Please! Log In Here</h4>
      <p>
        <a href="" class="btn btn-block btn-gmail"> <i class="fa fa-google"></i>Login via Gmail</a>
        <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-f"></i>Login via facebook</a>
      </p>
      <p class="divider-text">
        <span class="bg-light">OR</span>
      </p>
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="Post">
  
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
          <input  name="password" class="form-control" placeholder=" Password" type="password" required>
        </div>

        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
        </div>
        <div>
          <p class="text-center">Not an account?<a href="register.php">Sign Up</a></p>
        </div>
      </form>
    </article>
  </div>

</body>
</html>