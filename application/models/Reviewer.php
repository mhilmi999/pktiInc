<?php
class Reviewer extends CI_Model
{

   function getAllReviewers()
   {
      $thequery = "SELECT t1.nama, t1.email, t1.username,t2.sts_reviewer,t2.id_reviewer,t2.kompetensi
                  FROM users t1 JOIN reviewer t2 
                  ON t1.id_user=t2.id_user ";
      $res = $this->db->query($thequery);
      return $res->result_array(); //kembalikan ke fungsi yang manggil
   }
   function getPotential()
   {
      //membuat record baru di tabel users  
      $thequery = "INSERT INTO assignment VALUES (NULL,
            '" . $this->input->post('id_task') . "', 
            '" . $this->input->post('reviewer') . "',1,NULL,now(),now(),now(),now(),1)";
      $this->db->query($thequery);
      $id_user = $this->db->insert_id();
      return $id_user;
   }

   function getRequest($status, $id_user = -1)
   {
      $q =
         "SELECT t1.id_user, t2.id_reviewer, t2.status, t3.*, t4.nama_status FROM reviewer t1 
         JOIN assignment t2 ON t1.id_reviewer=t2.id_reviewer 
         JOIN task t3 ON t2.id_task = t3.id_task JOIN progress t4 on t2.status=t4.status 
         WHERE t2.status = $status AND t1.id_user =" . $id_user;
      $res = $this->db->query($q);
      return $res->result_array();
   }

   function getviewreviewer($status, $id_user = -1)
   {
      $q =
         "SELECT t1.id_user, t2.id_reviewer, t2.status, t3.*, t4.nama_status, t2.id_assign FROM reviewer t1 
         JOIN assignment t2 ON t1.id_reviewer=t2.id_reviewer 
         JOIN task t3 ON t2.id_task = t3.id_task JOIN progress t4 on t2.status=t4.status 
         WHERE t2.status = $status AND t1.id_user =" . $id_user;
      $res = $this->db->query($q);
      return $res->result_array();
   }

   function getBalance($id_user = -1)
   {
      $q =
         "SELECT * FROM reviewer
         WHERE id_user =" . $id_user;
      $res = $this->db->query($q);
      return $res->result_array();
   }
   
   function getSaldo($id_user = -1)
   {
      $q = "SELECT saldo FROM reviewer WHERE id_user = ". $id_user;
      $res = $this->db->query($q);
      foreach ($res->result_array() as $row)
      {
        return $row['saldo'];
      }
   }

   function jumlahSaldo($jumlahsaldo, $id_user = -1)
   {
      $q = "UPDATE reviewer SET saldo=$jumlahsaldo WHERE id_user = ".$id_user;
      $res = $this->db->query($q);
   }



}
