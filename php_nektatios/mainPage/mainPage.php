<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <style>
    /* for search bar*/
    select {
        width: 40%;
        padding: 12px;
        border-radius: 6px;
        font-size: 16px;
    }

    .search {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
    }

    .search>a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 66px;
        height: 48px;
        border-radius: 6px;
        background-color: #E43F6F;
    }

    /*style for upcomming apointments*/
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    p {
        font-family: 'Roboto', sans-serif;
        font-size: 20px;
        color: #00BFB4;

    }

    .box {
        height: 150px;
        width: 191px;
        border-radius: 15px;
        background-color: #F5F5F5;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);

    }

    .upcoming-box {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        flex-wrap: wrap;
        gap: 30px;
        padding: 20px 30px;
        background: #E8F9F8;
        border-radius: 15px;
    }

    /*style for allApointments*/
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto&display=swap');

    .all-apointments {
        margin-top: 15px;
    }

    .title {
        background: #E43F6F;
        border-radius: 15px;
        padding: 14px 30px;
        font-family: 'Roboto', sans-serif;
        font-size: 20px;
        color: #fff;
    }

    header,
    .row {
        display: flex;
        padding: 12px 21px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 14px;
        /* aligns all child elements (flex items) in a row */
    }

    .col {
        flex: 1;
        color: #464E5F;
        /* distributes space on the line equally among items */
    }

    header {
        margin-top: 19px;
        background: #F3F6F9;
        border-radius: 6px;
        font-size: 12px;
    }
    </style>
</head>

<body>
    <div class="con">
        <?php include "searchBar.php";
        include "upcomingApointments.php";
        include "allApointments.php";
    ?>
    </div>
</body>

</html>