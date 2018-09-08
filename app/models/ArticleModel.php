<?php
namespace App\Models;

use PDO;

class ArticleModel
{

    private $dsn = "mysql:host=127.0.0.1;dbname=mvc;charset=utf8";
    public $pdo;


    public function connectDB() {
       return $this->pdo = new PDO($this->dsn, 'root', '12369874');

    }



    public function addArticle($data)
    {

        $sql = "INSERT INTO lists(`name`, `years`, `text`, `url`) VALUES ('".$data['name']."' ,'".$data['years']."', '".$data['text']."', '".$data['image']."');";
        $sth = $this->connectDB()->prepare($sql);
        $sth->execute();

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
        $sql = "SELECT `id` FROM users WHERE `name` = '".$data['userName']."'";
        $sth = $this->connectDB()->prepare($sql);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            $sql = "INSERT INTO users(`name`, `pass`) VALUES ('".$data['userName']."', '".$data['userPass']."');";
            $sth = $this->connectDB()->prepare($sql);
            $sth->execute();
            echo 'Успешная регистрация';
            include __DIR__."/../views/form.php";
        } else {
            echo 'Пользователь '. $data['userName'] .' уже существует.';
            include __DIR__."/../views/singUp.php";
        }
    }

    public function authorizationUser($data)
    {
        $sql = "SELECT `id` FROM users WHERE `name` = '".$data['userName']."' and `pass` = '".$data['userPass']."'";
        $sth = $this->connectDB()->prepare($sql);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            echo 'Такого пользователя не существует';
            include __DIR__."/../views/singIn.php";
        } else {
            echo 'Вы авторизовались';
            include __DIR__."/../views/form.php";
        }


    }

}


