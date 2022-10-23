<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
        $this->load->library('form_validation');
    }

	public function index()
	{
		if ($this->session->userdata('email')) {
            redirect('dashboard');
        }

		$data['title'] = 'Login | Petshop';
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
		$this->load->view('login/index',$data);
		} else {
            $this->_login();
        }
	}

	    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
				$where = array('email' => $email);
	 			$join = array('data_toko', 'data_toko.id_user=user.id');
	 			$user1 = $this->db->join($join[0], $join[1])->get_where('user', $where)->row_array();

        //Jika User Ada
        if ($user) {
            //Jika User Aktif
            if ($user['is_active'] == 1) {
                //Cek Password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id' => $user['id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    }elseif ($user['role_id'] == 2 && !isset($user1['id_user'])) {
												redirect('auth/daftar_toko');
                    }elseif ($user['role_id'] == 2 && isset($user1['id_user'])) {
                    		redirect('toko');
                    } else {
                        redirect('website');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Akun Anda belum Aktif!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun Anda belum terdaftar!</div>');
            redirect('auth');
        }
    }

	public function register()
	{
		if ($this->session->userdata('email')) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah digunakan!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'min_length' => 'Password 8 karakter!'
        ]);
		$data['role'] = $this->db->get_where('user_role','id_role !=1 And status=1')->result();
		//$data['role'] = $this->db->get('user_role')->result();
		$data['title'] = 'Register | Petshop';
		if ($this->form_validation->run() == false) {
		$this->load->view('login/register',$data);
		} else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Akun Anda Sudah Tersimpan
            !</div>');
            redirect('auth');
        }
	}

	public function daftar_toko()
	{
		$this->form_validation->set_rules('namatk', 'Nama Toko', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat Toko', 'required|trim');
		$this->form_validation->set_rules('notelp', 'No Telp Toko', 'required|trim');
		$data['title'] = 'Register | Petshop';
		if ($this->form_validation->run() == false) {
		$this->load->view('login/daftar_toko',$data);
		} else {
					$data = [
							'id_user' => $this->session->userdata('id') ,
							'nama_toko' => htmlspecialchars($this->input->post('namatk', true)),
							'alamat' => htmlspecialchars($this->input->post('alamat', true)),
							'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
							'status' => 1,
							'datecreated' => time()
					];

					$this->db->insert('data_toko', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Toko Anda Sudah Tersimpan
					!</div>');
					redirect('toko');
			}
	}

	public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Anda sudah Logout!</div>');
        redirect('welcome');
    }
}
