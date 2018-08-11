
<script src="<?php echo base_url('asset/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?php echo base_url('asset/vendor/popper.js/umd/popper.min.js');?>"> </script>
<script src="<?php echo base_url('asset/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('asset/vendor/jquery.cookie/jquery.cookie.js');?>"> </script>
<script src="<?php echo base_url('asset/vendor/owl.carousel/owl.carousel.min.js');?>"></script>
<script src="<?php echo base_url('asset/js/jquery.ba-cond.min.js');?>"></script>
<script src="<?php echo base_url('asset/js/jquery.slitslider.min.js');?>"></script>
<script src="<?php echo base_url('asset/vendor/jquery-validation/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('asset/vendor/lightbox2/js/lightbox.min.js');?>"></script>
<script src="<?php echo base_url('asset/vendor/timepicki/js/timepicki.js');?>"></script>
<script src="<?php echo base_url('asset/vendor/air-datepicker/js/datepicker.min.js');?>"></script>
<script src="<?php echo base_url('asset/vendor/air-datepicker/js/i18n/datepicker.en.js');?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0dSWcBx-VghzhzQB6oCMTgeXMOhCYTvk"></script>
<script src="<?php echo base_url('asset/js/front.js');?>"></script>
<?php if($this->session->has_userdata('username')){ ?>
<script src="<?php echo base_url('asset/js/notif.js');?>"></script>
<?php } ?>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
<!---->
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>