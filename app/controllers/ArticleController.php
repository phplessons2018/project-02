<?php
namespace App\Controllers;
use App\Models\ArticleModel;


class ArticleController
{

    public $name;
    public $years;
    public $text;


    public function add()
    {
        $image = $this->catchImage();
        $data = ['name' => $_POST['name'], 'years' => $_POST['years'], 'text' => $_POST['text'], 'image' => "$image"];
        $model = new ArticleModel();
        $model->addArticle($data);


//
    }

    public function getArticle()
    {
        $model2 = new ArticleModel();
        return $model2->getList();
    }


    public function start()
    {
        include __DIR__."/../views/singIn.php";
    }

    public function form()
    {
        include __DIR__."/../views/form.php";
    }


    public function logOut()
    {
        session_unset();
        session_destroy();
    }


    public function catchImage()
    {
        $fileName = $this->setImage($_FILES['image']);
        return $fileName;

    }


    public function setImage($image)
    {
        $fileName = uniqid() . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
        move_uploaded_file($image['tmp_name'], __DIR__."/../file/" . $fileName);
        return $fileName;

    }

    public function addUser()
    {
        $data = ['userName' => $_POST['userName'], 'userPass' => $_POST['userPass']];
        $model = new ArticleModel();
        $model->registrationUser($data);
    }

    public function reviseUser()
    {
        $data = ['userName' => $_POST['userName'], 'userPass' => $_POST['userPass']];
        $model = new ArticleModel();
        $model->authorizationUser($data);
    }

}





