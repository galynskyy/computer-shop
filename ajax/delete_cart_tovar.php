<?php
	session_start();
	
	unset($_SESSION['cart'][$_POST['id']]);
	
	echo('Товар с id - '.$_POST['id'].' успешно удален');
?>