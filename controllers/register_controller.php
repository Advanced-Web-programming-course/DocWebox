<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../pages/main_page.php");
    exit;
}

require_once "../config/db_connection.php";
require_once "../shared/utils.php";
require_once "../db_services/db_functions.php";

// Define variables and initialize with empty values
$email = $password =  $full_name = "";
$email_err = $password_err = $full_name_err = "";

$user_type = get_user_type();

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter a email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    } else {
        // get the correct table
        $table = get_user_table_based_on_type($user_type);
        $email = trim($_POST["email"]);
        // Prepare a select statement
        $sql = "SELECT id FROM $table WHERE email = $email";

        if ($result = $conn->query($sql)) {
            if ($result->num_rows >= 1) {
                $email_err = "Email already exists";
            }
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["full_name"]))) {
        $full_name_err = "Please enter your full name.";
    } else {
        $full_name = trim($_POST["full_name"]);
    }

    // Check input errors before inserting in database
    if (empty($email_err) && empty($password_err) && empty($full_name_err)) {

        if ($user_type = "p") {
            create_patient($full_name, "", $email, $password, "");
        } else if ($user_type = "d") {
            create_doctor($full_name, "", $email, $hashed_password, "", "", "", "", "");
        }

        // header("Location: login_controller.php?user_type=" . $user_type);
    }

    // Close connection
    // $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="./photos/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="register-login.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }

        #main {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <main id="main">
        <div class="wrapper" id="register-div">
            <h2>Sign Up</h2>
            <p>Please fill this form to create an admin account.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>email</label>
                    <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control <?php echo (!empty($full_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $full_name; ?>">
                    <span class="invalid-feedback"><?php echo $full_name_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
                <p>Already have an admin account? <a href="login_controller.php">Login here</a>.</p>
            </form>
        </div>
    </main>
</body>

</html>