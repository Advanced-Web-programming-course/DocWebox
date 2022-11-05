# File Structure

## DocWebox
* root folder

## Config
* config.php (host, db name, user, password)
* connection.php (συνδεση με την βαση)
* initialize.php (εδω καλειτε ο κωδικας την πρωτη φορα που θα τρέξει η εφαρμογη ώστε να φτιαχτεί η βάση και οι πίνακες)

## Pages
* τα αρχεία που περιεχουν τις οθόνες (View χρήστη γιατρού κτλπ)

## Partials ή Components 
* header.php
* footer.php
* side_bar.php
* search_bar.php
* (και αλλα)

## JS (Αρχεια Javascript)

## CSS (Αρχεια CSS)

## Model (Οντότητες του συστήματος)
* admin.php
* doctor.php
* patient.php
* appointment.php 
* service.php 
* review.php

## Services ή Repository (Μέθοδοι CRUD = CREATE, READ, UPDATE, DELETE) για κάθε οντότητα
* admin_service.php
* doctor_service.php
* patient_service.php
* appointment_service.php
* service_service.php
* review_service.php

## Shared (shared fucntionality [methods etc.] )
