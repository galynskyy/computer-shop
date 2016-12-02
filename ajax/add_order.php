<?php
	session_start();
	//session_destroy();
	try
	{
		$conn = new PDO('mysql:host=localhost;dbname=compshop','root','');
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
	
	$id_order = mt_rand(100000, 999999);
	
	foreach($_SESSION['cart'] as $value)
	{
		$tovar .= $value['name'].',';
	}
	
	$tovar = substr($tovar, 0, -1);
	
	foreach($_SESSION['cart'] as $value)
	{
		$number += $value['number'];
	}
	
	foreach($_SESSION['cart'] as $value)
	{
		$summ += $value['itogo'];
	}
	
	
	
	//print_r($tovar);
	
	$query = $conn->prepare("INSERT INTO `order`(`id`,`name`, `family`, `email`, `tel`, `tovar`) VALUES (:id,:name,:family,:email,:tel,:tovar)");
	$query->bindValue(':id', $id_order, PDO::PARAM_STR);
	$query->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
	$query->bindValue(':family', $_POST['family'], PDO::PARAM_STR);
	$query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
	$query->bindValue(':tel', $_POST['tel'], PDO::PARAM_INT);
	$query->bindValue(':tovar', $tovar, PDO::PARAM_STR);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	
	if($query->rowCount() == 1)
	{
		echo '<div id="result_order">';
			echo '<p>Ваш заказ id #<b>'.$id_order.'</b> поступил в обработку</p>';
			echo '<p>Уважаемый <b>'.$_POST['name'].' '.$_POST['family'].'</b></p>';
			echo '<p>Вы заказали <b>'.$number.' товар(ов)</b></p>';
			echo '<p>На сумму <b>'.$summ.' руб.</b></p>';
			echo '<p>Подробную информацию о заказе мы выслали на <b>'.$_POST['email'].'</b></p>';
			echo '<p aling="center">Спасибо Вам!</p>';
		echo '</div>';
		session_destroy();
	}
	else
	{
		echo 'Неудача';
	}
?>