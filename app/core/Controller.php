<?php
    namespace app\core;
    use Exception;

    class Controller{

        public function execute(string $route){
            //dd($route);
            if(!str_contains($route, "@")){
                throw new Exception("A rota está registrada com um formato errado");
            }

            list($controller, $method) = explode('@', $route);

            //dd($controller, $method);

            $namespace = "app\controllers\\";

            $controllerNamespace = $namespace . $controller;

            //dd($controllerNamespace);

            if(!class_exists($controllerNamespace)){
                throw new Exception("O controller $controllerNamespace não existe");
            }

            $controller = new $controllerNamespace;

            if(!method_exists($controller, $method)){
                throw new Exception("O $method não existe no controller $controllerNamespace");
            }

            $params = new ControllerParams;
            $params = $params->get($route);

            $controller->$method($params);
        }
    }

?>