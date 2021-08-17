

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
</body>
</html>