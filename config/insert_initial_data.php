<?php
include "../db_services/db_functions.php";

//Patient
echo "Table : Patient<br>";
echo "------------------<br>";

create_patient('Ελισάβετ Αμπατζίδου', '6998422460', 'elisavetabatzidou@gmail.com', '1f555kl@hj6', 'https://avatars.githubusercontent.com/u/68596273?v=4');
create_patient('Ευμορφία Ελπίδα Δασύρα', '6998422461', 'evitadasira@gmail.com', '1!985kl@hj6', 'https://cdn-icons-png.flaticon.com/512/194/194938.png');
create_patient('Nίκος Κουταμάνης', '6998422462', 'nickkoutamanis@gmail.com', '1fahhkl@hj6', 'https://scontent.fskg1-2.fna.fbcdn.net/v/t1.6435-9/80818907_502405753708353_1901806038290530304_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=VDeI-3ivw9oAX9JzQ66&_nc_ht=scontent.fskg1-2.fna&oh=00_AfCqWF-K72eCA_Q85CyJO0DGvhvztE3NSa6xj6omR-BJRA&oe=6380CC54');
create_patient('Αραβέλλα Λούστα', '6998422463', 'aravellalou@gmail.com', '19%hkl@h)6', 'https://cdn.iconscout.com/icon/free/png-256/avatar-373-456325.png');
create_patient('Νεκτάριος Παπαγαλάκης', '6998422464', 'npapagalakis@gmail.com', '1234l@hj6', 'https://i.pinimg.com/280x280_RS/71/ac/f0/71acf06b9e80d595b1aabfa08f0af762.jpg');
create_patient('Λέοναρντ Πέπα', '6998422465', 'leonardpepa@gmail.com', '1faskl@hj6', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fgithub.com%2FLeonardpepa&psig=AOvVaw0D3oMKwzSnkUhcAucIV5Aj&ust=1667042440307000&source=images&cd=vfe&ved=0CA0QjRxqFwoTCNjnypXngvsCFQAAAAAdAAAAABAE');


echo "<br>";
echo "<br>";
echo "Table : Doctor<br>";
echo "------------------<br>";

create_doctor('Κωνσταντίνος Παπαδόπουλος', '6998422470', 'kpapadopoulos@gmail.com', '7s7l7m9m', 'Ηροδότου 9', 'Θεσσαλονίκη', 'Παθολόγος', 'Είμαι πολύ καλός γιατρός', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsoVMy2z3XUS7XgcBEIPQmADnz_6acHkgnit7KjippzUvfSAFV44zgkDisucDgKr-kB20&usqp=CAU');
create_doctor('Δήμητρα Παπαδάκη', '6998422471', 'dimpapadaki@gmail.com', 'gxwys2v6', 'Ηροδότου 19', 'Αθήνα', 'Ενδοκρινολόγος', 'Δήμητρα το όνομα μου και Παθολογος το επάγγελμα μου', 'data:image/jpeg;base64,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');
create_doctor('Χρήστος Πρασσάς', '6998422472', 'xprassas@gmail.com', 'axw0tyuv', 'Μαξίμου 19', 'Πάτρα', 'Ενδοκρινολόγος', 'Καταπληκτική εξυπηρέτηση σε ανταγωνιστικές τιμές', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsoVMy2z3XUS7XgcBEIPQmADnz_6acHkgnit7KjippzUvfSAFV44zgkDisucDgKr-kB20&usqp=CAU');
create_doctor('Γιάννης Αποστόλου', '6998422473', 'gapostolou@gmail.com', '71r0tp8p', 'Εγνατίας 29', 'Θεσσαλονίκη', 'Παθολόγος', 'Ταχύτατη εξυπηρέτηση σε ένα πολύ ζεστό περιβάλλον', 'data:image/png;base64,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');
create_doctor('Άννα Γκίκα', '6998422474', 'anna75@gmail.com', 'v0n5mn54', 'Μενεμένης 6', 'Πάτρα', 'Παθολόγος', 'Δεν είμαι πολύ καλός γιατρός αλλά είμαι πολύ φθηνός', 'data:image/jpeg;base64,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');
create_doctor('Αντώνης Παπάς', '6998422475', 'antonispapas@gmail.com', 'bdvnzdhy', 'Λαζαρακι 2', 'Πάτρα', 'Γυναικολόγος', 'Μην γανώνεσαι … Είστε σίγουρα ψυχολόγος?', 'https://cdn.dribbble.com/users/1050535/screenshots/5466232/doc-icon_4x.png');
create_doctor('Θωμάς Παπαιωάνης', '6998422476', 'thomas555@gmail.com', 'qf9rvt1g', 'Ανατολής 6', 'Ιωάννινα', 'Ψυχολόγος', 'Υπερσύγχρονες εγκαταστάσεις στο κέντρο της πόλης', 'https://cdn.dribbble.com/users/1050535/screenshots/5466232/doc-icon_4x.png');
create_doctor('Μαρία Παπαδοπούλου', '6998422477', 'mariapapadopoulou85@gmail.com', '7opx2zlf', 'Καποδίστρια 6', 'Ιωάννινα', 'Γυναικολόγος', 'Μπλα μπλα μπλα μπλα', 'https://i.pinimg.com/originals/64/34/d7/6434d72ce9e16251c4f41f4e5a146567.png');
create_doctor('Νεφέλη Γιάγκου', '6998422478', 'nefelig789@gmail.com', '3=5[;2bf', 'Μακρή 13', 'Ιωάννινα', 'Παθολόγος', 'Είμαι και από ιατρική οικογένεια', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsoVMy2z3XUS7XgcBEIPQmADnz_6acHkgnit7KjippzUvfSAFV44zgkDisucDgKr-kB20&usqp=CAU');
create_doctor('Νέστορας Παπαζήσης', '6998422479', 'nestorasp69@gmail.com', 'a&ym8m^h', 'Παπά 25', 'Θεσσαλονίκη', 'Ψυχολόγος', 'Καταξιωμένος σε Ελλάδα και εξωτερικό', 'data:image/png;base64,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');
create_doctor('Κωνσταντίνος Παπαδόπουλος', '6998422480', 'konpap85@gmail.com', '94v)a!ny', 'Παπανδρέου 7', 'Αθήνα', 'Παθολόγος', '...', 'https://cdn.dribbble.com/users/1050535/screenshots/5466232/doc-icon_4x.png');

echo "<br>";
echo "<br>";
echo "Table : Doctor Service<br>";
echo "------------------<br>";

/*Pathologist services  */
create_doctor_service("Γενική εξέταση", 30.55, "Παθολόγος");
create_doctor_service("Ράματα", 50.5, "Παθολόγος");
create_doctor_service("Συνταγογράφηση", 10.5, "Παθολόγος");
create_doctor_service("Ανάγνωση εξετάσεων", 50.5, "Παθολόγος");
create_doctor_service("Βιοψία", 100, "Παθολόγος");

/*Psychologist services  */
create_doctor_service("Γενική εξέταση", 30.55, "Ψυχολόγος");
create_doctor_service("Ψυχανάληση", 23.8, "Ψυχολόγος");
create_doctor_service("Ψυχολογική αξιολόγηση", 100, "Ψυχολόγος");
create_doctor_service("Οικογενειακή θεραπεία", 300, "Ψυχολόγος");
create_doctor_service("Ψυχοθεραπεία", 25, "Ψυχολόγος");

/*Orthopedic  services  */
create_doctor_service("Γενική εξέταση", 50.0, "Ορθοπαιδικός");
create_doctor_service("Αρθροσκόπηση", 45, "Ορθοπαιδικός");
create_doctor_service("Επισκευή κατάγματος", 70.0, "Ορθοπαιδικός");
create_doctor_service("Ανακατασκευή συνδέσμων", 150.0, "Ορθοπαιδικός");
create_doctor_service("Φυσικοθεραπεία", 25, "Ορθοπαιδικός");

/*Dentist  services  */
create_doctor_service("Γενική εξέταση", 50, "Οδοντίατρος");
create_doctor_service("Εξαγωγή Δοντιού", 67.74, "Οδοντίατρος");
create_doctor_service("Καθαρισμός", 30.58, "Οδοντίατρος");
create_doctor_service("Αιμοληψία", 9.4, 5);
create_doctor_service("Σφράγισμα", 25.53, "Οδοντίατρος");
/*Endocrinologist  services  */
create_doctor_service("Γενική εξέταση", 50, "Ενδοκρινολόγος");
create_doctor_service("Διαχείριση διαβήτη", 25, "Ενδοκρινολόγος");
create_doctor_service("Θεραπεία αυξητικής ορμόνης", 120, "Ενδοκρινολόγος");
create_doctor_service("Αντιμετώπιση ακρομεγαλίας", 60, "Ενδοκρινολόγος");
create_doctor_service("Αξιολόγηση υπογονιμότητας", 30.55, "Ενδοκρινολόγος");
/*Urologist  services  */
create_doctor_service("Γενική εξέταση", 50, "Ουρολόγος");
create_doctor_service("Κυστεοσκόπηση", 40, "Ουρολόγος");
create_doctor_service("Διαχείριση πέτρας στα νεφρά", 130.55, "Ουρολόγος");
create_doctor_service("Eξέταση προστάτη", 100, "Ουρολόγος");
create_doctor_service("Ουροδυναμική δοκιμή", 30.55, "Ουρολόγος");
/*Andrologist  services  */
create_doctor_service("Γενική εξέταση", 50, "Ανδρολόγος");
create_doctor_service("Ανάλυση σπέρματος", 80, "Ανδρολόγος");
create_doctor_service("Bαζεκτομή", 200, "Ανδρολόγος");
create_doctor_service("Αντιστροφή Bαζεκτομής", 60, "Ανδρολόγος");
create_doctor_service("Oρμονοθεραπεία", 30.55, "Ανδρολόγος");

echo "<br>";
echo "<br>";
echo "Table : Appointment<br>";
echo "------------------<br>";

create_appointment(1, 1, '2022-01-11 13:13:04', 1);
create_appointment(2, 6, '2022-02-12 14:23:14', 2);
create_appointment(3, 3, '2021-03-13 15:33:24', 3);
create_appointment(1, 4, '2021-04-14 16:43:34', 4);
create_appointment(4, 5, '2021-05-15 16:53:44', 5);
create_appointment(6, 6, '2022-06-16 09:63:54', 6);
create_appointment(1, 2, '2022-07-17 08:03:64', 7);
create_appointment(5, 8, '2021-08-18 10:23:54', 8);
create_appointment(4, 9, '2022-09-17 22:43:04', 9);
create_appointment(2, 2, '2022-11-11 23:23:44', 10);

// echo "<br>";
// echo "<br>";
// echo "Table : review<br>";
// echo "------------------<br>";

// create_review(1, 1, 4, "");
// create_review(2, 1, 4, "Good");
// create_review(1, 2, 3, "Average");
// create_review(3, 4, 1, "bad");
// create_review(1, 3, 4, "");
// create_review(3, 1, 5, "Very Good");
// create_review(4, 2, 2, "Average");
// create_review(5, 3, 1, "EW");
// create_review(6, 4, 5, "");
// create_review(4, 5, 4, "");
// create_review(5, 2, 2, "");
// create_review(3, 1, 4, "");

echo "<br>";
echo "<br>";
echo "Table : admin<br>";
echo "------------------<br>";
create_admin("admin@admin.com", "admin", "admin");