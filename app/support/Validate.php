<?php 

    namespace app\support;

    use app\traits\Validations;
    use Exception;

    class Validate{

        use Validations;

        public function validate(array $validationsFields){

            $inputValidationFields = [];
            foreach ($validationsFields as $field => $validation) {
                $havePipes = str_contains($validation, '|');

                if(!$havePipes){
                    $param = '';

                    if(substr_count($validation, ':') === 1){
                        [$validation, $param] = explode(':', $validation);
                    }

                    if(!method_exists($this, $validation)){
                        throw new Exception("O metodo $validation não existe na validação");
                    }

                    //$this->maxlen($param);
                    $inputValidationFields[$field] = $this->$validation($field, $param);

                    //dd($methodValidation, $param);
                }else{
                    $validations = explode('|', $validation);
                    $param = '';
                    foreach ($validations as $validation) {
                        if(substr_count($validation, ':') === 1){
                            [$validation, $param] = explode(':', $validation);
                        }

                        if(!method_exists($this, $validation)){
                            throw new Exception("O metodo $validation não existe na validação");
                        }

                        $inputValidationFields[$field] = $this->$validation($field, $param);
                        
                        var_dump($inputValidationFields[$field]);

                        if(empty($inputValidationFields[$field])){
                            break;
                        }
                    }
                }
            }

        }
    }

?>