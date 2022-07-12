<?php
	error_reporting(0);	// убирает показ предупреждения, т.к. изначально одно из полей пустует
	$msg_box = ""; // в этой переменной будем хранить сообщения формы
	
	if($_POST['btn_submit']){
		$errors = array(); // контейнер для ошибок
		// проверяем корректность полей
		if($_POST['user_name'] == "") 	 $errors[] = "Поле 'Ваше имя' не заполнено!";
		if($_POST['user_email'] == "") 	 $errors[] = "Поле 'Ваш e-mail' не заполнено!";
		if($_POST['text_comment'] == "") $errors[] = "Поле 'Текст сообщения' не заполнено!";

		// если форма без ошибок
		if(empty($errors)){		
			// собираем данные из формы
			$message  = "Имя пользователя: " . $_POST['user_name'] . "<br/>";
			$message .= "E-mail пользователя: " . $_POST['user_email'] . "<br/>";
			$message .= "Текст письма: " . $_POST['text_comment'];		
			// выведем сообщение об успехе
			$msg_box = "Спасибо за Вашу обратную связь";
		}else{
			// если были ошибки, то выводим их
			$msg_box = "Упс, что-то пошло не так";
		}
	}
	
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Обратная связь</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<br/>
	<?= $msg_box; // вывод сообщений ?>
	<br/>
	<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" name="frm_feedback">
		<label>Ваше имя:</label><br/>
		<input type="text" name="user_name" value="<?=($_POST['user_name']) ? $_POST['user_name'] : ""; // сохраняем то, что вводили?>" /><br/>
		
		<label>Ваш e-mail:</label><br/>
		<input type="text" name="user_email" value="<?=($_POST['user_email']) ? $_POST['user_email'] : ""; // сохраняем то, что вводили?>" /><br/>
		
		<label>Текст сообщения:</label><br/>
		<textarea name="text_comment"><?=($_POST['text_comment']) ? $_POST['text_comment'] : ""; // сохраняем то, что вводили?></textarea>
		
		<br/>
		<input type="submit" value="Отправить" name="btn_submit" />
	</form>

</body>
</html>