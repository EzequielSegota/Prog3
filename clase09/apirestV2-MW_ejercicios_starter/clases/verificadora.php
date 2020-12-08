<?php
/*require './clases/accesodatos.php';
require './clases/usuario.php';*/

class Verificadora
{
    public function VerificarUsuario($request, $response, $next)
    {
        //implementar...
        $getParsedBody = $request->getParsedBody();
        $getParsedBody=json_decode($getParsedBody["obj_json"]);
        
        if(Verificadora::ExisteUsuario($getParsedBody))
        {
            $user=new Usuario();
            $response=$user->TraerTodos($request,$response,$next);
        }
        else {
            $return = new stdClass();
            $return->mensaje="Error correo o clave incorrecta";
            $response=$response->withJson($return,403);
        }
        return $response;
    }

    private static function ExisteUsuario($objUser)
    {
        $existe = FALSE;
        
        //implementar...
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT correo,clave FROM usuarios");
            
        $consulta->execute();

        $consulta->setFetchMode(PDO::FETCH_CLASS, 'usuario');
        
        foreach ($consulta as $key) {

            if ($key->correo==$objUser->correo && $key->clave==$objUser->clave) {
                $existe=true;
            }
        }

        return $existe;
    }
    
}