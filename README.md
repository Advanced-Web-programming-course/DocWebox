# File Structure

## DocWebox

- root folder

## Config

- config.php (host, db name, user, password)
- connection.php (συνδεση με την βαση)
- initialize.php (εδω καλείται ο κωδικας την πρωτη φορα που θα τρέξει η εφαρμογη ώστε να δημιουργηθεί η βάση και οι πίνακες)

## Pages

- τα αρχεία που περιέχουν τις οθόνες (View χρήστη γιατρού κτλπ)

## Partials ή Components

- header.php
- footer.php
- side_bar.php
- search_bar.php
- (και αλλα)

## JS (Αρχεια Javascript)

## CSS (Αρχεια CSS)

## Model (Οντότητες του συστήματος)

- admin.php
- doctor.php
- patient.php
- appointment.php
- service.php
- review.php

## Services ή Repository (Μέθοδοι CRUD = CREATE, READ, UPDATE, DELETE) για κάθε οντότητα

- admin_db_service.php (κλάση με μεθοδους για τον admin)
- doctor_db_service.php (κλάση με μεθοδους για τον doctor)
- patient_db_service.php (κλάση με μεθοδους για τον patient)
- appointment_db_service.php (κλάση με μεθοδους για τον appointment)
- doctor_service_db_service.php
- review_db_service.php

## Shared (shared functionality [methods etc.] )
