<?php

require_once "DataBase.php";
require_once "Schedule.php";

$db = new DataBase("localhost", "root", "", "schoolArthur");

$schedule = new Schedule($db->index());

if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["schedule_id"]))
{
    $schedule->deleteWrite
    (
        $_POST["schedule_id"]
    );

    header("location: index.php");
}


