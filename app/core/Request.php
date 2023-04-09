<?php 

    namespace app\core;

use Exception;

    class Request{

        public static function input(string $name){
            if(isset($_POST[$name])){
                return $_POST[$name];
            }else{
                throw new Exception("O indice $name não existe");
            }
        }

        public static function all(){

            return $_POST;
        }

        public static function only(string|array $only){
            
            $fieldsPost = self::all();
            $fieldsPostKeys = array_keys($fieldsPost);


            foreach ($fieldsPostKeys as $index => $value) {
                if($value !== (is_string($only)?$only:(isset($only[$index])?$only[$index] : null))){
                    unset($fieldsPost[$value]);
                }
            }
            return $fieldsPost;
        }
    }
?>