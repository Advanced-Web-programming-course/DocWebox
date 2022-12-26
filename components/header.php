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

    $logo = file_get_contents("../images/logo.svg");
    echo "<header id='header-component'>
        <div id='upperheader'>
            <link rel='stylesheet' href='../css/header_style.css'>
            <a id='wholelogo' href='#top'>
                $logo
            <p id='logotext'>DOCWEBOX</p></a>
        </div>
        <div id='lowerheader'>
            <p id='lowertext'>$action $type</p> <!-- Will change using login page buttons -->
        </div>
    </header>
    <br/>
    <br/>
    <br/>
    <br/>";
}

function display_default_header($name)
{
    $logo = file_get_contents("../images/logo.svg");
    echo "<header id='header-component'>
        <div id='upperheader'>
            <link rel='stylesheet' href='../css/header_style.css'>
            <a id='wholelogo' href='#top'>
                $logo
            <p id='logotext'>DOCWEBOX</p></a>
        </div>
        <div id='lowerheader'>
            <p id='lowertext'>Καλωσήρθες $name</p> <!-- Will change using login page buttons -->
        </div>
    </header>
    <br/>
    <br/>
    <br/>
    <br/>";
}
