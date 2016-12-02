<?php
	try
	{
		$conn = new PDO('mysql:host=localhost;dbname=compshop','root','');
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
	
	//$query = $conn->prepare("INSERT INTO comment (tovar_id,name,text) VALUES (:id,:name,:text)");
	$query = $conn->prepare("INSERT INTO `comment`(`tovar_id`,`name`,`text`) VALUES (:id,:name,:text)");
	$query->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$query->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
	$query->bindValue(':text', $_POST['text'], PDO::PARAM_STR);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	
	if($query->rowCount() < 1)
	{
		echo '<p class="error">Пока что никто не оставил комментарий о товаре</p>';
	}
	else
	{
		echo '<p class="ok">Ваш комментарий успешно добавлен</p>';
		/*foreach ($rows as $row)
		{
			echo '<ul id="user_comment">';
				echo '<li><p id="info_comment">'.$row['name'].'</p><p id="text_comment">'.$row['text'].'</p></li>';
			echo '</article>';
		}*/
	}
?>