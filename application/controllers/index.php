<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('template_user');
		$this->load->model('model_admin','',TRUE);
	}

	public function index()
	{

		$data['list_data'] = $this->model_admin->get_paged_list_where_order_limit('kategori','rekomendasi','Ya','id_kategori','desc',1,0)->result_array();

		$data['list_data_item'] = $this->model_admin->get_paged_list_where_order_limit('kategori','rekomendasi','Ya','id_kategori','desc',2,1)->result_array();

		$data['list_data_item_item'] = $this->model_admin->get_paged_list_where_order_limit('kategori','rekomendasi','Ya','id_kategori','desc',2,3)->result_array();

		$data['list_data_paket'] = $this->model_admin->get_paged_list_order_limit('lokasi_wisata','id_wisata','asc',3,0)->result_array();


		$this->template_user->display('user/index',$data);


	}

	public function kategori($id='')
	{

		$data['list_data_paket'] = $this->model_admin->get_by_id($id,'id_kategori','lokasi_wisata')->result_array();

		$data['jml_list_data_paket']=count($data['list_data_paket']);

		$data['judul_page']=$this->model_admin->get_by_id($id,'id_kategori','kategori')->row_array();

		$this->template_user->display('user/kategorilist',$data);
	}

	public function paket($id='')
	{

		$data['isi_page']=$this->model_admin->get_by_id($id,'id_wisata','lokasi_wisata')->row_array();

		$this->template_user->display('user/paketdetail',$data);
	}

	public function pemesanan($id='')
	{
		if(empty($this->session->userdata('id_pel'))){
			echo "<script>alert('Silahkan Login Untuk Melakukan Pemesanan');location.href='".site_url('login')."';</script>";
		}
		else
		{
			$data['isi_page']=$this->model_admin->get_by_id($id,'id_wisata','lokasi_wisata')->row_array();
			
			if($data['isi_page']['jml_kuota']>0)
			{
				$data['aksi']=site_url('aksipemesanan');
				$this->template_user->display('user/pemesanan',$data);
			}
			else
			{
				redirect(site_url('#paket'),'refresh');
			}
			
		}
	}

	public function faktur($id='')
	{
		if(empty($this->session->userdata('id_pel'))){
			echo "<script>alert('Silahkan Login Untuk Akses Halaman Ini');location.href='".site_url('login')."';</script>";
		}
		else
		{
			$data['isi_page']=$this->model_admin->get_by_id($id,'no_pemesanan','pemesanan')->row_array();
			$data['isi_page_master']=$this->model_admin->get_by_id($data['isi_page']['id_wisata'],'id_wisata','lokasi_wisata')->row_array();

			$data['isi_page_pel']=$this->model_admin->get_by_id($data['isi_page']['id_pelanggan'],'id_pelanggan','pelanggan')->row_array();
			
			$this->template_user->display('user/faktur',$data);
			
		}
	}

	public function cetak($id='')
	{
		$data['isi_page']=$this->model_admin->get_by_id($id,'no_pemesanan','pemesanan')->row_array();
			
		$data['isi_page_master']=$this->model_admin->get_by_id($data['isi_page']['id_wisata'],'id_wisata','lokasi_wisata')->row_array();

		$data['isi_page_pel']=$this->model_admin->get_by_id($data['isi_page']['id_pelanggan'],'id_pelanggan','pelanggan')->row_array();

		$this->load->view('user/cetak', $data);
	}

	public function pesanananda()
	{
		if(empty($this->session->userdata('id_pel'))){
			echo "<script>alert('Silahkan Login Untuk Akses Halaman Ini');location.href='".site_url('login')."';</script>";
		}
		else
		{
			$data['isi_page']=$this->model_admin->get_paged_list_where_order_limit('pemesanan','id_pelanggan',$this->session->userdata('id_pel'),'no_pemesanan','desc',0,0)->result_array();
			
			$data['total_row']=count($data['isi_page']);

			$this->template_user->display('user/pesanananda', $data);
		}
	}

	public function pesanandetail($id='')
	{
		if(empty($this->session->userdata('id_pel'))){
			echo "<script>alert('Silahkan Login Untuk Akses Halaman Ini');location.href='".site_url('login')."';</script>";
		}
		else
		{
			$data['isi_page']=$this->model_admin->get_by_id($id,'no_pemesanan','pemesanan')->row_array();
			$data['isi_page_master']=$this->model_admin->get_by_id($data['isi_page']['id_wisata'],'id_wisata','lokasi_wisata')->row_array();

			$data['isi_page_pel']=$this->model_admin->get_by_id($data['isi_page']['id_pelanggan'],'id_pelanggan','pelanggan')->row_array();
			
			$data['isi_pembayaran']=$this->model_admin->get_by_id($id,'no_pemesanan','pembayaran')->row_array();
			$data['jmlByr']=count($data['isi_pembayaran']);

			$this->template_user->display('user/pesanandetail',$data);
			
		}
	}

	public function konfirmasipembayaran($id='')
	{
		if(empty($this->session->userdata('id_pel'))){
			echo "<script>alert('Silahkan Login Untuk Akses Halaman Ini');location.href='".site_url('login')."';</script>";
		}
		else
		{
			$data['isi_page']=$this->model_admin->get_by_id($id,'no_pemesanan','pemesanan')->row_array();

			$data['isi_pembayaran']=$this->model_admin->get_by_id($id,'no_pemesanan','pembayaran')->row_array();
			$jmlByr=count((array)$data['isi_pembayaran']);

			if ($jmlByr==0) {

				$data['aksi']=site_url('aksipembayaran');
				$this->template_user->display('user/konfirmasipembayaran',$data);
			}
			else
			{
				echo "<script>alert('Anda Sudah Konfirmasi Pembayaran');location.href='".site_url('pesanananda')."';</script>";
			}
			
			
		}
	}

	public function daftar()
	{
		if(empty($this->session->userdata('id_pel'))){
			$data['aksi']=site_url('aksidaftar');
			$this->template_user->display('user/daftar',$data);
		}
		else
		{
			redirect(site_url(),'refresh');
		}
	}

	public function login()
	{
		if(empty($this->session->userdata('id_pel'))){
			$data['aksi']=site_url('aksilogin');
			$this->template_user->display('user/login',$data);
		}
		else
		{
			redirect(site_url(),'refresh');
		}
	}

	//======================================aksi daftar, login dan logout=======================================//

	public function aksidaftar()
	{
		$data = array(
							'nama' => $this->input->post('nama'),
							'alamat' => $this->input->post('alamat'),
							'hp' => $this->input->post('hp'),
							'password' => md5($this->input->post('password')),
							'email' => $this->input->post('email'), 
						);

		$this->model_admin->save($data,'pelanggan');
		echo "<script>alert('Terima Kasih Telah Mendaftar');location.href='".site_url()."';</script>";
	}

	function aksilogin(){

		$where = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password'))
			);
		$cek = $this->model_admin->cek_login("pelanggan",$where)->num_rows();
		
		if($cek > 0){

			$dt_login = $this->model_admin->cek_login("pelanggan",$where)->row_array();
			$data_session = array(
				'id_pel' => $dt_login['id_pelanggan'],
				'nama_pel' => $dt_login['nama'],
				);

			$this->session->set_userdata($data_session);
			echo "<script>alert('Login Berhasil');location.href='".site_url()."';</script>";

		}else{
			echo "<script>alert('Login Gagal');location.href='".site_url('login')."';</script>";
		}
	}

	function logout(){
		$this->session->unset_userdata(array('id_pel','nama_pel'));
		echo "<script>alert('Anda Telah Keluar');location.href='".site_url()."';</script>";
	}


	//======================================aksi user=======================================//

	public function aksipemesanan()
	{
		$kode=$this->model_admin->kode_otomatis('no_pemesanan','pemesanan');
		$data = array(
							'no_pemesanan' => $kode,
							'id_pelanggan' => $this->session->userdata('id_pel'),
							'id_wisata' => $this->input->post('id_wisata'),
							'tgl_pemesanan' => date('Y-m-d'),
							'total_harga' => $this->input->post('tot_harga'),
							'jml_orang' => $this->input->post('jml_org'),
							'status_pemesanan' => 'Proses', 
						);

		$sisKuota['jml_kuota']=$this->input->post('jml_tot')-$this->input->post('jml_org');
		$this->model_admin->update($this->input->post('id_wisata'),'id_wisata',$sisKuota,'lokasi_wisata');
		$this->model_admin->save($data,'pemesanan');
		echo "<script>alert('Pemesanan Anda Telah di Proses');location.href='".site_url('faktur/'.$kode)."';</script>";
	}

	public function pesananbatal($id='')
	{
		
		$psn=$this->model_admin->get_by_id($id,'no_pemesanan','pemesanan')->row_array();
		$psn['jml_orang'];

		$trvl=$this->model_admin->get_by_id($psn['id_wisata'],'id_wisata','lokasi_wisata')->row_array();
		$trvl['jml_kuota'];

		$sttsBatal['status_pemesanan']='Batal';
		$this->model_admin->update($id,'no_pemesanan',$sttsBatal,'pemesanan');


		$sisKuota['jml_kuota']=$trvl['jml_kuota']+$psn['jml_orang'];
		$this->model_admin->update($psn['id_wisata'],'id_wisata',$sisKuota,'lokasi_wisata');
		
		echo "<script>alert('Pemesanan Sudah Dibatalkan');location.href='".site_url('pesanananda')."';</script>";
	}


	public function aksipembayaran()
	{
		$data = array(
							'no_pemesanan' => $this->input->post('id'),
							'id_admin' => 0,
							'nominal' => $this->input->post('nom'),
							'atasnama' => $this->input->post('nama'),
							'bank' => $this->input->post('bank'), 
							'tglbayar' => date('Y-m-d'), 
						);

		$ekstension = explode(".", $_FILES['file']['name']);
		$nama_file_baru = date('ymdhis').'.'.end($ekstension);

		$config['upload_path']          = './assets/file_upload/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 3048;
		$config['file_name'] 			= $nama_file_baru;

		$this->load->library('upload', $config);
		

		if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data();
        }

		$data['struk']=$this->upload->data('file_name');

		
		//print_r($data);
		$this->model_admin->save($data,'pembayaran');
		echo "<script>alert('Terima Kasih Anda Telah Konfirmasi Pembayaran');location.href='".site_url('pesanananda')."';</script>";
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */