<!-- judul -->
<header class="rfm-container" style="padding-top:22px;text-transform: capitalize;">
 

  <h4 class="rfm-xlarge"><b><i class="fa fa-<?php echo $LaporanIco ?>"></i> &nbsp; <?php echo $LaporanJudul; ?></b></h4>
</header>
<hr class="rfm-border-white">
<!-- isi konten -->
<div class="rfm-container rfm-margin-bottom ">
	
	  <ul class="rfm-ul rfm-border rfm-white">
	    <li class="rfm-blue"><h6><b>Pilih Laporan</b></h6></li>
	    <li class="rfm-bar rfm-padding-16">
	    	<form action="<?php echo base_url('admin/printlaporan2/laporan/harian') ?>" method="get" target="_blank"  onSubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
		    	<div class="rfm-row-padding">

		    	<div class="rfm-row-padding">
		        	<div class="rfm-col m4 rfm-large">
		        		<br>
		        		Laporan Pemesanan Per Harian
		        	</div>
		        			<div class="rfm-col m1">
					        	<?php  
					        			
					        			 echo "
					        			 <label><b>Pilih Tgl</b></label><br>
								          <select class='rfm-select rfm-border-bottom rfm-hover-border-light-blue' 
								                      name='tgl' id='tgl'>
								                ";
								                $tglsk=date("d");
									                 for($n=1; $n<=31; $n++)
									                  {
									                
									                echo  "<option value='".$n."'";
									                		if($tglsk==$n){echo "selected";}
									                echo      ">".$n."
									                      
									                    </option>";

									                  }
								              echo "</select>";
					        		?>
					        	</div>
		        				<div class="rfm-col m2">
					        	<?php  
					        			 echo "
					        			 <label><b>Pilih Bulan</b></label><br>
								          <select class='rfm-select rfm-border-bottom rfm-hover-border-light-blue' 
								                      name='bulan' id='bulan'>
								                ";
								                $blnsk=date("m");
								                $blnIndo = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
								                $bln2 = array('01','02','03','04','05','06','07','08','09','10','11','12');
									                 for($n=0; $n<=11; $n++)
									                  {
									                
									                echo  "<option value='".$bln2[$n]."'";
									                		if($blnsk==$bln2[$n]){echo "selected";}
									                echo      ">".$blnIndo[$n]."
									                      
									                    </option>";

									                  }
								              echo "</select>";
					        		?>
					        	</div>
					        	<div class="rfm-col m2">
					        		<?php  
					        			 echo "
					        			 <label><b>Pilih Tahun</b></label><br>
								          <select class='rfm-select rfm-border-bottom rfm-hover-border-light-blue' 
								                      name='tahun' id='tahun'>
								                ";
								                 	$thnskk=date("Y");
									                  for($thnAr=2017;$thnAr < $thnskk+10; $thnAr++)
									                  {
									                
									                echo  "<option value='".$thnAr."'";
									                		if($thnskk==$thnAr){echo "selected";}
									                echo      ">".$thnAr."
									                      
									                    </option>";

									                  }
								              echo "</select>";
					        		?>
					        	</div>
		        	<div class="rfm-col m3">
		        		<br>
		        			<button type="submit" class="rfm-button rfm-teal rfm-hover-teal rfm-hover-bayangan rfm-card"><i class="fa fa-print"></i> CETAK LAPORAN</button>
		        	</div>
		      	</div>
		    </div>
		    </form>
	    </li>
	    <li class="rfm-bar rfm-padding-16">
	    	<form action="<?php echo base_url('admin/printlaporan2/laporan/bulananberhasil') ?>" method="get" target="_blank"  onSubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
		    	<div class="rfm-row-padding">

		    	<div class="rfm-row-padding">
		        	<div class="rfm-col m4 rfm-large">
		        		<br>
		        		Laporan Pemesanan <b class="rfm-text-blue">(Berhasil)</b> Per Bulan
		        	</div>
		        	<div class="rfm-col m2">
					        		<?php  
					        			 echo "
					        			 <label><b>Pilih Bulan</b></label><br>
								          <select class='rfm-select rfm-border-bottom rfm-hover-border-light-blue' 
								                      name='bulan' id='bulan'>
								                ";
								                $blnsk=date("m");
								                $blnIndo = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
								                $bln2 = array('01','02','03','04','05','06','07','08','09','10','11','12');
									                 for($n=0; $n<=11; $n++)
									                  {
									                
									                echo  "<option value='".$bln2[$n]."'";
									                		if($blnsk==$bln2[$n]){echo "selected";}
									                echo      ">".$blnIndo[$n]."
									                      
									                    </option>";

									                  }
								              echo "</select>";
					        		?>
					        	</div>
					        	<div class="rfm-col m2">
					        		<?php  
					        			 echo "
					        			 <label><b>Pilih Tahun</b></label><br>
								          <select class='rfm-select rfm-border-bottom rfm-hover-border-light-blue' 
								                      name='tahun' id='tahun'>
								                ";
								                 	$thnskk=date("Y");
									                  for($thnAr=2017;$thnAr < $thnskk+10; $thnAr++)
									                  {
									                
									                echo  "<option value='".$thnAr."'";
									                		if($thnskk==$thnAr){echo "selected";}
									                echo      ">".$thnAr."
									                      
									                    </option>";

									                  }
								              echo "</select>";
					        		?>
					        	</div>
		        	<div class="rfm-col m3">
		        		<br>
		        			<button type="submit" class="rfm-button rfm-teal rfm-hover-teal rfm-hover-bayangan rfm-card"><i class="fa fa-print"></i> CETAK LAPORAN</button>
		        	</div>
		      	</div>
		    </div>
		    </form>
	    </li>
	    

	    
	  </ul>
</div>