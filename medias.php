<?php

require __DIR__."/vendor/autoload.php";

$upload = new \CoffeeCode\Uploader\Media("storage", "medias");

$files = $_FILES;

if(!empty($files['media'])){
    $file = $files['media'];

    // Verifica se é um arquivo válido
    if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())){
        echo "<p>Selecione uma mídia válida</p>";
    } else {
        $uploaded = $upload->upload($files, pathinfo($file['name'], PATHINFO_FILENAME), 350);
        echo "<a href='{$uploaded}' target='_blank'>Acessar Mídia</a>";
    }
}

$sended = filter_input(INPUT_GET, "sended", FILTER_VALIDATE_BOOLEAN);

if($sended && empty($files['media'])){
    echo "Selecione uma mídia de até ". ini_get("upload_max_filesize");
}
?>

<form action="?sended=true" method="post" enctype="multipart/form-data">
    <h1>Single Media:</h1>
    <input type="file" name="media">
    <button>Enviar</button>
</form>








