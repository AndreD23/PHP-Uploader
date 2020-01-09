<?php

require __DIR__."/vendor/autoload.php";

$upload = new \CoffeeCode\Uploader\File("storage", "files");

$files = $_FILES;

if(!empty($files['file'])){
    $file = $files['file'];

    // Verifica se é um arquivo válido
    if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())){
        echo "<p>Selecione um arquivo válido</p>";
    } else {
        $uploaded = $upload->upload($files, pathinfo($file['name'], PATHINFO_FILENAME), 350);
        echo "<a href='{$uploaded}' target='_blank'>Acessar Arquivo</a>";
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Single File:</h1>
    <input type="file" name="file">
    <button>Enviar</button>
</form>








