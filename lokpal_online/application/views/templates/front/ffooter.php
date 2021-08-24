

    <script src="<?php echo base_url(); ?>assets/my_assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/my_assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/my_assets/js/jquery.waypoints.js"></script>
    <script src="<?php echo base_url(); ?>assets/my_assets/js/jquery.rcounterup.js"></script>

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
</script>    
</body>
</html>