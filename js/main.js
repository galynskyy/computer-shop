/* Autoload */
	$(function()
	{
		get_comment();
		//get_cart();
		setTimeout(cart_info, 600);
		setTimeout(get_cart, 600);
	});
/* /Autoload */
	$('#call_add_comment').click(function()
	{
		$('#form_add_comment').fadeToggle(300);
		window.scrollTo(0, 99999999);
	});
	$('#call_order').click(function()
	{
		$('#form_order').fadeToggle(300);
		window.scrollTo(0, 99999999);
		//$('#loading_order').hide();
	});
/* Comment action */

	function minus_tovar(id)
	{
		$.ajax({
			url: "ajax/minus_tovar.php",
			type: "POST",
			data: {id: id},
			/*beforeSend: function(){
				$('#loading_comment_view').show();
			},
			complete: function(){
				$('#loading_comment_view').hide();
			},*/
			success: function(data){
				//alert(data);
				get_cart();
				cart_info();
			}
		});
	}

	function plus_tovar(id)
	{
		$.ajax({
			url: "ajax/plus_tovar.php",
			type: "POST",
			data: {id: id},
			/*beforeSend: function(){
				$('#loading_comment_view').show();
			},
			complete: function(){
				$('#loading_comment_view').hide();
			},*/
			success: function(data){
				//alert(data);
				get_cart();
				cart_info();
			}
		});
	}
	
	function delete_cart_tovar(id)
	{
		$.ajax({
			url: "ajax/delete_cart_tovar.php",
			type: "POST",
			data: {id: id},
			/*beforeSend: function(){
				$('#loading_comment_view').show();
			},
			complete: function(){
				$('#loading_comment_view').hide();
			},*/
			success: function(data){
				//alert(data);
				get_cart();
				cart_info();
			}
		});
	}
	function cart_info()
	{
		$.ajax({
			dataType: 'json',
			url: 'ajax/cart_info.php',
			success: function(data){
				$('.count_cart').html(data.count);
				$('.money_cart').html(data.money);
			}
		});
	}
	function add_cart(id)
	{
		$.ajax({
			url: "ajax/add_cart.php",
			type: "POST",
			data: {id: id},
			/*beforeSend: function(){
				$('#loading_comment_view').show();
			},
			complete: function(){
				$('#loading_comment_view').hide();
			},*/
			success: function(data){
				//alert(data);
				cart_info();
			}
		});
	}
	function get_cart()
	{
		$('#loading_cart').show();
		$.ajax({
			url: "ajax/get_cart.php",
			type: "POST",
			success: function(data){
				if(data == "error")
				{
					$('#cart_tovar').html('<p class="error">Пока что ничего нет. Добавьте что нибудь из нашего <a href="/">каталога</a> и оно появится здесь.</p>');
					$('#form_order').hide();
					$('#call_order').hide();
				}
				else
				{
					$('#loading_cart').hide();
					$('#call_order').show();
					$('#cart_tovar').html(data);
				}
			}
		});
	}
	function get_comment()
	{
		var id = getParameterByName("id");
		$.ajax({
			url: "ajax/get_comment.php",
			type: "POST",
			data: {id: id},
			beforeSend: function(){
				$('#loading_comment_view').show();
			},
			complete: function(){
				$('#loading_comment_view').hide();
			},
			success: function(data){
				if(data == "error")
				{
					$('#comment').html('<p class="error">Комментариев нет к несуществующему товару</p>');
				}
				else{
					$('#comment').html(data);
					$('#call_add_comment').show();
				}
			}
		});
	}
	function add_comment()
	{
		var id = getParameterByName("id");
		var name = $('#name_comm').val();
		var text = $('#text_comm').val();
		$.ajax({
			url: "ajax/add_comment.php",
			type: "POST",
			data: {id: id, name: name, text: text},
			beforeSend: function(){
				$('#form_add_comment').hide;
				$('#form_add_comment').css("opacity", "0.5");
				$('#loading_comment_add').show();
			},
			complete: function(){
				$('#form_add_comment').css("opacity", "1");
				$('#loading_comment_add').hide();
				get_comment();
			},
			success: function(data){
				$('#form_add_comment').html(data);
			}
		});
	}
	function check_input_comment()
	{
		if($('#name_comm').val().length < 4)
		{
			alert("Ошибка ввода имени");
			$('#name_comm').focus();
			return false;
		}
		
		if($('#text_comm').val().length < 4)
		{
			alert("Ошибка ввода текста");
			$('#text_comm').focus();
			return false;
		}
		add_comment();
	}
	
	$('#submit_add_comment').click(function(){
		check_input_comment();
	});
	
	function check_input_order()
	{
		if($('#name_order').val().length < 4)
		{
			alert("Ошибка ввода имени");
			$('#name_order').focus();
			return false;
		}
		
		if($('#family_order').val().length < 4)
		{
			alert("Ошибка ввода фамилии");
			$('#family_order').focus();
			return false;
		}
		
		if($('#email_order').val().length < 4)
		{
			alert("Ошибка ввода E-Mail");
			$('#email_order').focus();
			return false;
		}
		
		if($('#tel_order').val().length < 4)
		{
			alert("Ошибка ввода телефона");
			$('#tel_order').focus();
			return false;
		}
		
		add_comment();
	}
	
	function add_order()
	{
		//var id = getParameterByName("id");
		var name = $('#name_order').val();
		var family = $('#family_order').val();
		var email = $('#email_order').val();
		var tel = $('#tel_order').val();
		$.ajax({
			url: "ajax/add_order.php",
			type: "POST",
			data: {name: name, family: family, email: email, tel: tel},
			/*beforeSend: function(){
				$('#form_add_comment').hide;
				$('#form_add_comment').css("opacity", "0.5");
				$('#loading_comment_add').show();
			},
			complete: function(){
				$('#form_add_comment').css("opacity", "1");
				$('#loading_comment_add').hide();
				get_comment();
			},*/
			success: function(data){
				//alert('Успех');
				//cart_info();
				//setTimeout(cart_info, 600);
				//setTimeout(get_cart, 600);
				$('#cart_tovar').hide();
				$('#call_order').hide();
				setTimeout(cart_info, 600);
				$('#form_order').html(data);
			}
		});
	}
	
	$('#submit_order').click(function(){
		check_input_order();
		add_order();
	});
	
	/* Search */
	$('#search_submit').click(function(){
		if( $.trim($('#search_name').val()) == "" )
		{
			alert("Задан пустой поисковый запрос");
			$('#search_name').focus();
			return false;
		}
		search();
	});
	
	function search()
	{
		var name = $('#search_name').val();
		$.ajax({
			url: "ajax/search_form.php",
			type: "POST",
			data: {name: name},
			success: function(data){
				$('#products').html(data);
				$('#view_page').html(data);
				$('#cart_page').html(data);
			}
		});
	}
	/* /Search */
/* /Comment action */
/* Get parameter URL */
	function getParameterByName(name)
	{
		name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
		var regexS = "[\\?&]" + name + "=([^&#]*)";
		var regex = new RegExp(regexS);
		var results = regex.exec(window.location.search);
		if(results == null)
			return "";
		else
			return decodeURIComponent(results[1].replace(/\+/g, " "));
	}
/* /Get parameter URL */