
    	<footer class="footer"> 
            <div class="container-fluid"> 
                <div class="row align-items-center flex-row-reverse"> 
                    <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center"> 
                        <p>Copyright ©2021, All Rights Reserved, Lokpal of India.<br> Designed & developed by NIC.</p> 
                    </div> 
                </div> 
            </div> 
        </footer>

        </div>
    </div>

  <script type="text/javascript">
    $(document).ready(function(){
		$(".toggle").click(function(){
		    $("body").toggleClass("sidenav-toggled");
		});
	});
  </script>
  <script src="<?php echo base_url();?>assets/admin_material/dashboard/js/sidebar-menu.js"></script>
  <script>
	$.sidebarMenu($('.sidebar-menu'))
  </script>

<script type="text/javascript">
  $(document).ready(function() {
    $('input, textarea').bind("cut copy paste", function(e) {
        e.preventDefault();
        alert("You cannot paste text into this textbox!");
        $('input, textarea').bind("contextmenu", function(e) {
            e.preventDefault();
        });
    });
  });


$('body').on('keyup', 'input', function(e){
  if(e.keyCode > 128 && (!(e.keyCode > 186 && e.keyCode < 223))){     
    var tttt = this.id;
      document.getElementById(tttt).value = "";
    alert('Only english language is allowed');
  
    //event.preventDefault();
    //return false;
  }
});
</script>




</body>
</html>