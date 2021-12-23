<!-- judul -->
<header class="rfm-container" style="padding-top:22px;text-transform: capitalize;">
	<h4 class="rfm-xlarge"><b><i class="fa fa-<?php echo $StatisIco ?>"></i> &nbsp; <?php echo $StatisJudul; ?></b></h4>
</header>
<br>
<!-- isi konten -->
<div class="rfm-container rfm-margin-bottom">
  	
    <div class="rfm-responsive">
    	<table class="rfm-table-all  rfm-hoverable" id="myTable">
	      	<thead >
		        <tr class="rfm-blue">
		        	<th>No.</th>
		        	<?php 
			           // menampilkan judul tabel
			            for($i=1;$i<$jmlField;$i++)
			            {

			               $hidd = (stristr($namaField[$i],"password")!== FALSE) ? 'none' : '' ;

			              echo "<th style='text-transform:capitalize;display:$hidd'>";

			              $this->fungsi_master->field_master_head_list($namaField[$i]);

			              echo "</th>";
			            }

			        ?>
		    		<th>&nbsp;</th> 
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
			              <?php 

			                for($f=1;$f<$jmlField;$f++)
			                {

			                  $hidd = (stristr($namaField[$f],"password")!== FALSE) ? 'none' : '' ;

			                  echo "<td style='display: $hidd'>";
			                  $this->fungsi_master->field_master_body_list($dataList[$namaField[$f]],$typeField[$f],$namaField[$f]);
			                  
			                  echo "</td>";
			                }

			              ?>
			              
			              
			              <td class="rfm-center">
			              
			                <button class="rfm-button rfm-round rfm-small rfm-red rfm-hover-red rfm-padding rfm-hover-bayangan" 
			                        title='Hapus Data'
			                        onclick="location.href='<?php echo $StatisHapus.'/'.$dataList[$namaField[0]]; ?>'">
			                          <span class="fa fa-trash fa-fw"></span>
			                </button>
			              </td>
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
