<!-- register form -->
<form class='register' action='<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>' method='post'>

   <div class='row'>
      <label for='register-name'>Ονοματεπώνυμο</label><br>
      <input name="name" id='register-name' type='text' required autofocus>
      <p style="color: red;"><?php echo $name_err; ?> </p>
   </div>

   <div class='row'>
      <label for='register-email'>E-mail</label><br>
      <input name="email" id='register-email' type='email' placeholder="example@example.com ή.gr" required>
      <p style="color: red;"><?php echo $email_err; ?> </p>
   </div>

   <div class='row'>
      <label for='register-pass'>Κωδικός</label><br>
      <input name="password" id='register-pass' type='password' required>
      <p style="color: red;"><?php echo $password_err; ?> </p>
   </div>

   <div class='row'>
      <label for='register-phone'>Τηλέφωνο</label><br>
      <input name="phone" id='register-phone' type='tel' placeholder="+30 6930405060" pattern="+30 [0-9]{3}[0-9]{4}[0-9]{3}" required>
      <p style="color: red;"><?php echo $phone_err; ?> </p>
   </div>

   <div class='down'>
      <a class='forgot-pass' href="#">Ξέχασα τον κωδικό μου</a>
      <input type='submit' class='registerbtn' value='Εγγραφή'>
   </div>

</form>

<div class='sign-as'><a href="../pages/register_page.php?type=d">Εγγραφή ως γιατρός</a></div>