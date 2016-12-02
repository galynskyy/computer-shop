<?php
	session_start();
	
	/*try
	{
		$conn = new PDO('mysql:host=localhost;dbname=compshop','root','');
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}*/
	
	if (!empty($_SESSION['cart']))
	{
		//print_r($_SESSION['cart']);
		foreach ($_SESSION['cart'] as $id => $row)
		{
			//echo '<tr><td>'.$row['name'].'</td><td>'.$row['price'].'</td><td>'.$row['number'].'</td><td>'.$row['itogo'].'</td></tr>';
			echo '<ul id="cart_tovar_view">';
				echo '<li>';
					echo '<p id="cart_name"><a href="/view.php?id='.$id.'">'.$row['name'].'</a></p>';
					echo '<p id="cart_price">'.$row['price'].' руб.</p>';
					echo '<button onClick="plus_tovar('.$id.')">Добавить</button>';
					echo '<button onClick="minus_tovar('.$id.')">Удалить</button>';
					echo '<p id="cart_number">'.$row['number'].' штук(a)</p>';
					echo '<p id="cart_itogo">Итого: '.$row['itogo'].' руб.</p>';
					echo '<a id="cart_delete" onClick="delete_cart_tovar('.$id.')"><img title="Удалить из корзины" src="img/delete.png"></a>';
				echo '</li>';
			echo '</ul>';
		}
	}
	else
	{
		echo 'error';
	}
?>