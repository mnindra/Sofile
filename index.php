<?php
    session_start();
    
    // define configurations
    define('ROOT', dirname(__FILE__));
    define('DS', DIRECTORY_SEPARATOR);

    // now require file
    require_once "config.php";
    require_once "library/database.class.php";
    require_once "library/model.class.php";
    require_once "library/view.class.php";
    require_once "library/controller.class.php";

    // autoload function
    function __autoload($className) 
    {
        
        $fileName = str_replace("\\", DS, $className) . '.php';
        if(!file_exists($fileName)) 
        {
            return false;
        }
        
        include $fileName;
    }

    // membuat MVC
    $page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : 'Home';
    $controller = ROOT . DS . 'modules' . DS . 'controllers' . DS . $page . 'Controller.php';

    if(file_exists($controller)) 
    {
        // membuat object controller
        require_once $controller;
        $controllerName = ucfirst($page) . 'Controller';
        $obj = new $controllerName();
        
        $action = (isset($_GET['action']) && $_GET['action']) ? $_GET['action'] : 'index';
        
        
        if(method_exists($obj, $action)) 
        {
            $arguments = array();
            
            // Menyesuaikan argumen function dengan nama kunci dari index $_GET
            
            $reflectMethod = new ReflectionMethod($obj, $action);
            
            foreach($reflectMethod->getParameters() as $arg)
            {
                if($_GET[$arg->name])
                {
                    array_push($arguments, $_GET[$arg->name]);
                }
                else if($arg->isDefaultValueAvailable())
                {
                    array_push($arguments, $arg->getDefaultValue());
                }
                else
                {
                    array_push($arguments, null);
                }
            }
            
            call_user_func_array(array($obj, $action), $arguments);
        } 
        else
        {
            die('Action Not Found !');
        }
        
    } 
    else 
    {
        die('Controller Not Found !');
    }
?>
