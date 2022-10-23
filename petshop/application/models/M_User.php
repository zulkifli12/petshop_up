<?php
class M_User extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function show()
    {
        $sql = "SELECT * FROM user as a inner join user_role as b on
         a.role_id = b.id_role";
        return $this->db->query($sql);
    }

    function Getid($id = '')
    {
      $sql = "SELECT * FROM user as a inner join user_role as b on
       a.role_id = b.id_role where id = $id";
       return $this->db->query($sql)->row();
        // return $this->db->get_where('user', array('id' => $id))->row();
    }

    function Getidtoko($id = '')
    {
      $sql = "SELECT * FROM user as a inner join data_toko as b on
       a.id = b.id_user where b.id_toko = $id";
       return $this->db->query($sql)->row();
        // return $this->db->get_where('user', array('id' => $id))->row();
    }
}
