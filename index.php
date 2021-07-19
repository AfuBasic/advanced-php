<?php 

class DbConnection {

	public $con;
	public function __construct()
	{
		$host = 'localhost';
		$user = 'root';
		$pass = 'root';
		$db = 'advanced-php';

		$this->con = new mysqli($host,$user,$pass,$db);
	}

}


class LoadPage {
	public function __call($method, $params)
	{
		include __DIR__ . "/{$method}.php";
	}
}

$db = new DbConnection();
	
$loader = new LoadPage();
$loader->view_task('View Tasks', $db->con);