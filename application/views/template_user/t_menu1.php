<!-- Navbar (sit on top) -->
<?php $wrnMn = ($this->uri->segment(1)=='index' || $this->uri->segment(1)=='' ) ? '' : 'rfm-blue' ; ?>
<div class="rfm-top">
  <div class="rfm-bar <?php echo $wrnMn ?>" id="myNavbar">
    <a class="rfm-bar-item rfm-button rfm-hover-black rfm-hide-medium rfm-hide-large rfm-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <?php
    foreach ($NamaMenu as $KeyNamaMenu => $ValueNamaMenu) {
    ?>
        <a href="<?php echo $LinkMenu[$KeyNamaMenu]; ?>" class="rfm-bar-item rfm-button rfm-hide-small">
          <i class="fa fa-<?php echo $IconMenu[$KeyNamaMenu]; ?>"></i> 
          <?php echo strtoupper($ValueNamaMenu); ?>
        </a>
    <?php } ?>

    <?php
    foreach ($NamaMenuUser as $KeyNamaMenuUser => $ValueNamaMenuUser) {
    ?>
        <a href="<?php echo $LinkMenuUser[$KeyNamaMenuUser]; ?>" class="rfm-bar-item rfm-button rfm-hide-small rfm-right">
          <i class="fa fa-<?php echo $IconMenuUser[$KeyNamaMenuUser]; ?>"></i> 
          <?php echo strtoupper($ValueNamaMenuUser); ?>
        </a>
    <?php } ?>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="rfm-bar-block rfm-white rfm-hide rfm-hide-large rfm-hide-medium">
    <?php
      foreach ($NamaMenu as $KeyNamaMenu => $ValueNamaMenu) {
    ?>
      <a href="<?php echo $LinkMenu[$KeyNamaMenu]; ?>" class="rfm-bar-item rfm-button" onclick="toggleFunction()">
         <?php echo strtoupper($ValueNamaMenu); ?>
      </a>
    <?php } ?>
  </div>
</div>