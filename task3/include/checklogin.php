<?php

// Соединяемся с БД
include "config.php";

if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {

} else {
	print "Включите куки в настройках вашего браузера";
}
