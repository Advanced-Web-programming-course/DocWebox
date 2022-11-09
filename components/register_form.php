<!-- register form -->
<div class='container'>

   <div class='upbtns'>
             <button class='sign-in2'>Σύνδεση</button>
             <button class='register2'>Εγγραφή</button>
   </div>
   <form class='register' action='' method='post'>

         <div class='form-field'>
            <h1 class='title'>Καλωσήρθατε</h1>
            <h4 class='subtitle'>Δημιουργήστε τον λογαριασμό σας με ένα κλικ</h4>

            <div>
               <label for='register-name'>Ονοματεπώνυμο</label><br>
               <input id='register-name' type='text' required autofocus>
            </div>

            <div>
               <label for='register-email'>E-mail</label><br>
               <input id='register-email' type='email' placeholder="example@example.com ή.gr" required>
            </div>

            <div>
               <label for='register-pass'>Password</label><br>
               <input id='register-pass' type='password'  required>
            </div>

            <div>
               <label for='register-phone'>Τηλέφωνο</label><br>
               <input id='register-phone' type='tel' placeholder="+30 6930405060" pattern="+30 [0-9]{3}[0-9]{4}[0-9]{3}" required>
            </div>

            <div>
               <label for='register-address'>Διεύθυνση</label><br>
               <input id='register-address' type='text' required>
            </div>

            <div>
               <label for='register-region'>Περιοχή</label><br>
               <input id='register-region' type='text' required>
            </div>
            
            <div>
               <a class='forgot-pass' href="#">Ξέχασα τον κωδικό μου</a>
               <button class='registerbtn'>Εγγραφή</button>
            </div>

         </div>
   </form>

</div>
