<!-- judul -->
<header class="rfm-container" style="padding-top:22px;text-transform: capitalize;">
	<h4 class="rfm-xlarge"><b><i class="fa fa-<?php echo $MasterIco ?>"></i> &nbsp; View <?php echo $MasterJudul; ?></b></h4>
</header>

<!-- isi konten -->
<div class="rfm-container rfm-margin-bottom">
  	
    <div class="rfm-clear"></div>
    <br>
    <div class="rfm-responsive">
    	<table class="rfm-table-all  rfm-hoverable" id="myTable">
	        <?php 

	        	for($i=1;$i<$jmlField;$i++)
		            {
		            	
			            echo "<tr style='text-transform:capitalize'>";
				            echo "<td class='rfm-green' style='width: 15%'><b>";

				              	echo $this->fungsi_master->field_master_head_list($namaField[$i]);

				            echo "</b></td>";

				            echo "<td>";	 	

		                  		echo $this->fungsi_master->field_master_view($namaField[$i],$typeField[$i],$namaField[0]);

		                  	echo "</td>";

			            echo "</tr>";
			         }
		     

		    ?>	
    	</table>
    	<br>
    	<div class="rfm-container rfm-border-top rfm-padding-16">
		    <button class="tablink rfm-button rfm-red  rfm-hover-red rfm-hover-bayangan rfm-left" 
		            onclick="location.href='<?php echo $MasterBack ?>'" type="button">
		          KEMBALI
		    </button>

		</div>
    </div>
    
</div>

