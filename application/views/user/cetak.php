<!DOCTYPE html>
<html>
<head>
	<title>Cetak Faktur</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/rfm.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables-1.10.16/media/css/jquery.dataTables.css"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables-1.10.16/media/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables-1.10.16/media/js/jquery.dataTables.js"></script>
	<style>
		@font-face {font-family: "Raleway";font-style: normal;font-weight: 400;src: url('<?php echo base_url(); ?>assets/font/Raleway-Regular.ttf') format('truetype')}
		body, h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
		body, html {
		    height: 100%;
		    color: #777;
		    line-height: 1.8;
		}
		div.dataTables_length, div.dataTables_filter {
	        padding-bottom: 0.55em;
	    }
	    div.dataTables_paginate {
	        margin-top: 0.55em;
	    }
	    table.dataTable thead th,
	    table.dataTable.no-footer {
		  border-bottom: 1px solid #ccc;
		}
	</style>
	
</head>

<body class="rfm-light-grey" onload="window.print()">

	<div class="rfm-container rfm-padding-32">
	 
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
					  			<th colspan="2" class="rfm-center">Data Wisata</th>
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
</body>


</html>