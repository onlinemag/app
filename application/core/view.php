<?php

class View	//вид проекта
{
	
	
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
	function generate($content_view, $template_view, $data=null, $id_data=null, $userInfo=null)
	{
		
		include 'application/views/'.$template_view;
	}
	
	public function form($id=null)
	{
		?>
		<form action='/' method="get">
			<input type='hidden' name='con' value='Message'>
			<input type='hidden' name='parent' value='<?echo"$id";?>' >
			<textarea name="text" cols="40" rows="3" placeholder="Текст сообщения"></textarea>
			<input type="submit" name ='button' value="Отправить">
		</form> 
		<?
	}
	public function auth($data=null)
	{
		echo $link = '<p><a href="' . $data['auth'] . '?' . urldecode(http_build_query($data)) . '">Аутентификация через Google</a></p>';
	}
}
