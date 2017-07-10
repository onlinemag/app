<?php

class Controller_Message extends Controller		//контроллер страницы сообщений
{

	function __construct()
	{
		$this->model_m = new Model_Message();
		$this->model = new Model();
		$this->view = new View();
	}

	function action_index()
	{	
		session_start();
		if (isset($_GET['out']))
		{
			unset($_SESSION['access_token']);
			unset($_SESSION['id']);
		}
		if (isset($_GET['button']) && $_GET['text'] != '')
		{
			$result_write = $this->model_m->write_message($_GET['text'], $_GET['parent']);	
			if ($result_write)
			{
				header( "Location: /?con=Message&code=$_GET[code]") ;
			}
		}
		$data = $this->model->get_data();	
		$params = $this->model->get_param($_GET['code']);
		if (isset($_GET['code']) && !isset($_SESSION['id'])) 
		{
			$result = false;
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $params['url']);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			$result = curl_exec($curl);
			curl_close($curl);
			$tokenInfo = json_decode($result, true);
		}
		else
		{
			$tokenInfo['access_token'] = $_SESSION['access_token'];
		}
		if (isset($tokenInfo['access_token'])) 
		{
			$params['access_token'] = $tokenInfo['access_token'];
			$userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
			if (isset($userInfo['id'])) 
			{
				$result = true;
			}
		}
		$_SESSION['access_token'] = $tokenInfo['access_token'];
		$_SESSION['id'] = $userInfo['id'];
		$id_data = $this->model_m->get_messages_id();
		$this->view->generate('message_view.php', 'template_view.php', $data, $id_data, $userInfo);
	}
	
	function data_for_id($id)
	{
		$data_db = $this->model_m->get_message($id);	
		return $data_db;
	}
	function child_id($id_ch)
	{
		$id_child = $this->model_m->get_child($id_ch);	
		return $id_child;
	}
}