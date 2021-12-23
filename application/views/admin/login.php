<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/rfm.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome-4.7.0/css/font-awesome.min.css">

	<style>
		@font-face {font-family: "Montserrat";font-style: normal;font-weight: 400;src: url('<?php echo base_url();?>font/Montserrat-Regular.ttf') format('truetype')}
		body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
	</style>
</head>
<body class="rfm-grey">
	
	<div class="rfm-container">
	  	
		<form class="rfm-container" action="<?php echo site_url('admin/aksi_login') ?>" method="post" onSubmit="return validateForm()" name="myForm">
		    <div class="rfm-row rfm-round-medium" 
		    		style="max-width:700px;margin: 150px auto;">
		  
		    	
			    
		 		<div class="rfm-col m9 rfm-animate-right">
			      	
			        	<div class="rfm-section">
			          		
			          		<label class="rfm-text-teal"><i class="fa fa-user"></i> USERNAME</label>
			          		<input class="rfm-input rfm-round-large rfm-margin-bottom 
			          					rfm-border-light-gray rfm-hover-border-light-blue" 
			               			type="text" placeholder="Masukan Username" name="username"  >

			               	<label class="rfm-text-teal"><i class="fa fa-key"></i> PASSWORD</label>
			          		<input class="rfm-input rfm-round-large rfm-border-light-gray rfm-hover-border-light-blue" 
			              			type="password" placeholder="Masukan Password" name="password" >
			          
					       
			        	</div>
			      	
			    </div>
			    <button class="rfm-button rfm-col m3 rfm-circle rfm-animate-left rfm-padding-24 rfm-center rfm-card-4 
			    				rfm-hover-teal rfm-hover-bayangan rfm-red" 
			    				style="max-width:100px;margin: 50px 0 0 30px" type="submit">
			    		<i class="fa fa-power-off rfm-xxxlarge rfm-spin"></i>
			    </button>
		    </div>
	    </form>
	</div>

            
</body>

<script type="text/javascript">
	function validateForm() 
	{  
	    var nmi = new Array("username","password");
	    var nmix = new Array("Maaf, Username masih kosong","Maaf, Password masih kosong");
	    
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

</html>