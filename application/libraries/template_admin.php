<?php

	class Template_Admin{
		protected $_ci;
		
		function __construct()
		{
			$this->_ci=&get_instance();
		}

		function display($template,$data=NULL)
		{	
			
			$data['JudulWeb']=$this->_ci->session->userdata('nama').' [ADMIN PARIWISATA BANYUMAS]';
				

			$data['NamaMenu'] = array(
										'Beranda',
										'Kategori',
										'Paket Wisata',
										'Pelanggan',
										'Pemesanan',
										'Data Laporan'
									);

			$data['IconMenu'] = array(
										'dashboard',
										'cube',
										'map-marker',
										'users',
										'shopping-cart',
										'bar-chart',
									);

			$data['LinkMenu'] = array(
										site_url($this->_ci->uri->segment(1)),
										site_url($this->_ci->uri->segment(1).'/master/kategori/cube'),
										site_url($this->_ci->uri->segment(1).'/master/lokasi_wisata/map-marker'),
										site_url($this->_ci->uri->segment(1).'/statis/pelanggan/users'),
										site_url($this->_ci->uri->segment(1).'/transaksi/pemesanan/shopping-cart'),
											site_url($this->_ci->uri->segment(1).'/laporan/laporan/bar-chart')
									);


			// $data['kondisiMenu1'] = (!empty($this->_ci->uri->segment(2))) ? 'none': '' ;
			// $data['kondisiMenu2'] = (empty($this->_ci->uri->segment(2))) ? 'none': '' ;
			
			$data['_menu']=$this->_ci->load->view('template_admin/t_menu8',$data,TRUE);

			$data['_header']=$this->_ci->load->view('template_admin/t_header1',$data,TRUE);
			$data['_footer']=$this->_ci->load->view('template_admin/t_footer6',$data,TRUE);

			$data['_konten']=$this->_ci->load->view($template,$data,TRUE);


			$this->_ci->load->view('/template_admin.php',$data);
			
		}
	}