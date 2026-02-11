<?php

require_once "../models/DataBase.php";
require_once "../models/Schedule.php";

$db = new DataBase("localhost", "root", "", "schoolArthur");

$schedule = new Schedule($db->index());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule->addWrite
    (
        $_POST["class_id"],
        $_POST["subject_id"],
        $_POST["teacher_id"],
        $_POST["day_id"],
        $_POST["lesson_time"]
    );

    header("location: ../index.php");
}




