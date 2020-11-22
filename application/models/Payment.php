<?php
class Payment extends CI_Model
{

    function getviewpayments($id_assign)
    {
        $q = "SELECT t2.*,t3.id_assign, t3.status,t4.no_rek, t5.nama, t2.price,t3.id_task FROM assignment t3 
			JOIN reviewer t4 ON t4.id_reviewer=t3.id_reviewer
            JOIN users t5 ON t5.id_user=t4.id_user
            JOIN task t2 ON t3.id_task =t2.id_task
            WHERE t3.id_assign=" . $id_assign;
        $res = $this->db->query($q);
        return $res->result_array();
    }

    function getAmount($id_task)
    {
        $q = "SELECT price FROM task 
            WHERE id_task=" . $id_task;
        $res = $this->db->query($q);
        foreach ($res->result_array() as $row) {
            return $row['price'];
        }
    }

    function getpayments($id_assign = -1, $id_user, $status, $filename = "", $price)
    {

        $this->db->set("amount", $price);
        $this->db->set("bukti", $filename);
        $this->db->set("id_assign", $id_assign);
        // $this->db->set("date_updated", now());

        $this->db->insert("pembayaran");
        $this->db->insert_id();
        $thequery2 = "UPDATE assignment SET `status`=$status 
         WHERE id_assign=" . $id_assign;
        $this->db->query($thequery2);
    }

    function getSaldo($id_user)
    {
        $q = "SELECT * FROM reviewer
            WHERE id_user=" . $id_user;
        $res = $this->db->query($q);
        foreach ($res->result_array() as $row) {
            return $row['saldo'];
        }
    }

    function getAmountComplete($id_assign)
    {
        $q = "SELECT * FROM pembayaran
            WHERE id_assign=" . $id_assign;
        $res = $this->db->query($q);
        foreach ($res->result_array() as $row) {
            return $row['amount'];
        }
    }

    function confirmPayment($status, $id_user, $amount, $id_assign)
    {
        $thequery = "UPDATE reviewer SET `saldo`=$amount 
         WHERE id_user=" . $id_user;
        $this->db->query($thequery);
        $thequery2 = "UPDATE assignment SET `status`=$status 
         WHERE id_assign=" . $id_assign;
        $this->db->query($thequery2);
    }

    public function transfer($ammount, $from, $to)
    {
    }
}
