<!-- judul -->
<header class="rfm-container" style="padding-top:22px;text-transform: capitalize;">
	<h4><b><i class="fa fa-plus-square"></i> &nbsp;Tambah <?php echo $MasterJudul ?></b></h4>
</header>

<!-- isi konten -->
<div class="rfm-container rfm-margin-bottom">
	<form action="<?php echo $MasterAction; ?>"
	      onSubmit="return validateForm()" method ="post" name="myForm" enctype="multipart/form-data">   

	  <div class="rfm-row-padding  rfm-margin-top">  

	    <?php 
	      // mengulang jumlah inputan sesuai jumlah field yang ada
	      for($i=1;$i<$jmlField;$i++)
	      {
	       	$nmValid[]=$namaField[$i];
	       	$ketValid[]=$this->fungsi_master->valid_master($namaField[$i]);
	    ?>

	        <div class="rfm-col m6  rfm-margin-bottom" style='text-transform:capitalize'>
	          
	          <?php $this->fungsi_master->field_master_tambah($namaField[$i],$typeField[$i]); ?>
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
	          SIMPAN DATA <?php echo strtoupper($MasterJudul) ?>
	    </button>

	  </div>

	</form>

</div>

<!-- akhir isi konten -->

<script type="text/javascript">
// javascript untuk validasi
  function validateForm() 
  {  
      var nmi = new Array(<?php foreach ($nmValid as $nilai){echo "'$nilai',";} ?>);
      
      var nmix = new Array(<?php foreach ($ketValid as $ketNilai){echo "'maaf, ".$ketNilai." masih kosong',";} ?>);

      
      
      for (i=0; i < nmi.length; i++) 
      {
          var x = document.forms["myForm"][nmi[i]].value;
          if (x == null || x == "") 
          {
                  alert(nmix[i]);
                  document.forms["myForm"][nmi[i]].focus();
                  return false;
          }
      }

     
  }
</script>