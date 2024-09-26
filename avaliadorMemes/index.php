<?php
    require_once 'app/core/Database.php';
<<<<<<< HEAD
 //MemesControler_fixed

    
 

=======
>>>>>>> 233bcbdc1f6b4fb5dd206d4c64741efcfd6e364e
    require_once 'app/controllers/MemesController.php';



    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if ($uri === '/' || $uri === '/index.php'){
        $controller = new MemesController();
         $controller->index();
    } elseif ($uri === '/memes'){
        
    }





?>
