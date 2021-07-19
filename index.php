<?php 


class LoadPage {
	public function __call($method, $params)
	{
		include __DIR__ . "/{$method}.php";
	}
}


$loader = new LoadPage();

$loader->sort('Sorting, Advanced PHP');