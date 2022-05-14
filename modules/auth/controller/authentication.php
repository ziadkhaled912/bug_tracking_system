<?php

require_once '../model/UserModel.php';
require_once '../../../shared/Controllers/database_controller.php';

class AuthController
{ 
    protected $db;

    public function getUserRole()
    {
         $this->db=new DatabaseController;
         if($this->db->connection())
         {
            $query="SELECT * FROM `user_role`";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function login(UserModel $user)
    {
        $this->db = new DatabaseController();
        if ($this->db->connection()) {
            $query = "SELECT * FROM users WHERE email='$user->email' and password='$user->password'";
            $result = $this->db->select($query);
            if ($result === false) {
                echo 'Not found ';

                return false;
            } else {
                session_start();
                if (count($result) == 0) {
                    $_SESSION['errMsg'] = 'you have entered wrong email or password';
                    $this->db->closeConnection();

                    return false;
                } else {
                    $_SESSION["user_id"]=$result[0]["id"];
                    $_SESSION["fullName"]=$result[0]["fullName"];
                    if($result[0]["role_id"]==1)
                    {
                        $_SESSION["role"]="Admin";
                    }
                    else if ($result[0]["role_id"]==2)
                    {
                        $_SESSION["role"]="user";
                    } else {
                        $_SESSION["role"]="staff";
                    }
                    // $_SESSION['id'] = $result[0]['id'];
                    // $_SESSION['FullName'] = $result[0]['FullName'];
                    // if ($result[0]['role_id'] == 1) {
                    //     $_SESSION['role_id'] = 'admin';
                    // } else if ($result[0]['role_id'] == 2) {
                    //     $_SESSION['role_id'] = 'user';
                    // } else {
                    //     $_SESSION['role_id'] = 'staff';
                    // }
                    // $_SESSION['true'] = 'logged succesfully';
                    // echo '<br>';
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
        $this->db = new DatabaseController();
        if ($this->db->connection()) {
            $query = "INSERT into users VALUES('','$user->fullName','$user->email','$user->password','$user->confirmPassword','$user->contactNumber',2)";
            $result = $this->db->insert($query);
            session_start();
            if ($result) {
                $_SESSION['user_id'] = $result;
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
