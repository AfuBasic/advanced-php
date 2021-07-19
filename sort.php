<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$params[0]?></title>
</head>
<body>
	<?php 

		$students = [
			256 => [
				'name' => 'John',
				'grade' => '98.5'
			],

			2 => [
				'name' => 'Vance',
				'grade' => '85.5'
			],

			9 => [
				'name' => 'Stephen',
				'grade' => '99.0'
			],

			15 => [
				'name' => 'Abraham',
				'grade' => '89.5'
			],

			199 => [
				'name' => 'Seye',
				'grade' => '42.5'
			],
		];


		function name_sort($x, $y) {
			return strcasecmp($x['name'], $y['name']);
		}

		function grade_sort($x, $y) {
			return ($x['grade'] < $y['grade']);
		}

		uasort($students, 'name_sort');
		echo '<h2>Array Sorted By Name</h2><pre>' . print_r($students, 1) . '</pre>';

		uasort($students, 'grade_sort');
		echo '<h2>Array Sorted By Grade</h2><pre>' . print_r($students, 1) . '</pre>';
	?>
</body>
</html>