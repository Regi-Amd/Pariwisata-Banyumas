<h1 align="center"><b>PARIWISATA BANYUMAS</b></h1>
<h2 align="center"><?php echo $judullap ?></h2>
<h2 align="center"><?php echo $capti ?></h2>
<hr>


  <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="font-size:12px;font-weight:bold">
        <tr valign="top">
            <td width="50%" style="padding-right:20px;" align="center">
                <table width="100%" height="88" border="1" bordercolor="#CCCCCC"  style="border:1px solid #CCCCCC" align="center">
              <tr class="rfm-blue" align="center">
                        <td width="5%" height="40"  align="center">No.</th>
                        <td width="11%" align="center">ID Pemesanan</th>
                        <td width="16%" align="center">Tanggal Pemesanan</th>
                        <td width="15%"  align="center">Pelanggan</th>
                        <td width="15%"  align="center">Total Harga</th>
                       
                  </tr>

<?php    
          $no=0;
          $grandTotal=0;
          foreach ($data as $datalap) {
            
            $pelngg=$this->model_admin->get_by_id($datalap['id_pelanggan'],'id_pelanggan','pelanggan')->row_array();
            $no=$no+1;
?>
          <tr class="" bgcolor="#FFF" >
                                <td align="center" height="40"><?php echo $no;?></td>
                                <td align="center"><?php echo $datalap['no_pemesanan'];?></td>
                                <td align="center"><?php echo date("d/m/Y",strtotime($datalap['tgl_pemesanan']));?></td>
                                <td align="center" class="fontupper">
                                    <?php echo strtoupper($pelngg['nama']);?>   
                                </td>
                                
                                <td align="center">
                                  Rp. <?php 
                                        $total=$datalap['total_harga'];
                                        echo number_format($total,0,'','.');?>
                               </td>
                                
                               
                     </tr>

            

<?php       
            $grandTotal=$grandTotal+$total;
          }
            $grandTotali=number_format($grandTotal,0,'','.');
            echo"
                <tr>
                    <td colspan='4' align='center' height='40'>Total Keseluruhan</td>
                    <td colspan='4' align='center' height='40'>Rp. ".$grandTotali."</td>
                </tr>
            ";
            echo "<div style='clear:both'></div><br>";
       
?>
        </table>
            </td>
        </tr>
</table>  

<script>window.print();</script>