<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<div class="container mt-4">
    <!--Проверка существует ли куки (если куки нет - отображается форма для регистраии/авторизации)-->
    <?php
    if($_COOKIE['user'] == ''):
    ?>

    <!--Блок для столбцов форм регистрации/авторизации-->
    <div class="row">

        <!--Форма регистрации-->
        <div class="col">
            <h1>Форма регистрации</h1>
            <form action="php-files/reg-check.php" method="post">
                <input type="text" class="form-control" name="login" placeholder="Введите логин"><br>
                <input type="password" class="form-control" name="pass" placeholder="Введите пароль"><br>
                <input type="text" class="form-control" name="name" placeholder="Введите имя"><br>
                <button class="btn btn-success" type="submit">Зарегистрироваться</button>
            </form>
        </div>

        <!--Форма авторизации-->
        <div class="col">
            <h1>Форма авторизации</h1>
            <form action="php-files/auth.php" method="post">
                <input type="text" class="form-control" name="login" placeholder="Введите логин"><br>
                <input type="password" class="form-control" name="pass" placeholder="Введите пароль"><br>
                <button class="btn btn-success" type="submit">Авторизоваться</button>
            </form>
        </div>

        <?php else: ?>
        <p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="php-files/exit.php">здесь</a></p>
        <?php endif;?>

    </div>
</div>
</body>
</html>