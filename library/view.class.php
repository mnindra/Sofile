<?php

class View 
{
    public $viewName = NULL;
    public $data = array();
    public $returnAsData;
    
    public function __construct($view, $data, $returnAsData)
    {
        $this->viewName = $view;
        $this->data = $data;
        $this->returnAsData = $returnAsData;
    }
    
    public function forceRender()
    {
        extract($this->data);
        $view = ROOT . DS . 'modules' . DS . 'views' . DS . $this->viewName . '.view.php';
        
        if(file_exists($view))
        {
            if(!$this->returnAsData)
            {
                require_once $view;    
            }
            else
            {
                ob_start();
                include($view);
                $html = ob_get_clean();
                
                return $html;
            }
            
        }
        else
        {
            echo "View Not Found !";
        }
    }
}

?>
