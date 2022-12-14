<?php

class Routing 
{
    
    public static function buildRoute() 
    {
        
        //Контроллер и action по умолчанию
        $controllerName = "IndexController";
        $modelName = "IndexModel";
        $action = "index";
        
        $route = explode("/", $_SERVER['REQUEST_URI']);     
        $route = str_replace(".php", "", $route);
                
        //Определяем контроллер
        if ($route[2] != '') {
            $controllerName = ucfirst($route[2]. "Controller");
            $modelName = ucfirst($route[2]. "Model");
        }
        
        include CONTROLLER_PATH . $controllerName . ".php";
        include MODEL_PATH . $modelName . ".php";
                
        //Определяем action
        if (isset($route[3]) && $route[3] !=''){
            $action = $route[3];
        }
            
        $controller = new $controllerName();
        $controller->$action();
        
    }
    
    public function errorPage()
    {
        
    }
}