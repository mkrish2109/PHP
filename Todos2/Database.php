<?php
class Database
{
    private $host = 'localhost';
    private $db_name = 'info';
    private $username = 'root';
    private $password = '';
    public $conn;
    private $sql = false;
    private $mysqli = '';
    private $result = array();
    public function __construct()
    {
        $this->connect();
    }
    private function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function insert($table, $params = array())
    {
        if ($this->tableExists($table)) {
            $table_columas = implode(', ', array_keys($params));
            $values = implode("', '", $params);
            $sql = "INSERT INTO $table ($table_columas) VALUES ('$values')";
            if ($this->conn->query($sql)) {
                return true;
            } else {
                return $this->conn->error;

            }
        }

    }
    public function update($table, $params = array(), $where = null)
    {
        if ($this->tableExists($table)) {
            $set = array();
            foreach ($params as $key => $value) {
                $set[] = "$key = '$value'";
            }
            $sql = "UPDATE $table set " . implode(', ', $set);
            if ($where != null) {
                $sql .= "WHERE $where";
            }

            if ($this->conn->query($sql)) {
                return true;
            } else {
                return $this->conn->error;

            }
        }

    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM $table where $where";
        
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return $this->conn->error;

        }
    }

    public function query($sql)
    {
        $query = $this->conn->query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function sql($sql)
    {
        $query = $this->conn->query($sql);
        if ($query) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }

    }


    private function tableExists($table)
    {
        $query = "SHOW TABLES LIKE '$table'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            return true;
        } else {
            array_push($this->result, $table . " does not exists");
            return false;
        }
    }

    public function __destruct()
    {
        $this->conn->close();

    }
}

?>