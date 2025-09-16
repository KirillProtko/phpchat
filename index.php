<?php
require (__DIR__ . "/main.php");
if (isset($_POST['sort'])) {
    $sort = $_POST['sort'];
}
?>
<!doctype html>
<html lang="ru">
<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ЧАТ</title>
</head>
<body>
<div class="user">
    <div class="account">
        <div class="sign">
            <form action="" method="post">
                <input type="text" name="login" placeholder="Введите логин"><br>
                <input type="text" name="email" placeholder="Введите эл. почту"><br>
                <input type="password" name="password" placeholder="Введите пароль">
                <br>
                <input type="submit" name="sign" value="Зарегистрироваться">
                <input type="submit" name="log" value="Автозироваться">
            </form>
        </div>
        <div class="rules">
            Логин до 16 симловов<br>
            Латинские буквы и символы
        </div>
        <div class="info">
            Текущий аккаунт: <?= $login ?? ''?>
        </div>
    </div>
    <br>
    <?= $err ?>
    <br>
    <div class="exitButton" >
        <form action="" method="post">
            <input type="submit" name="logout" value="Выйти с аккаунта">
            <input type="submit" name="clear" value="Очистить историю" class="clear">
        </form>
    </div>
</div>
    <br>
    <div class="chat">
        <div class="messages">
            <table>
                <tbody>
                <?php
                   takeMessage();
                ?>
                </tbody>
            </table>
        </div>
        <div>
            <form action="" method="POST" class="inputs">
                <textarea class="yourMessage" name="message" placeholder="Введите сообщение (Не более 130 символов)" onresize=""></textarea>
                <input class="submit" type="submit" name="send" value="Отправить" >
                <input class="chooseFile" formenctype="multipart/form-data" type="file" name="file" value="Выбрать файл">
                <select name="sort" onchange="this.form.submit()">
                    <option value="time_desc" <?= $sort === 'time_desc' ? 'selected' : '' ?>>Сортировка по времени (сначала новые)</option>
                    <option value="time_asc" <?= $sort === 'time_asc' ? 'selected' : '' ?>>Сортировка по времени (сначала старые)</option>
                    <option value="name_asc" <?= $sort === 'name_asc' ? 'selected' : '' ?>>Сортировка по имени (по алфавиту)</option>
                    <option value="name_desc" <?= $sort === 'name_desc' ? 'selected' : '' ?>>Сортировка по имени (по обр. алфавиту)</option>
                </select>
            </form>
        </div>
    </div>
	<div>
	<p>Новый блок</p>
	</div>
</body>
</html>

