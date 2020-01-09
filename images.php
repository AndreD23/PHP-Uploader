<?php

require __DIR__."/vendor/autoload.php";

$upload = new \CoffeeCode\Uploader\Image("storage", "images");

$files = $_FILES;

if(!empty($files['image'])){
    $file = $files['image'];

    // Verifica se é uma imagem válida
    if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())){
        echo "<p>Selecione uma imagem válida</p>";
    } else {
        $uploaded = $upload->upload($files, pathinfo($file['name'], PATHINFO_FILENAME), 350);
        echo "<img src='{$uploaded}'>";
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Single Image:</h1>
    <input type="file" name="image">
    <button>Enviar</button>
</form>

<?php
if(!empty($files['images'])){
    $images = $files['images'];

    for($i = 0; $i < count($images['type']); $i++){
        foreach(array_keys($images) as $keys){
            $imagesFiles[$i][$keys] = $images[$keys][$i];
        }
    }

    foreach ($imagesFiles as $file){
        // Verifica se é uma imagem válida
        if(empty($file['type'])) {
            echo "<p>Selecione uma imagem válida</p>";
        } elseif(!in_array($file['type'], $upload::isAllowed())){
            echo "<p>O arquivo {$file['name']} não é uma imagem válida.</p>";
        } else {
            $uploaded = $upload->upload($files, pathinfo($file['name'], PATHINFO_FILENAME), 350);
            echo "<img src='{$uploaded}'>";
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Multiple Image:</h1>
    <input type="file" name="images[]" multiple accept="image/jpeg, image/jpg, image/png">
    <button>Enviar</button>
</form>








