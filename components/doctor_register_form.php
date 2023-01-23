<div>
    <div class='title'>Καλωσήρθατε</div>
    <div class='subtitle'>Συνδεθείτε για να δείτε τα ραντεβού σας</div>
    <form class="doctor-register" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">          
        <label for="dregister-name">Ονοματεπώνυμο</label><br>
        <input name="name" id="dregister-name" type="text" placeholder="Μαρία Χχχχ" required autofocus>
        <p style="color: red;"><?php echo $name_err; ?> </p>
    
        <label for="dregister-email">E-mail</label><br>
        <input name="email" id="dregister-email" type="email" placeholder="example@example.com/gr" required>
        <p style="color: red;"><?php echo $email_err; ?> </p>
    
        <label for="dregister-pass">Κωδικός</label><br>
        <input name="password" id="dregister-pass" type="password" required>
        <i class="far fa-eye" id="togglePassword"></i>
        <p style="color: red;"><?php echo $password_err; ?> </p>
    
    
        <label for="dregister-phone">Τηλέφωνο</label><br>
        <input name="phone" id="dregister-phone" type="tel" placeholder="+30 6930405060" pattern="[\+][3][0][ ][0-9]{10}" title="Παράδειγμα: +30 6930405060" required>
        <p style="color: red;"><?php echo $phone_err; ?> </p>
    
        <label for="dregister-address">Διεύθυνση</label><br>
        <input name="address" id="dregister-address" type="text" placeholder="Ηρωδότου 10" required>
        <p style="color: red;"><?php echo $address_err; ?> </p>
    
        <?php
        $json_towns = json_decode(file_get_contents("../data/towns.json"), true);
        $specializations = json_decode(file_get_contents("../data/doctor_types.json"), true);
        ?>
        <label for="dregister-region">Περιοχή</label><br>
        <select required name="region" id="dregister-region">
            <option default disabled selected value="">Διαλέξτε Περιοχή</option>
            <?php
            foreach ($json_towns as $town) {
                echo '<option value="' . $town . '">' . $town . '</option>';
            } ?>
        </select>
        <p style="color: red;"><?php echo $region_err; ?> </p>
        <!-- <input name="region" id="dregister-region" type="text" placeholder="Πανόραμα" required>
        <p style="color: red;"><?php echo $region_err; ?> </p> -->
    
        <label for="dregister-specialization">Ειδικότητα</label><br>
        <select required name="specialization" id="dregister-specialization">
            <option default disabled selected value="">Διαλέξτε Ειδικότητα</option>
            <?php
            foreach ($specializations as $spe) {
                echo '<option value="' . $spe . '">' . $spe . '</option>';
            } ?>
        </select>   
       
        <div class="down">
            <input type="submit" class="registerbtn" value="Εγγραφή">
        </div>
    </form>
    <div class="sign-as"><a href="../pages/register_page.php?type=p">Εγγραφή ως μέλος</a></div>
</div>

