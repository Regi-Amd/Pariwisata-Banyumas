<!-- judul -->
<header class="rfm-container" style="padding-top:22px;text-transform: capitalize;">
	<h4><b><i class="fa fa-edit"></i> &nbsp;Tambah <?php echo $MasterJudul ?></b></h4>
</header>

<!-- isi konten -->
<div class="rfm-container rfm-margin-bottom">
	<form action="<?php echo $MasterAction; ?>"
	      onSubmit="return validateForm()" method ="post" name="myForm" enctype="multipart/form-data">   


	  <input type="hidden" name="id" value="<?php echo $this->uri->segment(5); ?>">

	  <div class="rfm-row-padding  rfm-margin-top">  

	    <?php 
	      // mengulang jumlah inputan sesuai jumlah field yang ada
	      for($i=1;$i<$jmlField;$i++)
	      {
	        
	      
	    ?>

	        <div class="rfm-col m6  rfm-margin-bottom" style='text-transform:capitalize'>
				<?php $this->fungsi_master->field_master_edit($namaField[$i],$typeField[$i],$namaField[0]); ?>
	        </div>

	    <?php  
	      }
	    ?>

	     
	  </div>
	  <div class="rfm-container rfm-border-top rfm-padding-16">
	    <button class="tablink rfm-button rfm-red  rfm-hover-red rfm-hover-bayangan rfm-left" 
	            onclick="location.href='<?php echo $MasterBack ?>'" type="button">
	          KEMBALI
	    </button>

	    <button class="tablink rfm-button rfm-blue  rfm-hover-blue rfm-hover-bayangan rfm-right" type="submit">
	          UPDATE DATA <?php echo strtoupper($MasterJudul) ?>
	    </button>

	  </div>

	</form>

</div>

<!-- akhir isi konten -->

