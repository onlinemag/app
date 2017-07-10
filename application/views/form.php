<?		
class View_Message extends View
{
	function form($id)
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
}
?>