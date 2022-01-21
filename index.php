<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html lang ="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Форма регистрации</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-4">
            <?php if (empty($_COOKIE['user'])): ?>
                <div class="row">
                    <div class="col">
                        <h1>Форма регистрации</h1>
                        <form action="" method="post">
                            <input type="text" class="form-control" name="login"
                                   id="regLogin" placeholder="Введите логин"><br>
                            <input type="text" class="form-control" name="name"
                                   id="regName" placeholder="Введите имя"><br>
                            <input type="password" class="form-control" name="pass"
                                   id="regPass" placeholder="Введите пароль"><br>
                            <button class ="btn btn-success" id="reg" type="submit"> зарегистрировать </button>
                        </form>
                    </div>
                    <div class="col">
                        <h1>Форма авторизации</h1>
                        <form action="" method="post">
                            <input type="text" class="form-control" name="login"
                                   id="authLogin" placeholder="Введите логин"><br>
                            <input type="password" class="form-control" name="pass"
                                   id="authPass" placeholder="Введите пароль"><br>
                            <button class ="btn btn-success" id="auth" type="submit"> авторизоваться </button>
                        </form>
                    </div>
                <?php else: ?>
                    <p>Привет <?= $_COOKIE['user'] ?>. Чтобы выйти нажмите<a href="exit.php"> здесь</a>.</p>
                <?php endif; ?>       
                <script src="script.js"></script>
            </div>
        </div>
    </body>
</html>
