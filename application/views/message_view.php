

<h1>Страница сообщений</h1>
<div class="form">
<!--
	форма отправки сообщений или ссылка на авторизацию
-->
	<?
		session_start();
		if (isset($_SESSION['id']))
		{
			View::form();
		}
		else
		{
			View::auth($data);
			?>
			<p>
				“Для добавления и комментирования сообщений выполните вход”
			</p>
			<?
		}
	?>
</div>
<!--
	блок сообщений
-->
<div class="chat">
	<?
	$i = 0;
	$controller_on = new Controller_Message();
	while ($id_data[$i])
	{
		$mes = $controller_on->data_for_id($id_data[$i]);
		?>
		<table border="0">
			<tr>
				<td>
					<i id='<?echo"icon_right$i";?>'  class='fa fa-caret-square-o-right' aria-hidden='true'></i>
					<i id='<?echo"icon_down$i";?>' class='fa fa-caret-square-o-down' aria-hidden='true'></i>
				</td>
				<td>
					<p>
						<a href='#' onclick='showFun(<?echo"$i";?>);'><?echo"$mes[date] $mes[text]";?></a><!-- сообщения -->
					</p>
					<p>
						<a href='#' onclick='showCom(<?echo"$i";?>);'>Комментировать</a>
					</p>
					<div id='<?echo"Com$i";?>' class='display'><!--	форма отправки комментариев -->
					<?
						View::form($mes['id']);
					?>
					</div>
				</td>
			</tr>
		</table>
		<div id='<?echo"Show$i";?>' class='display' >
			<?
			$child_id = $controller_on->child_id($id_data[$i]);
			$ii = 0;
			while ($child_id[$ii])
			{
				$child = $controller_on->data_for_id($child_id[$ii]);
				?>
				<p>
					<div id='text3em' >
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						<?echo" $child[date] $child[text]";?><!-- коммментарии -->
					</div>
				</p>
				<p>
					<div id='text6em' >
						<a href='#' onclick='<?echo"showCom_Com($ii, $i);";?>'>Комментировать</a>
					</div>
				</p>
				<div id='<?echo"Com_Com$ii$i";?>' class='display' ><!--	форма отправки комментариев на коммментарии -->
					<?
						View::form($child['id']);
					?> 
				</div>
				<?
				$child_child_id = $controller_on->child_id($child_id[$ii]);
				$iii = 0;
				while ($child_child_id[$iii])
				{
					$child_child = $controller_on->data_for_id($child_child_id[$iii]);
					?>
					<p>
						<div id='text6em' >
							<i class='fa fa-file-text-o' aria-hidden='true'></i>
							<?echo" $child_child[date] $child_child[text]";?><!-- коммментарии на комментарии -->
						</div>
					</p>
					<?
					$iii++;
				}
				$ii++;
			}
			?>
		</div>
		<?
		$i++;
	}
	?>
</div>
<script type="text/javascript"><!-- скрипт выпадающих комментариев и форм отправки -->
	var num = '<?php echo $i;?>';
	var num_i = '<?php echo $ii;?>';
</script>
<script src="/js/java.js" type="text/javascript" encoding="UTF-8"></script>
