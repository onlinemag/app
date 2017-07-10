<?php

class Controller_Main extends Controller		//контроллер страницы авторизации
{

	function __construct()
	{
		$this->model = new Model();
		$this->view = new View();
	}

	function action_index()
	{	
		session_start();
		$data = $this->model->get_data();
		if (isset($_SESSION['id']))
		{
			header( "Location: " . $data['auth'] . "?" . urldecode(http_build_query($data)) ) ;
		}
		else
		{
			$this->view->generate('main_view.php', 'template_view.php', $data);
		}
	}
}