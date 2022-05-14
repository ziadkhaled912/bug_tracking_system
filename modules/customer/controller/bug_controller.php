<?php 
require_once "./../model/bug.php";
require_once "./../../../shared/Controllers/database_controller.php";

class BugController 
{
    protected $db;


    public function addBug(Bug $bug) {
        $this->db=new DatabaseController;
        if($this->db->connection())
        {
            $query="INSERT INTO `bug` (`summary`, `description`, `priority`) VALUES ('$bug->summary', '$bug->description', '$bug->priorty')";
            return $this->db->insert($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false; 
        }
    }

    public function getTodoBugs()
    {
         $this->db=new DatabaseController;
         if($this->db->connection())
         {
            $query="SELECT `id`, `project_id`, `summary`, `description`, `priority`, `status_id`, `created_at` FROM `bug` WHERE status_id = 1";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getDevelepmentBugs()
    {
         $this->db=new DatabaseController;
         if($this->db->connection())
         {
            $query="SELECT `id`, `project_id`, `summary`, `description`, `priority`, `status_id`, `created_at` FROM `bug` WHERE status_id = 2";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getPendingBugs()
    {
         $this->db=new DatabaseController;
         if($this->db->connection())
         {
            $query="SELECT `id`, `project_id`, `summary`, `description`, `priority`, `status_id`, `created_at` FROM `bug` WHERE status_id = 3";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getDoneBugs()
    {
         $this->db=new DatabaseController;
         if($this->db->connection())
         {
            $query="SELECT `id`, `project_id`, `summary`, `description`, `priority`, `status_id`, `created_at` FROM `bug` WHERE status_id = 4";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function deleteBug($bugId)
    {
         $this->db=new DatabaseController;
         if($this->db->connection())
         {
            $query="DELETE FROM `bug` WHERE id = $bugId";
            return $this->db->delete($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
}
?>