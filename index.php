<?php
session_start();
ini_set('stmp_port', 1025);
date_default_timezone_set('Europe/Paris');
include "./functions/classAutoLoader.php";
spl_autoload_register("classAutoLoader");

?>


<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8"/>
    <title>CESI AP - Blog</title>
    <link rel="stylesheet" href="assets/css/style.css"
</head>
<body>
<div id="container">

    <?php
    include "./include/header.php";

CallPage::display();
    include "./include/footer.php";


    ?>
</div>
</body>
</html>