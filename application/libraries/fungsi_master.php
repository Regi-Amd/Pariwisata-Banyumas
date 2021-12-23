<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi_Master
{
	protected $ci;

	function __construct()
	{
        $this->ci =& get_instance();
	}

	function field_master_head_list($namaFld)
  {

    if(stristr($namaFld, 'id_') !== FALSE || stristr($namaFld, '_id') !== FALSE || stristr($namaFld, 'kd_') !== FALSE || stristr($namaFld, '_kd') !== FALSE || stristr($namaFld, 'no_') !== FALSE || stristr($namaFld, '_no') !== FALSE || stristr($namaFld, 'kode_') !== FALSE || stristr($namaFld, 'nik_') !== FALSE || stristr($namaFld, 'nis_') !== FALSE || stristr($namaFld, 'nim_') !== FALSE)
      {
        // array kemungkinan nama foreign key
        $aryStrKode=array("id_","_id","kd_","_kd","no_","_no","kode_","nik_","nis_","nim_");
        // menghilangkan nama id, kode, no, dsb
       echo str_replace($aryStrKode, "", strtolower($namaFld));

      }
    else
      {
        echo str_replace("_"," ",$namaFld);
      }

  }


  function field_master_body_list($namaFld,$typeFld,$isiFld)
  {
    $this->ci->load->model('model_admin','',TRUE);
   
    // jika type double maka format currency/uang rupiah
    if($typeFld=="double")
    {
      echo "Rp ".number_format($namaFld,0,'','.');
    }
    // percabgan jika ada foreign key
    else if(stristr($isiFld, 'id_') !== FALSE || stristr($isiFld, '_id') !== FALSE || stristr($isiFld, 'kd_') !== FALSE || stristr($isiFld, '_kd') !== FALSE || stristr($isiFld, 'no_') !== FALSE || stristr($isiFld, '_no') !== FALSE || stristr($isiFld, 'kode_') !== FALSE || stristr($isiFld, 'nik_') !== FALSE || stristr($isiFld, 'nis_') !== FALSE || stristr($isiFld, 'nim_') !== FALSE)
    {
      // array kemungkinan nama foreign key
      $aryStrKode=array("id_","_id","kd_","_kd","no_","_no","kode_","nik_","nis_","nim_");
      // menghilangkan nama id, kode, no, dsb
       $tblForeign=str_replace($aryStrKode, "", strtolower($isiFld));
       $isiFldForegn=$namaFld;
       $qr=$this->ci->model_admin->get_by_id($isiFldForegn,$isiFld,$tblForeign)->row();
       $dataForeignKy = array_values((array)$qr);
       echo $dataForeignKy[1];
    }
    // percabngan jika ada field berat
    else if(stristr($isiFld, 'berat') !== FALSE || stristr($isiFld, 'brt') !== FALSE)
    {
      echo $namaFld*1;
      echo " Kg";
    }
    // percabngan jika ada field gambar
    else if(stristr($isiFld, 'gambar') !== FALSE || stristr($isiFld, 'foto') !== FALSE || stristr($isiFld, 'image') !== FALSE)
    {
      echo "<img src='".base_url()."assets/file_upload/".$namaFld."' 
                style='width:150px;' class='rfm-image'>";
    }
    else
    {
      echo $namaFld;
    }
            
  }

  function field_transaksi_body_list($namaFld,$typeFld,$isiFld)
  {
    $this->ci->load->model('model_admin','',TRUE);
   
    // jika type double maka format currency/uang rupiah
    if($typeFld=="double")
    {
      echo "Rp ".number_format($namaFld,0,'','.');
    }
    // percabgan jika ada foreign key
    else if(stristr($isiFld, 'id_') !== FALSE || stristr($isiFld, '_id') !== FALSE || stristr($isiFld, 'kd_') !== FALSE || stristr($isiFld, '_kd') !== FALSE || stristr($isiFld, 'no_') !== FALSE || stristr($isiFld, '_no') !== FALSE || stristr($isiFld, 'kode_') !== FALSE || stristr($isiFld, 'nik_') !== FALSE || stristr($isiFld, 'nis_') !== FALSE || stristr($isiFld, 'nim_') !== FALSE)
    {
      // array kemungkinan nama foreign key
      $aryStrKode=array("id_","_id","kd_","_kd","no_","_no","kode_","nik_","nis_","nim_");
      // menghilangkan nama id, kode, no, dsb
       $tblForeign=str_replace($aryStrKode, "", strtolower($isiFld));
       $isiFldForegn=$namaFld;

      $avail_tabel= $this->ci->model_admin->get_table_list($tblForeign);

        foreach ($avail_tabel as $keyAvail => $valueAvail) {
          if(stristr($valueAvail, $tblForeign) !== FALSE)
          {
            $qr=$this->ci->model_admin->get_by_id($isiFldForegn,$isiFld,$valueAvail)->row();
            $dataForeignKy = array_values((array)$qr);
            if($tblForeign=='pelanggan'){
              echo $dataForeignKy[1];
            }
            else
            {
               echo $dataForeignKy[2];
            }
          }
        }
       
    }
    // percabngan jika ada field berat
    else if(stristr($isiFld, 'berat') !== FALSE || stristr($isiFld, 'brt') !== FALSE)
    {
      echo $namaFld*1;
      echo " Kg";
    }
    // percabngan jika ada field gambar
    else if(stristr($isiFld, 'gambar') !== FALSE || stristr($isiFld, 'foto') !== FALSE || stristr($isiFld, 'image') !== FALSE)
    {
      echo "<img src='".base_url()."assets/file_upload/".$namaFld."' 
                style='width:150px;' class='rfm-image'>";
    }
    else
    {
      echo $namaFld;
    }
            
  }

	function field_master_tambah($namaFld,$typeFld)
	{

    $this->ci->load->model('model_admin','',TRUE);
		$nmLabel=str_replace("_"," ",$namaFld);

		// kondisi true percabangan jika ada field yang menjadi foreign key maka menampilkan inputan combobox
		if(stristr($namaFld, 'id_') !== FALSE || stristr($namaFld, '_id') !== FALSE || stristr($namaFld, 'kd_') !== FALSE || stristr($namaFld, '_kd') !== FALSE || stristr($namaFld, 'no_') !== FALSE || stristr($namaFld, '_no') !== FALSE || stristr($namaFld, 'kode_') !== FALSE || stristr($namaFld, 'nik_') !== FALSE || stristr($namaFld, 'nis_') !== FALSE || stristr($namaFld, 'nim_') !== FALSE)
            {
              
              // array kemungkinan nama foreign key
              $aryStrKode=array("id_","_id","kd_","_kd","no_","_no","kode_","nik_","nis_","nim_");
              // menghilangkan nama id, kode, no, dsb
              $tblForeign=str_replace($aryStrKode, "", strtolower($namaFld));
              echo "
              <label class='rfm-medium'><b>".$tblForeign."</b></label>
              <select class='rfm-select rfm-border-bottom rfm-hover-border-light-blue' 
                      name='".$namaFld."'>
                <option value='' disabled selected class='rfm-light-grey'>-Pilih-</option>";

               
                  // menampilkkan data foreign key pada combobox
                  $qr=$this->ci->model_admin->get_paged_list($tblForeign)->result();
                  foreach($qr as $dataForeignKy)
                  {
                  	
                  	$dataForeignKyx = array_values((array)$dataForeignKy);
               
                
                echo  "<option value='".$dataForeignKyx[0]."'>
                  		".$dataForeignKyx[1]."
                  		
                  	</option>";

                  }

              echo "</select>";
             

			}
		// kondisi percabangan jika type data text akan menampilkan inputan textarea
		else if($typeFld=="text")
	        {
	        	echo "
	        			<label class='rfm-medium'><b>".$nmLabel."</b></label>
		              	<textarea class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue' 
		                        placeholder='masukan ".$nmLabel."' 
		                        name='".$namaFld."' rows='5'></textarea>

	        	";


	        }
	    // kondisi true percabangan jika ada field yang menjadi gambar, foto, image, dsb maka menampilkan inputan file
        else if(stristr($namaFld, 'gambar') !== FALSE || stristr($namaFld, 'foto') !== FALSE || stristr($namaFld, 'image') !== FALSE || stristr($namaFld, 'file') !== FALSE || stristr($namaFld, 'lampiran') !== FALSE)
            {
            	echo "
            			<label class='rfm-medium'><b>".$nmLabel."</b></label>
	              		<input class='rfm-input rfm-border rfm-margin-bottom' type='file' 
	                    name='".$namaFld."' >


            	";

            }
      // kondisi true percabangan jika ada type field pecahan dan decimal maka menampilkan inputan number/angka
        else if(stristr($typeFld, 'double') !== FALSE || stristr($typeFld, 'decimal') !== FALSE || stristr($typeFld, 'float') !== FALSE || stristr($typeFld, 'real') !== FALSE)
            {
            	echo "
            			 <label class='rfm-medium'><b>".$nmLabel."</b></label>
	                	 <input class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue ' 
		                   type='number' 
		                   placeholder='masukan ". $nmLabel."' 
		                   name='".$namaFld."' min='0' step='any'>
            	";
            }
        // kondisi percabangan jika type data enum akan menampilkan inputan radio
        else if(stristr($typeFld, 'enum') !== FALSE)
            {
            	$hapusNilai=array('enum(',')');
	            $kondisiHapus=str_replace($hapusNilai,'',$typeFld);
	            $isiPilihan = str_getcsv($kondisiHapus, ',', "'");
        			echo "
        			<fieldset>
	                <legend>
	                  <label class='rfm-medium'><b>".$nmLabel."</b></label>
	                </legend>";

	                foreach ($isiPilihan as $nilaiPilihan) 
		              {
		                echo "<input class='rfm-radio' type='radio' name='";
		                echo $namaFld; 
		                echo "' value='$nilaiPilihan' style='cursor: pointer;height: 16px;width: 16px' checked>
		                        <label class='rfm-small'> $nilaiPilihan</label>
		                        &nbsp;
		                      ";
		              }
		              
		              echo "</fieldset>";

            	

            }
        // kondisi true percabangan jika ada type field date
        else if($typeFld=='date')
            {
              echo "
                   <label class='rfm-medium'><b>".$nmLabel."</b></label>
                     <input class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue ' 
                       type='date' 
                       placeholder='masukan ". $nmLabel."' 
                       name='".$namaFld."'>
              ";
            }
        // kondisi true percabangan jika ada type field date
        else if($typeFld=='datetime')
            {
              echo "
                   <label class='rfm-medium'><b>".$nmLabel."</b></label>
                     <input class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue ' 
                       type='datetime-local' 
                       placeholder='masukan ". $nmLabel."' 
                       name='".$namaFld."'>
              ";
            }
        // kondisi percabgan jika kondisi standar maka akan menampilkan inputan textbox
        else
        	{
        		echo"
        				<label class='rfm-medium'><b>".$nmLabel."</b></label>
		                <input class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue ' 
		                   type='text' 
		                   placeholder='masukan ".$nmLabel."' 
		                   name='".$namaFld."' >

        		";

        	}

	}

  function field_master_edit($namaFld,$typeFld,$prmy)
  {

    $this->ci->load->model('model_admin','',TRUE);
    $nmLabel=str_replace("_"," ",$namaFld);
    $id=$this->ci->uri->segment(5);
    $fild=$this->ci->uri->segment(3);


    $list_edit=$this->ci->model_admin->get_by_id($id,$prmy,$fild)->row_array();


    // kondisi true percabangan jika ada field yang menjadi foreign key maka menampilkan inputan combobox
    if(stristr($namaFld, 'id_') !== FALSE || stristr($namaFld, '_id') !== FALSE || stristr($namaFld, 'kd_') !== FALSE || stristr($namaFld, '_kd') !== FALSE || stristr($namaFld, 'no_') !== FALSE || stristr($namaFld, '_no') !== FALSE || stristr($namaFld, 'kode_') !== FALSE || stristr($namaFld, 'nik_') !== FALSE || stristr($namaFld, 'nis_') !== FALSE || stristr($namaFld, 'nim_') !== FALSE)
            {
              
              // array kemungkinan nama foreign key
              $aryStrKode=array("id_","_id","kd_","_kd","no_","_no","kode_","nik_","nis_","nim_");
              // menghilangkan nama id, kode, no, dsb
              $tblForeign=str_replace($aryStrKode, "", strtolower($namaFld));
              echo "
              <label class='rfm-medium'><b>".$tblForeign."</b></label>
              <select class='rfm-select rfm-border-bottom rfm-hover-border-light-blue' 
                      name='".$namaFld."'>
                <option value='' disabled selected class='rfm-light-grey'>-Pilih-</option>";

               
                  // menampilkkan data foreign key pada combobox
                  $qr=$this->ci->model_admin->get_paged_list($tblForeign)->result();
                  foreach($qr as $dataForeignKy)
                  {
                    
                    $dataForeignKyx = array_values((array)$dataForeignKy);
               
                
                echo  "<option value='".$dataForeignKyx[0]."'";
                      if($dataForeignKyx[0]==$list_edit[$namaFld]){echo "selected";} 
                echo  ">".$dataForeignKyx[1]."
                      
                    </option>";

                  }

              echo "</select>";
             

      }
    // kondisi percabangan jika type data text akan menampilkan inputan textarea
    else if($typeFld=="text")
          {
            echo "
                <label class='rfm-medium'><b>".$nmLabel."</b></label>
                    <textarea class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue' 
                            placeholder='masukan ".$nmLabel."' 
                            name='".$namaFld."' rows='5'>".$list_edit[$namaFld]."</textarea>

            ";


          }
      // kondisi true percabangan jika ada field yang menjadi gambar, foto, image, dsb maka menampilkan inputan file
        else if(stristr($namaFld, 'gambar') !== FALSE || stristr($namaFld, 'foto') !== FALSE || stristr($namaFld, 'image') !== FALSE || stristr($namaFld, 'file') !== FALSE || stristr($namaFld, 'lampiran') !== FALSE)
            {
              echo "
                  <label class='rfm-medium'><b>".$nmLabel."</b></label>
                    <input class='rfm-input rfm-border rfm-margin-bottom' type='file' 
                      name='".$namaFld."' >

                  <img src='".base_url()."assets/file_upload/".$list_edit[$namaFld]."' 
                              style='width:100px;' class='rfm-image'>


              ";

            }
      // kondisi true percabangan jika ada type field pecahan dan decimal maka menampilkan inputan number/angka
        else if(stristr($typeFld, 'double') !== FALSE || stristr($typeFld, 'decimal') !== FALSE || stristr($typeFld, 'float') !== FALSE || stristr($typeFld, 'real') !== FALSE)
            {
              $pchn=1;
              echo "
                   <label class='rfm-medium'><b>".$nmLabel."</b></label>
                     <input class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue ' 
                       type='number' 
                       placeholder='masukan ". $nmLabel."' 
                       name='".$namaFld."' min='0' step='any'
                       value='".$list_edit[$namaFld]*$pchn."'>

              ";
            }
        // kondisi percabangan jika type data enum akan menampilkan inputan radio
        else if(stristr($typeFld, 'enum') !== FALSE)
            {
              $hapusNilai=array('enum(',')');
              $kondisiHapus=str_replace($hapusNilai,'',$typeFld);
              $isiPilihan = str_getcsv($kondisiHapus, ',', "'");
              echo "
              <fieldset>
                  <legend>
                    <label class='rfm-medium'><b>".$nmLabel."</b></label>
                  </legend>";

                  foreach ($isiPilihan as $nilaiPilihan) 
                  {
                    echo "<input class='rfm-radio' type='radio' name='";
                    echo $namaFld; 
                    echo "' value='$nilaiPilihan' style='cursor: pointer;height: 16px;width: 16px'";
                        if($nilaiPilihan==$list_edit[$namaFld]){echo "checked";} 
                    echo"   <label class='rfm-small'> $nilaiPilihan</label>
                            &nbsp;
                          ";
                  }
                  
                  echo "</fieldset>";

              

            }
        // kondisi percabgan jika kondisi standar maka akan menampilkan inputan textbox
        // kondisi true percabangan jika ada type field date
        else if($typeFld=='date')
            {
              echo "
                   <label class='rfm-medium'><b>".$nmLabel."</b></label>
                     <input class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue ' 
                       type='date' 
                       placeholder='masukan ". $nmLabel."' 
                       name='".$namaFld."'
                       value='".$list_edit[$namaFld]."'>
              ";
            }
        // kondisi true percabangan jika ada type field date
        else if($typeFld=='datetime')
            {
              echo "
                   <label class='rfm-medium'><b>".$nmLabel."</b></label>
                     <input class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue ' 
                       type='datetime-local' 
                       placeholder='masukan ". $nmLabel."' 
                       name='".$namaFld."'
                       value='".$list_edit[$namaFld]."'>
              ";
            }
        else
          {
            echo"
                <label class='rfm-medium'><b>".$nmLabel."</b></label>
                    <input class='rfm-input rfm-border-light-gray rfm-hover-border-light-blue ' 
                       type='text' 
                       placeholder='masukan ".$nmLabel."' 
                       name='".$namaFld."'
                       value='".$list_edit[$namaFld]."'>


            ";

          }

  }

  function field_master_view($namaFld,$typeFld,$prmy)
  {

    $this->ci->load->model('model_admin','',TRUE);
    $id=$this->ci->uri->segment(5);
    $fild=$this->ci->uri->segment(3);


    $list_edit=$this->ci->model_admin->get_by_id($id,$prmy,$fild)->row_array();


    // kondisi true percabangan jika ada field yang menjadi foreign key maka menampilkan inputan combobox
    if(stristr($namaFld, 'id_') !== FALSE || stristr($namaFld, '_id') !== FALSE || stristr($namaFld, 'kd_') !== FALSE || stristr($namaFld, '_kd') !== FALSE || stristr($namaFld, 'no_') !== FALSE || stristr($namaFld, '_no') !== FALSE || stristr($namaFld, 'kode_') !== FALSE || stristr($namaFld, 'nik_') !== FALSE || stristr($namaFld, 'nis_') !== FALSE || stristr($namaFld, 'nim_') !== FALSE)
      {
              
              // array kemungkinan nama foreign key
              $aryStrKode=array("id_","_id","kd_","_kd","no_","_no","kode_","nik_","nis_","nim_");
              // menghilangkan nama id, kode, no, dsb
              $tblForeign=str_replace($aryStrKode, "", strtolower($namaFld));
             
                  // menampilkkan data foreign key pada combobox
                  $qr=$this->ci->model_admin->get_by_id($list_edit[$namaFld],$namaFld,$tblForeign)->row_array();
                  

                  $dataForeignKyx = array_values((array)$qr);

                  echo  $dataForeignKyx[1];
      }
    // kondisi percabangan jika type data text akan menampilkan inputan textarea
    else if($typeFld=="text")
      {
            echo $list_edit[$namaFld];
      }
      // kondisi true percabangan jika ada field yang menjadi gambar, foto, image, dsb maka menampilkan inputan file
      else if(stristr($namaFld, 'gambar') !== FALSE || stristr($namaFld, 'foto') !== FALSE || stristr($namaFld, 'image') !== FALSE || stristr($namaFld, 'file') !== FALSE || stristr($namaFld, 'lampiran') !== FALSE)
            {
              echo "<img src='".base_url()."assets/file_upload/".$list_edit[$namaFld]."' 
                              style='width:100px;' class='rfm-image'>

                    ";

            }
      // kondisi true percabangan jika ada type field pecahan dan decimal maka menampilkan inputan number/angka
        else if(stristr($typeFld, 'double') !== FALSE || stristr($typeFld, 'decimal') !== FALSE || stristr($typeFld, 'float') !== FALSE || stristr($typeFld, 'real') !== FALSE)
            {
              $pchn=1;
              echo $list_edit[$namaFld]*$pchn;
            }
        // kondisi percabangan jika type data enum akan menampilkan inputan radio
        else if(stristr($typeFld, 'enum') !== FALSE)
            {
              echo $list_edit[$namaFld];

            }
        // kondisi percabgan jika kondisi standar maka akan menampilkan inputan textbox
        else
          {
            echo $list_edit[$namaFld];

          }

  }

	function valid_master($namaFld)
	{

       	if(stristr($namaFld, 'id_') !== FALSE || stristr($namaFld, '_id') !== FALSE || stristr($namaFld, 'kd_') !== FALSE || stristr($namaFld, '_kd') !== FALSE || stristr($namaFld, 'no_') !== FALSE || stristr($namaFld, '_no') !== FALSE || stristr($namaFld, 'kode_') !== FALSE || stristr($namaFld, 'nik_') !== FALSE || stristr($namaFld, 'nis_') !== FALSE || stristr($namaFld, 'nim_') !== FALSE)
        {
        	// array kemungkinan nama foreign key
          $aryStrKode=array("id_","_id","kd_","_kd","no_","_no","kode_","nik_","nis_","nim_");
          // menghilangkan nama id, kode, no, dsb
          $dspNmField=str_replace($aryStrKode, "", strtolower($namaFld));
        }
        else
        {
        	$dspNmField=str_replace("_"," ",$namaFld);
        }

        return $dspNmField;
	}

}

/* End of file fungsi_master.php */
/* Location: ./application/libraries/fungsi_master.php */
