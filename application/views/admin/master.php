<!-- judul -->
<header class="rfm-container" style="padding-top:22px;text-transform: capitalize;">
	<h4 class="rfm-xlarge"><b><i class="fa fa-<?php echo $MasterIco ?>"></i> &nbsp; <?php echo $MasterJudul; ?></b></h4>
</header>

<!-- isi konten -->
<div class="rfm-container rfm-margin-bottom">
  	<button class="rfm-button rfm-blue rfm-hover-bayangan rfm-hover-blue rfm-right"
            onclick="location.href='<?php echo $MasterTambah; ?>'">
      <b>Tambah Data
        <i class="fa fa-plus"></i>
      </b>
    </button>

    <div class="rfm-clear"></div>
    <br>
    <div class="rfm-responsive">
    	<table class="rfm-table-all  rfm-hoverable" id="myTable">
	      	<thead >
		        <tr class="rfm-green">
		        	<th>No.</th>
		        	<th>&nbsp;</th> 
		        	<?php 

		        		$jmlBts = ($this->uri->segment(3)=='lokasi_wisata') ? $jmlField-6 : $jmlField ;
			           // menampilkan judul tabel
			            for($i=1;$i<$jmlBts;$i++)
			            {
			              echo "<th style='text-transform:capitalize'>";

			              $this->fungsi_master->field_master_head_list($namaField[$i]);
			              echo "</th>";
			            }

			        ?>
		    		
	        	</tr>
	        </thead>
	        <tbody>
	        	<?php  
			       // menampilkan isi tabel
			        if($total_row)
			        {
			          $no=1;
			          foreach($list_data as $dataList)
			          {
				?>
			        	<tr>
			              <td><?php echo $no++ ?></td>
			              <td class='rfm-center'>
			                
			                <button class="rfm-button rfm-round rfm-small rfm-blue rfm-hover-blue rfm-padding rfm-hover-bayangan" 
			                        title='View Data '
			                        onclick="location.href='<?php echo $MasterView.'/'.$dataList[$namaField[0]]; ?>'">
			                          <span class="fa fa-eye fa-fw"></span>
			                </button>

			                <button class="rfm-button rfm-round rfm-small rfm-teal rfm-hover-teal rfm-padding rfm-hover-bayangan" 
			                        title='Edit Data '
			                        onclick="location.href='<?php echo $MasterEdit.'/'.$dataList[$namaField[0]]; ?>'">
			                          <span class="fa fa-edit fa-fw"></span>
			                </button>
			                
			                <button class="rfm-button rfm-round rfm-small rfm-red rfm-hover-red rfm-padding rfm-hover-bayangan" 
			                        title='Hapus Data '
			                        onclick="location.href='<?php echo $MasterHapus.'/'.$dataList[$namaField[0]]; ?>'">
			                          <span class="fa fa-trash fa-fw"></span>
			                </button>
			              </td>
			              <?php 

			                for($f=1;$f<$jmlBts;$f++)
			                {

			               		echo "<td>";	 	
			                  		$this->fungsi_master->field_master_body_list($dataList[$namaField[$f]],$typeField[$f],$namaField[$f]);
			                  	echo "</td>";
			                }

			              ?>
			              
			              
			              
			            </tr>
			    <?php 
			          }
			        }
			        else
			        {
			         echo "<tr><td colspan='".number_format($jmlField+2)."' >Tidak Ada Data</td></tr>";

			        }

			  	?>
	        </tbody>
    	</table>
    </div>
    
</div>

