<?php 
    require "../vendor/autoload.php";
    use app\core\Router;
    use app\support\RequestType;

    session_start();

    //dd(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    //dd($_SERVER);
    //dd(RequestType::get());

    Router::run();
?>