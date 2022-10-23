<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
				$this->load->model('M_User');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['title'] = 'PETSHOP | Administrator';
		$data['user'] = $this->M_User->show()->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/user/index',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah()
	{
		$data['title'] = 'PETSHOP | Administrator';
		$data['role'] = $this->db->get_where('user_role','status = 1')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/user/tambah_user',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_aksi()
	{
		$nama   = $this->input->post('nama');
		$email = $this->input->post('email');
		$sandi = $this->input->post('sandi');
		$role = $this->input->post('role');

						$data = array(
								'image'       => 'default.jpg',
								'nama'   => $nama,
								'email'     => $email,
								'password'     => password_hash($sandi, PASSWORD_DEFAULT),
								'role_id' => $role,
								'is_active' => '1',
								'date_created' => time(),
						);
						$this->db->insert('user', $data);
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Akun Anda Sudah Tersimpan
            !</div>');
						redirect('user');
	}

	public function edit()
	{
		$data['title'] = 'PETSHOP | Administrator';
		$id = $this->uri->segment(3);
		$data['role'] = $this->db->get_where('user_role','status = 1')->result();
		$data['hasil'] = $this->M_User->Getid($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/user/edit_user',$data);
		$this->load->view('admin/template/footer');
	}

	public function edit_aksi()
	{
		$id = $this->input->post('id');
		$nama   = $this->input->post('nama');
		$email = $this->input->post('email');
		$role = $this->input->post('role');

						$data = array(
								'nama'   => $nama,
								'email'     => $email,
								'role_id' => $role,
						);
						$this->db->update('user', $data, array('id' => $id));
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Akun Anda Sudah Terupdate
						!</div>');
						redirect('user');
	}

	public function hapus()
	{
			$id = $this->input->post('id');
			$this->db->delete('user', array('id' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				User Telah Dihapus!</div>');
			redirect('user');
	}

	public function active()
	{
			if ($this->uri->segment(4) == '1') {
					$data = array('is_active' => '0');
			} else {
					$data = array('is_active' => '1');
			}
			$where = array('id' => $this->uri->segment(3));
			$this->db->update('user', $data, $where);
			redirect('user');
	}
}
