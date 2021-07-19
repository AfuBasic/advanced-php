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
