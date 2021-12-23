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

			              

			              echo "<th style='text-transform:capitalize;'>";

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

			                 

			                  echo "<td>";
			                  $this->fungsi_master->field_transaksi_body_list($dataList[$namaField[$f]],$typeField[$f],$namaField[$f]);
			                  
			                  echo "</td>";
			                }

			              ?>
			              
			              
			              <td class="rfm-center">
			              
			                <button class="rfm-button rfm-round rfm-small rfm-blue rfm-hover-blue rfm-padding rfm-hover-bayangan" 
			                        title='View Data Pemesanan '
			                        onclick="location.href='<?php echo $TransaksiView.'/'.$dataList[$namaField[0]]; ?>'">
			                          <span class="fa fa-eye fa-fw"></span>
		                	</button>
		                	<button class="rfm-button rfm-round rfm-small rfm-teal rfm-hover-teal rfm-padding rfm-hover-bayangan" 
		                        title='Konfirmasi Pembayaran '
		                        onclick="location.href='<?php echo $TransaksiPembayaran.'/'.$dataList[$namaField[0]]; ?>'">
		                          <span class="fa fa-money fa-fw"></span>
		                	</button>
		                	
			                <a href="<?php echo $TransaksiHapus.'/'.$dataList[$namaField[0]]; ?>" 
		                        title='Batalkan Pesanan '>
		                		
			                	<button class="rfm-button rfm-round rfm-small rfm-red rfm-hover-red rfm-hover-bayangan rfm-padding" onclick="return confirm('Apakah Yakin Pesanan Ini Dibatalkan ?');">
			                          <span class="fa fa-ban fa-fw"></span>
			                	</button>

		                	</a>
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
