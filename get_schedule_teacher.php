<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        text-align: center;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<?php
require_once 'db_connect.php';

    $teacher_id = $_POST['teacher'];

  
    $sql = "SELECT DISTINCT `week_day`, `lesson_number`, `auditorium`, `disciple`, `name`, `type`, `title` FROM `lesson`
    JOIN `lesson_groups` AS lg ON lesson.ID_Lesson = lg.FID_Lesson2
    JOIN `groups` AS g ON lg.FID_Groups = g.ID_Groups
    JOIN `lesson_teacher` AS lt ON lesson.ID_Lesson = lt.FID_Lesson1
    JOIN `teacher`AS t ON lt.FID_Teacher = t.ID_Teacher
	WHERE t.ID_Teacher = '$teacher_id'";
    
    $stmt = $pdo->prepare($sql);

    
    $stmt->bindValue(':ID_Teacher', $teacher_id, PDO::PARAM_INT);
    $stmt->execute();

   
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        echo '<table>';
        echo '<thead><tr><th>День тижня</th><th>Номер пари</th><th>Аудиторія</th><th>Дисципліна</th><th>Тип</th><th>Викладач</th><th>Група</th></tr></thead>';
        echo '<tbody>';

        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row['week_day'] . '</td>';
            echo '<td>' . $row['lesson_number'] . '</td>';
            echo '<td>' . $row['auditorium'] . '</td>';
            echo '<td>' . $row['disciple'] . '</td>';
            echo '<td>' . $row['type'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['title'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    } else {
        echo 'Розклад для викладача не знайдено.';
    }
    ?>