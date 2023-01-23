<!-- login form -->

<div class='title'>Καλωσήρθατε</div>
<div class='subtitle'>Συνδεθείτε για να δείτε τα ραντεβού σας</div>
<form class='login' action='<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>' method='post'>
   
      <label class='lemail' for='login-email'>E-mail</label><br>
      <input name="email" id='login-email' type='email'  placeholder="example@example.com/gr" required autofocus>
      <p style="color: red;"><?php echo $email_err; ?> </p>
   
   
      <label class='lpass' for='login-pass'>Κωδικός</label><br>
      <input name="password" id='login-pass' type='password' required>
      <i class="far fa-eye" id="togglePassword"></i>
      <p style="color: red;"><?php echo $password_err; ?> </p>
   
   <div class='down'>
      <input type='submit' class='loginbtn' value='Σύνδεση'>
   </div>
</form>

