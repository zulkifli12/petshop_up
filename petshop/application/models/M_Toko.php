<?php
class M_Toko extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function show()
    {
        $sql = "SELECT * FROM data_produk as a inner join data_kategori as b on
         a.id_kategori = b.id_kategori ";
        return $this->db->query($sql);
    }

    function Getid($id = '')
    {
      $sql = "SELECT * FROM user as a inner join data_produk as b on
       a.id = b.id_user inner join data_toko as c on
        a.id = c.id_user where id_produk = $id";
       return $this->db->query($sql)->row();
        // return $this->db->get_where('user', array('id' => $id))->row();
    }

    public function show_kategori()
    {
        $sql = "SELECT * FROM data_kategori";
        return $this->db->query($sql);
    }

    function Getidkategori($id = '')
    {
      $sql = "SELECT * FROM data_kategori where id_kategori = $id";
       return $this->db->query($sql)->row();
        // return $this->db->get_where('user', array('id' => $id))->row();
    }

    public function show_slider()
    {
        $sql = "SELECT * FROM data_slider";
        return $this->db->query($sql);
    }

    function Getidslider($id = '')
    {
      $sql = "SELECT * FROM data_slider where id_slider = $id";
       return $this->db->query($sql)->row();
        // return $this->db->get_where('user', array('id' => $id))->row();
    }
}
