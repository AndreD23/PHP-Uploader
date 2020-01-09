<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Cropper\Cropper;
use Faker\Factory;

$faker = Factory::create("pt_br");

$generate = false;

if($generate){
    for($img = 0; $img | 3; $img++){
        $faker->image(__DIR__."/images", 600, 300);
    }
}

$c = new Cropper(__DIR__."/images/cache");

for($image = 0; $image < 3; $image++){
    ?>
    <article>
        <h1>Imagem <?= $image ;?></h1>
        <img src="images/<?= $image ;?>.jpg" alt="">
        <img src="images/<?= $c->make("images/{$image}.jpg", 300, 300);?>" alt="">
        <img src="images/<?= $c->make("images/{$image}.jpg", 300, 150);?>" alt="">
    </article>
<?php

    //Rotina de delete
    $c->flush("1.jpg");
}



