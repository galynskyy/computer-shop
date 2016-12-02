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
			<div id="cart_page">
				<div id="cart">
				<h4>Ваши покупки:</h4>
				
				<div id="cart_tovar"><div id="loading_cart"><img src="img/loader.gif"></div></div>
				<div id="call_order"><a>Перейти к оформлению заказа</a></div>
				<div id="form_order">
					<div id="loading_order">
						<img src="img/loader.gif">
					</div>
					<h4>Оставить заказ:</h4>
					<label>Имя</label><br>
					<input type="text" id="name_order"><br>
					<label>Фамилия</label><br>
					<input type="text" id="family_order"><br>
					<label>E-Mail</label><br>
					<input type="text" id="email_order"><br>
					<label>Телефон</label><br>
					<input type="text" id="tel_order"><br>
					<p>Количество: <span class="count_cart"><img src="img/loader2.gif"></span></p>
					<p>На общую сумму: <span class="money_cart"><img src="img/loader2.gif"></span></p>
					<button type="submit" id="submit_order">Подтвердить</button>
				</div>
			</div>
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