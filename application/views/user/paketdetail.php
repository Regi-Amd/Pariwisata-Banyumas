<?php 
	if ($isi_page['diskon']!=0){
		$hargaDis=$isi_page['harga_wisata']*$isi_page['diskon'];
		$dis=$isi_page['diskon']*100;
		$hargaStlDis=$isi_page['harga_wisata']-$hargaDis;
		$hargaAsli="<b style='text-decoration:line-through' class='rfm-text-red'>Rp. ".number_format($isi_page['harga_wisata'],0,'','.')." /orang</b> <b class='rfm-text-blue'>Diskon ".$dis."%</b><br>";
	}
	else
	{
		$hargaStlDis=$isi_page['harga_wisata'];
		$hargaAsli="";
	}
?>

<style>
.slidePaket {display:none}
.demo {cursor:pointer}
</style>

<!-- awal paket -->
<div class="rfm-container rfm-padding-32">
 
	<div class="rfm-container rfm-margin-top">
		<div class="rfm-panel rfm-pale-blue rfm-leftbar rfm-card  rfm-border-blue">
		    <h4>
		    	<i class="fa fa-map-marker"></i> 
		    	<b>Paket wisata</b>&nbsp;
		    	<i class="fa fa-angle-double-right"></i>&nbsp;
		    	<b><?php echo $isi_page['nama_wisata']; ?> </b>
		    </h4>

		</div>

	</div>

	<div class="rfm-container">
		<div class="rfm-panel rfm-pale-red rfm-leftbar rfm-card  rfm-border-red">
		    <h5>
		    	<i class="fa fa-calendar"></i> 
		    	<b>Waktu Wisata</b>&nbsp;
		    	<i class="fa fa-angle-double-right"></i>&nbsp;
		    	<b>
		    		<?php echo date('d F Y',strtotime($isi_page['tanggal_mulai'])); ?> 
		    		s/d
		    		<?php echo date('d F Y',strtotime($isi_page['tanggal_selesai'])); ?> 
		    	</b>
		    	<?php  
		    		$wktSkrng=date('Y-m-d');
		    		if($isi_page['tanggal_mulai']>=$wktSkrng)
		    		{
		    			if($isi_page['jml_kuota']>0)
			    		{
			    			echo "<span class='rfm-badge rfm-blue rfm-round-small  rfm-medium'>MASIH TERSEDIA</span>";
			    			$tmplButtn="";
			    		}
			    		else
			    		{
			    			echo "<span class='rfm-badge rfm-red rfm-round-small rfm-medium'>TIDAK TERSEDIA</span>";
		    				$tmplButtn="none";
			    		}
		    		}
		    		
		    		else
		    		{
		    			echo "<span class='rfm-badge rfm-red rfm-round-small rfm-medium'>TIDAK TERSEDIA</span>";
		    			$tmplButtn="none";
		    		}
		    	?>
		    	
		    </h5>
		    
		  
		</div>

	</div>
	<br>
	<div class="rfm-container"> 
	  	<div class="rfm-row-padding">
	  		<div class="rfm-third">
	  			<div class="rfm-row ">
	  				<div class="rfm-quarter">
						<div class="rfm-row-padding">
							<div class="rfm-col">
							  <img class="demo rfm-opacity rfm-hover-opacity-off" 
							  		src="<?php echo base_url();?>assets/file_upload/<?php echo $isi_page['gambar']; ?>" style="width:100%" onclick="currentDiv(1)">
							</div>
							<div class="rfm-col">
							  <img class="demo rfm-opacity rfm-hover-opacity-off" 
							  		src="<?php echo base_url();?>assets/file_upload/<?php echo $isi_page['gambar_1']; ?>" style="width:100%" onclick="currentDiv(2)">
							</div>
							<div class="rfm-col">
							  <img class="demo rfm-opacity rfm-hover-opacity-off" 
							  		src="<?php echo base_url();?>assets/file_upload/<?php echo $isi_page['gambar_2']; ?>" style="width:100%" onclick="currentDiv(3)">
							</div>
						</div>
					</div>
	  				<div class="rfm-threequarter">
						<img class="slidePaket rfm-card-4" src="<?php echo base_url();?>assets/file_upload/<?php echo $isi_page['gambar']; ?>" style="width:100%">
						<img class="slidePaket rfm-card-4" src="<?php echo base_url();?>assets/file_upload/<?php echo $isi_page['gambar_1']; ?>" style="width:100%">
						<img class="slidePaket rfm-card-4" src="<?php echo base_url();?>assets/file_upload/<?php echo $isi_page['gambar_2']; ?>" style="width:100%">
					</div>
					
				</div>
	  		
	  		</div>
	  		<div class="rfm-third">

	  			<table class="rfm-table rfm-striped rfm-bordered rfm-border rfm-card-2">
				  	<thead class="rfm-teal">
				  		<th style="width:30%">Detail</th><th>Ket.</th>
				  	</thead>
					<tr>
						<td style="width:30%"><b>Harga</b></td>
						<td>
							<?php echo  $hargaAsli;?>
							Rp. <?php echo number_format($hargaStlDis,0,'','.'); ?>/orang
						</td>
					</tr>
					<tr>
						<td><b>Jml Kuota</b></td>
						<td><?php echo $isi_page['jml_kuota']; ?> orang</td>
					</tr>
					<tr>
						<td><b>Fasilitas</b></td>
						<td><?php echo $isi_page['fasilitas']; ?></td>
					</tr>
					<tr>
						<td><b>Tempat Penjemputan</b></td>
						<td><?php echo $isi_page['tempat_penjemputan']; ?></td>
					</tr>
				</table>
	  		</div>
	  		<div class="rfm-third">
	  			<div class="rfm-left" style="margin: 10px 0 0 10px;display: <?php echo $tmplButtn ?>">
	  				<i class="rfm-text-red"><b>KLIK UNTUK PESAN</b></i>&nbsp;&nbsp;
	  				<i class="fa fa-hand-o-right rfm-text-red rfm-large"></i>
	  			</div>
	  			<button class="rfm-button rfm-green rfm-hover-green rfm-hover-bayangan rfm-right" 
	  					style="width: 50%;display: <?php echo $tmplButtn ?>"
	  					onclick="location.href='<?php echo site_url('pemesanan/'.$isi_page['id_wisata']) ;?>'">
		    		<i class="fa fa-shopping-cart"></i> &nbsp;PESAN
		    	</button>
		    	<div class="rfm-clear" style="display: <?php echo $tmplButtn ?>"></div>
		    	<br>
	  			<div class="rfm-container rfm-padding rfm-white rfm-card-2">
	  				<?php echo $isi_page['deskripsi_wisata']; ?>
	  			</div>
	  		</div>
		</div>

	</div>

	
</div>

<hr>
<br>
<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}

	function currentDiv(n) {
	  showDivs(slideIndex = n);
	}

	function showDivs(n) {
	  var i;
	  var x = document.getElementsByClassName("slidePaket");
	  var dots = document.getElementsByClassName("demo");
	  if (n > x.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = x.length}
	  for (i = 0; i < x.length; i++) {
	     x[i].style.display = "none";
	  }
	  for (i = 0; i < dots.length; i++) {
	     dots[i].className = dots[i].className.replace(" rfm-opacity-off", "");
	  }
	  x[slideIndex-1].style.display = "block";
	  dots[slideIndex-1].className += " rfm-opacity-off";
	}
</script>

