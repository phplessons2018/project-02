<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="../../index.php?action=add" method="post" enctype="multipart/form-data">
    <span>Имя</span><br>
    <input type="text" name="name" value="<?php echo $_SESSION["userName"] ?>">
    <br><br>
    <span>Возраст</span><br>
    <input type="number" name="years">
    <br><br>
    <span>Текст</span><br>
    <textarea name="text" id="" cols="30" rows="10"></textarea>
    <br><br>
     <span> Загрузить фотографию</span>
    <br>
    <input type="file" name="image">
    <br><br>
    <button type="submit">Отправить</button>
</form>

<br><br><br>
<a href="/app/views/listPosts.php">
    Список статей
</a>
<br><br><br>
<form action="../../index.php?action=logOut" method="post">
    <button type="submit">Выйти</button>
</form>
</body>
</html>


<!--/app/controllers/controller.php?action=articles-->