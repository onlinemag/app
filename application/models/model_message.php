<?php

class Model_Message extends Model		//модель страницы ссобщений
{
	public function get_messages_id()	//вытаскивает id всех сообщений
	{
		$this->connect_db(); 
		$i = 0;
		$query = ("SELECT * FROM message ORDER by date DESC");
		$result = mysql_query($query);
		$data = array();
		while($dt1=mysql_fetch_array($result))
		{	
			$yes = false;
			$query1 = ("SELECT * FROM hierarchy WHERE child_id = '$dt1[id]'");
			$result1 = mysql_query($query1);
			while($dt2=mysql_fetch_array($result1))
			{
				if ($dt2['child_id'])
				{
					$yes = true;
				}
			}
			if ($yes == false)
			{
				$data[$i] = $dt1['id'];
				$i++;
			}
		}
		return $data;
		
	}
	
	public function get_message($id)	//вытаскивает информацию о сообщении и комментарии
	{
		$query = ("SELECT * FROM message WHERE id = '$id'");
		$result = mysql_query($query);
		$dt1=mysql_fetch_array($result);
		return $dt1;
	}
	
	public function get_child($id_ch)	//вытаскивает id дочерних комментариев
	{
		$i = 0;
		$query3 = ("SELECT * FROM hierarchy WHERE parent_id = '$id_ch'");
		$result3 = mysql_query($query3);
		$data_child = array();
		while($dt3=mysql_fetch_array($result3))
		{
			$data_child[$i] = $dt3['child_id'];
			$i++;
		}
		return $data_child;
		
	}
	
	public function write_message($text, $parent)	//запись в бд
	{
		$this->connect_db(); 
		$date = date("Y",time()) ."-".date("m",time()) ."-".date("d",time()) ." ".date("H",time()) .":".date("i",time()) .":".date("s",time());
		$query4 = "INSERT INTO message VALUES ('', '$text', '$date')";
		$result4 = mysql_query($query4);
		if (isset($parent) && $parent != 0)
		{
			$query5 = ("SELECT id FROM message ORDER BY id DESC");
			$result5 = mysql_query($query5);
			$dt5=mysql_fetch_array($result5);
			$query6 = "INSERT INTO hierarchy VALUES ('', '$parent', '$dt5[id]')";
			$result6 = mysql_query($query6);
		}
		return $result4;
	}

}