<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$params[0]?></title>
</head>
<body>
	<h2>Task List</h2>
	<hr>
	<?php 

		function make_list($tasks, $parent) {

			echo '<ol>';

			foreach($parent as $task_id => $todo) {

				echo "<li>$todo";

				if(isset($tasks[$task_id])) {
					make_list($tasks, $tasks[$task_id]);
				}

				echo '</li>';
			}

			echo "</ol>";

		}

		$db = $params[1];
		$query = $db->query("SELECT task_id, parent_id, task FROM tasks where date_completed = '0000-00-00 00:00:00' ORDER BY parent_id, date_added ASC");

		$tasks = [];

		while(list($task_id, $parent_id, $task) = $query->fetch_array(MYSQLI_NUM)) {
			$tasks[$parent_id][$task_id] = $task;
		}

		make_list($tasks, $tasks[0]); 
	 ?>


	
</body>
</html>