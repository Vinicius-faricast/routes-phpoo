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
            
            $updated = $user->update('id', 5, ['firstName' => 'Vinicius', 'lastName' => 'Farias']);

            dd($updated);
            //dd($userFounds);
            
            $this->view('home', ['title' => 'home'] );
        }

    }

?>