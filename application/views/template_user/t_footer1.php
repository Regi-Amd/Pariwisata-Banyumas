<?php $tmplFoot = ($this->uri->segment(1)=='index' || $this->uri->segment(1)=='') ? 'none' : '' ; ?>
<!-- Awal foot-->
<footer class="rfm-center rfm-black rfm-padding-16 rfm-opacity rfm-hover-opacity-off" style="display:<?php echo $tmplFoot;?>">
  <!-- Container (Contact Section) -->
  <div class="rfm-container " >
    <h3 class="rfm-center">KONTAK KAMI</h3>
      <br>
    <div class="rfm-row-padding">
        
        <div class="rfm-col m3">
            <div class="rfm-large rfm-margin-bottom">
              <i class="fa fa-map-marker fa-fw rfm-hover-text-black rfm-xlarge rfm-margin-right"></i> 
              Banyumas
           </div>
        </div>
        <div class="rfm-col m3 ">
            <div class="rfm-large rfm-margin-bottom">
              <i class="fa fa-whatsapp fa-fw rfm-hover-text-black rfm-xlarge rfm-margin-right"></i> 
              +62 8388 7777
            </div>
        </div>
        <div class="rfm-col m3 ">
            <div class="rfm-large rfm-margin-bottom">
              <i class="fa fa-phone fa-fw rfm-hover-text-black rfm-xlarge rfm-margin-right"></i> 
              Phone: +62 8388 7777
            </div>
        </div>
        <div class="rfm-col m3 ">
            <div class="rfm-large rfm-margin-bottom">
              <i class="fa fa-envelope fa-fw rfm-hover-text-black rfm-xlarge rfm-margin-right"></i> 
              Email: mail@mail.com
            </div>
        </div>
    </div>
  </div>
  <div class="rfm-xlarge rfm-section">
    <i class="fa fa-facebook-official rfm-hover-opacity"></i>
    <i class="fa fa-instagram rfm-hover-opacity"></i>
    <i class="fa fa-twitter rfm-hover-opacity"></i>
  </div>
  <p>Copyright &copy; 2021  PARIWISATA BANYUMAS</p>
  
</footer>

</body>

<script type="text/javascript">

  // Change style of navbar on scroll
  <?php if($this->uri->segment(1)=='index' || $this->uri->segment(1)=='' ) { ?>

    window.onscroll = function() {myFunction()};
    function myFunction() {
        var navbar = document.getElementById("myNavbar");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navbar.className = "rfm-bar" + " rfm-card" + " rfm-animate-top" + " rfm-red";
        } else {
            navbar.className = navbar.className.replace(" rfm-card rfm-animate-top rfm-red", "");
        }
    }

     var myIndex = 0;
    carousel();
    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 4000);    
    } 



 <?php }else{ ?>
     
     window.onscroll = function() {myFunction()};
    function myFunction() {
        var navbar = document.getElementById("myNavbar");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navbar.className = "rfm-bar" + " rfm-card" + " rfm-animate-top"+ " rfm-red";
        } else {
            navbar.className = navbar.className.replace(" rfm-card rfm-animate-top", "");
        }
    }

 <?php } ?>

  // Used to toggle the menu on small screens when clicking on the menu button
  function toggleFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("rfm-show") == -1) {
          x.className += " rfm-show";
      } else {
          x.className = x.className.replace(" rfm-show", "");
      }
  }

 

	function logout()
        {
            tanya=confirm("Apakah anda yakin akan keluar ?")
            if (tanya !="0")
            {
                top.location="<?php echo base_url('index/logout');?>";
            }
        }

    $(document).ready(function(){
        // efek bounce
        doBounce();
        function doBounce() {
          $('#bounce').animate({bottom: '-='+'20px'},500)
              .animate({bottom: '+='+'20px'},500,doBounce); 
        }
        


        $('#myTable').DataTable({
          "language":{
            "url":"<?php echo base_url();?>assets/DataTables-1.10.16/indonesia.json",
            "sEmptyTable":"Tidads",
          },
          "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
        });
      });
</script>

</html>