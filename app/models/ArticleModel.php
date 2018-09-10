<?php
namespace App\Models;

use PDO;

class ArticleModel
{




    public function connectDB() {
       $dsn = "mysql:host=127.0.0.1;dbname=mvc;charset=utf8";
       return $pdo = new PDO($dsn, 'root', '12369874');

    }



    public function addArticle($data)
    {

        $sql = "INSERT INTO lists(`name`, `years`, `text`, `url`, `userId`) VALUES ('".$data['name']."' ,'".$data['years']."', '".$data['text']."', '".$data['image']."', '".$_SESSION["userId"]."');";
        $sth = $this->connectDB()->prepare($sql);
        $sth->execute();
        echo "Статья добавлена";
        include __DIR__."/../views/form.php";

    }

    public function getList()
    {
        $stmt = "SELECT * FROM lists";
        $sth = $this->connectDB()->prepare($stmt);
        $sth->execute();
        return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }


    public function registrationUser($data)
    {
        $userName = $data['userName'];
        str_replace(' ','',$userName);
        $userName = mb_strtolower($userName);

        $_SESSION["userName"] = $userName;

        $sql = "SELECT `id` FROM users WHERE `name` = '$userName'";
        $sth = $this->connectDB()->prepare($sql);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            //делаем регистрацию
            $sql = "INSERT INTO users(`name`, `pass`) VALUES ('$userName', '".$data['userPass']."');";
            $sth = $this->connectDB()->prepare($sql);
            $sth->execute();
            //Берем id пользователя
            $sql = "SELECT `id` FROM users WHERE `name` = '$userName'";
            $sth = $this->connectDB()->prepare($sql);
            $sth->execute();
            var_dump($result["id"]);
            echo 'Успешная регистрация '.$_SESSION["userName"]." - ".$_SESSION["userId"] ;
            include __DIR__."/../views/form.php";
        } else {
            echo 'Пользователь '. $userName .' уже существует.';
            include __DIR__."/../views/singUp.php";
        }
    }

    public function authorizationUser($data)
    {
        $_SESSION["userName"] = $data['userName'];
        $sql = "SELECT `id` FROM users WHERE `name` = '".$data['userName']."' and `pass` = '".$data['userPass']."'";
        $sth = $this->connectDB()->prepare($sql);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            echo 'Такого пользователя не существует';
            include __DIR__."/../views/singIn.php";
        } else {

            $_SESSION["userId"] = $result["id"];
            echo 'Вы авторизовались'.$_SESSION["userName"] . $_SESSION["userId"];
            include __DIR__."/../views/form.php";
        }


    }

}


