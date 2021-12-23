</body>

<script type="text/javascript">

	// Open and close sidebar
  function rfm_open() {
    document.getElementById("head_menu").style.display = "block";
    document.getElementById("main").style.display = "block";
    document.getElementById("head_full").style.display = "none";
  }
  function rfm_close() {
    document.getElementById("head_full").style.display = "block";
    document.getElementById("main").style.display = "none";
    document.getElementById("head_menu").style.display = "none";

  }

  

	function logout()
        {
            tanya=confirm("Apakah anda yakin akan keluar ?")
            if (tanya !="0")
            {
                top.location="<?php echo base_url('admin/logout');?>";
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