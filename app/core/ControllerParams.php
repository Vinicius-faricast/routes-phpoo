<?php 

    namespace app\core;
    use app\routes\Routes;
    use app\support\RequestType;
    use app\support\Uri;

    class ControllerParams{

        private function filterParams(string $router){
            $uri = Uri::get();

            $explodeUri = explode('/', $uri);
            $explodeRouter = explode('/', $router);

            $params = [];
            foreach($explodeRouter as $index => $routeSegment){
                if($routeSegment!== $explodeUri[$index]){
                    $params[$index] = $explodeUri[$index];
                }
            }

            return array_values($params);
        }

        public function get(string $route){

            $routes = Routes::get();
            $requestMethod = RequestType::get();
            $router = array_search($route, $routes[$requestMethod]);

            $params = $this->filterParams($router);

            return $params;
        }
    }

?>