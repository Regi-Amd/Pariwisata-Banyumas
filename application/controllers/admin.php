<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('template_admin');
		$this->load->library('fungsi_master');
		$this->load->model('model_admin','',TRUE);
	}

	public function index()
	{
		if(!empty($this->session->userdata('id_adm'))){
			$this->template_admin->display($this->uri->segment(1).'/index');
		}
		else
		{
			$this->load->view('./admin/login');
		}
	}

	public function master($fild='',$fild2='')
	{
		if(!empty($this->session->userdata('id_adm'))){
			if(!empty($fild) && !empty($fild2))
			{
				$Refild=str_replace("_"," ",$fild);
				$data['MasterIco']=$fild2;
				$data['MasterJudul']=$Refild;
				$data['MasterTambah']=site_url($this->uri->segment(1).'/mastertambah/'.$fild.'/'.$fild2);
				$data['MasterEdit']=site_url($this->uri->segment(1).'/masteredit/'.$fild.'/'.$fild2);
				$data['MasterView']=site_url($this->uri->segment(1).'/masterview/'.$fild.'/'.$fild2);
				$data['MasterHapus']=site_url($this->uri->segment(1).'/delete/'.$fild.'/'.$fild2.'/'.$this->uri->segment(2));

				$data['list_field'] = $this->model_admin->get_field_list($fild);

				$data['jmlField']=count($data['list_field']);

				foreach ($data['list_field'] as $keyField => $valueField) {
					$data['namaField'][]=$valueField->name;
	    			$data['typeField'][]=$valueField->type;
				}


				$data['list_data'] = $this->model_admin->get_paged_list($fild)->result_array();
				$data['total_row'] = $this->model_admin->count_all($fild);

				$this->template_admin->display($this->uri->segment(1).'/master',$data);
			}
			else
			{
				redirect($this->uri->segment(1),'refresh');
			}
		}
		else
		{
			redirect('admin','refresh');
		}
	}

	public function mastertambah($fild='',$fild2='')
	{
		if(!empty($this->session->userdata('id_adm'))){
			if(!empty($fild) && !empty($fild2))
			{
				$Refild=str_replace("_"," ",$fild);
				$data['MasterIco']=$fild2;
				$data['MasterJudul']=$Refild;
				$data['MasterBack']=site_url($this->uri->segment(1).'/master/'.$fild.'/'.$fild2);
				$data['MasterAction']=site_url($this->uri->segment(1).'/add/'.$fild.'/'.$fild2);

				$data['list_field'] = $this->db->query('show fields from '.$fild)->result_array();
				$data['jmlField']=count($data['list_field']);

				foreach ($data['list_field'] as $keyField => $valueField) {
					$data['namaField'][]=$valueField['Field'];
					$data['typeField'][]=$valueField['Type'];
				}
				

				$this->template_admin->display($this->uri->segment(1).'/master-tambah',$data);
			}
			else
			{
				redirect($this->uri->segment(1),'refresh');
			}
		}
		else
		{
			redirect('admin','refresh');
		}
	}


	public function masteredit($fild='',$fild2='',$id='')
	{
		if(!empty($this->session->userdata('id_adm'))){		
			if(!empty($fild) && !empty($fild2))
			{
				$Refild=str_replace("_"," ",$fild);
				$data['MasterIco']=$fild2;
				$data['MasterJudul']=$Refild;
				$data['MasterBack']=site_url($this->uri->segment(1).'/master/'.$fild.'/'.$fild2);
				
				$data['list_field'] = $this->db->query('show fields from '.$fild)->result_array();
				$data['jmlField']=count($data['list_field']);

				foreach ($data['list_field'] as $keyField => $valueField) {
					$data['namaField'][]=$valueField['Field'];
					$data['typeField'][]=$valueField['Type'];
				}

				// $this->load->library('encrypt');
				// $encryPrimary=str_replace(array('=','+','/'),array('-','_','~'),$this->encrypt->encode($data['namaField'][0]));
				$data['MasterAction']=site_url($this->uri->segment(1).'/update/'.$fild.'/'.$fild2.'/'.$data['namaField'][0]);

				
				$this->template_admin->display($this->uri->segment(1).'/master-edit',$data);
			}
			else
			{
				redirect($this->uri->segment(1),'refresh');
			}

		}
		else
		{
			redirect('admin','refresh');
		}
	}

	public function masterview($fild='',$fild2='',$id='')
	{
		if(!empty($this->session->userdata('id_adm'))){		
			if(!empty($fild) && !empty($fild2))
			{
				$Refild=str_replace("_"," ",$fild);
				$data['MasterIco']=$fild2;
				$data['MasterJudul']=$Refild;
				$data['MasterBack']=site_url($this->uri->segment(1).'/master/'.$fild.'/'.$fild2);
				
				$data['list_field'] = $this->db->query('show fields from '.$fild)->result_array();
				$data['jmlField']=count($data['list_field']);

				foreach ($data['list_field'] as $keyField => $valueField) {
					$data['namaField'][]=$valueField['Field'];
					$data['typeField'][]=$valueField['Type'];
				}

				$this->template_admin->display($this->uri->segment(1).'/master-view',$data);
			}
			else
			{
				redirect($this->uri->segment(1),'refresh');
			}

		}
		else
		{
			redirect('admin','refresh');
		}
	}

	public function statis($fild='',$fild2='')
	{
		if(!empty($this->session->userdata('id_adm'))){
			if(!empty($fild) && !empty($fild2))
			{
				$data['StatisIco']=$fild2;
				$data['StatisJudul']=$fild;
				$data['StatisHapus']=site_url($this->uri->segment(1).'/delete/'.$fild.'/'.$fild2.'/'.$this->uri->segment(2));

				$data['list_field'] = $this->model_admin->get_field_list($fild);

				$data['jmlField']=count($data['list_field']);

				foreach ($data['list_field'] as $keyField => $valueField) {
					$data['namaField'][]=$valueField->name;
	    			$data['typeField'][]=$valueField->type;
				}


				$data['list_data'] = $this->model_admin->get_paged_list($fild)->result_array();
				$data['total_row'] = $this->model_admin->count_all($fild);

				$this->template_admin->display($this->uri->segment(1).'/statis',$data);
			}
			else
			{
				redirect($this->uri->segment(1),'refresh');
			}
		}
		else
		{
			redirect('admin','refresh');
		}
	}


	public function transaksi($fild='',$fild2='')
	{
		if(!empty($this->session->userdata('id_adm'))){
			if(!empty($fild) && !empty($fild2))
			{
				$data['StatisIco']=$fild2;
				$data['StatisJudul']=$fild;
				$data['TransaksiView']=site_url($this->uri->segment(1).'/transaksiview/'.$fild.'/'.$fild2);
				$data['TransaksiPembayaran']=site_url($this->uri->segment(1).'/transaksipembayaran/'.$fild.'/'.$fild2);
				$data['TransaksiHapus']=site_url($this->uri->segment(1).'/batal/'.$fild.'/'.$fild2.'/'.$this->uri->segment(2));

				$data['list_field'] = $this->model_admin->get_field_list($fild);

				$data['jmlField']=count($data['list_field']);

				foreach ($data['list_field'] as $keyField => $valueField) {
					$data['namaField'][]=$valueField->name;
	    			$data['typeField'][]=$valueField->type;
				}


				$data['list_data'] = $this->model_admin->get_paged_list($fild)->result_array();
				$data['total_row'] = $this->model_admin->count_all($fild);

				$this->template_admin->display($this->uri->segment(1).'/transaksi',$data);
			}
			else
			{
				redirect($this->uri->segment(1),'refresh');
			}
		}
		else
		{
			redirect('admin','refresh');
		}
	}

	public function transaksiview($fild='',$fild2='',$id='')
	{
		if(!empty($this->session->userdata('id_adm'))){
			if(!empty($fild) && !empty($fild2))
			{
				$data['TransaksiSelesai']=site_url($this->uri->segment(1).'/selesai/'.$fild.'/'.$fild2.'/'.$this->uri->segment(2));
				$data['isi_page']=$this->model_admin->get_by_id($id,'no_pemesanan','pemesanan')->row_array();
				$data['isi_page_master']=$this->model_admin->get_by_id($data['isi_page']['id_wisata'],'id_wisata','lokasi_wisata')->row_array();

				$data['isi_page_pel']=$this->model_admin->get_by_id($data['isi_page']['id_pelanggan'],'id_pelanggan','pelanggan')->row_array();
				
				$data['isi_pembayaran']=$this->model_admin->get_by_id($id,'no_pemesanan','pembayaran')->row_array();
				$data['jmlByr']=count((array)$data['isi_pembayaran']);

				$this->template_admin->display($this->uri->segment(1).'/transaksiview',$data);

			}
			else
			{
				redirect($this->uri->segment(1),'refresh');
			}
		}
		else
		{
			redirect('admin','refresh');
		}
	}

	public function TransaksiPembayaran($fild='',$fild2='',$id='')
	{
		if(!empty($this->session->userdata('id_adm'))){
			if(!empty($fild) && !empty($fild2))
			{
				$data['isi_pembayaran']=$this->model_admin->get_by_id($id,'no_pemesanan','pembayaran')->row_array();
				$jmlByr=count($data['isi_pembayaran']);

				if ($jmlByr) {

					$data['aksi']=site_url('aksipembayaran');
					$this->template_admin->display($this->uri->segment(1).'/konfirmasipembayaran',$data);
				}
				else
				{
					echo "<script>alert('Pelanggan Belum Melakukan Pembayaran');location.href='".site_url($this->uri->segment(1).'/transaksiview/'.$fild.'/'.$fild2.'/'.$id)."';</script>";
				}

			}
			else
			{
				redirect($this->uri->segment(1),'refresh');
			}
		}
		else
		{
			redirect('admin','refresh');
		}
	}

	public function laporan($fild='',$fild2='')
	{
	
		if($this->session->userdata('id_adm')!=""){
			if($fild!="" && $fild2!="")
			{
				$data['LaporanIco']=$fild2;
				$data['LaporanJudul']=$fild;
				$data['LaporanDetail']=site_url($this->uri->segment(1).'/laporandetail/'.$fild.'/'.$fild2);
				

				// $data['list_data'] = $this->model_admin->get_paged_list($fild)->result_array();
				// $data['total_row'] = $this->model_admin->count_all($fild);
				$this->template_admin->display('admin/laporan',$data);
			}
			else
			{
				redirect(site_url(),'refresh');
			}
		}
		else
		{
			redirect(site_url(),'refresh');
		}
	}

	public function printlaporan2($fild='',$fild2='')
	{
		if($this->session->userdata('id_adm')!=""){

			$blnIndo = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

			$bln=$this->input->get('bulan');
			$thn=$this->input->get('tahun');

			if($fild2=="bulananberhasil")
			{
				$data['blnLaporan']=$bln;
			    $data['thnLaporan']=$thn;
			    $data['judullap']="LAPORAN BULANAN (STATUS BERHASIL)";
			    $data['capti']=$blnIndo[$bln-1]." ".$thn;
			    $this->db->select("* from pemesanan where 
			                            
			                            month(tgl_pemesanan)='$bln' and 
			                            year(tgl_pemesanan)='$thn' and
			                            status_pemesanan='Berhasil'");
			    $query = $this->db->get();

			    $data['data']=$query->result_array();

			    $data['jml']=count($data['data']);
			}
			else if($fild2=="bulananbatal")
			{
				$data['blnLaporan']=$bln;
			    $data['thnLaporan']=$thn;
			    $data['judullap']="LAPORAN BULANAN (STATUS BATAL)";
			    $data['capti']=$blnIndo[$bln-1]." ".$thn;
			    $this->db->select("* from pemesanan where 
			                            
			                            month(tgl_pemesanan)='$bln' and 
			                            year(tgl_pemesanan)='$thn' and
			                            status_pemesanan='Batal'");
			    $query = $this->db->get();

			    $data['data']=$query->result_array();

			    $data['jml']=count($data['data']);
			}
			else if($fild2=="tahunan")
			{
				
			    $data['thnLaporan']=$thn;
			    $data['judullap']="LAPORAN TAHUNAN";
			    $data['capti']=$thn;
			    $this->db->select("* from pemesanan where 
			                            
			                            year(tgl_pemesanan)='$thn' and
			                            status_pemesanan='Berhasil'");
			    $query = $this->db->get();

			    $data['data']=$query->result_array();

			    $data['jml']=count($data['data']);
			}
			else
			{
				$tgl=$this->input->get('tgl');
				$data['tglLaporan']=$tgl;
				$data['blnLaporan']=$bln;
			    $data['thnLaporan']=$thn;
			    $data['judullap']="LAPORAN HARIAN";
			    $data['capti']=$tgl." ".$blnIndo[$bln-1]." ".$thn;
			    $full=date('Y-m-d',strtotime($thn."-".$bln."-".$tgl));

			    $this->db->select("* from pemesanan where 
			                            
			                           DATE(tgl_pemesanan)='$full'and
			                            status_pemesanan='Berhasil'");
			    $query = $this->db->get();

			    $data['data']=$query->result_array();

			    $data['jml']=count($data['data']);
			}

			$this->load->view('admin/print-laporan2',$data);
			
		}
		else
		{
			redirect('admin','refresh');
		}
	}
	//======================================aksi login dan logout=======================================//
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->model_admin->cek_login("admin",$where)->num_rows();
		if($cek > 0){

			$dt_login = $this->model_admin->cek_login("admin",$where)->row_array();
			$data_session = array(
				'id_adm' => $dt_login['id_admin'],
				'nama' => $dt_login['nama_admin'],
				);

			$this->session->set_userdata($data_session);
			echo "<script>alert('Login Berhasil');location.href='".site_url('admin')."';</script>";

		}else{
			echo "<script>alert('Login Gagal');location.href='".site_url('admin')."';</script>";
		}
	}

	function logout(){
		$this->session->unset_userdata(array('id_adm','nama'));
		echo "<script>alert('Anda Telah Keluar');location.href='".site_url('admin')."';</script>";
	}

	//================================================CRUD===============================================//

	// Add a new item
	public function add($fild='',$fild2='')
	{
		$list_field = $this->model_admin->get_field_list($fild);

		foreach ($list_field as $isi_list_field => $key) {

			if(stristr($key->name, 'gambar') !== FALSE || stristr($key->name, 'foto') !== FALSE || stristr($key->name, 'image') !== FALSE || stristr($key->name, 'file') !== FALSE || stristr($key->name, 'lampiran') !== FALSE)
			{
				$ekstension = explode(".", $_FILES[$key->name]['name']);
				$nama_file_baru = date('ymdhis').'.'.end($ekstension);

				$config['upload_path']          = './assets/file_upload/';
				$config['allowed_types']        = 'gif|jpg|png|pdf';
				$config['max_size']             = 3048;
				$config['file_name'] 			= $nama_file_baru;

				$this->load->library('upload', $config);
				

				if (!$this->upload->do_upload($key->name)) {
		            $error = $this->upload->display_errors();
		            // menampilkan pesan error
		            print_r($error);
		        } else {
		            $result = $this->upload->data();
		        }

				$data[$key->name]=$this->upload->data('file_name');
			}
			else
			{
				$data[$key->name]=$this->input->post($key->name);
			}
		}
		
		$this->model_admin->save($data,$fild);
		echo "<script>alert('Data Berhasil Disimpan');location.href='".site_url($this->uri->segment(1).'/master/'.$fild.'/'.$fild2)."';</script>";
	}

	//Update one item
	public function update( $fild='',$fild2='',$primary_key='' )
	{
		
		// $this->load->library('encrypt');

		$id=$this->input->post('id');
		// $DecryPrimary=str_replace(array('-','_','~'),array('=','+','/'),$primary_key);
		// $HslDecryPrimary=$this->encrypt->decode($DecryPrimary);

		$list_field = $this->model_admin->get_field_list($fild);

		foreach ($list_field as $isi_list_field => $key) {

			if(stristr($key->name, 'gambar') !== FALSE || stristr($key->name, 'foto') !== FALSE || stristr($key->name, 'image') !== FALSE || stristr($key->name, 'file') !== FALSE || stristr($key->name, 'lampiran') !== FALSE)
			{
				$ekstension = explode(".", $_FILES[$key->name]['name']);
				$nama_file_baru = date('ymdhis').'.'.end($ekstension);

				$config['upload_path']          = './assets/file_upload/';
				$config['allowed_types']        = 'gif|jpg|png|pdf';
				$config['max_size']             = 3048;
				$config['file_name'] 			= $nama_file_baru;

				$this->load->library('upload', $config);
				

				if (!$this->upload->do_upload($key->name)) {
		            // $error = $this->upload->display_errors();
		            // // menampilkan pesan error
		            // print_r($error);
		        } else {
		            $result = $this->upload->data();
		            $data[$key->name]=$this->upload->data('file_name');
		        }

				
			}
			else
			{
				
				$data[$primary_key]=$id;
				$data[$key->name]=$this->input->post($key->name);
			}
		}
		

		$this->model_admin->update($id,$primary_key,$data,$fild);
		
		echo "<script>alert('Data Berhasil Diupdate');location.href='".site_url($this->uri->segment(1).'/master/'.$fild.'/'.$fild2)."';</script>";
	}

	//Delete one item
	public function delete( $fild='',$fild2='',$fild3='',$id = '' )
	{
		$list_field = $this->model_admin->get_field_list($fild);
		foreach ($list_field as $keyField => $valueField) {
			$namaField[]=$valueField->name;
		}

		$this->model_admin->delete($id,$namaField[0],$fild);
		echo "<script>alert('Data Berhasil Dihapus');location.href='".site_url($this->uri->segment(1).'/'.$fild3.'/'.$fild.'/'.$fild2)."';</script>";
	}
	

	public function batal($fild='',$fild2='',$fild3='',$id = '')
	{
		$psn=$this->model_admin->get_by_id($id,'no_pemesanan','pemesanan')->row_array();
		$psn['jml_orang'];

		$trvl=$this->model_admin->get_by_id($psn['id_wisata'],'id_wisata','lokasi_wisata')->row_array();
		$trvl['jml_kuota'];

		$sttsBatal['status_pemesanan']='Batal';
		$this->model_admin->update($id,'no_pemesanan',$sttsBatal,'pemesanan');


		$sisKuota['jml_kuota']=$trvl['jml_kuota']+$psn['jml_orang'];
		$this->model_admin->update($psn['id_wisata'],'id_wisata',$sisKuota,'lokasi_wisata');
		
		echo "<script>alert('Data Berhasil Dibatalkan');location.href='".site_url($this->uri->segment(1).'/'.$fild3.'/'.$fild.'/'.$fild2)."';</script>";
	}

	public function selesai($fild='',$fild2='',$fild3='',$id = '')
	{
		
		$sttsBatal['status_pemesanan']='Berhasil';
		$this->model_admin->update($id,'no_pemesanan',$sttsBatal,'pemesanan');

		
		echo "<script>alert('Pemesanan Telah Selesai');location.href='".site_url($this->uri->segment(1).'/'.$fild3.'/'.$fild.'/'.$fild2.'/'.$id)."';</script>";
	}


}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */