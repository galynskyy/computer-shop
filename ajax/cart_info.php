<?php
	session_start();
	//session_destroy();
	if(empty($_SESSION['cart']))
	{
		$number = 'нет';
		$summ = '0';
	}
	else
	{
		foreach($_SESSION['cart'] as $value)
		{
			$number += $value['number'];
		}
		
		//$number = count($_SESSION['cart']);
		
		foreach($_SESSION['cart'] as $value)
		{
			$summ += $value['itogo'];
		}
	}
	
	$data = array('count' => $number.' товара(ов)', 'money' => $summ.' руб.');
	
	echo json_encode($data);
?>