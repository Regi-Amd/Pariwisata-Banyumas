<!-- awal paket -->
<div class="rfm-container rfm-padding-32">
 
	<div class="rfm-container rfm-margin-top">
		<div class="rfm-panel rfm-pale-blue rfm-leftbar rfm-card  rfm-border-blue">
		    <h4>
		    	<i class="fa fa-map"></i> 
		    	<b>Kategori Paket Wisata</b>&nbsp;
		    	<i class="fa fa-angle-double-right"></i>&nbsp;
		    	<b><?php echo $judul_page['nama_kategori']; ?> </b>
		    </h4>
		</div>

	</div>

	<?php if ($jml_list_data_paket!=0){?>
		<div class="rfm-row-padding rfm-margin-top">
			<?php  
		  		foreach ($list_data_paket as $data_list_paket) {
		  			
		  	?>
			<div class="rfm-third rfm-margin-bottom rfm-display-container" onclick="location.href='<?php echo site_url('paketdetail/'.$data_list_paket['id_wisata']);?>'">
		      <img src="<?php echo base_url();?>assets/file_upload/<?php echo $data_list_paket['gambar']; ?>" 
		    			 alt="<?php echo $data_list_paket['nama_wisata']; ?>" class='rfm-hover-shadow rfm-hover-opacity' style="width:100%">	
		      <div class="rfm-display-bottomleft rfm-display-hover rfm-padding rfm-card-4" style="left:20px;bottom:10px;border:1px solid #fff">
		        <h4 class="rfm-text-white"><b><?php echo $data_list_paket['nama_wisata']; ?></b></h4>
		      </div>
		      <?php 
	      		if ($data_list_paket['diskon']!=0){
	      			$hargaDis=$data_list_paket['harga_wisata']*$data_list_paket['diskon'];
	      			$hargaStlDis=$data_list_paket['harga_wisata']-$hargaDis;
	      			$hargaAsli="<b style='text-decoration:line-through' class='rfm-medium rfm-text-red'>Rp. ".number_format($data_list_paket['harga_wisata'],0,'','.')."</b><br>"
		      	?>
		      	
		      
			      <div class="rfm-display-topleft rfm-display-hover rfm-padding rfm-card-4" style="left:20px;top:10px;border:1px solid #fff;background-color: rgba(255,0,0,.5);">
			        <h6 class="rfm-text-white rfm-small"><b>Diskon <?php echo $data_list_paket['diskon']*100; ?>%</b></h6>
			      </div>

		      	<?php 
		  			}else {
		  				$hargaStlDis=$data_list_paket['harga_wisata'];
		  				$hargaAsli="";

		      		}
		      	?>
		      <div class="rfm-display-topright rfm-display-hover rfm-padding rfm-card-4" style="right:20px;top:10px;border:1px solid #fff;padding: 2px 5px !important">
		        <h5 class="rfm-text-white">
		        	<?php echo $hargaAsli ?>
	        		<b>Rp. <?php echo number_format($hargaStlDis,0,'','.'); ?></b>
		       </h5>
		      </div>
		      <div class="rfm-display-middle rfm-display-hover rfm-padding rfm-card-4 rfm-button rfm-teal rfm-hover-bayangan rfm-hover-teal rfm-card-4 rfm-round-large">
		       	<h3><b>DETAIL</b></h3>
		      </div>
			</div>
			<?php } ?>
		</div>

	<?php }else{ ?>
		<div class="rfm-container rfm-margin-top">
			<div class="rfm-panel rfm-red rfm-content rfm-center rfm-card-2 rfm-large">
			  <br>
			  <i class="rfm-xxxlarge fa fa-ban"></i>
			  <h3><b>MAAF!</b></h3>
			  <p><b>PAKET WISATA BELUM TERSEDIA</b></p>
			  <br>
			</div> 
		</div>

	<?php } ?>
</div>

<hr>

