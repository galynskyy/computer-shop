<!DOCTYPE html>
<html>
	<head>
		<title>Интернет - магазин</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="shortcut icon" href="favicon.ico">
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
			
			<div id="products">
				<?php
					try
					{
						$conn = new PDO('mysql:host=localhost;dbname=compshop','root','');
					}
					catch (PDOException $e)
					{
						echo $e->getMessage();
					}
					
					if(isset($_GET['category']))
					{
						$query = $conn->prepare("SELECT id,name,details,price,image,preview FROM product WHERE category = :category LIMIT 12");
						$query->bindValue(':category', $_GET['category'], PDO::PARAM_INT);
						$query->execute();
						$rows = $query->fetchAll(PDO::FETCH_ASSOC);
						
						if($query->rowCount() < 1)
						{
							echo '<h4 id="error">Упс, товары не найдены</h4>';
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
					}
					else
					{
						$query = $conn->query("SELECT id,name,details,price,image,preview FROM product LIMIT 12");
						$rows = $query->fetchAll(PDO::FETCH_ASSOC);
						
						if($query->rowCount() < 1)
						{
							echo '<h4 id="error">Упс, товары не найдены</h4>';
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
					}
				?>
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