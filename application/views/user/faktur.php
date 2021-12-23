<div class="rfm-container rfm-padding-32">
 
	<div class="rfm-container rfm-margin-top rfm-animate-top">
		<div class="rfm-panel rfm-pale-blue rfm-leftbar rfm-card  rfm-border-blue">
		    <h6 class="rfm-small">
		    	<i class="fa fa-check"></i> 
		    	<b>TERIMA KASIH TELAH MELAKUKAN PEMESANAN</b>
		    </h6>

		</div>
		<div class="rfm-panel rfm-pale-red rfm-leftbar rfm-card  rfm-border-red">
		    <h6 class="rfm-medium">
		    	<i class="fa fa-warning"></i> 
		    	<b>
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
	<div class="rfm-container">
		<a href="<?php echo base_url('cetak/'.$isi_page['no_pemesanan']);?>" target="_blank">
			<button type="button" class="rfm-button rfm-dark-grey rfm-round-large rfm-hover-bayangan rfm-hover-grey rfm-card-2">
				<b><i class="fa fa-print"></i> PRINT</b>
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
				  			<th colspan="2" class="rfm-center">Data Anda</th>
				  		</tr>
				  		<tr  class="rfm-grey">
				  			<th style="width:30%">Detail</th><th>Ket.</th>
				  		</tr>
				  	</thead>
					<tr>
						<td style="width:30%"><b>Nama Anda</b></td>
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