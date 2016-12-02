<?php
	try
	{
		$conn = new PDO('mysql:host=localhost;dbname=compshop','root','');
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
	
	$query = $conn->prepare("SELECT id,name,details,price,image,preview FROM product WHERE (name LIKE :name OR brand LIKE :name OR category LIKE :name) LIMIT 12");
	$query->bindValue(':name', '%'.$_POST['name'].'%', PDO::PARAM_STR);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	
	if($query->rowCount() < 1)
	{
		echo '<h4 class="error">Упс, товары не найдены</h4>';
	}
	else
	{
		foreach ($rows as $row)
		{
			echo '<article id="short">';
				echo '<a href="/view.php?id='.$row['id'].'"><img src="'.$row['image'].'"></a>';
				echo '<h4>'.$row['name'].'</h4>';
				echo '<p>'.$row['preview'].'</p>';
				echo '<h4>Цена: '.$row['price'].' руб.</h4>';
				echo '<h4><a id="details" href="/view.php?id='.$row['id'].'">Подробнее</a></h4>';
				echo '<a onClick="add_cart('.$row['id'].')"><button>Купить</button></a>';
			echo '</article>';
		}
	}
?>