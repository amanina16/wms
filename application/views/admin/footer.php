      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2020 &copy; WMS by Amanina Ulya Safira.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
	
	<script src="<?php echo base_url() ?>ui/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>ui/js/bootstrap.bundle.min.js"></script>
   
    <script class="include" type="text/javascript" src="<?php echo base_url() ?>ui/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ?>ui/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>ui/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>ui/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>ui/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url() ?>ui/js/owl.carousel.js" ></script>
    <script src="<?php echo base_url() ?>ui/js/jquery.customSelect.min.js" ></script>
    <script src="<?php echo base_url() ?>ui/js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="<?php echo base_url() ?>ui/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url() ?>ui/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="<?php echo base_url() ?>ui/js/sparkline-chart.js"></script>
    <script src="<?php echo base_url() ?>ui/js/easy-pie-chart.js"></script>
    <script src="<?php echo base_url() ?>ui/js/count.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>

  </body>
</html>