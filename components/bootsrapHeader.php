<?php

function display_login_register_header($action, $type)
{
    if ($type == "d") {
        $type = "Γιατρού";
    } else if ($type == "p") {
        $type = "Μέλους";
    }

    if ($action == "login") {
        $action = "Σύνδεση";
    } else if ($action == "register") {
        $action = "Εγγραφή";
    }

    // $logo = file_get_contents("../images/logo.svg");
    echo
    "<link rel='stylesheet' href='../css/header.css'>
    <nav class='navbar navbar-light bg-light'> 
        <div class='container-fluid'>
        <a class='navbar-brand nav-link' href='#'>
            <img id='wholelogo' src='../images/logo.svg' alt='' width='90' 
            height='90' class='d-inline-block align-text-top'><span 
            id='logotext'>DOCWEBOX</span>
        </a>
        </div>
    </nav>
    <div id='lowerheader'>
        <p id='lowertext'>$action $type</p> <!-- Will change using login page buttons -->
    </div>";
}

function display_default_header($name)
{
    // $logo = file_get_contents("../images/logo.svg");
    
    echo 
    "<link rel='stylesheet' href='../css/header.css'>
    <nav class='navbar navbar-light bg-light'> 
        <div class='container-fluid'>
        <a class='navbar-brand nav-link' href='#'>
            <img id='wholelogo' src='../images/logo.svg' alt='' width='90' 
            height='90' class='d-inline-block align-text-top'><span 
            id='logotext'>DOCWEBOX</span>
        </a>
        </div>
    </nav>
    <div id='lowerheader'>
        <p id='lowertext'>Καλωσήρθες $name</p> <!-- Will change using login page buttons -->
    </div>";

}