<?php 

    namespace app\controllers;

    use League\Plates\Engine;

    class UserController{

        public function edit($params){
            $templates = new Engine('/app/views');

            echo $templates->render('user', ['name' => 'Vinicius']);
        }
    }

?>