<!-- register form -->
<div>
   <div class='title'>Καλωσήρθατε</div>
   <div class='subtitle'>Συνδεθείτε για να δείτε τα ραντεβού σας</div>
   <form class="register" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
      
         <label for="register-name">Ονοματεπώνυμο</label><br>
         <input name="name" id="register-name" type="text" placeholder="Μαρία Χχχχ" required autofocus>
         <p style="color: red;"><?php echo $name_err; ?> </p>
      
      
         <label for="register-email">E-mail</label><br>
         <input name="email" id="register-email" type="email" placeholder="example@example.com/gr" required>
         <p style="color: red;"><?php echo $email_err; ?> </p>
    
         <label for="register-pass">Κωδικός</label><br>
         <input name="password" id="register-pass" type="password" required>
         <i class="far fa-eye" id="togglePassword"></i>
         <p style="color: red;"><?php echo $password_err; ?> </p>
   
         <label for="register-phone">Τηλέφωνο</label><br>
         <input name="phone" id="register-phone" type="tel" pattern="[\+][3][0][ ][0-9]{10}" title="Παράδειγμα: +30 6930405060" placeholder="+30 6930405060" required>
         <p style="color: red;"><?php echo $phone_err; ?> </p>
      <div class="down">
         <input type="submit" class="registerbtn" value="Εγγραφή">
      </div>
   </form>
   <div class="sign-as"><a href="../pages/register_page.php?type=d">Εγγραφή ως γιατρός</a></div>
</div>

