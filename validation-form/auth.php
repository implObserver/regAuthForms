<?php

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$login = filter_var(trim($data["login"]), FILTER_SANITIZE_STRING);
$pass = md5(filter_var(trim($data["pass"]), FILTER_SANITIZE_STRING) . "sultchkchk123");

$mysql = new mysqli('localhost', 'root', '', 'register-bd');

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass' ");
$user = $result->fetch_assoc();
if (count((array) $user) == 0) {
    echo "Такой пользователь не найден";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");
$mysql->close();
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

