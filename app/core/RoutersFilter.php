<?php 
    namespace app\core;

    use app\routes\Routes;
    use app\support\RequestType;
    use app\support\Uri;

    class RoutersFilter{

        private string $uri;
        private string $method;
        private array $routesRegistered;

        public function __construct()
        {
            $this->uri = Uri::get();
            $this->method = RequestType::get();
            $this->routesRegistered = Routes::get();
        }
        
        private function simpleRouter(){

            if(array_key_exists($this->uri,$this->routesRegistered[$this->method])){
                return $this->routesRegistered[$this->method][$this->uri];
            }
            return null;
        }

        private function dynamicRoute(){
            foreach($this->routesRegistered[$this->method] as $index => $route){
                $regex = str_replace('/','\/', ltrim($index, '/'));
                if($index !== '/' && preg_match("/^$regex$/", trim($this->uri, '/'))){
                    $routerRegisteredFound = $route;
                    break;
                }else{
                    $routerRegisteredFound = null;
                }
            }
            return $routerRegisteredFound;
        }

        public function get(){


            if($this->simpleRouter()){
                $route = $this->simpleRouter();

            } elseif ($this->dynamicRoute()){
                $route = $this->dynamicRoute();

            }else{
                $route = "NotFoundController@index";

            }

            return $route;
            
            /*$route = $this->simpleRouter();
            if($route){
                return $route;
            }

            $route = $this->dynamicRoute();
            if($route){
                return $route;
            }

            return "NotFoundController@index";*/
        }
    }

?>