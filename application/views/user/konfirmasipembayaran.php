<div class="rfm-container rfm-padding-32">
 
	<div class="rfm-container rfm-margin-top">
		<div class="rfm-panel rfm-pale-blue rfm-leftbar rfm-card  rfm-border-blue">
		    <h4>
		    	<i class="fa fa-money"></i> 
		    	<b>KONFIRMASI PEMBAYARAN</b>
		    </h4>

		</div>

	</div>
	<br>
	<div class="rfm-modal-content rfm-card-4 rfm-animate-zoom" style="max-width:600px">
	  
		<form class="rfm-container" action="<?php echo $aksi; ?>" method='post' onSubmit="return validateForm2()" name="myForm2" enctype="multipart/form-data">
			<input name="id" value="<?php echo $this->uri->segment(2) ?>" type='hidden'>
			<input name="nomFix" value="<?php echo $isi_page['total_harga'] ?>" type='hidden'>
			<div class="rfm-section">
				<label><b>Kode Pemesanan</b></label>
				<input class="rfm-input rfm-border rfm-margin-bottom rfm-light-grey rfm-disabled" type="text" name="id" value="<?php echo $this->uri->segment(2) ?>" readonly='readonly'>

				<label><b>Nominal Pembayaran</b></label>
				<input class="rfm-input rfm-border rfm-margin-bottom" type="number"  
					   placeholder="Masukan Nominal Pembayaran" name="nom" min='0' step='any'>

				<label><b>Atas Nama Pengirim</b></label>
				<input class="rfm-input rfm-border rfm-margin-bottom" type="text"  
					   placeholder="Masukan Atas Nama Pengirim" name="nama">


				<label><b>Nama Bank Pengirim</b></label>
				<input class="rfm-input rfm-border rfm-margin-bottom" type="text"  
					   placeholder="Masukan Nama Bank Pengirim" name="bank">

				<label><b>Struk</b></label>
				<input class="rfm-input rfm-border rfm-margin-bottom" type="file" name="file"  >


				<button class="rfm-button rfm-block rfm-green rfm-hover-green rfm-hover-bayangan rfm-section rfm-padding rfm-large" 
						  type="submit">
							<b>SIMPAN</b>
				</button>
			</div>
		</form>

	</div>

</div>

<br>

<script type="text/javascript">
	function validateForm2() 
	{  
	    var nmi = new Array("nom","nama","bank","file");
	    var nmix = new Array("Maaf, Nominal Tidak Boleh Kosong","Maaf, Atas Nama Pengirim Tidak Boleh Kosong","Maaf, Bank Pengirim Tidak Boleh Kosong","Maaf, Struk Pembayaran Belum di Upload");
	    
	    var nomFix=document.forms["myForm2"]['nomFix'].value;
	    var nom=document.forms["myForm2"]['nom'].value;
	    for (i=0; i < nmi.length; i++) 
	    {
	        var x = document.forms["myForm2"][nmi[i]].value;
	        var j = document.forms["myForm2"][nmi[i]];

	        if (x == null || x == "" ) 
	        {
	        	
	        		alert(nmix[i]);
	        		setTimeout(function(){j.focus();},1);
	                return false;
	        }

	        if (nomFix != nom ) 
	        {
	        	
	        		alert('Nominal Pembayaran Tidak Sama');
	        		setTimeout(function(){nom.focus();},1);
	                return false;
	        }

	    }

	}

	



</script>