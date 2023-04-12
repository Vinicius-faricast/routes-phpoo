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

            $arr = [];

            foreach ($fieldsPostKeys as $index => $value) {

                $onlyFields = (is_string($only)?$only:(isset($only[$index])?$only[$index] : null));
                if(isset($fieldsPost[$onlyFields])){
                    $arr[$onlyFields] = $fieldsPost[$onlyFields];
                }
            }
            return $arr;
        }

        public static function excepts(string|array $excepts){

            $fieldsPost = self::all();

            if (is_array($excepts)){
                foreach ($excepts as $index => $value){
                    unset($fieldsPost[$value]);
                }
            }elseif(is_string($excepts)){
                unset($fieldsPost[$excepts]);
            }
            return $fieldsPost;
        }

        public static function query(string $name){

            if(!isset($_GET[$name])){
                throw new Exception("Não existe a querry string $name");
            }else{
                return $_GET[$name];
            }
        }

        public static function toJson(array $data){

            return json_encode($data);
        }

        public static function toArray($data){
            
            if (isJson($data)){

                return json_decode($data);
            }
        }
    }
?>