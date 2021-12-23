<div class="rfm-container rfm-padding-32">
 
	<div class="rfm-container rfm-margin-top">
		<div class="rfm-panel rfm-pale-blue rfm-leftbar rfm-card  rfm-border-blue">
		    <h5>
		    	<b>HALAMAN PESANAN ANDA</b>
		    </h5>

		</div>

		<div class="rfm-panel rfm-pale-red rfm-card rfm-display-container rfm-animate-zoom">
			<span onclick="this.parentElement.style.display='none'"
  						class="rfm-button rfm-pale-red rfm-hover-pale-red rfm-display-right">
  						<i class="fa fa-close rfm-text-red"></i></span>
		    <h6 class="rfm-small">
		    	<i class="fa fa-warning"></i> 
		    	<b>
		    		Bila Ada Pemesanan yang Belum Ada Bayar
		    		&nbsp;<i class="fa fa-long-arrow-right"></i>&nbsp;
		    		Segera Lakukan Pembayaran Ke BCA No. Rek 67288282 a/n PARIWISATA BANYUMAS
		    		&nbsp;<i class="fa fa-long-arrow-right"></i>&nbsp;
		    		Maks. Pembayaran 1x24 Jam
		    		&nbsp;<i class="fa fa-long-arrow-right"></i>&nbsp;
		    		Jika Sudah Lakukan Konfirmasi Pembayaran
		    	</b>
		    </h6>

		</div>

	</div>

	<br>

	<div class="rfm-container rfm-margin-top rfm-margin-bottom">
		<div class="rfm-responsive">
    	<table class="rfm-table-all  rfm-hoverable" id="myTable">
	      	<thead >
		        <tr class="rfm-green">
		        	<th>No.</th>
		        	<th>Paket Wisata</th>
		        	<th>No. Pemesanan</th>
		        	<th>Tgl. Pemesanan</th>
		        	<th>Total Harga</th>
		        	<th>Status</th>
		        	<th>&nbsp;</th>
		        </tr>
		    </thead>
	        <tbody>
	        <?php
	        	
	        	if($total_row)
			    {
	        		$no=1;
		          	foreach($isi_page as $dataList)
		          	{
		          		$isi_page_master=$this->model_admin->get_by_id($dataList['id_wisata'],'id_wisata','lokasi_wisata')->row_array();
	        	?>
			        	<tr>
					        <td><?php echo $no++ ?></td>
					        <td><?php echo $dataList['no_pemesanan'] ?></td>
					        <td><?php echo $isi_page_master['nama_wisata'] ?></td>
					        <td><?php echo date('d-m-Y',strtotime($dataList['tgl_pemesanan'])) ?></td>
					        <td>Rp. <?php echo number_format($dataList['total_harga'],0,'','.'); ?></td>
					        <td><?php echo $dataList['status_pemesanan'] ?></td>
					        <td class='rfm-center'>
					        	<button class="rfm-button rfm-round rfm-small rfm-blue rfm-hover-blue rfm-padding rfm-hover-bayangan" 
			                        title='View Data Pemesanan '
			                        onclick="location.href='<?php echo site_url('pesanandetail/'.$dataList['no_pemesanan']); ?>'">
			                          <span class="fa fa-eye fa-fw"></span>
			                	</button>
			                	<button class="rfm-button rfm-round rfm-small rfm-teal rfm-hover-teal rfm-padding rfm-hover-bayangan" 
			                        title='Konfirmasi Pembayaran '
			                        onclick="location.href='<?php echo site_url('konfirmasipembayaran/'.$dataList['no_pemesanan']); ?>'">
			                          <span class="fa fa-money fa-fw"></span>
			                	</button>
			                	<a href="<?php echo site_url('pesananbatal/'.$dataList['no_pemesanan']); ?>" 
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
			         echo "<tr><td colspan='7' >Tidak Ada Data</td></tr>";

			    }
			?>
			</tbody>
    	</table>
	</div>
</div>
</div>
<br><br>