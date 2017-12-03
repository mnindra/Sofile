<?php
class ResultSet 
{
    private $query;
    
    public function __construct($queryName) 
    {
        $this->query = $queryName;
    }
        
    public function result() 
    {
        $data = array();
        
        if($this->query) 
        {
            
            while($record = mysqli_fetch_object($this->query)) 
            {
                array_push($data, $record);
            }
        }
        
        return $data;
    }
    
    public function row()
    {
        if($this->query)
        {
            $data = mysqli_fetch_object($this->query);
        }
        
        return $data;
    }
    
    public function numRows() 
    {
        return mysqli_num_rows($this->query);
    }
}
?>
