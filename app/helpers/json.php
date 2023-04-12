<?php 

    function isJson($data){
        json_decode($data);

        return json_last_error()===JSON_ERROR_NONE;
    }


?>