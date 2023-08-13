<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Registration Form</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form method="post" action="login.php">
        <input name="username" type="username" placeholder="Enter your username">
        <input name="pwd" type="password" placeholder="Enter your password">
        <a href="#">Forgot password?</a>
        <input name="submit" type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form method="post" action="includes/formhandler.inc.php">
        <input name="username" type="text" placeholder="Enter your Username">
        <input name="email" type="email" placeholder="Enter your email">
        <input name="pwd" type="password" placeholder="Create a password">
        <input name="submit" type="submit" class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>
