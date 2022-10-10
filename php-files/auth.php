<?php
//  Получение значений отправленных в форме
$login = filter_var(trim($_POST['login']));
$pass = filter_var(trim($_POST['pass']));
// Получаем введённый пароль с ранее захэшированной строкой (по мимо идентичного pass должнен быть идентичный хэш)
$pass = md5($pass."frg");

// Подключаемся в БД
// Старый способ: $mysql = new mysqli('localhost', 'root', '', 'regusers');
$mysql = new PDO('mysql:host=localhost;dbname=regusers;charset=utf8', 'root', '');
// Отправляем запрос на выборку данных (логин и пароль) из таблицы Users
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
// Получение результата выборки запроса из таблицы Users, с помещением результата в массив
// Старый способ: $user = $result->fetch_assoc();
$user = $mysql->fetchAll(PDO::FETCH_ASSOC);
// Проверка наличия данных в массиве (если длина массива = 0)
if(count($user) == 0){
    echo "Такой пользователь не найден";
    exit();
}
/* Устанавливаем куки для авторизации по значению имени пользователя (ключ 'name')
где: 3600 - длительность куки 1 час (можно добавить * 24 для суток и т.п), "/" - действует на всех страничках сайта;
*/
setcookie('user', $user['name'], time() + 3600, "/");
// Закрываем соединение с БД
//$mysql->close();
// Выполняем переадресацию на главную
header('Location: /');
