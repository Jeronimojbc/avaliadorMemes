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

    }elseif ($uri === '/show'){
        $controller = new MemesController();
        $controller->index();

    } elseif (preg_match('/^\/memes\/show\/(\d+)$/', $uri, $matches)) {
        $controller = new MemesController();
        
        print_r($matches);
        $controller->show($matches[1]);
    }    


    /* Rota para avaliar*/     
    }elseif ($uri === 'rate.php')





?>
