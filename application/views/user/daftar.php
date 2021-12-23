<div class="rfm-container rfm-padding-32">
 
	<div class="rfm-container rfm-margin-top">
		<div class="rfm-panel rfm-pale-blue rfm-leftbar rfm-card  rfm-border-blue">
		    <h4>
		    	<i class="fa fa-user-plus"></i> 
		    	<b>DAFTAR USER</b>
		    </h4>

		</div>

	</div>
	<br>
	<div class="rfm-modal-content rfm-card-4 rfm-animate-zoom" style="max-width:600px">
	  
		<form class="rfm-container" action="<?php echo $aksi; ?>" method='post' onSubmit="return validateForm2()" name="myForm2">
			<div class="rfm-section">
				<label><b>Nama</b></label>
				<input class="rfm-input rfm-border rfm-margin-bottom" type="text" 
					   placeholder="Masukan Nama Anda" name="nama">

				<label><b>No. Hp</b></label>
				<input class="rfm-input rfm-border rfm-margin-bottom" type="number"  
					   placeholder="Masukan Nama Anda" name="hp" min='0' step='any'>

				<label><b>Alamat</b></label>
				<textarea class="rfm-input rfm-border" name="alamat" placeholder="Masukan Alamat Anda" rows='5'></textarea>

				<hr>


				<label><b>E-Mail</b></label>
				<input class="rfm-input rfm-border rfm-margin-bottom" name="email" type="text" placeholder="Masukan e-mail"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="mailx"  onchange="setCustomValidity('')" >


				<label><b>Password</b></label>
				<input class="rfm-input rfm-border rfm-margin-bottom" type="password"  
					   placeholder="Masukan Nama Anda" name="password">


				<button class="rfm-button rfm-block rfm-green rfm-hover-green rfm-hover-bayangan rfm-section rfm-padding rfm-large" 
						  type="submit">
							<b>DAFTAR</b>
				</button>
			</div>
		</form>

		<div class="rfm-container rfm-border-top rfm-padding-16 rfm-light-grey">
			<button onclick="location.href='<?php echo site_url('login') ?>'" 
					type="button" class="rfm-button rfm-teal rfm-hover-teal rfm-hover-bayangan rfm-small">
					KLIK JIKA SUDAH MEMILIKI AKUN
			</button>
		</div>

	</div>

</div>

<br>

<script type="text/javascript">
	function validateForm2() 
	{  
	    var nmi = new Array("nama","hp","alamat","email","password");
	    var nmix = new Array("Maaf, Nama Tidak Boleh Kosong","Maaf, No. HP Tidak Boleh Kosong","Maaf, Alamat Tidak Boleh Kosong","Maaf, E-Mail Tidak Boleh Kosong","Maaf, Password Tidak Boleh Kosong");
	    
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
	    }

	   
	}

	document.getElementById("mailx").oninvalid = function () {
	    this.setCustomValidity('Format E-Mail Tidak Valid');

	};



</script>