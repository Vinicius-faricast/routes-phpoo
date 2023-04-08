<?php 

    namespace app\controllers;

 

    class UserController extends Controller{

        public function edit($params){
            
            $this->view('user', ['name' => 'Vinicius', 'title' => 'Pagina do User']);
        }
    }

?>