<?php
class M_Role extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function show()
    {
        $sql = "SELECT * FROM user_role";
        return $this->db->query($sql);
    }
}
