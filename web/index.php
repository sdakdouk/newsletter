<?php
require_once '../src/News.php';
require_once '../src/Connecion.php';

if (isset($_POST) && !empty($_POST)) {
    $new = new News($_POST['title'], $_POST['text'], $_POST['type']);
    $new->createNews();
    if($new!=null){
        $new->downloadNews($_POST['type']);
    }


  //$t=$new->type($_POST['type']);
    //print_r($t);

}



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Generador de NewsLetter</title>
</head>
<body>
<div class="f">
    <form method="post" class="formu">
        <label>Titulo: </label><input type="text" placeholder="Titulo de la noticia" name="title"/>
        <label>Texto: </label><textarea  placeholder="Contenido de la noticia" name="text"></textarea>
        <label>Tipo de documento a generar: </label>
        <select name="type">
            <option value="0">XML</option>
            <option value="1">JSON</option>
        </select>
        <input type="submit" value="Enviar"/>
    </form>

</div>
</body>
</html>
