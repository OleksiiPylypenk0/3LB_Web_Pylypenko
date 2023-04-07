<!DOCTYPE html>
<html>
<head>
	<title>Розклад занять</title>
</head>
<body>
	<h1>Виберіть групу:</h1>
	<form action="get_schedule_group.php" method="POST">
		<select name="group">
			<?php
			include 'db_connect.php';

			$stmt = $pdo->prepare("SELECT `ID_Groups`, `title` FROM `groups`");
			$stmt->execute();
			$groups = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($groups as $group) {
				echo '<option value="' . $group['ID_Groups'] . '">' . $group['title'] . '</option>';
			}
			?>
		</select>
		<input type="submit" value="Показати розклад">
	</form>
	<h1>Виберіть викладача:</h1>
	<form action="get_schedule_teacher.php" method="POST">
		<select name="teacher">
			<?php
			include 'db_connect.php';

			$stmt = $pdo->prepare("SELECT `ID_Teacher`, `name` FROM `teacher`");
			$stmt->execute();
			$groups = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($groups as $group) {
				echo '<option value="' . $group['ID_Teacher'] . '">' . $group['name'] . '</option>';
			}
			?>
		</select>
		<input type="submit" value="Показати розклад">
	</form>
	<h1>Виберіть аудиторію:</h1>
	<form action="get_schedule_auditorium.php" method="POST">
		<select name="Auditorium">
			<?php
			include 'db_connect.php';

			$stmt = $pdo->prepare("SELECT DISTINCT `auditorium` FROM `lesson`");
			$stmt->execute();
			$auditoriums = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($auditoriums as $auditorium) {
				echo '<option value="' . $auditorium['auditorium'] . '">' . $auditorium['auditorium'] . '</option>';
			}
			?>
		</select>
		<input type="submit" value="Показати розклад">
	</form>
</body>
</html>