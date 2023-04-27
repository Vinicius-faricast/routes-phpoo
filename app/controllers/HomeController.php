<?php 

    namespace app\controllers;

    use app\database\Filters;
    use app\database\models\User;
    use app\database\Pagination;

    class HomeController extends Controller{

        public function index(){

            $filter = new Filters;
            $filter->where('id', '>', 3);
            //$filter->limit(5);
            //$filter->orderBy("id", "desc");
            
            $pagination = new Pagination;
            $pagination->setItensPerPage(10);
            
            $user = new User;
            $user->setFields('id,firstName,lastName');
            $user->setFilters($filter);
            $user->setPagination($pagination);
            $usersFound = $user->fetchAll();
            $this->view('home', ['title' => 'home', 'users' => $usersFound, 'pagination' => $pagination]);
        }

    }

?>