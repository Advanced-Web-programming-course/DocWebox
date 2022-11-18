<!-- login form -->
<form class='login' action='<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>' method='post'>

   <div class='row'>
      <label class='lemail' for='login-email'>E-mail</label><br>
      <input name="email" id='login-email' type='email' required autofocus>
      <p style="color: red;"><?php echo $email_err; ?> </p>
   </div>

   <div class='row'>
      <label class='lpass' for='login-pass'>Password</label><br>
      <input name="password" id='login-pass' type='password' required>
      <p style="color: red;"><?php echo $password_err; ?> </p>
   </div>

   <div class='down'>
      <a class='forgot-pass' href="#">Ξέχασα τον κωδικό μου</a>
      <input type='submit' class='loginbtn' value='Σύνδεση'>
   </div>

</form>
