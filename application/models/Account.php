<?php
class Account extends CI_Model
{
    function insertNewUser()
    {

        $roles = $this->input->post('roles');

        //membuat record baru di tabel users  
        $thequery = "INSERT INTO users (nama, username, password,email) 
                    VALUES ('" . $this->input->post('nama') . "','"
            . $this->input->post('username') . "',MD5('"
            . $this->input->post('password') . "'),'"
            . $this->input->post('email') . "')";
        $this->db->query($thequery);
        $id_user =  $this->db->insert_id();

        //membuat record baru di reviewer/editor
        foreach ($roles as $item) {
            $peran = $item;
            if ($peran == '1') { // editor
                $thequery2 = "INSERT INTO editor (id_user, date_updated) 
                VALUES (" . $id_user . ", now())";
                $this->db->query($thequery2);

                $thequery3 = "INSERT INTO member (id_user, id_grup, date_updated) 
                VALUES (" . $id_user . "," . $peran . ",  now())";
                $this->db->query($thequery3);
            } else if ($peran == '2') { //reviewer
                $thequery2 = "INSERT INTO reviewer (id_user, date_updated, no_rek, kompetensi) 
                VALUES (" . $id_user . ", now(),
                '" . $this->input->post('no_rek') . "','" . $this->input->post('kompetensi') . "')";
                $this->db->query($thequery2);

                $thequery3 = "INSERT INTO member (id_user, id_grup, date_updated) 
                VALUES (" . $id_user . ", " . $peran . ", now())";
                $this->db->query($thequery3);
            } else {
                $thequery2 = "INSERT INTO makelar (id_user, date_updated) 
                VALUES (" . $id_user . ", now())";
                $this->db->query($thequery2);

                $thequery3 = "INSERT INTO member (id_user, id_grup, date_updated) 
                VALUES (" . $id_user . "," . $peran . ", now())";
                $this->db->query($thequery3);
            }
        }
        return $id_user;
    }

    function getIDUser()
    {
        $thequery = "SELECT t1.*, t3.id_grup, t3.nama_grup FROM ( SELECT * FROM users  t0
                                    WHERE t0.username='" .  $this->input->post('username') . "'  
                                         AND t0.password=MD5('" .  $this->input->post('katasandi') . "')
                                         AND t0.sts_user=1) t1  
                                    INNER JOIN member t2 ON t1.id_user=t2.id_user AND t2.sts_member=1
                                    INNER JOIN grup t3 ON t2.id_grup=t3.id_grup AND t3.sts_grup=1";
        $res = $this->db->query($thequery);
        $users =  $res->result_array();
        //cek jika users berisi 1 atau lebih,
        if (count($users) > 0) {
            // kembalikan ID-user pertama
            return $users;
        }
        //kalau tidak, kembalikan nilai -1
        return [];
    }

    function getPeranUser($id_user = -1)
    {
        $thequery = "SELECT * FROM member 
                    WHERE id_user=" .  $id_user;
        $res = $this->db->query($thequery);
        $peran =  $res->result_array();
        return $peran[0]['id_grup'];
    }

    function getRoles($id_user = -1)
    {
        $thequery = "SELECT t1.*, t2.nama_grup  FROM (SELECT t0.* FROM member  t0 
                                    WHERE  t0.sts_member=1 AND t0.id_user=" .  $id_user . ") t1
                    INNER JOIN grup t2 ON t1.id_grup=t2.id_grup AND t2.sts_grup=1";
        $res = $this->db->query($thequery);
        return $res->result_array();
    }

    function getUser($id_user = -1)
    {
        $thequery = "SELECT t1.*, t3.id_grup, t3.nama_grup FROM ( SELECT * FROM users  t0
                                    WHERE t0.id_user=" .  $id_user . "  
                                         AND t0.sts_user=1) t1  
                                    INNER JOIN member t2 ON t1.id_user=t2.id_user AND t2.sts_member=1
                                    INNER JOIN grup t3 ON t2.id_grup=t3.id_grup AND t3.sts_grup=1";
        $res = $this->db->query($thequery);
        return  $res->result_array();
    }

    function get_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $q = $this->db->get('users');
        return $q->row();
    }

    function changePassword($id_user, $userdata)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('users', $userdata);
    }

    function passwrod_check()
    {
        $check = md5($this->input->post('currentpassword'));
        $this->db->where('password', $check);
        $query = $this->db->get("users");
        return $query->result();
    }
}
