<?php
require "../../vendor/autoload.php";
$controller = new \App\Controllers\ArticleController();
$result = $controller->getArticle();

?>

    <h1>Данные из базы</h1>
    <a href="../../index.php">Добавить статью</a>

<?php foreach ($result as $post):?>
<p><?= $post['text']?></p>
<p></p>
<img src="../file/<?= $post['url']?>" alt="">
<?php endforeach; ?>