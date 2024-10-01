<?php
    require_once 'app/core/Database.php';

    require_once 'app/controllers/MemesController.php';



    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if ($uri === '/' || $uri === '/index.php'){
        $controller = new MemesController();
         $controller->index();

    } elseif ($uri === '/memes'){
        $controller = new MemesController();
        $controller->create();

    }elseif ($uri === '/memes/store'){
        $controller = new MemesController();
        $controller->store();

    }elseif ($uri === '/memes/show.php'){
        $controller = new MemesController();
        $controller->index();

    /* Rota para avaliar*/     
    }elseif ($uri === 'rate.php')





?>
