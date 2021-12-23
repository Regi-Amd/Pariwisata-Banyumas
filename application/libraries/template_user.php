<?php

	class Template_User{
		protected $_ci;
		
		function __construct()
		{
			$this->_ci=&get_instance();
		}

		function display($template,$data=NULL)
		{	
			
			$data['JudulWeb']='PARIWISATA BANYUMAS';
				

			$data['NamaMenu'] = array(
										'Beranda',
										'Paket Wisata',
									);

			$data['IconMenu'] = array(
										'dashboard',
										'cube',
										'map-marker',
										'users',
										'envelope',
									);

			$data['LinkMenu'] = array(
										site_url(),
										site_url('#kategori'),
									);

			if(empty($this->_ci->session->userdata('id_pel'))){
				$data['NamaMenuUser'] = array(
											'Login',
											'Daftar'
										);

				$data['IconMenuUser'] = array(
											'user',
											'user-plus'
										);

				$data['LinkMenuUser'] = array(
											site_url('login'),
											site_url('daftar')
										);
			}
			else
			{
				$data['NamaMenuUser'] = array(

											'Keluar',
											'Pesanan Anda',
											'HI '.$this->_ci->session->userdata('nama_pel'),
										);

				$data['IconMenuUser'] = array(

											'power-off',
											'archive',
											'',
										);

				$data['LinkMenuUser'] = array(

											site_url('logout'),
											site_url('pesanananda'),
											'javascript:void(0)',
										);
			}
			

			$data['_header']=$this->_ci->load->view('template_user/t_header1',$data,TRUE);
			$data['_menu']=$this->_ci->load->view('template_user/t_menu1',$data,TRUE);
			$data['_footer']=$this->_ci->load->view('template_user/t_footer1',$data,TRUE);

			$data['_konten']=$this->_ci->load->view($template,$data,TRUE);


			$this->_ci->load->view('/template_user.php',$data);
			
		}
	}