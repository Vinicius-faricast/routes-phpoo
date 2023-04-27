<?php 

    namespace app\controllers;

    use app\core\Request;
use app\support\Csrf;

    class UserController extends Controller{

        public function edit($params){

            $this->view('user', ['title' => 'Editar user']);
        }

        public function update($params){

            Csrf::validateToken();
            //$response = Request::only('password');
            //dd($response);
        }
        
    }

?>