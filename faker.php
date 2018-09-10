<?php
require "vendor/autoload.php";

$bdConnect = new \App\Models\ArticleModel();
$bdConnect->connectDB();


$faker = Faker\Factory::create();
$person = new Faker\Provider\en_US\Person($faker);
$imageL = new Faker\Provider\Image($faker);

$file = new Faker\Provider\File($faker);





$name = $person->name('male');
$text = $faker->text;
$years = '2'.$faker->randomDigit;
$id = $faker->randomDigit + 1;
$image = $imageL->imageUrl($width = 640, $height = 480);

for ($i = 0; $i < 10; $i++) {
    $name = $person->name('male');
    $text = $faker->text;
    $years = '2'.$faker->randomDigit;
    $id = $faker->randomDigit + 1;
    $image = $imageL->imageUrl($width = 640, $height = 480);

    $sql = "INSERT INTO lists(`name`, `years`, `text`, `url`, `userId`) VALUES ('$name', '$years', '$text', '$image', '$id');";
    $sth = $bdConnect->connectDB()->prepare($sql);
    $sth->execute();

}

//echo "Готово";