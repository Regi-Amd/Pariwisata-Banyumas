<header class="rfm-display-container rfm-content rfm-center rfm-animate-bottom " style="max-width:1368px;" id="head_menu" >
  <div class="rfm-teal" style="width: 100%;height: 50px"></div>
  
  <!-- Navbar (placed at the bottom of the header image) -->
  <div class="rfm-bar rfm-light-grey rfm-round rfm-display-bottommiddle rfm-hide-small rfm-center" style="bottom:-16px;width: 67.1%">
    <?php
    foreach ($NamaMenu as $KeyNamaMenu => $ValueNamaMenu) {
      $aktfMn = ($IconMenu[$KeyNamaMenu]==$this->uri->segment(4)) ? 'rfm-grey' : '' ;
    ?>
      <a href="<?php echo $LinkMenu[$KeyNamaMenu]; ?>" class="rfm-bar-item rfm-button <?php echo $aktfMn ?> ">
        <i class="fa fa-<?php echo $IconMenu[$KeyNamaMenu]; ?> fa-fw"></i>
        <?php echo $ValueNamaMenu; ?>
      </a>
    <?php } ?>
    <a href="#" onClick="logout()"
     class="rfm-bar-item rfm-button">
      <i class="fa fa-power-off "></i> Keluar
    </a>
  </div>


</header>