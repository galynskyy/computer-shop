<?php
	try
	{
		$conn = new PDO('mysql:host=localhost;dbname=compshop','root','');
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
	
	$query = $conn->prepare("SELECT id FROM product WHERE id = :id");
	$query->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	
	if($query->rowCount() < 1)
	{
		echo 'error';
		die();
	}
	
	$query = $conn->prepare("SELECT name,text FROM comment WHERE tovar_id = :id LIMIT 4");
	$query->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	
	if($query->rowCount() < 1)
	{
		echo '<p class="error">Пока что никто не оставил комментарий о товаре</p>';
	}
	else
	{
		foreach ($rows as $row)
		{
			echo '<ul id="user_comment">';
				echo '<li><p id="info_comment">'.$row['name'].'</p><p id="text_comment">'.$row['text'].'</p></li>';
			echo '</ul>';
		}
	}
?>