<?php
class Task extends CI_Model
{
   // function insertNewTask_2()
   // {
   //    $thequery = "INSERT INTO task (judul,katakunci) 
   //                  VALUES ('" . $this->input->post('judul') . "',
   //                  '" . $this->input->post('keywords') . "')";
   //    $this->db->query($thequery);
   //    return $this->db->insert_id();
   // }

   function insertNewTask($id_editor = 0, $filename = '')
   {
      $this->db->set("judul", $this->input->post('judul'));
      $this->db->set("keywords", $this->input->post('keywords'));
      $this->db->set("authors", $this->input->post('authors'));
      $this->db->set("file_location", $filename);
      $this->db->set("page", $this->input->post('page'));

      $this->db->set("id_editor", $id_editor);


      $this->db->insert("task");
      return $this->db->insert_id();
   }
   function insertPrice($price, $page = 0)
   {
      $thequery =
         "UPDATE `task` SET `price`=$price WHERE `page`=" . $page;
      return $this->db->query($thequery);
   }

   function getTheTask($id_task = -1)
   {
      $thequery = "SELECT * FROM task WHERE id_task=" .  $id_task;
      $res = $this->db->query($thequery);
      return $res->result_array();
   }

   function getTheAssignment($id_assign = -1)
   {
      $thequery = "SELECT * FROM assignment WHERE id_assign=" .  $id_assign;
      $res = $this->db->query($thequery);
      foreach ($res->result_array() as $row) {
         return $row['file_complete'];
      }
   }
   function getTheBukti($id_assign = -1)
   {
      $thequery = "SELECT * FROM pembayaran WHERE id_assign=" .  $id_assign;
      $res = $this->db->query($thequery);
      foreach ($res->result_array() as $row) {
         return $row['bukti'];
      }
   }

   function getMyTask($id_user = -1)
   {
      $thequery = "SELECT t1.*, t2.id_task, t2.status, t3.id_user, t4.nama_status, t2.id_assign, t1.page  FROM task t1 
      JOIN assignment t2 ON t1.id_task = t2.id_task JOIN editor t3 ON t1.id_editor = t3.id_user 
      JOIN progress t4 ON t2.status = t4.status
      WHERE t3.id_user =" . $id_user;
      $res = $this->db->query($thequery);
      return $res->result_array();
   }
   function getTaskPage($id_task = -1)
   {
      $thequery = "SELECT task.page 
		FROM task
		WHERE task.id_task=" . $id_task . "";
      $res = $this->db->query($thequery);
   }
   function getRequest($status, $id_user = -1)
   {
      $q =
         "SELECT t1.id_user, t2.id_reviewer, t2.status, t3.*, t4.nama_status FROM reviewer t1 
         JOIN assignment t2 ON t1.id_reviewer=t2.id_reviewer 
         JOIN task t3 ON t2.id_task = t3.id_task JOIN progress t4 on t2.status=t4.status WHERE t2.status = $status AND t1.id_user =" . $id_user;
      $res = $this->db->query($q);
      return $res->result_array();
   }

   function getviewreviewer($status, $id_user = -1)
   {
      $q =
         "SELECT t1.id_user, t2.id_reviewer, t2.status, t3.*, t4.nama_status FROM reviewer t1 
         JOIN assignment t2 ON t1.id_reviewer=t2.id_reviewer 
         JOIN task t3 ON t2.id_task = t3.id_task JOIN progress t4 on t2.status=t4.status WHERE t2.status = $status AND t1.id_user =" . $id_user;
      $res = $this->db->query($q);
      return $res->result_array();
   }

   function getviewcompletereviewer($id_assign, $id_user = -1)
   {
      $q =
         "SELECT t1.id_user, t2.id_reviewer, t2.status, t3.*, t4.nama_status FROM reviewer t1 
         JOIN assignment t2 ON t1.id_reviewer=t2.id_reviewer 
         JOIN task t3 ON t2.id_task = t3.id_task JOIN progress t4 on t2.status=t4.status WHERE t2.id_assign = $id_assign AND t1.id_user =" . $id_user;
      $res = $this->db->query($q);
      return $res->result_array();
   }
   function insertcompleteTask($id_assign = 0, $status, $id_user, $filename)
   {
      $q =
         "UPDATE assignment SET `file_complete`='$filename',`status`=$status 
         WHERE id_assign=" . $id_assign;
      return $this->db->query($q);
   }

   function getviewmakelar($status)
   {
      $q = "SELECT t1.*, t2.id_reviewer, t2.status, t3.*, t4.nama_status FROM reviewer t1 
      JOIN assignment t2 ON t1.id_reviewer=t2.id_reviewer 
      JOIN task t3 ON t2.id_task = t3.id_task JOIN progress t4 on t2.status=t4.status 
      WHERE t2.status = " . $status;
      $res = $this->db->query($q);
      return $res->result_array();
   }
   function getviewongoing($status)
   {
      $q = "SELECT t1.*, t2.id_reviewer, t2.status, t3.*, t4.nama_status FROM reviewer t1 
      JOIN assignment t2 ON t1.id_reviewer=t2.id_reviewer 
      JOIN task t3 ON t2.id_task = t3.id_task JOIN progress t4 on t2.status=t4.status 
      WHERE t2.status = " . $status;
      $res = $this->db->query($q);
      return $res->result_array();
   }
   function getviewcompleted($status)
   {
      $q = "SELECT t1.*, t2.id_reviewer, t2.status, t3.*, t4.nama_status,t5.* FROM reviewer t1 
      JOIN assignment t2 ON t1.id_reviewer=t2.id_reviewer 
      JOIN task t3 ON t2.id_task = t3.id_task JOIN progress t4 on t2.status=t4.status 
      JOIN pembayaran t5 ON t5.id_assign=t2.id_assign WHERE t2.status = " . $status;
      $res = $this->db->query($q);
      return $res->result_array();
   }
}
