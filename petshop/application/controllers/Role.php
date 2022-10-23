<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
				$this->load->model('M_Role');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['title'] = 'PETSHOP | Administrator';
		$data['role'] = $this->M_Role->show()->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/role/index',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah()
	{
		$data['title'] = 'PETSHOP | Administrator';
		$data['role'] = $this->db->get('user_role')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/role/tambah_role',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_aksi()
	{
		$role   = $this->input->post('role');

						$data = array(
								'role'       => $role,
								'status'   => 1,
						);
						$this->db->insert('user_role', $data);
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Role Sudah Tersimpan
            !</div>');
						redirect('role');
	}

	public function edit()
	{
		$data['title'] = 'PETSHOP | Administrator';
		$id = $this->uri->segment(3);
		$data['role'] = $this->db->get('user_role')->result();
		$data['hasil'] = $this->M_User->Getid($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/user/edit_user',$data);
		$this->load->view('admin/template/footer');
	}

	public function edit_aksi()
	{
		$id = $this->input->post('id');
    $role   = $this->input->post('role');

						$data = array(
								'role'       => $role,
								'status'   => 1,
						);
						$this->db->update('user_role', $data, array('id_role' => $id));
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Role Sudah Terupdate
						!</div>');
						redirect('role');
	}

	public function hapus()
	{
			$id = $this->input->post('id');
			$this->db->delete('user_role', array('id_role' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Role Telah Dihapus!</div>');
			redirect('role');
	}

	public function active()
	{
			if ($this->uri->segment(4) == '1') {
					$data = array('status' => '0');
			} else {
					$data = array('status' => '1');
			}
			$where = array('id_role' => $this->uri->segment(3));
			$this->db->update('user_role', $data, $where);
			redirect('role');
	}
}
