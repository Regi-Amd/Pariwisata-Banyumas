<?php 
	if ($isi_page['diskon']!=0){
		$hargaDis=$isi_page['harga_wisata']*$isi_page['diskon'];
		$dis=$isi_page['diskon']*100;
		$hargaStlDis=$isi_page['harga_wisata']-$hargaDis;
		$hargaAsli="<b style='text-decoration:line-through' class='rfm-small rfm-text-red'>Rp. ".number_format($isi_page['harga_wisata'],0,'','.')." /orang</b> <b class='rfm-small rfm-text-blue'>Diskon ".$dis."%</b>";
	}
	else
	{
		$hargaStlDis=$isi_page['harga_wisata'];
		$hargaAsli="";
	}
?>
<div class="rfm-container rfm-padding-32">
 
	<div class="rfm-container rfm-margin-top">
		<div class="rfm-panel rfm-pale-blue rfm-leftbar rfm-card  rfm-border-blue">
		    <h4>
		    	<i class="fa fa-shopping-cart"></i> 
		    	<b>DATA PEMESANAN</b>
		    </h4>

		</div>

	</div>
	<div class="rfm-container">
		<div class="rfm-row-padding">
			<div class="rfm-half">
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
				    </h5>
			  
				</div>
			</div>
			<div class="rfm-half">
				<div class="rfm-panel rfm-pale-yellow rfm-leftbar rfm-card  rfm-border-yellow">
				    <h5>
				    	<i class="fa fa-car"></i> 
				    	<b>Titik Penjemputan</b>&nbsp;
				    	<i class="fa fa-angle-double-right"></i>&nbsp;
				    	<b>
				    		<?php echo $isi_page['tempat_penjemputan']; ?> 
				    	</b>
				    </h5>
				  
				</div>
			</div>
		</div>
		

	</div>
	<br>
	<div class="rfm-row-padding rfm-margin-top ">
		<div class="rfm-col m7">
			<div class="rfm-responsive">
			
		      	<table class="rfm-table-all  rfm-hoverable">
			        <tr class="rfm-teal">
			          <td width="19%" height="50" align="left">&nbsp;</td>
			          <td>&nbsp;</td>
			          <td width="40%" >Jml Orang Yang Ikut</td>
			        </tr>
			        <tr>
		              <td>
						<img src="<?php echo base_url(); ?>assets/file_upload/<?php echo $isi_page['gambar'];?>" width="80%" />
					  </td>
		              
		              <td>
							<?php echo $isi_page['nama_wisata'];?>
		              </td>
		              <td align="right">
		              		<select name="kuota" id="kuota" class="rfm-input rfm-border" style="width: 80%">
								<option value='0' selected class='rfm-light-grey'>-Tidak Ada Tambahan-</option>";
								<?php
									
									for ($i=1; $i < $isi_page['jml_kuota']; $i++) 
									{
								?>
										<option value="<?php echo $i;?>"><?php echo $i." Orang";?></option>
								<?php
									}
								?>
							</select>
							<b class="rfm-text-red rfm-small">* Pilih Jumlah Orang Yang Ikut wisata
							<br> Selain Anda (Jika Ada)</b>
		              </td>
			    </table>
			</div>
		</div>
		<div class="rfm-col m5 rfm-white rfm-padding">
			<h4 class="rfm-border-bottom rfm-padding">Ringkasan Pemesanan</h4>
			
			<p class="rfm-padding-small">
				<label class="rfm-medium">Harga Per Orang</label>
				<label class="rfm-large rfm-right">
						<?php echo $hargaAsli; ?>
						<b>Rp. <?php echo number_format($hargaStlDis,0,'','.'); ?></b>
				</label>
			</p>
			<hr>
			<p class="rfm-padding-small">
				<label class="rfm-medium">Jumlah Orang</label>
				<label class="rfm-large rfm-right">
						<b>1 (Anda)</b><b id="tmbhan"></b>
				</label>
			</p>
			<hr>
			<p class="rfm-padding-small">
				<label class="rfm-medium">Total Harga</label>
				<label class="rfm-large rfm-right">
						<b id='tot'>Rp. <?php echo number_format($hargaStlDis,0,'','.'); ?></b>
				</label>
			</p>
			<hr>
			<p class="rfm-padding-small">
				<form action="<?php echo $aksi;?>" method="post">
					<button type="button" class="rfm-button rfm-red rfm-hover-red rfm-hover-bayangan"
							onclick="location.href='<?php echo site_url();?>'">
						<i class="fa fa-close"></i>
						BATAL
					</button>

				
					<input type="hidden" name="tot_harga" id="tot_harga" value="<?php echo $hargaStlDis;?>">
					<input type="hidden" name="id_wisata" value="<?php echo $isi_page['id_wisata'];?>">
					<input type="hidden" name="jml_org" id="jml_org" value="1">
					<input type="hidden" name="jml_tot" id="jml_tot" value="<?php echo $isi_page['jml_kuota'];?>">
					<button type="submit" class="rfm-button rfm-blue rfm-hover-blue rfm-hover-bayangan">
						<i class="fa fa-send"></i>
						PROSES
					</button>

				</form>
				
			</p>

		</div>
	</div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#kuota').change(function(){
            var id=$(this).val();
            var hrg=<?php echo $hargaStlDis; ?>;
            var totOrg=eval(id)+eval(1);
            var tota=eval(hrg)*eval(totOrg);

			var	number_string = tota.toString(),
				sisa 	= number_string.length % 3,
				rupiah 	= number_string.substr(0, sisa),
				ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
					
			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			if(id!=0)
			{
				$('#tmbhan').html(' + '+id+' (Tambahan Orang)');	
			}
			else
			{
				$('#tmbhan').html('');
			}
            
			$('#tot').html('Rp. '+rupiah);
			$('#tot_harga').val(tota);
			$('#jml_org').val(totOrg);
        });
    });
</script>