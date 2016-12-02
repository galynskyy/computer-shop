<?php
	session_start();
	
	$_SESSION['cart'][$_POST['id']]['number']++;
	$_SESSION['cart'][$_POST['id']]['itogo'] = $_SESSION['cart'][$_POST['id']]['number'] * $_SESSION['cart'][$_POST['id']]['price'];
	
	echo('Товар с id - '.$_POST['id'].' заплюсован');
?>