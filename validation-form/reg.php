<?php

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$login = filter_var(trim($data["login"]), FILTER_SANITIZE_STRING);
$name = filter_var(trim($data["name"]), FILTER_SANITIZE_STRING);
$pass = md5(filter_var($data["pass"], FILTER_SANITIZE_STRING) . "sultchkchk123");

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
} else if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    echo "Недопустимая длина имени";
    exit();
} else if (mb_strlen($pass) < 2 || mb_strlen($name) > 6) {
    echo "Недопустимая длина пароля (от 2 до 6 символов";
    exit();
}

$mysql = new mysqli('localhost', 'root', '', 'register-bd');
$mysql->set_charset('utf8');
$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");

$mysql->close();

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

