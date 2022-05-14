<?php

class DBController
{
    public $dbHost = 'localhost';
    public $dbUser = 'root';
    public $dbPassword = '';
    public $dbName = 'bug_tracking_system';
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);

        if ($this->conn->connect_error) {
            echo 'error in connection:'.$this->conn->connect_error;

            return false;
        } else {
            return true;
        }
    }

    public function closeConnection()
    {
        if ($this->conn) {
            $this->conn->close();
        } else {
            echo 'connection is not opened';
        }
    }

    public function select($qry)
    {
        $result = $this->conn->query($qry);
        if (!$result) {
            echo 'error:'.mysql_error($this->conn);

            return false;
        } else {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function insert($query)
    {
        $result = $this->conn->query($query);
        if (!$result) {
            echo 'error:'.mysql_error($this->conn);

            return false;
        } else {
            return $this->conn->insert_id;
        }
    }
}
