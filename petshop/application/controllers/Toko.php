<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

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
				$this->load->model('M_Toko');
        $this->load->library('form_validation');
				$this->load->library('upload');
    }

	public function index()
	{
		$data['title'] = 'PETSHOP | Toko';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
		$data['dtuser'] = $this->db->query('SELECT COUNT(*) as total FROM user')->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/dashboard/index',$data);
		$this->load->view('admin/template/footer');
	}

  public function dashboard()
	{
		$data['title'] = 'PETSHOP | Toko';
    $data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/dashboard/dashboard',$data);
		$this->load->view('admin/template/footer');
	}

  public function edit_data()
	{
		$data['title'] = 'PETSHOP | Toko';
		$data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$id = $this->uri->segment(3);
		$data['role'] = $this->db->get_where('user_role','status = 1')->result();
		$data['hasil'] = $this->M_User->Getid($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/dashboard/user/user_edit',$data);
		$this->load->view('admin/template/footer');
	}

	public function edit_aksi()
	{
		$id = $this->input->post('id');
		$nama   = $this->input->post('nama');
		$password = $this->input->post('password');
			$_image = $this->db->get_where('user', ['id' => $id])->row();
			$config['upload_path'] = './assets/images';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['fotopost']['name'];
			$this->upload->initialize($config);
			/* $this->load->library('upload', $config); */
			if (!empty($_FILES['fotopost']['name'])) {
					if ($this->upload->do_upload('fotopost')) {
							$foto = $this->upload->data();
							$data = array(
									'image'       => $foto['file_name'],
							);
							$query = $this->db->update('user', $data, array('id' => $id));
							if ($query) {
									unlink(FCPATH . 'assets/images' . $_image->image);
							}
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
								 Data User Telah Diedit!</div>');
							redirect('toko/dashboard');
					} else {
							$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
								 Gagal Upload Gambar!</div>');
							redirect('toko/dashboard');
					}
			} elseif (empty($password)) {
				$data = array(
					'nama'   => $nama,
				);
				$query = $this->db->update('user', $data, array('id' => $id));
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					 Data User Telah Diedit!</div>');
				redirect('toko/dashboard');
			} elseif (empty($nama)) {
				$data = array(
					'password'     => password_hash($password, PASSWORD_DEFAULT),
					'ket_pass'     => $password,
				);
				$query = $this->db->update('user', $data, array('id' => $id));
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					 Data User Telah Diedit!</div>');
				redirect('toko/dashboard');
			} else {
					$data = array(
						'nama'   => $nama,
						'password'     => password_hash($password, PASSWORD_DEFAULT),
						'ket_pass'     => $password,
					);
					$query = $this->db->update('user', $data, array('id' => $id));
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						 Data User Telah Diedit!</div>');
					redirect('toko/dashboard');
			}
	}

	public function edit_data_toko()
	{
		$data['title'] = 'PETSHOP | Toko';
		$data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$id = $this->uri->segment(3);
		$data['hasil'] = $this->M_User->Getidtoko($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/dashboard/user/edit_toko',$data);
		$this->load->view('admin/template/footer');
	}

	public function edit_aksi_toko()
	{
		$id = $this->input->post('id');
		$nama_toko = $this->input->post('nama_toko');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$data = array(
				'nama_toko'       => $nama_toko,
				'alamat'       => $alamat,
				'no_telp'       => $no_telp,
		);
		$this->db->update('data_toko', $data, array('id_toko' => $id));
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Data Toko Sudah Terupdate
		!</div>');
		redirect('toko/dashboard');
	}

	//Controller Data_Produk
	public function data_produk()
	{
		$data['title'] = 'PETSHOP | Toko';
    $data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$data['toko'] = $this->M_Toko->show()->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/manajementoko/index',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_produk()
	{
		$data['title'] = 'PETSHOP | Toko';
		$data['kategori'] = $this->db->get('data_kategori')->result();
		$data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/manajementoko/tambah_produk',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_aksi_produk()
	{
		$nama   = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$deskripsi   = $this->input->post('deskripsi');
		$stok   = $this->input->post('stok');
		$kategori   = $this->input->post('kategori');
		$config['upload_path'] = './assets/images/produk';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $_FILES['fotopost']['name'];

		$this->upload->initialize($config);

		if (!empty($_FILES['fotopost']['name'])) {
				if ($this->upload->do_upload('fotopost')) {
						$foto = $this->upload->data();
						$data = array(
								'image'       => $foto['file_name'],
								'nama_produk'   => $nama,
								'harga'     => $harga,
								'deskripsi'     => $deskripsi,
								'date_created' => time(),
								'stok_produk' => $stok,
								'id_kategori' => $kategori,
								'status' => '1',
								'id_user' => $this->session->userdata('id') ,
						);
						$this->db->insert('data_produk', $data);
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 Data Produk Telah Ditambahkan!</div>');
						redirect('toko/data_produk');
				} else {
						var_dump($data);
						$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
							 Gagal Upload Gambar!</div>');
						redirect('toko/data_produk');
				}
		} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
							 Foto Tidak TerInput!</div>');
				redirect('toko/data_produk');
		}
	}

	public function edit_produk()
	{
		$data['title'] = 'PETSHOP | Toko';
		$id = $this->uri->segment(3);
		$data['kategori'] = $this->db->get('data_kategori')->result();
		$data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$data['hasil'] = $this->M_Toko->Getid($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/manajementoko/edit_produk',$data);
		$this->load->view('admin/template/footer');
	}

	public function edit_aksi_produk()
	{
			$id = $this->input->post('id');
			$nama   = $this->input->post('nama_produk');
			$harga = $this->input->post('harga');
			$stok   = $this->input->post('stok');
			$kategori   = $this->input->post('kategori');
			$deskripsi   = $this->input->post('deskripsi');
			$_image = $this->db->get_where('data_produk', ['id_produk' => $id])->row();
			$config['upload_path'] = './assets/images/produk';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['fotopost']['name'];
			$this->upload->initialize($config);
			/* $this->load->library('upload', $config); */
			if (!empty($_FILES['fotopost']['name'])) {
					if ($this->upload->do_upload('fotopost')) {
							$foto = $this->upload->data();
							$data = array(
								'image'       => $foto['file_name'],
								'nama_produk'   => $nama,
								'id_kategori' => $kategori,
								'stok_produk' => $stok,
								'harga'     => $harga,
								'deskripsi'     => $deskripsi,
							);
							$query = $this->db->update('data_produk', $data, array('id_produk' => $id));
							if ($query) {
									unlink(FCPATH . 'assets/images/produk' . $_image->image);
							}
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
								 Data Produk Telah Diedit!</div>');
							redirect('toko/data_produk');
					} else {
							$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
								 Gagal Upload Gambar!</div>');
							redirect('toko/data_produk');
					}
			} else {
					$data = array(
						'nama_produk'   => $nama,
						'harga'     => $harga,
						'stok_produk' => $stok,
						'id_kategori' => $kategori,
						'deskripsi'     => $deskripsi,
					);
					$query = $this->db->update('data_produk', $data, array('id_produk' => $id));
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
								 Data Produk Telah Diedit!</div>');
					redirect('toko/data_produk');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
								 Foto Tidak TerInput!</div>');
					redirect('toko/data_produk');
			}
	}

	public function hapus_produk()
	{
			$id = $this->input->post('id');
			$this->db->delete('data_produk', array('id_produk' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Produk Telah Dihapus!</div>');
			redirect('toko/data_produk');
	}

	public function publish()
	{
			if ($this->uri->segment(4) == '1') {
					$data = array('status' => '0');
			} else {
					$data = array('status' => '1');
			}
			$where = array('id_produk' => $this->uri->segment(3));
			$this->db->update('data_produk', $data, $where);
			redirect('toko/data_produk');
	}
	//End Data produk

	//DAta Kategori produk
	public function data_kategori()
	{
		$data['title'] = 'PETSHOP | Toko';
    $data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$data['kategori'] = $this->M_Toko->show_kategori()->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/manajementoko/kategori/index',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_kategori()
	{
		$data['title'] = 'PETSHOP | Toko';
		$data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/manajementoko/kategori/tambah_kategori',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_aksi_kategori()
	{
		$nama   = $this->input->post('nama');

						$data = array(
								'nama_kategori'   => $nama,
								'datecreated' => time(),
								'status' => '1',
								'id_user' => $this->session->userdata('id') ,
						);
						$this->db->insert('data_kategori', $data);
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 Data Kategori Telah Ditambahkan!</div>');
						redirect('toko/data_kategori');
	}

	public function edit_kategori()
	{
		$data['title'] = 'PETSHOP | Toko';
		$id = $this->uri->segment(3);
		$data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$data['hasil'] = $this->M_Toko->Getidkategori($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/manajementoko/kategori/edit_kategori',$data);
		$this->load->view('admin/template/footer');
	}

	public function edit_aksi_kategori()
	{
		$id   = $this->input->post('id');
		$nama   = $this->input->post('nama');
						$data = array(
								'nama_kategori'   => $nama,
						);
						$query = $this->db->update('data_kategori', $data, array('id_kategori' => $id));
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 Data Kategori Telah Diedit!</div>');
						redirect('toko/data_kategori');
	}

	public function hapus_kategori()
	{
			$id = $this->input->post('id');
			$this->db->delete('data_kategori', array('id_kategori' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Kategori Telah Dihapus!</div>');
			redirect('toko/data_kategori');
	}

	public function publish_kategori()
	{
			if ($this->uri->segment(4) == '1') {
					$data = array('status' => '0');
			} else {
					$data = array('status' => '1');
			}
			$where = array('id_kategori' => $this->uri->segment(3));
			$this->db->update('data_kategori', $data, $where);
			redirect('toko/data_kategori');
	}
	//End Data Kategori

	//DAta Slider
	public function slider()
	{
		$data['title'] = 'PETSHOP | Toko';
    $data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$data['slider'] = $this->M_Toko->show_slider()->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/manajementoko/slider/index',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_slider()
	{
		$data['title'] = 'PETSHOP | Toko';
		$data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/manajementoko/slider/tambah_slider',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_aksi_slider()
	{
		$nama   = $this->input->post('nama');
		$config['upload_path'] = './assets/images/slider';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $_FILES['fotopost']['name'];

		$this->upload->initialize($config);

		if (!empty($_FILES['fotopost']['name'])) {
				if ($this->upload->do_upload('fotopost')) {
						$foto = $this->upload->data();
						$data = array(
								'gambar'       => $foto['file_name'],
								'nama_slider'   => $nama,
								'date_created' => time(),
								'status' => '1',
								'id_user' => $this->session->userdata('id') ,
						);
						$this->db->insert('data_slider', $data);
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 Data Slider Telah Ditambahkan!</div>');
						redirect('toko/slider');
				} else {
						var_dump($data);
						$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
							 Gagal Upload Gambar!</div>');
						redirect('toko/Slider');
				}
		} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
							 Foto Tidak TerInput!</div>');
				redirect('toko/slider');
		}
	}

	public function edit_slider()
	{
		$data['title'] = 'PETSHOP | Toko';
		$id = $this->uri->segment(3);
		$data['user'] = $this->db->query('SELECT * FROM user as a INNER JOIN user_role as b ON a.role_id=b.id_role
			inner join data_toko as c on a.id=c.id_user WHERE a.email="'.$this->session->userdata('email').'"')->row_array();
		$data['hasil'] = $this->M_Toko->Getidslider($id);
		$this->load->view('admin/template/header',$data);
		$this->load->view('toko/template/sidebar');
		$this->load->view('toko/manajementoko/slider/edit_slider',$data);
		$this->load->view('admin/template/footer');
	}

	public function edit_aksi_slider()
	{
			$id = $this->input->post('id');
			$nama   = $this->input->post('nama');
			$_image = $this->db->get_where('data_slider', ['id_slider' => $id])->row();
			$config['upload_path'] = './assets/images/slider';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['fotopost']['name'];
			$this->upload->initialize($config);
			/* $this->load->library('upload', $config); */
			if (!empty($_FILES['fotopost']['name'])) {
					if ($this->upload->do_upload('fotopost')) {
							$foto = $this->upload->data();
							$data = array(
								'gambar'       => $foto['file_name'],
								'nama_slider'   => $nama,
							);
							$query = $this->db->update('data_slider', $data, array('id_slider' => $id));
							if ($query) {
									unlink(FCPATH . 'assets/images/slider' . $_image->gambar);
							}
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
								 Data Slider Telah Diedit!</div>');
							redirect('toko/slider');
					} else {
							$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
								 Gagal Upload Gambar!</div>');
							redirect('toko/slider');
					}
			} else {
					$data = array(
						'nama_slider'   => $nama,
					);
					$query = $this->db->update('data_slider', $data, array('id_slider' => $id));
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
								 Data Slider Telah Diedit!</div>');
					redirect('toko/slider');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
								 Foto Tidak TerInput!</div>');
					redirect('toko/slider');
			}
	}

	public function hapus_slider()
	{
			$id = $this->input->post('id');
			$this->db->delete('data_slider', array('id_slider' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Slider Telah Dihapus!</div>');
			redirect('toko/slider');
	}

	public function publish_slider()
	{
			if ($this->uri->segment(4) == '1') {
					$data = array('status' => '0');
			} else {
					$data = array('status' => '1');
			}
			$where = array('id_slider' => $this->uri->segment(3));
			$this->db->update('data_slider', $data, $where);
			redirect('toko/slider');
	}
	//End Slider

	//Data Penjualan
}
