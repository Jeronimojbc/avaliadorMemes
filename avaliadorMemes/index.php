<?php
    require_once 'app/core/Database.php';

    
    require_once 'app/views/memes/create.php';

  require_once 'app/views/memes/index.php';

  require_once 'app/views/memes/show.php';

  require_once 'app/controllers/MemesController.php';
  
  require_once 'app/controllers/UsuariosController.php';

  require_once 'app/models/MemeModel.php';

  require_once 'app/models/UsuarioModel.php';
  echo"jeroguitar";
    
 

    require_once 'app/controllers/MemesController.php';



    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if ($uri === '/' || $uri === '/index.php'){
        $controller = new MemesController();
         $controller->index();
    } elseif ($uri === '/memes'){
        
    }





?>
