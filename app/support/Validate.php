<?php 

    namespace app\support;

    use app\traits\Validations;
    use Exception;

    class Validate{

        use Validations;

        private array $inputValidationFields = [];

        private function getParam($validation, $param){
            if(substr_count($validation, ':') === 1){
                [$validation, $param] = explode(':', $validation);
            }

            return [$validation, $param];   
        }

        public function validationExists($validation){
            if(!method_exists($this, $validation)){
                throw new Exception("O metodo $validation não existe na validação");
            }
        }

        public function validate(array $validationsFields){
    
            //$inputValidationFields = [];
            foreach ($validationsFields as $field => $validation) {
                $havePipes = str_contains($validation, '|');

                if(!$havePipes){
                    $param = '';

                    [$validation, $param] = $this->getParam($validation, $param);


                    $this->validationExists($validation);

                    $this->inputValidationFields[$field] = $this->$validation($field, $param);
                    
                }else{
                    $validations = explode('|', $validation);
                    $param = '';

                    $this->multipleValidation($validations, $field, $param);

                }
                
            }
            
            return $this->returnValidation();

        }

        private function multipleValidation($validations, $field, $param){
            foreach ($validations as $validation) {
                [$validation, $param] = $this->getParam($validation, $param);

                $this->validationExists($validation);
        
                $this->inputValidationFields[$field] = $this->$validation($field, $param);
                
                if($this->inputValidationFields[$field] === null){
                    break;
                }
            }
        }

        private function returnValidation(){
            Csrf::validateToken();
            if (in_array(null, $this->inputValidationFields, true)) {    
                return null;
            }

            return $this->inputValidationFields;
        }
    }

?>