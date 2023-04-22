<?php 

    namespace app\controllers;

    use app\database\Filters;
    use app\database\models\User;

    class HomeController extends Controller{

        public function index(){

            //$filter = new Filters;
            //$filter->where('id', '=', 3);
            //$filter->limit(5);
            //$filter->orderBy("id", "desc");
            
            //$count = $user->count();
            $user = new User;
            
            $create = $user->create([
                'firstName' => 'Alexandre',
                'lastName' => 'Cardoso',
                'email' => 'email@email.com',
                'password' => '123',
            ]);

            dd($create);
            //dd($userFounds);
            
            $this->view('home', ['title' => 'home'] );
        }

    }

?>