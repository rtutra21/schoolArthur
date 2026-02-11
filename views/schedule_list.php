<?php
require_once "models/DataBase.php";
require_once "models/Schedule.php";
$db = new Database("localhost", "root", "", "schoolArthur");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Расписание школы</title>

    <link href="style.css" rel="stylesheet">

</head>

<body class="container">

<h1>Школьное расписание</h1>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Класс</th>
        <th>Предмет</th>
        <th>Имя учителя</th>
        <th>Фамилия учителя</th>
        <th>День недели</th>
        <th>Время урока</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $schedule = new Schedule($db->index());

    $schedulesAssoc = $schedule->getAllWrites();


    while ($rowTable = mysqli_fetch_assoc($schedulesAssoc)) {
        echo "<tr>
                <td>{$rowTable['schedule_id']}</td>
                <td>{$rowTable['class_name']}</td>
                <td>{$rowTable['subject_name']}</td>
                <td>{$rowTable['first_name']}</td>
                <td>{$rowTable['last_name']}</td>
                <td>{$rowTable['day_name']}</td>
                <td>{$rowTable['lesson_time']}</td>
                <td>
                 <form action='controllers/delete_schedule.php' method='post' class = 'form-delete'>
                 <input type='hidden' name='schedule_id' value='{$rowTable['schedule_id']}'>
                 <button type='submit' class='btn btn-delete'>Удалить</button>
                 </form>
                </td>
              </tr>";
    }
    ?>
    </tbody>
</table>


<h2>Добавить урок</h2>
<form action="controllers/add_schedule.php" method="post">
    <label>Класс:</label>
    <select name="class_id">
        <?php
        $mysqli = mysqli_connect("localhost", "root", "", "schoolArthur");
        $res = mysqli_query($mysqli, "SELECT * FROM Classes");
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<option value='{$row['class_id']}'>{$row['class_name']}</option>";
        }
        ?>
    </select>
    <br>
    <label>Предмет:</label>
    <select name="subject_id">
        <?php
        $res = mysqli_query($mysqli, "SELECT * FROM Subjects");
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<option value='{$row['subject_id']}'>{$row['subject_name']}</option>";
        }
        ?>
    </select>
    <br>
    <label>Учитель:</label>
    <select name="teacher_id">
        <?php
        $result = mysqli_query($mysqli, "SELECT * FROM Teachers");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['teacher_id']}'>{$row['first_name']} {$row['last_name']}</option>";
        }
        ?>
    </select>
    <br>
    <label>День недели</label>
    <select name="day_id">
        <?php
        $result = mysqli_query($mysqli, "SELECT * FROM DaysOfWeek");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['day_id']}'>{$row['day_name']}</option>";
        }
        ?>
    </select>
    <br>
    <label>Время:</label>
    <input type="time" name="lesson_time" required>
    <br>
    <button type="submit" class="btn-submit">Добавить</button>
</form>
</body>
</html>
