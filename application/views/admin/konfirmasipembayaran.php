<div class="rfm-container rfm-padding-32">
 
	
	<div class="rfm-modal-content rfm-card-4 rfm-animate-zoom rfm-padding" style="max-width:600px">
		<div class="rfm-container rfm-margin-top">
			<div class="rfm-panel rfm-pale-blue rfm-card ">
			    <h4>
			    	<i class="fa fa-money"></i> 
			    	<b>DATA PEMBAYARAN</b>
			    </h4>

			</div>

		</div>
	<br>
		
		<div class="rfm-section rfm-center">
			<label><b>Kode Pemesanan</b></label>
			<h5><b><?php echo $this->uri->segment(5) ?></b></h5>
			<hr>
			<label><b>Nominal Pembayaran</b></label>
			<h5><b><?php echo $isi_pembayaran['nominal'] ?></b></h5>
			<hr>
			<label><b>Atas Nama Pengirim</b></label>
			<h5><b><?php echo $isi_pembayaran['atasnama']; ?></b></h5>
			<hr>

			<label><b>Nama Bank Pengirim</b></label>
			<h5><b><?php echo $isi_pembayaran['bank'] ?></b></h5>

		</div>
		
	</div>

</div>

<br>
