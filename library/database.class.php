<?php

class Database 
{
    
    private $instance;
    private $sql;
    private $action;
    private $select;
    private $from;
    private $where = "";
    private $join = array();
    private $order_by = "";
    private $desc = FALSE;
    private $limit = "";
    private $data = array();
    
    public function __construct() 
    {   
        require_once ROOT . DS . 'library' . DS . 'resultset.class.php';
        $this->instance = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        if(mysqli_connect_errno()) 
        {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }
    
    public function select($select)
    {
        $this->select = $select;
        $this->action = "select";
    }
    
    public function from($from)
    {
        $this->from = $from;
    }
    
    public function where($where)
    {
        $this->where = $where; 
    }
    
    public function limit($limit)
    {
        $this->limit = $limit;
    }
    
    public function order_by($order_by, $desc)
    {
        $this->order_by = $order_by;
        $this->desc = $desc;
    }
    
    public function update($tableName, $data = array())
    {
        $this->action = "update";
        $this->from = $tableName;
        $this->data = $data;
    }
    
    public function delete($tableName)
    {
        $this->action = "delete";
        $this->from = $tableName;
    }
    
    public function insert($tableName, $data = array())
    {
        $this->action = "insert";
        $this->from = $tableName;
        $this->data = $data;
    }
    
    public function join($tableJoin, $joinCondition)
    {
        $this->join[$tableJoin] = $joinCondition;
    }
        
    public function execute() 
    {   
        if($this->action == "select")
        {
            $this->sql = "SELECT " . $this->select .  " FROM " . $this->from;

            if(count($this->join) > 0)
            {
                foreach($this->join as $key => $value)
                {
                    $this->sql .= " JOIN " . $key . " ON " . $value;
                }
            }
            
            if($this->where != "")
                $this->sql .= " WHERE " . $this->where;
            if($this->order_by != "")
                $this->sql .= " ORDER BY " . $this->order_by;
            if($this->desc)
                $this->sql .= " DESC ";
            if($this->limit != "")
                $this->sql .= " LIMIT " . $this->limit;

            echo $this->sql;
        }
        else if($this->action == "insert")
        {        
            $this->sql = "INSERT INTO " . $this->from . " SET ";
            
            $i = 0;
            foreach($this->data as $key => $value)
            {
                $this->sql .= $key . "='" . $value . "'";
                
                $i++;
                if($i < count($this->data))
                {
                    $this->sql .= ", ";
                }
            }
        }
        else if($this->action == "update")
        {
            $this->sql = "UPDATE " . $this->from . " SET ";
            
            $i = 0;
            foreach($this->data as $key => $value)
            {
                $this->sql .= $key . "='" . $value . "'";
                
                $i++;
                if($i < count($this->data))
                {
                    $this->sql .= ", ";
                }
            }
            
            if($this->where != "")
                $this->sql .= " WHERE " . $this->where;
            
        }
        else if($this->action == "delete")
        {
            $this->sql = "DELETE FROM " . $this->from;
            
            if($this->where != "")
                $this->sql .= " WHERE " . $this->where;
        }
        
        $query = mysqli_query($this->instance, $this->sql);
        
        // Kembalikan Semua Data
        $this->sql = "";
        $this->action = "";
        $this->select = "";
        $this->from = "";
        $this->where = "";
        $this->join = array();
        $this->order_by = "";
        $this->desc = FALSE;
        $this->limit = "";
        $this->data = array();
        
        return new ResultSet($query);
    }
}

?>
