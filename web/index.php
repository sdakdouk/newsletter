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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Generador de NewsLetter</title>
    <style>
        form{
            display: flex;
            margin-left: 20em;
            margin-top: 2.5em;
        }


        fieldset {
            background-color: azure;
            border: 1px solid #66ccff ;
            border-radius: 4px;
        }

        legend {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: #1f94ff;
            font-size: 17px;
            font-weight: bold;
            padding: 3px 5px 3px 7px;
            width: auto;
        }
    </style>
</head>
<body>
<div class="container">

    <form method="post" class="formu">
        <fieldset class="col-md-6 px-3">
            <legend>Newsletter:</legend>


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titulo</span>
            </div>
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="title">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Texto</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" name="text"></textarea>
        </div>
        <select class="custom-select" name="type" style="margin-top: 15px; margin-bottom: 10px">
            <option selected>Choose One...</option>
            <option value="0">XML</option>
            <option value="1">JSON</option>
        </select>

        <button type="submit" class="btn btn-primary my-1">Submit</button>
        </fieldset>
    </form>


</div>
</body>
</html>
