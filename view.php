<!DOCTYPE html>
<html>
	<head>
		<title>Интернет - магазин</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<header id="page_header">
			<a href="/"><img src="img/logo.png"></a>
			<h4>Высокое качество и доступные цены</h4>
			<div id="cart_info">
				<p>В корзине - <span class="count_cart"><img src="img/loader2.gif"></span></p>
				<p>На сумму - <span class="money_cart"><img src="img/loader2.gif"></span></p></p>
				<a href="/cart.php">Перейти в корзину</a>
			</div>
		</header>
		
		<section>
			<nav>
				<ul id="menu">
					<li><a href="/">Главная</a></li>
					<li><a href="/index.php?category=server">Сервера</a></li>
					<li><a href="/index.php?category=router">Роутеры</a></li>
					<li><a href="/index.php?category=switch">Коммутаторы</a></li>
					<li><a href="/index.php?category=lan">Сетевые карты</a></li>
					<li><input id="search_name" type="text" placeholder="Введите нужный товар"><input id="search_submit" type="submit" value="Найти"></li>
				</ul>
			</nav>
			<div id="view_page">
				<?php
				try
				{
					$conn = new PDO('mysql:host=localhost;dbname=compshop','root','');
				}
				catch (PDOException $e)
				{
					echo $e->getMessage();
				}
				
				$query = $conn->prepare("SELECT * FROM product WHERE id = :product_id");
				$query->bindValue(':product_id', $_GET['id'], PDO::PARAM_INT);
				$query->execute();
				$rows = $query->fetchAll(PDO::FETCH_ASSOC);
				
				if($query->rowCount() < 1)
				{
					echo '<h4 class="error">Товар не найден в нашем каталоге. Попробуйте <a href="/">найти</a> что вас интересует ещё раз.</h4>';
				}
				else
				{
					foreach ($rows as $row)
					{
						echo '<article id="long">';
							echo '<img src="'.$row['image'].'">';
							echo '<h4>'.$row['name'].'</h4>';
							echo '<p>'.$row['details'].'</p>';
							echo '<h4>Цена: '.$row['price'].' руб.</h4>';
							echo '<a onClick="add_cart('.$row['id'].')"><button>Купить</button></a>';
						echo '</article>';
					}
				}
			?>
			<!--<form id="myt" method="post">
				<input type="text" name="name" id="name">
				<input type="submit" id="myt_submit">
			</form>-->
			<div id="comments">
				<h4>Комментарии:</h4>
				<div id="loading_comment_view">
					<img src="img/loader.gif">
				</div>
				<div id="comment"></div>
				<div id="call_add_comment"><a>Добавить комментарий</a></div>
				<div id="form_add_comment">
					<div id="loading_comment_add">
						<img src="img/loader.gif">
					</div>
					<legend>Введите имя:</legend>
					<input id="name_comm" type="text" autofocus><br>
					<legend>Введите текст:</legend>
					<textarea id="text_comm" rows="3" cols="30"></textarea><br>
					<button type="submit" id="submit_add_comment">Добавить</button>
				</div>
			</div>
				<!-- /Add -->
			</div>
			<!-- Комментарии -->
			<!-- /Комментарии -->
			</div>
			
		</section>
		
		<footer id="page_footer">
			<p>Copyright Galynsky 2014</p>
		</footer>
		<!-- JS -->
		<script src="js/jquery.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>