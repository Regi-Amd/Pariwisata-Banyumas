<div class="rfm-container rfm-padding-32">
 
	<div class="rfm-container rfm-margin-top rfm-animate-top">
		
		<div class="rfm-panel rfm-pale-blue rfm-leftbar rfm-card  rfm-border-blue">
		    <h6 class="rfm-medium">
		    	<b>
		    		HALAMAN DETAIL PESANAN
		    		<?php 
			    		if($isi_page['status_pemesanan']=="Proses")
			    		{
			    			echo "<span class='rfm-badge rfm-red rfm-round-small rfm-medium rfm-right'>
			    					Status ".$isi_page['status_pemesanan']."
			    				  </span>";
			    			$tmplButtn2="";
			    		}
			    		
			    		else
			    		{
			    			echo "<span class='rfm-badge rfm-teal rfm-round-small rfm-medium rfm-right'>
			    					Status ".$isi_page['status_pemesanan']."
			    				  </span>";
			    			$tmplButtn2="display:none";
			    			
			    		}
			    	?>
		    	</b>
		    </h6>

		</div>
		<?php if (!$jmlByr){ $tmplButtn="display:none";?>
			<div class="rfm-panel rfm-pale-red rfm-card rfm-display-container rfm-animate-zoom">
				<span onclick="this.parentElement.style.display='none'"
	  						class="rfm-button rfm-pale-red rfm-hover-pale-red rfm-display-right">
	  						<i class="fa fa-close rfm-text-red"></i></span>
			    <h6 class="rfm-small">
			    	<i class="fa fa-warning"></i> 
			    	<b>
			    		Pelanggan Belum Melakukan Konfirmasi Pembayaran
			    	</b>
			    </h6>

			</div>
		<?php } else{ $tmplButtn="";?>
			<div class="rfm-panel rfm-pale-yellow rfm-card rfm-display-container rfm-animate-zoom">
				<span onclick="this.parentElement.style.display='none'"
	  						class="rfm-button rfm-pale-yellow rfm-hover-pale-yellow rfm-display-right">
	  						<i class="fa fa-close rfm-text-red"></i></span>
			    <h6 class="rfm-small">
			    	<i class="fa fa-check"></i> 
			    	<b>
			    		Pelanggan Telah Melakukan Konfirmasi Pembayaran
			    	</b>
			    </h6>

			</div>

		<?php } ?>
	</div>

	<br>
	<div class="rfm-container rfm-center">
		<a href="<?php echo base_url('cetak/'.$isi_page['no_pemesanan']);?>" target="_blank">
			<button type="button" class="rfm-button rfm-dark-grey rfm-round-large rfm-hover-bayangan rfm-hover-grey rfm-card-2">
				<b><i class="fa fa-print"></i> PRINT</b>
			</button>
		</a>
		<a href="<?php echo $TransaksiSelesai.'/'.$isi_page['no_pemesanan'];?>" style='<?php echo $tmplButtn.';'.$tmplButtn2 ?>;'>
			<button type="button" class="rfm-button rfm-blue rfm-round-large rfm-hover-bayangan rfm-hover-blue rfm-card-2" onclick="return confirm('Apakah Yakin ACC Pesanan Ini ?');">
				<b><i class="fa fa-check"></i> ACC</b>
			</button>
		</a>
	</div>
	<br>
	<div class="rfm-container">
		<div class="rfm-row-padding">
			<div class="rfm-quarter">
				<div class="rfm-panel rfm-pale-blue rfm-leftbar rfm-card  rfm-border-blue">
				    <h6>
				    	<i class="fa fa-bookmark"></i> 
				    	<b>No. Pemesanan</b>&nbsp;<br>
				    	<i class="fa fa-toggle-right"></i>&nbsp;
				    	<b class="rfm-large">
				    		<?php echo $isi_page['no_pemesanan']; ?> 
				    	</b>
				    </h6>
			  
				</div>
			</div>
			<div class="rfm-quarter">
				<div class="rfm-panel rfm-pale-green rfm-leftbar rfm-card  rfm-border-green">
				    <h6>
				    	<i class="fa fa-calendar"></i> 
				    	<b>Tanggal Pemesanan</b>&nbsp;<br>
				    	<i class="fa fa-toggle-right"></i>&nbsp;
				    	<b class="rfm-large">
				    		<?php echo date('d F Y',strtotime($isi_page['tgl_pemesanan'])); ?> 
				    	</b>
				    </h6>
			  
				</div>
			</div>
			<div class="rfm-quarter">
				<div class="rfm-panel rfm-pale-yellow rfm-leftbar rfm-card  rfm-border-yellow">
				    <h6>
				    	<i class="fa fa-id-badge"></i> 
				    	<b>Jumlah Orang</b>&nbsp;<br>
				    	<i class="fa fa-toggle-right"></i>&nbsp;
				    	<b>
				    		1 (Anda)
				    	</b>
				    	<?php if ($isi_page['jml_orang']!=1):?>
					    	
					    	<b>
					    		+ <?php echo $isi_page['jml_orang']-1; ?> (Tambahan)
					    	</b>
				    		
				    	<?php endif ?>
				    	<b> Orang</b>
				    </h6>
				  
				</div>
			</div>
			<div class="rfm-quarter">
				<div class="rfm-panel rfm-pale-red rfm-leftbar rfm-card  rfm-border-red">
				    <h6>
				    	<i class="fa fa-database"></i> 
				    	<b>Total Harga</b>&nbsp;<br>
				    	<i class="fa fa-toggle-right"></i>&nbsp;
				    	<b class="rfm-large">
				    		Rp. <?php echo number_format($isi_page['total_harga'],0,'','.'); ?> 
				    	</b>
				    </h6>
			  
				</div>
			</div>
		</div>
		
	</div>
	<br>
	<div class="rfm-container">
		<div class="rfm-row-padding">
			<div class="rfm-half">
				<table class="rfm-table rfm-striped rfm-bordered rfm-border rfm-card-2">
				  	<thead>
				  		<tr  class="rfm-teal">
				  			<th colspan="2" class="rfm-center">Data Wisata <?php echo $isi_page_master['nama_wisata']; ?></th>
				  		</tr>
				  		<tr  class="rfm-grey">
				  			<th style="width:30%">Detail</th><th>Ket.</th>
				  		</tr>
				  	</thead>
					<tr>
						<td style="width:30%"><b>Tanggal Pelaksanaan</b></td>
						<td>
							<?php echo date('d F Y',strtotime($isi_page_master['tanggal_mulai'])); ?> 
				    		s/d
				    		<?php echo date('d F Y',strtotime($isi_page_master['tanggal_selesai'])); ?>
						</td>
					</tr>
					<tr>
						<td><b>Fasilitas</b></td>
						<td><?php echo $isi_page_master['fasilitas']; ?></td>
					</tr>
					<tr>
						<td><b>Tempat Penjemputan</b></td>
						<td><?php echo $isi_page_master['tempat_penjemputan']; ?></td>
					</tr>
				</table>
			</div>
			<div class="rfm-half">
				<table class="rfm-table rfm-striped rfm-bordered rfm-border rfm-card-2">
				  	<thead>
				  		<tr  class="rfm-teal">
				  			<th colspan="2" class="rfm-center">Data Pelanggan</th>
				  		</tr>
				  		<tr  class="rfm-grey">
				  			<th style="width:30%">Detail</th><th>Ket.</th>
				  		</tr>
				  	</thead>
					<tr>
						<td style="width:30%"><b>Nama Pelanggan</b></td>
						<td>
							<?php echo $isi_page_pel['nama']; ?>
						</td>
					</tr>
					<tr>
						<td><b>Alamat</b></td>
						<td><?php echo $isi_page_pel['alamat']; ?></td>
					</tr>
					<tr>
						<td><b>No. Handphone</b></td>
						<td><?php echo $isi_page_pel['hp']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>


</div>