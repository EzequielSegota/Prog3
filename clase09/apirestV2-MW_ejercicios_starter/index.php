<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';

require './clases/accesodatos.php';
require './clases/usuario.php';
require './clases/verificadora.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

//implementar...
$app->group('/credenciales', function () {

    //EN LA RAIZ DEL GRUPO
    $this->get('/', function (Request $request, Response $response) {
      return $response->getBody()->write("API => GET");
    });
  
    $this->post('/', function (Request $request, Response $response) {
      return $response->getBody()->write("API => POST");
    });
})->add(function($request, $response, $next) {

    $getParsedBody = $request->getParsedBody();

    //EJECUTO ACCIONES ANTES DE INVOCAR A LA API
    if($request->isGet()) 
    {
      $response->getBody()->write('<br>No necesita credenciales por GET<br>');
      $response=$next($request,$response);
    }
    else if($request->isPost())
    {
        $response->getBody()->write("Verifico Credenciales<br>");
        if($getParsedBody["perfil"] == 'administrador')
        {
            $response->getBody()->write('<h1>Bienvenido '.$getParsedBody["nombre"].'</h1>');
            $response=$next($request,$response);
        }
        else
        {
            $response->getBody()->write("ERROR!<br>");
        }
    }
    $response->getBody()->write("<br>Vuelvo del Verificador de credenciales<br>");
    return $response;
  });

  $app->group('/json', function () {

    //EN LA RAIZ DEL GRUPO
    $this->get('/', function (Request $request, Response $response) {
        return $response->getBody()->write('{"mensaje":"GET","status":200}');
    });
  
    $this->post('/', function (Request $request, Response $response) {
        return $response->getBody()->write('{"mensaje":"POST","status":200}');
    });
    })->add(function($request, $response, $next) {

    
    //EJECUTO ACCIONES ANTES DE INVOCAR A LA API
    if($request->isGet()) 
    {
      $response=$next($request,$response);
    }
    else if($request->isPost())
    {
        $getParsedBody = $request->getParsedBody();
        $getParsedBody=json_decode($getParsedBody["obj_json"]);
        if($getParsedBody->perfil == 'administrador')
        {  
            $response=$next($request,$response);
        }
        else
        {
            $response->getBody()->write('{"mensaje":"ERROR '.$getParsedBody->nombre.' SIN PERMISOS"}');
        }
    }
    return $response;
  });

  $app->group('/json_bd', function () {

    //EN LA RAIZ DEL GRUPO
    $this->get('[/]', function (Request $request, Response $response) {
        return $response->getBody();
    })->add(function($request,$response,$next){
        $user = new Usuario();
        return $response=$user->TraerTodos($request,$response,$next);
    });
  
    $this->post('[/]', function (Request $request, Response $response) {
        return $response->getBody();
    })->add(\Verificadora::class . ":VerificarUsuario");
    
})->add(function($request, $response, $next) {

    
    //EJECUTO ACCIONES ANTES DE INVOCAR A LA API
    if($request->isGet()) 
    {
      $response=$next($request,$response);
    }
    else if($request->isPost())
    {
        $json = new stdClass();
        $json->mensaje="";
        $getParsedBody = $request->getParsedBody();
        $getParsedBody=json_decode($getParsedBody["obj_json"]);

        if(isset($getParsedBody->correo))
        {  
            if(isset($getParsedBody->clave))
                return $response=$next($request,$response);
            else
                $json->mensaje.="Error falta atributo clave!";
        }
        else
        {
            $json->mensaje.="Error falta atributo correo!";
            if(!isset($getParsedBody->clave))
                $json->mensaje.="Error falta atributo clave!";
            
            
        }
        $response=$response->withJson($json,403);
        return $response;
        //$response->getBody()->write($json->mensaje);
        
    }
  });

$app->run();