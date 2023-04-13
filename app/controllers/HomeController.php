<?php 

    namespace app\controllers;

    use app\database\Filters;
    use app\database\models\User;

    class HomeController extends Controller{

        public function index(){

            $filter = new Filters;
            $filter->where('id', '=', 3);
            //$filter->limit(5);
            //$filter->orderBy("id", "desc");
            
            $user = new User;
            $user->setFilters($filter);
            $deleted = $user->delete();


            dd($deleted);
            //dd($userFounds);
            
            $this->view('home', ['title' => 'home'] );
        }

    }

?>