<?php 

    namespace app\controllers;

    use app\core\Request;
    use app\support\Csrf;
    use app\support\Validate;

    class UserController extends Controller{

        public function edit($params){

            $this->view('user', ['title' => 'Editar user']);
        }

        public function update($params){

            Csrf::validateToken();

            $validate = new Validate;
            $validate->validate([
                //"firstName" => "required",
                //"lastName" => "required",
                //"email" => "required|email",
                "password" => "maxlen:10|required",
            ]);
        }
        
    }

?>