<?php

class Schedule
{


    public function addWrite($id_class, $id_subject, $id_teacher, $id_day, $lesson_time)
    {
        $dbCon = Database::$db;
            $sql = "INSERT INTO Schedule (id_class, id_subject, id_teacher, id_day, lesson_time)
            VALUES ('$id_class', '$id_subject', '$id_teacher', '$id_day', '$lesson_time')";
        return mysqli_query($dbCon, $sql);
    }


    public function deleteWrite($schedule_id)
    {
        $dbCon = Database::$db;
        $sql = "DELETE FROM Schedule WHERE schedule_id = '$schedule_id'";
        return mysqli_query($dbCon, $sql);
    }

    public function getAllWrites()
    {
        $dbCon = Database::$db;
        $sql = "SELECT Schedule.schedule_id, Classes.class_name, Subjects.subject_name, 
                       Teachers.first_name, Teachers.last_name, DaysOfWeek.day_name, Schedule.lesson_time 
                FROM Schedule
                JOIN Classes ON Schedule.id_class = Classes.class_id
                JOIN Subjects ON Schedule.id_subject = Subjects.subject_id
                JOIN Teachers ON Schedule.id_teacher = Teachers.teacher_id
                JOIN DaysOfWeek ON Schedule.id_day = DaysOfWeek.day_id";
        return mysqli_query($dbCon, $sql);
    }


}