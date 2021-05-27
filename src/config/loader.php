<?php

function loadModel($modelName){
    require_once(MODEL_PATH."\\{$modelName}.php");
}
function loadView($viewName, $params = array()){
    if(count($params)>0){
        foreach($params as $key => $value){
            // criando uma variável com o nome da string passada na key
            if(strlen($key)>0){
                ${$key} = $value;
            }
        }
    }
    require_once(VIEW_PATH."\\{$viewName}.php");
}
