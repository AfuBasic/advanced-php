<!doctype html>
	<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title><?=$params[0]?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta property="og:title" content="">
		<meta property="og:type" content="">
		<meta property="og:url" content="">
		<meta property="og:image" content="">

		<link rel="manifest" href="site.webmanifest">
		<link rel="apple-touch-icon" href="icon.png">
		<!-- Place favicon.ico in the root directory -->

		<link rel="stylesheet" href="h5bp/css/normalize.css">
		<link rel="stylesheet" href="h5bp/css/style.css">

		<meta name="theme-color" content="#fafafa">
	</head>

	<body>
		<?php 

		function parent_sort($x, $y)
		{
			return ($x['parent_id'] > $y['parent_id']);
		}

		$resp = "";

		$db = $params[1];

		if(($_SERVER['REQUEST_METHOD'] == 'POST') && !empty($_POST['task'])) {
			if(!isset($_POST['parent_id']) && filter_var($_POST['parent_id'], FILTER_VALIDATE_INT, ['min_range' => 1])) {
				$parent_id = $_POST['parent_id'];
			} else {
				$parent_id = 0;
			}

			$task = $db->real_escape_string($_POST['task']);

			$query = "INSERT INTO tasks(parent_id, task) VALUES ($parent_id, '$task')";
			$run = $db->query($query);

			if($db->affected_rows > 0) {
				$resp = "Task has been submitted";
			} else {
				$resp = "Task adding failed";
			}
		}

		$tasks = $db->query("SELECT * FROM tasks WHERE date_added = '0000-00-00 00:00:00'");
		$task_list = [];
		while(list($task_id, $parent_id, $task) = $tasks->fetch_array(MYSQLI_NUM)) {
			$task_list[] = [
				'task_id'	=> $task_id,
				'parent_id' => $parent_id,
				'task' => $task
			];
		}


		?>
		<form action="" method="post">
			<h5><?=$resp?></h5>
			<fieldset>
				<legent>Add a Task</legent>
				<p>Task: <input type="text" name="task" size="60" required></p>
				<p>
					Parent Task: 
					<select name="parent_id" id="">
						<option value="0">None</option>
						<?php foreach($task_list as $task): ?>
							<option value="<?=$task['task_id']?>"><?=$task['task']?></option>
						<?php endforeach; ?>
					</select>
				</p>
				<p>
					<button type="Submit">Save</button>
				</p>
			</fieldset>
		</form>


		<h2>Current To-Do List <hr /></h2>
		<ul>
			<?php 
			usort($task_list, 'parent_sort');

			foreach($task_list as $task): ?>
				<li><?=$task['task']?></li>
			<?php endforeach; ?>
		</ul>
	</body>

	</html>
