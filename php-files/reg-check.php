<?php
//  Получение значений отправленных в форме
$login = filter_var(trim($_POST['login']));
$pass = filter_var(trim($_POST['pass']));
$name = filter_var(trim($_POST['name']));

//  Проверка длины указанных значений при заполнении формы (где || - или)
if(mb_strlen($login) < 5 || mb_strlen($login) > 50){
    echo "Недопустимая длина логина";
}elseif (mb_strlen($pass) < 6 || mb_strlen($pass) > 20){
    echo "Недопустимая длина пароля";
}elseif (mb_strlen($name) < 3 || mb_strlen($name) > 10){
    echo "Недопустимая длина имени";
}
// Хэш для пароля
$pass = md5($pass."frg");
// Подключение к БД
// Старый способ: $mysql = new mysqli('localhost', 'root', '','regusers');
$mysql = new PDO('mysql:host=localhost;dbname=regusers', 'root', '');
// Выполнение запроса на добавление полученных значений в таблицу
$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES ('$login', '$pass', '$name')");
// Закрываем соединение с БД
//$mysql->close();
// Выполняем переадресацию на главную страницу с формами
header('Location: /');
exit();