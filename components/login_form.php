<!-- login form -->
<form class='login' action='<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>' method='post'>
   <div class='row'>
      <label class='lemail' for='login-email'>E-mail</label><br>
      <input name="email" id='login-email' type='email'  placeholder="example@example.com/gr" required autofocus>
      <p style="color: red;"><?php echo $email_err; ?> </p>
   </div>

   <div class='row'>
      <label class='lpass' for='login-pass'>Κωδικός</label><br>
      <input name="password" id='login-pass' type='password' required>
      <i class="far fa-eye" id="togglePassword"></i>
      <p style="color: red;"><?php echo $password_err; ?> </p>
   </div>

   <div class='down'>
      <input type='submit' class='loginbtn' value='Σύνδεση'>
   </div>

</form>
