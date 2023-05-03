<?php 

    namespace app\traits;

    use app\core\Request;
    use app\support\Flash;

    trait Validations {
        
        public function unique($field){

        }

        public function email(string $field){
            if(!filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL)){
                Flash::set($field, "Esse campo tem que ter um email valido");
            }

            return strip_tags(Request::input(($field), "<p><b><ul><span><em>"));
        }
        
        public function required($field){
            
            $data = Request::input($field);
            //dd(empty($data));
            if(empty($data)){
                Flash::set($field, "Esse campo é obrigatório");
                return null;
            }

            return strip_tags($data, "<p><b><ul><span><em>");
        }

        public function maxlen($field, $param){
            
            $data = Request::input($field);

            if(strlen($data) > $param){
                Flash::set($field, "Esse campo tem que ter no máximo $param caracteres");
                return null;
            }

            return strip_tags($data, "<p><b><ul><span><em>");
        }
    }

?>