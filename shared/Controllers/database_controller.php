<?php 

class DatabaseController
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbName="bugs";
    public $connection;

    public function connection() {
        // Create connection
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbName);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
            return false;
        }
        return true;
    }

    public function closeConnection() {
        if($this->connection) 
        {
            $this->connection->close();
        } else {
            echo "Connection is closed already";
        }
    }

    public function select($qry) {
        if($this->connection) 
        {
            $result = $this->connection->query($qry);
            if(!$result) {
                echo "Error: ".mysqli_error($this->connection);
                return false;
            } else {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        } else {
            echo "Connection is closed already";
        }
    }

    public function insert($qry) {
        if($this->connection) 
        {
            $result = $this->connection->query($qry);
            if(!$result) {
                echo "Error: ".mysqli_error($this->connection);
                return false;
            } else {
                return true;
            }
        } else {
            echo "Connection is closed already";
        }
    }

    public function delete($qry) {
        if($this->connection) 
        {
            $result = $this->connection->query($qry);
            if(!$result) {
                echo "Error: ".mysqli_error($this->connection);
                return false;
            } else {
                return true;
            }
        } else {
            echo "Connection is closed already";
        }
    }
}

?>