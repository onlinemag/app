<?php

class Model		//модель проекта
{
	function __construct()
	{
		
		$this->client_id = '227992601464-k21q7n0jau6dsab05ukipfpnkf48d1bp.apps.googleusercontent.com'; // Client ID Google
		$this->client_secret = 'IjlldJ6v--Uru-cwWd4mP0w7'; // Client secret Google
		$this->redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].'/?con=Message'; // Redirect URIs Google
		$this->dbhost = "p40347.mysql.ihc.ru"; // Хост базы данных
		$this->dbuser = "p40347_lightit"; // Имя пользователя базы данных
		$this->dbpassword = "J6Jte4dzji"; // Пароль базы данных
		$this->dbname = "p40347_lightit"; // Имя базы данных
	}
	// метод выборки данных
	public function connect_db()
	{
		
		
		// Подключаемся к mysql серверу
		$link = mysql_connect($this->dbhost, $this->dbuser, $this->dbpassword);
		mysql_query( 'SET NAMES UTF8' );
		// Выбираем нашу базу данных
		mysql_select_db($this->dbname, $link) or die ("Невозможно_открыть_базу_данных");


	}
	public function get_data()
	{	
		// Задаем константы
		
		$data = array(
			'redirect_uri'  => $this->redirect_uri,
			'response_type' => 'code',
			'client_id'     => $this->client_id,
			'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
			'auth'			=> 'https://accounts.google.com/o/oauth2/auth',
			
		);
		
		return $data;
	}
	public function get_param($pcode)
	{
		$params = array(
				'client_id'     => $this->client_id,
				'client_secret' => $this->client_secret,
				'redirect_uri'  => $this->redirect_uri,
				'grant_type'    => 'authorization_code',
				'code'          => $pcode,
				'url'			=> 'https://accounts.google.com/o/oauth2/token'
			);
			
		return $params;
	}
}