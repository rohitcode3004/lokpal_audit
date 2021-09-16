
    <div id='loader' style="display:none;">
      <div class="ajex_spinner"></div>
      <img width="100" src="<?php echo base_url();?>assets/my_assets/images/logo_lokpal.png" alt="logo lodar" />
    </div>
    <!-- Image loader -->

    <script src="<?php echo base_url(); ?>assets/my_assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/my_assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/my_assets/js/jquery.waypoints.js"></script>
    <script src="<?php echo base_url(); ?>assets/my_assets/js/jquery.rcounterup.js"></script>

    <script type="text/javascript">
    // preloader
      function loader() {
          $('#ctn-preloader').addClass('loaded');
          $("#loading").fadeOut(500);
          // Una vez haya terminado el preloader aparezca el scroll
      
          if ($('#ctn-preloader').hasClass('loaded')) {
              // Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
              $('#preloader').delay(900).queue(function () {
                  $(this).remove();
              });
          }
      }
      
      $(window).on('load', function () {
          loader();
          wowanimation();
        mainSlider();
        counterOn()
      });

    </script>

    <script>
      jQuery(document).ready(function(){
         jQuery('.refreshCaptcha').on('click', function(){
             jQuery.get('<?php echo base_url().'user/refresh_captcha'; ?>', function(data){
                 $('#captImg').html(data);
             });
         });
      });
    </script>

    <script type="text/javascript">
      // face Counter 
      (function($) {
          'use strict';

          $('.count-num').rCounter();
      })(jQuery);

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

/*  ==================  Script of popover ================== */
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
  });


/*  ==================  Create Strong password Script ================== */

        function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#pwd').val().length < 6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Weak Password");
            } else {
                if ($('#pwd').val().match(number) && $('#pwd').val().match(alphabets) && $('#pwd').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong Password");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("Medium Password");
                }
            }
        }

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