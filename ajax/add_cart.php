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
	
	$id = $_POST['id'];
	
	$query = $conn->prepare("SELECT * FROM product WHERE id = :id");
	$query->bindValue(':id', $id, PDO::PARAM_INT);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($rows as $row)
	{
		if($query->rowCount() == 1)
		{
			if ( isset( $_SESSION['cart'][$id] ) )
			{
				$_SESSION['cart'][$id]['number']++;
				$_SESSION['cart'][$id]['itogo'] = $_SESSION['cart'][$id]['number'] * $row['price'];
				echo 'Вы ещё раз добавили '.$row["name"].'';
			} 
			else
			{
				$_SESSION['cart'][$id] = array ('name' => $row['name'], 'price' => $row['price'], 'number' => 1, 'itogo' => $row['price']) ;
				echo 'Товар '.$row['name'].' успешно добавлен в корзину';
			}
		}
	}
?>