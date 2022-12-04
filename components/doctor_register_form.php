<form class="doctor-register" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <div class="box">
        <div class="column">

            <div class="row">
                <label for="dregister-name">Ονοματεπώνυμο</label><br>
                <input name="name" id="dregister-name" type="text" placeholder="Μαρία Χχχχ" required autofocus>
                <p style="color: red;"><?php echo $name_err; ?> </p>
            </div>

            <div class="row">
                <label for="dregister-email">E-mail</label><br>
                <input name="email" id="dregister-email" type="email" placeholder="example@example.com/gr" required>
                <p style="color: red;"><?php echo $email_err; ?> </p>
            </div>

            <div class="row">
                <label for="dregister-pass">Κωδικός</label><br>
                <input name="password" id="dregister-pass" type="password" required>
                <p style="color: red;"><?php echo $password_err; ?> </p>
            </div>

        </div>

        <div class="column">
            <div class="row">
                <label for="dregister-phone">Τηλέφωνο</label><br>
                <input name="phone" id="dregister-phone" type="tel" placeholder="+30 6930405060" pattern="[\+][3][0][ ][0-9]{10}" title="Παράδειγμα: +30 6930405060" required>
                <p style="color: red;"><?php echo $phone_err; ?> </p>
            </div>

            <div class="row">
                <label for="dregister-address">Διεύθυνση</label><br>
                <input name="address" id="dregister-address" type="text" placeholder="Ηρωδότου 10" required>
                <p style="color: red;"><?php echo $address_err; ?> </p>
            </div>

            <div class="row">
                <?php
                $json_towns = json_decode(file_get_contents("../data/towns.json"), true);
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

            </div>

        </div>
    </div>

    <div class="down">
        <a class="forgot-pass" href="#">Ξέχασα τον κωδικό μου</a>
        <input type="submit" class="registerbtn" value="Εγγραφή">
    </div>
</form>

<div class="sign-as"><a href="../pages/register_page.php?type=p">Εγγραφή ως μέλος</a></div>