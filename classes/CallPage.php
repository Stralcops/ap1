<?php
/**
 * Created by PhpStorm.
 * User: Antoine MILOUX
 * Date: 14/03/2018
 * Time: 09:14
 */

class CallPage
{
    static function display()
    {
        $page = $_GET['page'] ?? "";
        $page = "./include/" . $page . ".inc.php";

        $files = glob("./include/*.inc.php");

        if (in_array($page, $files))
            include $page;
        else
            include "./include/home.inc.php";
    }

}