<!-- awal slide -->

<div class="mySlides bgimg-1 rfm-display-container rfm-opacity-min" id="home">
  <div class="rfm-display-middle rfm-padding-large rfm-border rfm-wide rfm-text-white rfm-black rfm-opacity-min rfm-center  rfm-wide">
    <img src="<?php echo site_url() ?>assets/image/banyumas.png" alt="" width="30%">
    <h1 class="rfm-xlarge">SELAMAT DATANG DI</h1>
    <h3 class="rfm-xxlarge"><?php echo strtoupper($JudulWeb); ?></h3>
  </div>
</div>


<div class="mySlides bgimg-2 rfm-display-container rfm-opacity-min" id="home">
  <div class="rfm-display-middle rfm-padding-large rfm-border rfm-wide rfm-text-white rfm-black rfm-opacity rfm-center  rfm-wide">
    <h1 class="rfm-xlarge">TEMUKAN LOKASI WISATA DI</h1>
    <h3 class="rfm-xxlarge"><?php echo strtoupper($JudulWeb); ?></h3>
  </div>
</div>

<div class="rfm-circle rfm-button rfm-hover-blue rfm-black rfm-opacity rfm-display-bottommiddle" style="bottom:100px;border:3px solid white"  id="bounce" onclick="location.href='#kategori'"> 
    <i class="fa fa-angle-double-down rfm-text-white rfm-xxlarge"></i>
</div>

<!-- akhir slide -->

<!-- awal kategori -->
<div class="rfm-container rfm-padding-16" id="kategori">
 
  <div class="rfm-container rfm-margin-top">
    <h2><i class="fa fa-map"></i> <b>Kategori Paket Wisata</b></h2>
  </div>
  	<div class="rfm-row-padding rfm-text-white rfm-large">

	  	<?php  
	  		foreach ($list_data as $data_list) {
	  			
	  	?>
		    <div class="rfm-half rfm-margin-bottom">
		      <a href="<?php echo site_url('kategorilist/'.$data_list['id_kategori']) ?>" 
		      	 title="Kategori <?php echo $data_list['nama_kategori']; ?>">
			      <div class="rfm-display-container">
			        <img src="<?php echo base_url();?>assets/file_upload/<?php echo $data_list['gambar_kategori']; ?>" 
			        	 alt="<?php echo $data_list['nama_kategori']; ?>" style="width:100%" class='rfm-opacity-min  rfm-hover-shadow'>
			        <span class="rfm-display-bottomleft rfm-padding rfm-xxlarge rfm-text-grey rfm-opacity-min rfm-white" 
			        	style='bottom:10px'>
			        	<b><?php echo $data_list['nama_kategori']; ?></b>
			        </span>
			      </div>
		      </a>		
		    </div>
	    <?php } ?>

	    <div class="rfm-half">

		    <div class="rfm-row-padding" style="margin:0 -16px">
		    	<?php  
		  			foreach ($list_data_item as $data_list_item) {
		  			
		  		?>
			        <div class="rfm-half rfm-margin-bottom">
			          <a href="<?php echo site_url('kategorilist/'.$data_list_item['id_kategori']) ?>" 
		      	 		 title="Kategori <?php echo $data_list_item['nama_kategori']; ?>">
				          <div class="rfm-display-container">
				            <img src="<?php echo base_url();?>assets/file_upload/<?php echo $data_list_item['gambar_kategori']; ?>" 
				            	alt="<?php echo $data_list_item['nama_kategori']; ?>" style="width:100%" class=' rfm-hover-shadow'>
				            <span class="rfm-display-bottomleft rfm-padding rfm-large rfm-text-grey rfm-opacity-min rfm-white" 
					        	style='bottom:10px'>
					        	<b><?php echo $data_list_item['nama_kategori']; ?></b>
					        </span>
				          </div>
				       </a>
			        </div>
		      	<?php } ?>
		    </div>

		    <div class="rfm-row-padding" style="margin:0 -16px">
		    	<?php  
		  			foreach ($list_data_item_item as $data_list_item_item) {
		  			
		  		?>
			        <div class="rfm-half rfm-margin-bottom">
			           <a href="<?php echo site_url('kategorilist/'.$data_list_item_item['id_kategori']) ?>" 
		      	 		 title="Kategori <?php echo $data_list_item_item['nama_kategori']; ?>">
				          <div class="rfm-display-container rfm-hover-shadow">
				            <img src="<?php echo base_url();?>assets/file_upload/<?php echo $data_list_item_item['gambar_kategori']; ?>" 
				            	alt="<?php echo $data_list_item_item['nama_kategori']; ?>" style="width:100%" class=' rfm-hover-shadow'>
				            <span class="rfm-display-bottomleft rfm-padding rfm-large rfm-text-grey rfm-opacity-min rfm-white" 
					        	style='bottom:10px'>
					        	<b><?php echo $data_list_item_item['nama_kategori']; ?></b>
					        </span>
				          </div>
				       </a>
			        </div>
		      	<?php } ?>
		    </div>
	      
	    </div>

	</div>
	
</div>
<!-- akhir kategori -->


<!-- awal paket -->
<div class="rfm-container" id="paket">
 
  <div class="rfm-container">
    <h2><i class="fa fa-map-marker"></i> <b>Paket Wisata</b></h2>
  </div>
  
	<div class="rfm-row-padding">
		<?php  
	  		foreach ($list_data_paket as $data_list_paket) {
	  			
	  	?>
		<div class="rfm-third rfm-margin-bottom rfm-display-container" onclick="location.href='<?php echo site_url('paketdetail/'.$data_list_paket['id_wisata']);?>'">
	      <img src="<?php echo base_url();?>assets/file_upload/<?php echo $data_list_paket['gambar']; ?>" 
	    			 alt="<?php echo $data_list_paket['nama_wisata']; ?>" class='rfm-hover-shadow rfm-hover-opacity' style="width:100%">	
	      <div class="rfm-display-bottomleft rfm-display-hover rfm-padding rfm-card-4" style="left:20px;bottom:10px;border:1px solid #fff;background-color: rgba(0,0,0,.5);">
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

	      <div class="rfm-display-topright rfm-display-hover rfm-padding rfm-card-4" style="right:20px;top:10px;border:1px solid #fff;padding: 2px 5px !important;background-color: rgba(0,0,0,.5);">
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


</div>

<hr>
<!-- akhir kategori -->

<!-- awal tentang -->
<div class="rfm-content rfm-container rfm-padding-64" id="about">
  <h3 class="rfm-center">TENTANG KAMI</h3>
  <p class="rfm-center"><em><?php echo $JudulWeb ?></em></p>
  <p>Kabupaten Banyumas memiliki
keanekaragam wisata dari wisata alam,
wisata religi, hingga wisata pendidikan
yaitu musium. Pemerintah daerah berupaya mengembangkan daerah wisata ini,
sehingga terjadi peningkatan jumlah
obyek wisata dari 10 obyek wisata di
tahun 2002 hingga mencapai 14 obyek
wisata ditahun 2013. Berbagai jenis wisata yang banyak dikunjunga wisatawa
lokal maupun wisatawanmanca nergara di
daerah Kabupaten Bayumas terbagi menjadi wisata alam, wisata budaya, wisata
religi. Perkembangan yang cepat terjadi
ditahun 2009 dari 11 lokasi wisata
menjadi 13 lokasi wisata di tahun 2011.
Pada tahun tersebut pemda Kabupaten
Banyumas mengijinkan pembangunan
wisata alam khususnya wisata air di desa
Pancasan Kecamatan Ajibarang dan
taman kota di Purwokerto. Keberadaan
taman kota nampaknya tidak terlalu
memberikan dampak pada wisatawan
asing. Taman ini lebih berfungsi sebagai
tempat rekreasi bagi masyarakat lokal.</p>
  <div class="rfm-row">
    <div class="rfm-col m6 rfm-center rfm-padding-large">
      <img src="<?php echo base_url();?>assets/image/img_3.png" class="rfm-round rfm-image rfm-hover-opacity-off" alt="Photo of Me" width="300">
    </div>

    <!-- Hide this text on small devices -->
    <div class="rfm-col m6 rfm-hide-small rfm-padding-large">
      <p>Kabupaten Banyumas juga menawarkan wisata budaya yang meliputi
wisata religi, musium dan tempat-tempat
budaya. Wisata budaya musium wayang
menampilkan berbagai koleksi wayang di
daerah sekitar Banyumas. Termasuk dalam paket wisata ini adalah penelusuran
budaya Banyumasan. Jumlah wisatawan
musium sejarah mengalami penurunan di
tahun 2011. Hal ini bisa terjadi karena
kondisi lokasi wisata yang kurang terawat. Musium ini berada ditengah taman
hutan kota dan karena kondisi hutan. hutan yang saat ini tidak terawat jarang
ada yang mengetahui keberadaanya.
Wisata religi mulai banyak dikunjungi.
Masjid saka tunggal dari tahun ke tahun
semakain menarik wisatawan. Berbagai
perbaikan dan paket wisata ditawarkan
disekitar lokasi sehingga menarik. Wisatawan dapat menikmati wisata religi sekaligus sajian budaya tradisional masyarakatnya. 
</p>
    </div>
  </div>
</div>

<!-- akhir tentang -->

<!-- Awal Kontak-->
<footer class="rfm-center rfm-black rfm-padding-64 rfm-opacity rfm-hover-opacity-off" id="kontak">
	<!-- Container (Contact Section) -->
	<div class="rfm-content rfm-container rfm-padding-64" >
	  <h3 class="rfm-center">KONTAK KAMI</h3>

	  <div class="rfm-row rfm-padding-32 rfm-section">
	    
	    <div class="rfm-col m12 rfm-panel">
	      <div class="rfm-large rfm-margin-bottom">
	        <i class="fa fa-map-marker fa-fw rfm-hover-text-black rfm-xlarge rfm-margin-right"></i> 
	        	Bogor
	        <br>
	        <i class="fa fa-whatsapp fa-fw rfm-hover-text-black rfm-xlarge rfm-margin-right"></i> 
	        	+62 8388 7777
	        <br>
	        <i class="fa fa-phone fa-fw rfm-hover-text-black rfm-xlarge rfm-margin-right"></i> 
	        	Phone: +62 8388 7777
	        <br>
	        <i class="fa fa-envelope fa-fw rfm-hover-text-black rfm-xlarge rfm-margin-right"></i> 
	        	Email: mail@mail.com
	        	<br>
	      </div>
	    </div>
	  </div>
	</div>
  <div class="rfm-xlarge rfm-section">
    <i class="fa fa-facebook-official rfm-hover-opacity"></i>
    <i class="fa fa-instagram rfm-hover-opacity"></i>
    <i class="fa fa-twitter rfm-hover-opacity"></i>
  </div>
  <p>Copyright &copy; 2021 PARIWISATA BANYUMAS</p>
  
</footer>

<!-- akhir kontak -->
