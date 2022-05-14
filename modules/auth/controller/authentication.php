<?php

require_once '../../model/UserModel.php';
require_once 'C:\xampp\htdocs\bug_tracking_system\modules\auth\controller\DatabaseConnection.php';

class AuthController
{  //1.open connection
    //2.run query
    //3.close connection

    protected $db;

    public function login(UserModel $user)
    {
        $this->db = new DBController();
        if ($this->db->connect()) {
            $query = "SELECT * FROM users WHERE email='$user->email' and password='$user->password'";
            $result = $this->db->select($query);
            if ($result === false) {
                echo 'Not found ';

                return false;
            } else {
                if (count($result) == 0) {
                    session_start();
                    $_SESSION['errMsg'] = 'you have entered wrong email or password';
                    $this->db->closeConnection();

                    return false;
                } else {
                    $_SESSION['id'] = $result[0]['id'];
                    $_SESSION['FullName'] = $result[0]['FullName'];
                    if ($result[0]['role'] == 1) {
                        $_SESSION['role'] = 'admin';
                    } else {
                        $_SESSION['role'] = 'user';
                    }
                    $_SESSION['true'] = 'logged succesfully';
                    echo '<br>';
                    $this->db->closeConnection();

                    return true;
                }
            }
        } else {
            echo 'error in database connection';

            return false;
        }
    }

    public function register(UserModel $user)
    {
        $this->db = new DBController();
        if ($this->db->connect()) {
            $query = "INSERT into users VALUES('','$user->fullName','$user->email','$user->password','$user->confirmPassword','$user->contactNumber','$user->role')";
            $result = $this->db->insert($query);
            session_start();
            if ($result != false) {
                $_SESSION['user id'] = $result;
                $_SESSION['FullName'] = $user->fullName;
                $_SESSION['role'] = 'user';
                $this->db->closeConnection();

                return true;
            } else {
                $_SESSION['errMsg'] = 'something went wrong...try again later';
                $this->db->closeConnection();

                return false;
            }
        } else {
            echo 'error in database connection';

            return false;
        }
    }
}
