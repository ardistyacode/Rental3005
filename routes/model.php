<?php

class Model
{
    private $conn;

    private $tableName;
    private $column=[];

    public function __construct()
    {
        $this->conn = $this->setConnection();
    }

    public function setTableName($tableName){
        $this->tableName = $tableName;
    }

    public function setColumn($column){
        $this->column = $column;
    }

    protected function setConnection()
    {
        try {
            $host = getenv('DB_HOST');
            $user = getenv('DB_USER');
            $pass = getenv('DB_PASS');
            $db = getenv('DB_NAME');
            $port = getenv('DB_PORT');

            $conn = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function qry($query, $parameter = array())
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($parameter);
        return $stmt;
    }

    public function get($params = array()){
        $column = implode(',', $this->column);
        $query = "SELECT $column FROM {$this->tableName}";
        $paramValue = [];
        if(!empty($params)){
            $query .= " WHERE 1 = 1";
            foreach($params as $key => $value){
                $query .= " AND {$key} = ? ";
                array_push($paramValue, $value);
            }
        }
        return $this->qry($query, $paramValue);
    }

    public function insertData($data = array()){
        if(empty($data)){
            return false;
        }
        $columnValue = [];
        $kolom = [];
        $param = [];
        foreach ($data as $key => $value){
            array_push($kolom, $key);
            array_push($columnValue, $value);
            array_push($param, "?");
        }

        $kolom = implode(", ", $kolom);
        $param = implode(", ", $param);
        $query = "INSERT INTO {$this->tableName} ($kolom) VALUES ($param)";
        return $this->qry($query, $columnValue);
    }
    
    public function editOrSaveData($data = array(), $id = null){
        if(empty($data)){
            return false;
        }

        $columnValue = [];
        $kolom = [];
        $param = [];
        $query = "";

        // Membangun query berdasarkan apakah ID tersedia atau tidak
        if($id === null){
            // Jika tidak ada ID, maka lakukan operasi insert
            foreach ($data as $key => $value){
                array_push($kolom, $key);
                array_push($columnValue, $value);
                array_push($param, "?");
            }
            $kolom = implode(", ", $kolom);
            $param = implode(", ", $param);
            $query = "INSERT INTO {$this->tableName} ($kolom) VALUES ($param) ON DUPLICATE KEY UPDATE ";
            foreach ($data as $key => $value){
                $query .= "$key = VALUES($key), ";
            }
        } else {
            // Jika ID tersedia, maka lakukan operasi update
            foreach ($data as $key => $value){
                array_push($kolom, $key ."= ?");
                array_push($columnValue, $value);
            }
            $kolom = implode(", ", $kolom);
            $query = "UPDATE {$this->tableName} SET $kolom WHERE id = ?";
            array_push($columnValue, $id);
        }

        // Menghapus koma ekstra pada akhir query
        $query = rtrim($query, ", ");

        // Menjalankan query dengan nilai yang diperlukan
        return $this->qry($query, $columnValue);
    }

    public function getDataById($id){
        $column = implode(',', $this->column);
        $query = "SELECT $column FROM {$this->tableName} WHERE id = ?";
        $paramValue = [$id];
        return $this->qry($query, $paramValue);
    }

    public function updateData($data = array(), $param=array()){
        if(empty($data)){
            return false;
        }
        $columnValue = [];
        $kolom = [];
        $query = "UPDATE INTO {this->tableName}";

        foreach ($data as $key => $value){
            array_push($kolom, $key ."= ?");
            array_push($columnValue, $value);
        }

        $kolom = implode(", ", $kolom);
        $query = $query." SET $kolom WHERE 1 = 1 ";
        $whereColumn = [];
        foreach($param as $key => $value){
            array_push($whereColumn, "AND {$key} = ?");
            array_push($columnValue, $value);
        } 
        $whereColumn = implode(", ", $whereColumn);
        $query = $query.$whereColumn;
        return $this->qry($query, $columnValue);
    }

    public function deleteData($param = array()){
        if(empty($param)){
            return False;
        }

        $query = "DELETE FROM {$this->tableName} WHERE 1 = 1 ";
        $whereColumn = [];
        $columnValue = [];
        foreach($param as $key => $value){
            array_push($whereColumn, "AND {$key} = ?");
            array_push($columnValue, $value);
        }

        $whereColumn = implode(",", $whereColumn);
        $query = $query.$whereColumn;

        return $this->qry($query, $columnValue);
    }
}
